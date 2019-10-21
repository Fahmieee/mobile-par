<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clocks;
use App\Drivers;
use App\Koordinat;
use App\Units;
use App\JamKerja;
use App\Lembur;

class ClocksController extends Controller
{
    public function create(Request $request)
    {	
    	date_default_timezone_set('Asia/Jakarta');
    	$hari = date('Y-m-d');
    	$time = date("H:i:s");

        $client = Drivers::where('driver_id', $request->user_id)
        ->first();

        $clock = new Clocks();
        $clock->clockin_date = $hari;
        $clock->user_id = $request->user_id;
        $clock->client_id = $client->user_id;
        $clock->clockin_time = $time;
        $clock->clockin_km = $request->km;
        $clock->perdin = $request->status;
        $clock->clockin_status = 'NOT APPROVED';
        $clock->save();

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

        $validatekemarin = Clocks::where([
            ['user_id', '=', $request->user_id],
            ['clockin_date', '=', $kemarin],
            ['clockout_time', '=', null],
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
            'km' => $kilometers
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
            ['clockin_date', '=', $kemarin],
            ['clockout_time', '=', null],
        ])
        ->first();

        $validatesekarang = Clocks::where([
            ['user_id', '=', $request->user_id],
            ['clockin_date', '=', $hari],
            ['clockout_time', '=', null],
        ])
        ->first();

        if (!$validatekemarin){

            if ($validatesekarang->clockin_km >= $request->km){

                $notif = '0';

                $datanotif = array(
                    'notif' => $notif, 
                    'clockout_id' => '-' 
                );

            } else {

                $clocks = Clocks::where(['clockin_date'=>$hari,'user_id'=>$request->user_id])
                ->update(['clockout_date'=>$hari, 'clockout_time'=>$time, 'clockout_km'=>$request->km, 'clockout_status'=> 'NOT APPROVED']);

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

            if ($validatekemarin->clockin_km >= $request->km){

                $notif = '0';

                $datanotif = array(
                    'notif' => $notif, 
                    'clockout_id' => '-' 
                );

            } else {

                $clocks = Clocks::where(['clockin_date'=>$kemarin,'user_id'=>$request->user_id])
                ->update(['clockout_date'=>$hari, 'clockout_time'=>$time, 'clockout_km'=>$request->km, 'clockout_status'=> 'NOT APPROVED']);

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


}
