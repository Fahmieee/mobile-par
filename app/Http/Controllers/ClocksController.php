<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clocks;
use App\Drivers;

class ClocksController extends Controller
{
    public function create(Request $request)
    {	
    	date_default_timezone_set('Asia/Jakarta');
    	$hari = date('Y-m-d');
    	$time = date("g:i:s");

        $client = Drivers::where('driver_id', $request->user_id)
        ->first();

        $clock = new Clocks();
        $clock->date = $hari;
        $clock->user_id = $request->user_id;
        $clock->client_id = $client->user_id;
        $clock->time = $time;
        $clock->kilometer = $request->km;
        $clock->unit_gs = $request->unitgs;
        $clock->type = 'clock_in';
        $clock->status = 'NOT APPROVED';
        $clock->save();


        return response()->json($clock);
    }

    public function validasi(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
    	$harini = date('Y-m-d');

    	$validate = Clocks::where([
            ['user_id', '=', $request->user_id],
            ['date', '=', $harini],
        ])
        ->get();

        return response()->json($validate);
    }

    public function clockout(Request $request)
    {	
    	date_default_timezone_set('Asia/Jakarta');
    	$hari = date('Y-m-d');
    	$time = date("g:i:s");

        $client = Drivers::where('driver_id', $request->user_id)
        ->first();

        $clock = new Clocks();
        $clock->date = $hari;
        $clock->user_id = $request->user_id;
        $clock->client_id = $client->user_id;
        $clock->time = $time;
        $clock->kilometer = $request->km;
        $clock->unit_gs = '0';
        $clock->type = 'clock_out';
        $clock->status = 'NOT APPROVED';
        $clock->save();


        return response()->json($clock);
    }
}
