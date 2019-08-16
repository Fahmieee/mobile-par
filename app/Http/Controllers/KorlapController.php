<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Pretrip_Check;
use App\Drivers;

class KorlapController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');

    	return view('content.home.korlap.index', compact('date'));

    }

    public function getprofile(Request $request)
    {
    	$getprof = Users::select("first_name", "email", "phone")
    	->where("id", $request->user_id)
        ->first();

    	return response()->json($getprof);

    }

    public function lihatdriver()
    {
        
        return view('content.lihat_driver.index', compact('date'));

    }

    public function getnilaidriver(Request $request)
    {
        $getprof = Drivers::join("users", "drivers.driver_id", "=", "users.id")
        ->join("nilai_driver", "drivers.driver_id", "=", "nilai_driver.driver_id")
        ->where("drivers.korlap_id", $request->user_id)
        ->get();

        return response()->json($getprof);
    }
}
