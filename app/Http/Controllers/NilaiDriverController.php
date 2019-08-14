<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NilaiTypeDriver;
use App\NilaiDetailDriver;


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
}
