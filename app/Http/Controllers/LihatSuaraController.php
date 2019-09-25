<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SuaraPelanggan;

class LihatSuaraController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');

    	return view('content.lihat_suara.index', compact('date'));

    }

    public function getsuara(Request $request)
    {
        $getsuara = SuaraPelanggan::select("suara_user.id","users.first_name","users.last_name","suara_user.created_at","suara_user.type")
        ->join("drivers", "suara_user.driver_id", "=", "drivers.driver_id")
        ->join("users", "suara_user.driver_id", "=", "users.id")
        ->where('drivers.korlap_id', $request->user_id)
        ->limit(15)
        ->orderBy('suara_user.id', 'desc')
        ->get();

        return response()->json($getsuara);
    }

    public function getsuaradetail(Request $request)
    {
        $getdetail = SuaraPelanggan::select("ket","jenis")
        ->where('suara_user.id', $request->suara_id)
        ->first();

        return response()->json($getdetail);
    }
}
