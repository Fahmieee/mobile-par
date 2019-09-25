<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Drivers;
use App\Pairing;
use App\Units;
use App\Clocks;
use App\JamKerja;
use App\Lembur;
use App\Trainings;
use App\DocDriver;
use App\DocUnit;
use Auth;

class ClientController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');

        $user = Auth::user();

        $getusers = Users::leftJoin("jabatan", "users.jabatan_id", "=", "jabatan.id")
        ->leftJoin("wilayah", "users.wilayah_id", "=", "wilayah.id")
        ->leftJoin("unit_kerja", "users.wilayah_id", "=", "wilayah.id")
        ->leftJoin("company", "users.company_id", "=", "company.id")
        ->where('users.id', $user->id)
        ->first();

        $gettrainings = Trainings::all();

        $get = Drivers::where('user_id', $user->id)
        ->first();

        $getdrivers = Users::where('users.id', $get->driver_id)
        ->first();

        $getsim = DocDriver::where([
                ['user_id', '=', $get->driver_id],
                ['document_id', '=', '1'],
            ])
        ->first();

        $getmcu = DocDriver::where([
                ['user_id', '=', $get->driver_id],
                ['document_id', '=', '2'],
            ])
        ->first();

        $getunits = Units::where('id', $get->unit_id)
        ->first();

        $getstnk = DocUnit::where([
                ['unit_id', '=', $get->unit_id],
                ['document_id', '=', '5'],
            ])
        ->first();

    	return view('content.home.client.index', compact('date','getusers','gettrainings','getdrivers','getsim','getmcu','getunits','getstnk'));
    }

    public function getdata(Request $request)
    {
        $getusers = Users::where('id', $request->user_id)
        ->first();

        $get = Drivers::where('user_id', $request->user_id)
        ->first();

        $pairingin = Pairing::where([
            ['user_id', '=', $request->user_id],
            ['status', '=', 'NOT APPROVED'],
        ])
        ->first();

        if($get){

            $getdrivers = Users::where('id', $get->driver_id)
            ->first();

            $getunits = Units::where('id', $get->unit_id)
            ->first();

        }

        $arrayNames = array(    
            'driver_depan' => $get ? $getdrivers->first_name : '-',           
            'pair' => $pairingin ? 'ada' : 'tidakada'   
        );

        return response()->json($arrayNames);
    }

    public function client_approve()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        return view('content.client_approve.index', compact('date'));

    }

    public function getdataapprove(Request $request)
    {
        $getdatas = Clocks::select("clocks.id","first_name","clockin_date","last_name","clocks.client_id")
        ->join("users", "clocks.user_id", "=", "users.id")
        ->where([
            ['client_id', '=', $request->user_id],
            ['clockin_status', '=', 'NOT APPROVED'],
        ])
        ->orwhere('clockout_status', '=', 'NOT APPROVED')
        ->groupby('clockin_date','first_name','last_name', 'clocks.client_id','clocks.id')
        ->get();

        return response()->json($getdatas);

    }

    public function getdataapprovedetail(Request $request)
    {

        $getclockin = Clocks::where("id", $request->clocks_id)
        ->first();

        return response()->json($getclockin);

    }


    public function approve(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');

        if ($request->type == '0'){

            $approved = Clocks::findOrFail($request->id);
            $approved->clockin_status = "APPROVED";
            $approved->clockin_approved_at = $date;
            $approved->clockin_actual = $request->waktu;
            $approved->save();

        } else {

            $clocks = Clocks::where('id', $request->id)
            ->first();

            $depan = substr($clocks->clockout_time,0,1);
            $actual = substr($request->waktu,0,1);

            $selanjutnya = date('Y-m-d', strtotime('+1 day', strtotime($clocks->clockin_date)));

            if ($depan == '0'){

                if ($actual != '0'){

                    $approved = Clocks::findOrFail($request->id);
                    $approved->clockout_status = "APPROVED";
                    $approved->clockout_approved_at = $date;
                    $approved->clockoutdate_actual = $clocks->clockin_date;
                    $approved->clockout_actual = $request->waktu;
                    $approved->save();

                } else {

                    $approved = Clocks::findOrFail($request->id);
                    $approved->clockout_status = "APPROVED";
                    $approved->clockout_approved_at = $date;
                    $approved->clockoutdate_actual = $clocks->clockout_date;
                    $approved->clockout_actual = $request->waktu;
                    $approved->save();

                }

            } else {

                if ($actual == '0'){

                    $approved = Clocks::findOrFail($request->id);
                    $approved->clockout_status = "APPROVED";
                    $approved->clockout_approved_at = $date;
                    $approved->clockoutdate_actual = $selanjutnya;
                    $approved->clockout_actual = $request->waktu;
                    $approved->save();

                } else {

                    $approved = Clocks::findOrFail($request->id);
                    $approved->clockout_status = "APPROVED";
                    $approved->clockout_approved_at = $date;
                    $approved->clockoutdate_actual = $clocks->clockout_date;
                    $approved->clockout_actual = $request->waktu;
                    $approved->save();

                }

            }

            $clocks_now = Clocks::where('id', $request->id)
            ->first();

            $jamkerja = JamKerja::first();

            $bataskerja = strtotime($clocks_now->clockin_date.' '.$jamkerja->jam_keluar);
            $bataskerja1 = $clocks_now->clockin_date.' '.$jamkerja->jam_keluar;

            if ($clocks_now->clockoutdate_actual == null){
                $waktu = strtotime($clocks_now->clockout_date.' '.$request->waktu);
                $waktu1 = $clocks_now->clockout_date.' '.$request->waktu;
            } else {
                $waktu = strtotime($clocks_now->clockoutdate_actual.' '.$request->waktu);
                $waktu1 = $clocks_now->clockoutdate_actual.' '.$request->waktu;
            }
            
            $adalembur = Lembur::where('clock_id', $request->id)
            ->first();

            if (!$adalembur){

                if ($bataskerja < $waktu){

                    $diff  = $waktu - $bataskerja;
                    $jam   = floor($diff / (60 * 60));
                    $menit = $diff - $jam * (60 * 60);
                    $minutes = floor( $menit / 60 );

                    $unitkm = new Lembur();
                    $unitkm->clock_id = $request->id;
                    $unitkm->month = date('m');
                    $unitkm->year = date('Y');
                    $unitkm->time = $jam.':'.$minutes.':00';
                    $unitkm->save(); 

                } 

            } else {

                if ($bataskerja < $waktu){

                    $diff  = $waktu - $bataskerja;
                    $jam   = floor($diff / (60 * 60));
                    $menit = $diff - $jam * (60 * 60);
                    $minutes = floor( $menit / 60 );

                    $lemburs = Lembur::where(['clock_id'=>$request->id])
                    ->update(['time'=>$jam.':'.$minutes.':00']); 

                } else {

                    $lemburs = Lembur::where(['clock_id'=>$request->id])
                    ->delete();
                }

            }

        }

        $datanotif = array(
            'batas' => $bataskerja1, 
            'waktu' => $waktu1 
        );

        return response()->json($datanotif);
    }

    public function listdriver(Request $request)
    {

        $getbranch = Users::select('branch_id')
        ->join("user_branches", "users.id", "=", "user_branches.user_id")
        ->where('users.id', $request->user_id)
        ->first();

        $branch = $getbranch->branch_id;

        $getdrivers = Users::select("users.id","users.first_name","users.last_name","units.no_police","units.model")
        ->join("users_roles", "users.id", "=", "users_roles.user_id")
        ->join("drivers", "users.id", "=", "drivers.driver_id")
        ->join("user_branches", "users.id", "=", "user_branches.user_id")
        ->join("units", "drivers.unit_id", "=", "units.id")
        ->leftjoin("pairing", "drivers.driver_id", "=", "pairing.driver_id")
        ->where([
            ['users_roles.role_id', '=', '2'],
            ['drivers.user_id', '=', null],
            ['user_branches.branch_id', '=', $branch]
        ])
        ->get();

        return response()->json($getdrivers);

    }

    public function pairing(Request $request)
    {

        $pairs = new Pairing();
        $pairs->user_id = $request->user_id;
        $pairs->driver_id = $request->driver_id;
        $pairs->status = 'NOT APPROVED';
        $pairs->save();

        return response()->json($pairs);
    }
}
