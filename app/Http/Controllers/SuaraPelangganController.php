<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JenisSuara;
use App\Drivers;
use App\SuaraPelanggan;
use App\NilaiTypeDriver;
use App\NilaiTypeKendaraan;


class SuaraPelangganController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');

    	$suara = NilaiTypeDriver::all();

    	return view('content.suara.index',['suaras'=>$suara]);

    }

    public function submit(Request $request) {

    	$caridriver = Drivers::select("driver_id")
    	->where("user_id", $request->user_id)
        ->first();

        $drivers_id = $caridriver->driver_id;

    	$suarauser = new SuaraPelanggan();
        $suarauser->jenis_id= $request->jenis_id;
        $suarauser->user_id= $request->user_id;
        $suarauser->driver_id= $drivers_id;
        $suarauser->type= $request->type;
        $suarauser->ket= $request->suara;
        $suarauser->save();

        return response()->json($suarauser);

    }

    public function change(Request $request) {

        if ($request->type == 'Driver'){

            $suara = NilaiTypeDriver::all();

        } else if ($request->type == 'kendaraan'){

            $suara = NilaiTypeKendaraan::all();

        } else {

            $suara = '-';

        }

        return response()->json($suara);

    }
}
