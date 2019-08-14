<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Pretrip_Check;

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
}
