<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Drivers;
use App\Units;
use App\UnitKilometers;

class DriverController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');

    	return view('content.home.driver.index', compact('date'));

    }

    public function getdata(Request $request)
    {
        $getdrivers = Users::where('id', $request->user_id)
        ->first();

        $get = Drivers::where('driver_id', $request->user_id)
        ->first();

        $korlap = Drivers::where('korlap_id', $request->user_id)
        ->first();

        $getusers = Users::where('id', $get->user_id)
        ->first();

        $getunits = Units::where('id', $get->unit_id)
        ->first();

        $arrayNames = array(    
            'nama_user' => $getusers->first_name,
            'nama_driver' => $getdrivers->first_name, 
            'no_polisi' => $getunits->no_police, 
            'model' => $getunits->model, 
            'varian' => $getunits->varian, 
            'years' => $getunits->years,
            'stnk' => $getunits->stnk_due_date,
            'tahun' => $getunits->years 
        );

        return response()->json($arrayNames);
    }

    public function getunitkilometer(Request $request)
    {
        $getkm = UnitKilometers::leftJoin("drivers", "unit_kilometers.unit_id", "=", "drivers.unit_id")
        ->where([
                ['drivers.driver_id', '=', $request->user_id],
                ['km_akhir', '!=', null],
            ])
        ->get();

        return response()->json($getkm);
    }

}
