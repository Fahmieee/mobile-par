<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Drivers;
use App\UnitDrivers;
use App\Units;
use App\Pairing;
use App\Lembur;
use App\DocDriver;
use App\DocUnit;
use App\Driving;
use App\Trainings;
use App\Clocks;
use App\Attendances;
use App\Pretrip_Check;
use Auth;

class DriverController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');

        $user = Auth::user();

        $getdrivers = Users::where('users.id', $user->id)
        ->first();

        $getsim = DocDriver::where([
                ['user_id', '=', $user->id],
                ['document_id', '=', '1'],
            ])
        ->first();

        $getmcu = DocDriver::where([
                ['user_id', '=', $user->id],
                ['document_id', '=', '2'],
            ])
        ->first();

        $get = Drivers::where('driver_id', $user->id)
        ->first();

        $getusers = Users::leftJoin("jabatan", "users.jabatan_id", "=", "jabatan.id")
        ->leftJoin("wilayah", "users.wilayah_id", "=", "wilayah.id")
        ->leftJoin("unit_kerja", "wilayah.unitkerja_id", "=", "unit_kerja.id")
        ->leftJoin("company", "users.company_id", "=", "company.id")
        ->where('users.id', $get->user_id)
        ->first();

        $getunits = Units::where('id', $get->unit_id)
        ->first();

        $getasuransi = DocUnit::where([
                ['unit_id', '=', $get->unit_id],
                ['document_id', '=', '3'],
            ])
        ->first();

        $getkeur= DocUnit::where([
                ['unit_id', '=', $get->unit_id],
                ['document_id', '=', '4'],
            ])
        ->first();

        $getkorlaps = Users::where('id', $get->korlap_id)
        ->first();

        $getperdin = Clocks::where([
                ['user_id', '=', $user->id],
                ['perdin', '=', 'yes'],
            ])
        ->get();

        $gettrainings = Trainings::all();

    	return view('content.home.driver.index', compact('date','getdrivers','getusers','getunits','getkorlaps','getsim','getmcu','getasuransi','getkeur','gettrainings','getperdin'));

    }


    public function tolakpair(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');

        $rejected = Pairing::findOrFail($request->pair_id);
        $rejected->status = "REJECTED";
        $rejected->approved_at = $date;
        $rejected->save();

        return response()->json($rejected);
    }

    public function terimapair(Request $request)
    {

        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');

        $approved = Pairing::findOrFail($request->pair_id);
        $approved->status = "APPROVED";
        $approved->approved_at = $date;
        $approved->save();

        $getpair = Pairing::where('id',$request->pair_id)
        ->first();

        $approveds = Drivers::where(['driver_id'=>$request->user_id])->update(['user_id'=>$getpair->user_id]);

        return response()->json($approved);

    }

    public function getlembur(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
           
        $getlembur = Lembur::leftJoin("clocks", "lembur.clock_id", "=", "clocks.id")
        ->where([
                ['clocks.user_id', '=', $request->user_id],
                ['month', '=', date('m')],
                ['year', '=', date('Y')],
            ])
        ->get();

        return response()->json($getlembur);
    }

    public function tambahmobil(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $user = Auth::user();

        $adaunit = Units::where('no_police',$request->nopol)
        ->first();

        if(!$adaunit){

            $savecar = new Units();
            $savecar->pemilik = 'user';
            $savecar->wilayah_id = $user->wilayah_id;
            $savecar->merk = $request->merk;
            $savecar->model = $request->model;
            $savecar->years = $request->tahun;
            $savecar->transmition = $request->transmisi;
            $savecar->no_police = $request->nopol;
            $savecar->mileage = '0';
            $savecar->save();

            $saveunitcar = new UnitDrivers();
            $saveunitcar->unit_id = $savecar->id;
            $saveunitcar->user_id = $user->id;
            $saveunitcar->save();

            $data = '1';

        } else {

            $data = '2';

        }

        return response()->json($data);
    }

    public function updatemobil(Request $request)
    {

        date_default_timezone_set('Asia/Jakarta');
        $hariini = date('Y-m-d');

        $user = Auth::user();

        $sudahptc = Pretrip_Check::where([
            ['user_id', '=', $user->id],
            ['date', '=', $hariini],
        ])
        ->first();

        $sudahclocks = Clocks::where([
            ['user_id', '=', $user->id],
            ['clockin_date', '=', $hariini],
        ])
        ->first();

        if(!$sudahptc){

            if(!$sudahclocks){

                $updatess = Drivers::where(['driver_id'=>$user->id])
                ->update(['unit_id'=>$request->unit_id]);

                $data = 'yes';

            } else {

                $data = 'no';

            }

        } else {

            $data = 'no';

        }

        return response()->json($data);

    }

    public function unitdrivers(Request $request)
    {
        $units = Units::all();

        foreach ($units as $unit ) {

            if($unit->pemilik != 'user'){

                $drivers = Drivers::select("users.wilayah_id")
                ->leftJoin("users", "drivers.driver_id", "=", "users.id")
                ->where("drivers.unit_id", $unit->id)
                ->first();

                $updatess = Units::where(['id'=>$unit->id])
                ->update(['wilayah_id'=>$drivers->wilayah_id]);

            } else {

                $updatess = Units::where(['id'=>$unit->id])
                ->update(['wilayah_id'=>'0']);

            }
            
        }

    }

    public function pilihmobil(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $user = Auth::user();

        $updatess = Drivers::where(['driver_id'=>$user->id])
        ->update(['unit_id'=>$request->unit_id]);

        return response()->json($updatess);


    }

    public function validasidrivein(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $hariini = date('Y-m-d');

        $user = Auth::user();

        $driivers = Drivers::select("drivers.unit_id","units.no_police")
        ->leftJoin("units", "drivers.unit_id", "=", "units.id")
        ->where("driver_id", $user->id)
        ->first();

        $ptcada = Pretrip_Check::where([
            ['user_id', '=', $user->id],
            ['unit_id', '=', $driivers->unit_id],
            ['date', '=', $hariini],
        ])
        ->count();

        if($ptcada == '0'){
            $data = '0';
        } else {
            $data = '1';
        }

        $arraydata = array(    
            'unit' => $driivers->no_police,
            'notif' => $data   
        );

        return response()->json($arraydata);

    }

    public function submitdrivein(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $hariini = date('Y-m-d');

        $user = Auth::user();

        $clocks = Clocks::where([
            ['user_id', '=', $user->id],
            ['clockin_date', '=', $hariini]
        ])
        ->first();

        $driivers = Drivers::where("driver_id", $user->id)
        ->first();

        $savecar = new Driving();
        $savecar->clock_id = $clocks->id;
        $savecar->unit_id = $driivers->unit_id;
        $savecar->km_awal = $request->km_awal;
        $savecar->save();

        return response()->json($savecar);

    }

    public function submitdriveout(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $hariini = date('Y-m-d');

        $user = Auth::user();

        $clocks = Clocks::where([
            ['user_id', '=', $user->id]
        ])
        ->orderBy('id', 'desc')
        ->first();

        $driivers = Drivers::where("driver_id", $user->id)
        ->first();

        $getdriving = Driving::select("driving.id")
        ->leftJoin("clocks", "driving.clock_id", "=", "clocks.id")
        ->where([
            ['clock_id', '=', $clocks->id],
            ['km_akhir', '=', null]
        ])
        ->first();

        $units = Units::where("id",$driivers->unit_id)
        ->first();

        $approveds2 = Driving::where(['id'=>$getdriving->id])->update(['km_akhir'=>$request->km_akhir]);

        $km = $request->km_akhir - $getdriving->km_awal;


        $totalkm = $units->mileage + $km;

        $approveds3 = Units::where(['id'=>$driivers->unit_id])->update(['mileage'=>$totalkm]);

        $approveds = Drivers::where(['driver_id'=>$user->id])->update(['unit_id'=>'0']);


        return response()->json($approveds2);
    }

    public function storeabsen(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $hariini = date('Y-m-d');
        $waktu = date('H:i:s');

        $user = Auth::user();

        $absensi = new Attendances();
        $absensi->driver_id = $user->id;
        $absensi->status_id = $request->status_id;
        $absensi->date_in = $request->tanggal;
        $absensi->time_in = $waktu;
        $absensi->ket = $request->ket;
        $absensi->save();

        return response()->json($absensi);

    }

    public function rekap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        $bulans = date('m');
        $tahun = date('Y');

        $awal = date('Y-m-01', strtotime($date));
        $akhir = date('Y-m-t', strtotime($date));

        $user = Auth::user();

        $userid = $user->id;

        $getabsensis = Attendances::where('driver_id', $user->id)
        ->get();

        $gettrainings = Trainings::all();

        return view('content.rekap.index', compact('date','getabsensis','bulans','tahun','awal','akhir','userid'));

    }

    public function rekapdetail(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        $bulans = $request->bulan;
        $tahun = $request->tahun;

        $awal = $request->tahun.'-'.$request->bulan.'-01';
        $akhir = $request->tahun.'-'.$request->bulan.'-'.date('t', strtotime($awal));

        $user = Auth::user();

        $userid = $user->id;

        $getabsensis = Attendances::where('driver_id', $user->id)
        ->get();

        $gettrainings = Trainings::all();

        return view('content.rekap.detail', compact('date','getabsensis','bulans','tahun','awal','akhir','userid'));

    }

    public function ambilabsen(Request $request)
    {
        $absensis = Clocks::all();

        foreach($absensis as $absensi){

            $adaabsen = Attendances::where([
                ['driver_id', '=', $absensi->user_id],
                ['date_in', '=', $absensi->clockin_date],
            ])
            ->first();

            if(!$adaabsen){

                $masuk = new Attendances();
                $masuk->driver_id = $absensi->user_id;
                $masuk->status_id = '1';
                $masuk->date_in = $absensi->clockin_date;
                $masuk->time_in = $absensi->clockin_time;
                $masuk->date_out = $absensi->clockout_date;
                $masuk->time_out = $absensi->clockout_time;
                $masuk->save();

            } else {

                $absens = Attendances::where(['id'=>$adaabsen->id])
                ->update(
                    ['driver_id'=>$absensi->user_id, 
                    'status_id'=>'1',
                    'date_in'=> $absensi->clockin_date, 
                    'time_in'=> $absensi->clockin_time,
                    'date_out'=> $absensi->clockout_date,
                    'time_out'=> $absensi->clockout_time]
                );

            }

            

        }



    }
}
