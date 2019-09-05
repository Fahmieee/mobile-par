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

        $gettypes = NilaiTypeKendaraan::all();

    	return view('content.nilai_kendaraan.index', compact('date','gettypes'));

    }

    public function getdetail(Request $request)
    {
        $getdetail = NilaiDetailKendaraan::select('nilaidetail_kendaraan.id', 'nilaidetail_kendaraan.name','nilaitype_kendaraan.type')
        ->join("nilaitype_kendaraan", "nilaidetail_kendaraan.nilaitypekendaraan_id", "=", "nilaitype_kendaraan.id")
        ->where("nilaitypekendaraan_id", $request->nilaitype_id)
        ->get();

        return response()->json($getdetail);
    }

    public function submit(Request $request) {

        date_default_timezone_set('Asia/Jakarta');

        $getuser = Drivers::where('user_id',$request->user_id)
        ->first();

        $count = count($request->detail_id);

        for($i=0; $i < $count; $i++){

            $nilai = new NilaiKendaraan();
            $nilai->unit_id = $getuser->unit_id;
            $nilai->nilaidetailkendaraan_id = $request->detail_id[$i];
            $nilai->periode_id = '1';
            $nilai->value = $request->value[$i];
            $nilai->save();

        }

        return response()->json($getuser);
    }

    public function validasi(Request $request)
    {
        $getdrive = Drivers::where('user_id',$request->user_id)
        ->first();
        $units = $getdrive->unit_id;

        $getunit = Units::where('id',$units)
        ->first();

        $gettotal = NilaiKendaraan::select('nilai_kendaraan.value as nilai_kendaraan','nilaidetail_kendaraan.value')
        ->join("nilaidetail_kendaraan", "nilai_kendaraan.nilaidetailkendaraan_id", "=", "nilaidetail_kendaraan.id")
        ->join("nilaitype_kendaraan", "nilaidetail_kendaraan.nilaitypekendaraan_id", "=", "nilaitype_kendaraan.id")
        ->where([
            ['periode_id', '=', '1'],
            ['nilai_kendaraan.unit_id', '=', $units]
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
        $units = $getuser->unit_id;

        $gettypesx = NilaiTypeKendaraan::select('nilaitype_kendaraan.id')
        ->join("nilaidetail_kendaraan", "nilaitype_kendaraan.id", "=", "nilaidetail_kendaraan.nilaitypekendaraan_id")
        ->join("nilai_kendaraan", "nilaidetail_kendaraan.id", "=", "nilai_kendaraan.nilaidetailkendaraan_id")
        ->where([
            ['nilai_kendaraan.unit_id', '=', $units],
            ['periode_id', '=', '1']
        ])
        ->groupby('nilaitype_kendaraan.id')
        ->get();

        return response()->json($gettypesx);
    }

    public function getratingkategori(Request $request)
    {

        $getuser = Drivers::where('user_id',$request->user_id)
        ->first();
        $units = $getuser->unit_id;

        $getnilai = NilaiKendaraan::select('nilai_kendaraan.value as nilai','nilaidetail_kendaraan.value')
        ->join("nilaidetail_kendaraan", "nilai_kendaraan.nilaidetailkendaraan_id", "=", "nilaidetail_kendaraan.id")
        ->join("nilaitype_kendaraan", "nilaidetail_kendaraan.nilaitypekendaraan_id", "=", "nilaitype_kendaraan.id")
        ->where([
            ['nilaitype_kendaraan.id', '=', $request->id],
            ['periode_id', '=', '1'],
            ['nilai_kendaraan.unit_id', '=', $units]
        ])
        ->get();

        return response()->json($getnilai);

    }

    public function getkendaraan(Request $request)
    {
        $getdrive = Drivers::where('user_id',$request->user_id)
        ->first();
        $units = $getdrive->unit_id;

        $getunit = Units::where('id',$units)
        ->first();

        $arrayNames = array(    
            'first' => $getunit->model, 
            'last' => $getunit->varian,
            'nopol' => $getunit->no_police
        );

        return response()->json($arrayNames);

    }
}
