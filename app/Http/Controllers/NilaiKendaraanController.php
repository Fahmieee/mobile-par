<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NilaiTypeKendaraan;
use App\NilaiDetailKendaraan;
use App\NilaiKendaraan;
use App\Drivers;
use App\Users;
use App\Units;
use DB;

class NilaiKendaraanController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');

    	return view('content.nilai_kendaraan.index', compact('date'));

    }

    public function gettype()
    {
        $gettype = NilaiTypeKendaraan::all();

        return response()->json($gettype);
    }

    public function getdetail(Request $request)
    {
        $getdetail = NilaiDetailKendaraan::where("nilaitypekendaraan_id", $request->nilaitype_id)
        ->orderby("value", "desc")
        ->get();

        return response()->json($getdetail);
    }

    public function submit(Request $request) {

            $getuser = Drivers::where('user_id',$request->user_id)
            ->first();

            $units = $getuser->unit_id;

            $count = count($request->nilaidetail_id);

        for($i=0; $i < $count; $i++){

            $nilai = new NilaiKendaraan();
            $nilai->unit_id = $units;
            $nilai->nilaidetailkendaraan_id = $request->nilaidetail_id[$i];
            $nilai->periode_id = '1';
            $nilai->value = $request->value[$i];
            $nilai->save();

        }

        return response()->json($units);
    }

    public function validasi(Request $request)
    {
        $getdrive = Drivers::where('user_id',$request->user_id)
        ->first();
        $units = $getdrive->unit_id;

        $getunit = Units::where('id',$units)
        ->first();

        $gettotal = NilaiKendaraan::select(DB::raw('SUM(value) AS total'))
        ->where([
            ['unit_id', '=', $units],
            ['periode_id', '=', 1],
        ])
        ->first();

        $getcount = NilaiKendaraan::where([
            ['unit_id', '=', $units],
            ['periode_id', '=', 1],
        ])
        ->get();

        $arrayNames = array(    
            'model' => $getunit->model, 
            'varian' => $getunit->varian,
            'years' => $getunit->years,  
            'total' => $gettotal->total,
            'count' => count($getcount)
        );

        return response()->json($arrayNames);
    }
}
