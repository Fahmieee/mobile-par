<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MedicalCheckup;

class MedicalCheckupController extends Controller
{
    public function create(Request $request)
    {	
    	date_default_timezone_set('Asia/Jakarta');
    	$hari = date('Y-m-d');
    	$time = date("H:i:s");

    	$darah = $request->darah1.'/'.$request->darah2;

        $checkup = new MedicalCheckup();
        $checkup->date = $hari;
        $checkup->user_id = $request->user_id;
        $checkup->time = $time;
        $checkup->suhu = $request->suhu;
        $checkup->darah = $darah;
        $checkup->save();


        return response()->json($checkup);
    }

    public function validasi(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
    	$harini = date('Y-m-d');

    	$validate = MedicalCheckup::where([
            ['user_id', '=', $request->user_id],
            ['date', '=', $harini],
        ])
        ->get();

        return response()->json($validate);
    }
}
