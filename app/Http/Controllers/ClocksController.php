<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clocks;
use App\Drivers;
use App\Driving;
use App\Koordinat;
use App\Units;
use App\JamKerja;
use App\Lembur;
use App\Users;
use App\Attendances;
use Auth;
use DataTables;

class ClocksController extends Controller
{
    public function create(Request $request)
    {	
    	date_default_timezone_set('Asia/Jakarta');
    	$hari = date('Y-m-d');
    	$time = date("H:i:s");

        $user = Auth::user();

        $client = Drivers::where('driver_id', $request->user_id)
        ->first();

        $adahariini = Clocks::where([
            ['user_id', '=', $request->user_id],
            ['clockin_date', '=', $hari],
        ])
        ->first();

        if(!$adahariini){

            $clock = new Clocks();
            $clock->clockin_date = $hari;
            $clock->user_id = $request->user_id;
            $clock->client_id = $client->user_id;
            $clock->clockin_time = $time;
            $clock->clockin_km = $request->km;
            $clock->perdin = $request->status;
            $clock->clockin_status = 'NOT APPROVED';
            $clock->save();

            $clockdrive = new Driving();
            $clockdrive->clock_id = $clock->id;
            $clockdrive->unit_id = $client->unit_id;
            $clockdrive->km_awal = $request->km;
            $clockdrive->km_akhir = null;
            $clockdrive->save();

            $adaabsen = Attendances::where([
                ['driver_id', '=', $request->user_id],
                ['date_in', '=', $hari],
            ])
            ->first();

            if(!$adaabsen){

                $absensi = new Attendances();
                $absensi->driver_id = $user->id;
                $absensi->status_id = '1';
                $absensi->date_in = $hari;
                $absensi->time_in = $time;
                $absensi->save();

            } else {

                $absensiout = Attendances::where(['id'=>$adaabsen->id])
                ->update(['status_id'=>'1', 'date_in'=>$hari, 'time_in'=>$time]);

            }
            

        }

        $units = Drivers::where('driver_id', $request->user_id)
        ->first();

        $ClockId = array(    
            'clockin_id' => $clock->id  
        );


        return response()->json($ClockId);
    }

    public function validasi(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
    	$harini = date('Y-m-d');
        $kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));

        $user = Auth::user();

        $users = Users::where("id", $user->id)
        ->first();

        $validatekemarin = Clocks::where([
            ['user_id', '=', $request->user_id],
            ['clockout_time', '=', null],
            ['clockin_date', '!=', $harini],
        ])
        ->first();

        $validatehariini = Clocks::where([
            ['user_id', '=', $request->user_id],
            ['clockin_date', '=', $harini],
        ])
        ->first();

        $validatehariiniclockout = Clocks::where([
            ['user_id', '=', $request->user_id],
            ['clockin_date', '=', $harini],
            ['clockout_time', '=', null],
        ])
        ->first();


        if (!$validatekemarin){

            if (!$validatehariini){

                $status = 'belumclock_in';
                $time = '';
                $kilometers = '';

            } else {

                if(!$validatehariiniclockout){

                    $status = 'sudahclock_in';
                    $time = '';
                    $kilometers = '';

                } else {

                    $status = 'hariinibelum_clockout';
                    $time = $validatehariiniclockout->clockin_time;
                    $kilometers = $validatehariiniclockout->clockin_km;

                }
            }

        } else {

            $status = 'belumclock_out';
            $time = $validatekemarin->clockin_time;
            $kilometers = $validatekemarin->clockin_km;

        }

        $validate = array(    
            'status' => $status, 
            'time' => $time,
            'km' => $kilometers,
            'type_driver' => $users->driver_type
        );

        return response()->json($validate);
    }

    public function clockout(Request $request)
    {	
    	date_default_timezone_set('Asia/Jakarta');
    	$hari = date('Y-m-d');
    	$time = date("H:i:s");
        $kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));

        $validatekemarin = Clocks::where([
            ['user_id', '=', $request->user_id],
            ['clockout_time', '=', null],
            ['clockin_date', '!=', $hari],
        ])
        ->first();

        $validatesekarang = Clocks::where([
            ['user_id', '=', $request->user_id],
            ['clockin_date', '=', $hari],
            ['clockout_time', '=', null],
        ])
        ->first();

        if (!$validatekemarin){

            if ($validatesekarang->clockin_km > $request->km){

                $notif = '0';

                $datanotif = array(
                    'notif' => $notif, 
                    'clockout_id' => '-' 
                );

            } else {

                $clocks = Clocks::where(['id' => $validatesekarang->id])
                ->update(['clockout_date'=>$hari, 'clockout_time'=>$time, 'clockout_km'=>$request->km, 'clockout_status'=> 'NOT APPROVED']);

                $driving = Driving::where(['clock_id' => $validatesekarang->id])
                ->update(['km_akhir'=>$request->km]);

                $absensiout = Attendances::where(['date_in'=>$hari,'driver_id'=>$request->user_id])
                ->update(['date_out'=>$hari, 'time_out'=>$time]);

                $notif = '1';

                $kilo = $request->km - $validatesekarang->clockin_km;

                $units = Drivers::where('driver_id', $request->user_id)
                ->first();

                $getunitkm = Units::where('id',$units->unit_id)
                ->first();

                $tambahkilo = $getunitkm->mileage + $kilo;

                $unitkms = Units::where(['id'=>$units->unit_id])
                ->update(['mileage'=>$tambahkilo]);

                $jamkerja = JamKerja::first();

                $bataskerja = strtotime($hari.' '.$jamkerja->jam_keluar);
                $waktu = strtotime($hari.' '.$time);

                if ($bataskerja < $waktu){

                    $diff  = $waktu - $bataskerja;
                    $jam   = floor($diff / (60 * 60));
                    $menit = $diff - $jam * (60 * 60);
                    $minutes = floor( $menit / 60 );

                    $unitkm = new Lembur();
                    $unitkm->clock_id = $validatesekarang->id;
                    $unitkm->month = date('m');
                    $unitkm->year = date('Y');
                    $unitkm->time = $jam.':'.$minutes.':00';
                    $unitkm->save();

                }

                $datanotif = array(    
                    'notif' => $notif, 
                    'clockout_id' => $validatesekarang->id 
                );

            }


        } else {

            if ($validatekemarin->clockin_km > $request->km){

                $notif = '0';

                $datanotif = array(
                    'notif' => $notif, 
                    'clockout_id' => '-' 
                );

            } else {

                $clocks = Clocks::where(['id'=>$validatekemarin->id])
                ->update(['clockout_date'=>$hari, 'clockout_time'=>$time, 'clockout_km'=>$request->km, 'clockout_status'=> 'NOT APPROVED']);

                $driving = Driving::where(['clock_id' => $validatekemarin->id])
                ->update(['km_akhir'=>$request->km]);

                $absensiout = Attendances::where(['date_in'=>$validatekemarin->clockin_date,'driver_id'=>$request->user_id])
                ->update(['date_out'=>$hari, 'time_out'=>$time]);

                $notif = '1';

                $kilo = $request->km - $validatekemarin->clockin_km;

                $units = Drivers::where('driver_id', $request->user_id)
                ->first();

                $getunitkm = Units::where('id',$units->unit_id)
                ->first();

                $tambahkilo = $getunitkm->mileage + $kilo;

                $unitkms = Units::where(['id'=>$units->unit_id])
                ->update(['mileage'=>$tambahkilo]);

                $jamkerja = JamKerja::first();

                $bataskerja = strtotime($kemarin.' '.$jamkerja->jam_keluar);
                $waktu = strtotime($hari.' '.$time);

                if ($bataskerja < $waktu){

                    $diff  = $waktu - $bataskerja;
                    $jam   = floor($diff / (60 * 60));
                    $menit = $diff - $jam * (60 * 60);
                    $minutes = floor( $menit / 60 );

                    $unitkm = new Lembur();
                    $unitkm->clock_id = $validatekemarin->id;
                    $unitkm->month = date('m');
                    $unitkm->year = date('Y');
                    $unitkm->time = $jam.':'.$minutes.':00';
                    $unitkm->save();

                }

                $datanotif = array(    
                    'notif' => $notif, 
                    'clockout_id' => $validatekemarin->id 
                );

            }

            
        }

        return response()->json($datanotif);
    }

    public function clockinkoordinat(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $koordinat = new Koordinat();
        $koordinat->action_id = $request->clockin_id;
        $koordinat->type = $request->type;
        $koordinat->long = $request->long;
        $koordinat->lat = $request->lat;
        $koordinat->save();

        return response()->json($koordinat);

    }

    public function storepool(Request $request)
    {   
        date_default_timezone_set('Asia/Jakarta');
        $hari = date('Y-m-d');
        $time = date("H:i:s");
        

        $user = Auth::user();

        $clock = new Clocks();
        $clock->clockin_date = $hari;
        $clock->user_id = $user->id;
        $clock->clockin_time = $time;
        $clock->perdin = 'No';
        $clock->clockin_status = 'NOT APPROVED';
        $clock->save();

        $adaabsen = Attendances::where([
            ['driver_id', '=', $user->id],
            ['date_in', '=', $hari],
        ])
        ->first();

        if(!$adaabsen){

            $absensi = new Attendances();
            $absensi->driver_id = $user->id;
            $absensi->status_id = '1';
            $absensi->date_in = $hari;
            $absensi->time_in = $time;
            $absensi->save();

        } else {

            $absensiout = Attendances::where(['id'=>$adaabsen->id])
            ->update(['status_id'=>'1', 'date_in'=>$hari, 'time_in'=>$time]);

        }

        $ClockId = array(    
            'clockin_id' => $clock->id  
        );

        return response()->json($ClockId);
    }

    public function storeclockout(Request $request)
    {   
        date_default_timezone_set('Asia/Jakarta');
        $hari = date('Y-m-d');
        $time = date("H:i:s");
        $kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));

        $user = Auth::user();

        $clockterakhir = Clocks::where([
            ['user_id', '=', $user->id],
            ['clockout_time', '=', null],
        ])
        ->first();


        $driving = Driving::where("clock_id", $clockterakhir->id)
        ->orderBy("id", "desc")
        ->first();

        if(!$driving){

            $clocks = Clocks::where(['id'=>$clockterakhir->id])
            ->update(['clockout_date'=>$hari, 'clockout_time'=>$time, 'clockout_status'=> 'NOT APPROVED']);

            $absensiout = Attendances::where(['date_in'=>$clockterakhir->clockin_date,'driver_id'=>$user->id])
            ->update(['date_out'=>$hari, 'time_out'=>$time]);

            $drives = Drivers::where(['driver_id'=>$user->id])
            ->update(['unit_id'=>NULL]);

            $notif = '1';

            $jamkerja = JamKerja::first();

            $bataskerja = strtotime($clockterakhir->clockin_date.' '.$jamkerja->jam_keluar);
            $waktu = strtotime($hari.' '.$time);

            if ($bataskerja < $waktu){

                $diff  = $waktu - $bataskerja;
                $jam   = floor($diff / (60 * 60));
                $menit = $diff - $jam * (60 * 60);
                $minutes = floor( $menit / 60 );

                $unitkm = new Lembur();
                $unitkm->clock_id = $clockterakhir->id;
                $unitkm->month = date('m');
                $unitkm->year = date('Y');
                $unitkm->time = $jam.':'.$minutes.':00';
                $unitkm->save();

            }

        } else {

            if($driving->km_akhir != null){

                $clocks = Clocks::where(['id'=>$clockterakhir->id])
                ->update(['clockout_date'=>$hari, 'clockout_time'=>$time, 'clockout_status'=> 'NOT APPROVED']);

                $absensiout = Attendances::where(['date_in'=>$clockterakhir->clockin_date,'driver_id'=>$user->id])
                ->update(['date_out'=>$hari, 'time_out'=>$time]);

                $drives = Drivers::where(['driver_id'=>$user->id])
                ->update(['unit_id'=>NULL]);

                $notif = '1';

                $jamkerja = JamKerja::first();

                $bataskerja = strtotime($clockterakhir->clockin_date.' '.$jamkerja->jam_keluar);
                $waktu = strtotime($hari.' '.$time);

                if ($bataskerja < $waktu){

                    $diff  = $waktu - $bataskerja;
                    $jam   = floor($diff / (60 * 60));
                    $menit = $diff - $jam * (60 * 60);
                    $minutes = floor( $menit / 60 );

                    $unitkm = new Lembur();
                    $unitkm->clock_id = $clockterakhir->id;
                    $unitkm->month = date('m');
                    $unitkm->year = date('Y');
                    $unitkm->time = $jam.':'.$minutes.':00';
                    $unitkm->save();

                }

            } else {

                $notif = '0';

            }

        }

        $ClockId = array(    
            'clockout_id' => $clockterakhir->id,
            'notif' => $notif   
        );

        return response()->json($ClockId);
    }

    public function getunits(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        $user = Auth::user();

        $dataunit = Units::where('pemilik', '=', 'PAR')
        ->get();

        return Datatables::of($dataunit)->make(true);
    }

    public function clockoutsemua(Request $request){

        $date = date('Y-m-d');

        $clocks = Clocks::where([
            ['clockout_time', '=', null],
            ['clockin_date', '<', $date],
        ])
        ->get();

        foreach ($clocks as $clock) {

            $clocks = Clocks::where(['id'=>$clock->id])
            ->update(['clockout_date'=>$clock->clockin_date, 'clockout_time'=>'17:00:00','clockout_km'=> $clock->clockin_km, 'clockout_status'=> 'NOT APPROVED']);

            
        }

    }
}
