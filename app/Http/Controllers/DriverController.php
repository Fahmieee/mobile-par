<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Drivers;
use App\Units;
use App\Pairing;
use App\UnitKilometers;
use App\Lembur;

class DriverController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');

    	return view('content.home.driver.index', compact('date'));

    }

    public function getdata(Request $request)
    {
        $getdrivers = Users::where('id', $request->user_id)
        ->first();

        $get = Drivers::where('driver_id', $request->user_id)
        ->first();

        $korlap = Drivers::where('korlap_id', $request->user_id)
        ->first();

        $pairingin = Pairing::select("first_name","last_name","pairing.id")
        ->join("users", "pairing.user_id", "=", "users.id")
        ->where([
            ['driver_id', '=', $request->user_id],
            ['status', '=', 'NOT APPROVED'],
        ])
        ->first();

        $getusers = Users::where('id', $get->user_id)
        ->first();

        $getunits = Units::where('id', $get->unit_id)
        ->first();

        $arrayNames = array(    
            'nama_depan' => $getusers ? $getusers->first_name : '-',
            'nama_belakang' => $getusers ? $getusers->last_name : '-',
            'driver_depan' => $getdrivers->first_name, 
            'driver_belakang' => $getdrivers->last_name, 
            'no_polisi' => $getunits->no_police, 
            'model' => $getunits->model, 
            'varian' => $getunits->varian, 
            'years' => $getunits->years,
            'stnk' => $getunits->stnk_due_date,
            'pair' => $pairingin ? 'ada' : 'tidakada',
            'pair_depan' => $pairingin ? $pairingin->first_name : 'tidakada',
            'pair_belakang' => $pairingin ? $pairingin->last_name : 'tidakada',
            'pair_id' => $pairingin ? $pairingin->id : 'tidakada'
        );

        return response()->json($arrayNames);
    }

    public function getunitkilometer(Request $request)
    {
        $getkm = UnitKilometers::leftJoin("drivers", "unit_kilometers.unit_id", "=", "drivers.unit_id")
        ->where([
                ['drivers.driver_id', '=', $request->user_id],
                ['km_akhir', '!=', null],
            ])
        ->get();

        return response()->json($getkm);
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
           
        $getlembur = Lembur::where([
                ['user_id', '=', $request->user_id],
                ['month', '=', date('m')],
                ['year', '=', date('Y')],
            ])
        ->get();

        return response()->json($getlembur);
    }


}
