<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Drivers;
use App\Units;
use App\Pairing;
use App\Lembur;
use App\DocDriver;
use App\DocUnit;
use App\Trainings;
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

        $gettrainings = Trainings::all();

    	return view('content.home.driver.index', compact('date','getdrivers','getusers','getunits','getkorlaps','getsim','getmcu','getasuransi','getkeur','gettrainings'));

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


}
