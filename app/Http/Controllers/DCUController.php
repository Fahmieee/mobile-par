<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Drivers;
use App\Units;
use App\Pairing;
use App\Lembur;
use App\DocDriver;
use App\DocUnit;
use App\Trainings;
use Auth;

class DCUController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');

        $user = Auth::user();

        $get = Drivers::where('driver_id', $user->id)
        ->first();

        $getunits = Units::where('id', $get->unit_id)
        ->first();

    	return view('content.dcu.index', compact('date','getdrivers','getusers','getunits','getkorlaps','getsim','getmcu','getasuransi','getkeur','gettrainings'));

    }
}
