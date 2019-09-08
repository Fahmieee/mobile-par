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

        $gettypes = NilaiTypeDriver::all();

    	return view('content.nilai_driver.index', compact('date','gettypes'));

    }


    public function getdetail(Request $request)
    {
        $getdetail = NilaiDetailDriver::select('nilaidetail_driver.id', 'nilaidetail_driver.name','nilaitype_driver.type')
        ->join("nilaitype_driver", "nilaidetail_driver.nilaitypedriver_id", "=", "nilaitype_driver.id")
        ->where("nilaitypedriver_id", $request->nilaitype_id)
        ->get();

        return response()->json($getdetail);
    }

    public function submit(Request $request) {

        date_default_timezone_set('Asia/Jakarta');

        $getuser = Drivers::where('user_id',$request->user_id)
        ->first();

        $drivers = $getuser->driver_id;

        $count = count($request->detail_id);

        for($i=0; $i < $count; $i++){

            $nilai = new NilaiDriver();
            $nilai->driver_id = $drivers;
            $nilai->nilaidetail_id = $request->detail_id[$i];
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

        $gettotal = NilaiDriver::select('nilai_driver.value as nilai_driver','nilaidetail_driver.value')
        ->join("nilaidetail_driver", "nilai_driver.nilaidetail_id", "=", "nilaidetail_driver.id")
        ->join("nilaitype_driver", "nilaidetail_driver.nilaitypedriver_id", "=", "nilaitype_driver.id")
        ->where([
            ['periode_id', '=', '1'],
            ['nilai_driver.driver_id', '=', $drivers]
        ])
        ->get();

        return response()->json($gettotal);
    }

    public function getsubmited(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $harini = date('Y-m-d');

        $getuser = Drivers::where('user_id',$request->user_id)
        ->first();
        $drivers = $getuser->driver_id;

        $gettypesx = NilaiTypeDriver::select('nilaitype_driver.id')
        ->join("nilaidetail_driver", "nilaitype_driver.id", "=", "nilaidetail_driver.nilaitypedriver_id")
        ->join("nilai_driver", "nilaidetail_driver.id", "=", "nilai_driver.nilaidetail_id")
        ->where([
            ['nilai_driver.driver_id', '=', $drivers],
            ['periode_id', '=', '1']
        ])
        ->groupby('nilaitype_driver.id')
        ->get();

        return response()->json($gettypesx);
    }

    public function getratingkategori(Request $request)
    {

        $getuser = Drivers::where('user_id',$request->user_id)
        ->first();
        $drivers = $getuser->driver_id;

        $getnilai = NilaiDriver::select('nilai_driver.value as nilai','nilaidetail_driver.value')
        ->join("nilaidetail_driver", "nilai_driver.nilaidetail_id", "=", "nilaidetail_driver.id")
        ->join("nilaitype_driver", "nilaidetail_driver.nilaitypedriver_id", "=", "nilaitype_driver.id")
        ->where([
            ['nilaitype_driver.id', '=', $request->id],
            ['periode_id', '=', '1'],
            ['nilai_driver.driver_id', '=', $drivers]
        ])
        ->get();

        return response()->json($getnilai);

    }

    public function getdriver(Request $request)
    {
        $getdrive = Drivers::where('user_id',$request->user_id)
        ->first();
        $drivers = $getdrive->driver_id;

        $getuser = Users::where('id',$drivers)
        ->first();

        $arrayNames = array(    
            'first' => $getuser->first_name, 
            'last' => $getuser->last_name,
            'photo' => $getuser->photo,
        );

        return response()->json($arrayNames);

    }
}
