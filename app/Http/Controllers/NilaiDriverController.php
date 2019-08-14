<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NilaiTypeDriver;
use App\NilaiDetailDriver;
use App\NilaiDriver;
use App\Drivers;
use App\Users;
use DB;


class NilaiDriverController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');

    	return view('content.nilai_driver.index', compact('date'));

    }

    public function gettype()
    {
        $gettype = NilaiTypeDriver::all();

        return response()->json($gettype);
    }

    public function getdetail(Request $request)
    {
        $getdetail = NilaiDetailDriver::where("nilaitypedriver_id", $request->nilaitype_id)
        ->orderby("value", "desc")
        ->get();

        return response()->json($getdetail);
    }

    public function submit(Request $request) {

            $getuser = Drivers::where('user_id',$request->user_id)
            ->first();

            $drivers = $getuser->driver_id;

            $count = count($request->nilaidetail_id);

        for($i=0; $i < $count; $i++){

            $nilai = new NilaiDriver();
            $nilai->driver_id = $drivers;
            $nilai->nilaidetail_id = $request->nilaidetail_id[$i];
            $nilai->periode_id = '1';
            $nilai->value = $request->value[$i];
            $nilai->save();

        }

        return response()->json($drivers);
    }

    public function validasi(Request $request)
    {
        $getdrive = Drivers::where('user_id',$request->user_id)
        ->first();
        $drivers = $getdrive->driver_id;

        $getuser = Users::where('id',$drivers)
        ->first();

        $gettotal = NilaiDriver::select(DB::raw('SUM(value) AS total'))
        ->where([
            ['driver_id', '=', $drivers],
            ['periode_id', '=', 1],
        ])
        ->first();

        $getcount = NilaiDriver::where([
            ['driver_id', '=', $drivers],
            ['periode_id', '=', 1],
        ])
        ->get();

        $arrayNames = array(    
            'name' => $getuser->first_name, 
            'total' => $gettotal->total,
            'count' => count($getcount)
        );

        return response()->json($arrayNames);
    }
}
