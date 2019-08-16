<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Drivers;
use App\Units;

class ClientController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');

    	return view('content.home.client.index', compact('date'));

    }

    public function getdata(Request $request)
    {
        $getusers = Users::where('id', $request->user_id)
        ->first();

        $get = Drivers::where('user_id', $request->user_id)
        ->first();

        $getdrivers = Users::where('id', $get->driver_id)
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
            'stnk' => $getunits->stnk_due_date  
        );

        return response()->json($arrayNames);
    }
}
