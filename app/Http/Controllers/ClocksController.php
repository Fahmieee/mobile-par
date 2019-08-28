<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clocks;
use App\Drivers;
use App\Koordinat;
use App\UnitKilometers;

class ClocksController extends Controller
{
    public function create(Request $request)
    {	
    	date_default_timezone_set('Asia/Jakarta');
    	$hari = date('Y-m-d');
    	$time = date("H:i:s");

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

        $units = Drivers::where('driver_id', $request->user_id)
        ->first();

        $unitkm = new UnitKilometers();
        $unitkm->unit_id = $units->unit_id;
        $unitkm->date = $hari;
        $unitkm->km_awal = $request->km;
        $unitkm->save();


        $ClockId = array(    
            'clockin_id' => $clock->id  
        );


        return response()->json($ClockId);
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
    	$time = date("H:i:s");

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

        $units = Drivers::where('driver_id', $request->user_id)
        ->first();

        $unitkms = UnitKilometers::where(['date'=>$hari,'unit_id'=>$units->unit_id])
        ->update(['km_akhir'=>$request->km]);

        return response()->json($clock);
    }

    public function clockinkoordinat(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $koordinat = new Koordinat();
        $koordinat->action_id = $request->clockin_id;
        $koordinat->type = $request->type;
        $koordinat->long = $request->long;
        $koordinat->lat = $request->lat;
        $koordinat->save();

        return response()->json($koordinat);

    }

}
