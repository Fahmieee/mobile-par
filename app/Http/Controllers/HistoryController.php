<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clocks;
use App\Pretrip_Check;
use App\MedicalCheckup;

class HistoryController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('d M Y');

    	return view('content.history.index', compact('date'));

    }

    public function GetData(Request $request)
    {
        $gethistory = Clocks::select("clockin_date","id")
        ->where([
            ['user_id', '=', $request->user_id],
            ['clockout_time', '!=', null],
        ])
        ->orderBy('id', 'desc')
        ->get();

        return response()->json($gethistory);
    }

    public function detail(Request $request)
    {
    	$getdate = Clocks::select("clockin_date")
    	->where([
            ['user_id', '=', $request->user_id],
            ['id', '=', $request->id],
        ])
        ->first();

    	$getclocks = Clocks::where([
            ['user_id', '=', $request->user_id],
            ['clockin_date', '=', $getdate->clockin_date],
        ])
        ->first();

        $tripcheck = Pretrip_Check::select("time")
        ->where([
            ['user_id', '=', $request->user_id],
            ['date', '=', $getdate->date],
        ])
        ->first();

        $getdcu = MedicalCheckup::select("time")
        ->where([
            ['user_id', '=', $request->user_id],
            ['date', '=', $getdate->date],
        ])
        ->first();

        if ($getclocks->clockin_actual == null){

            $awal  = strtotime($getclocks->clockin_date.' '.$getclocks->clockin_time);

        } else {

            $awal  = strtotime($getclocks->clockin_date.' '.$getclocks->clockin_actual);

        }

        if ($getclocks->clockout_actual == null){

            $akhir = strtotime($getclocks->clockout_date.' '.$getclocks->clockout_time);

        } else {

            $akhir = strtotime($getclocks->clockoutdate_actual.' '.$getclocks->clockout_actual);

        }
        
		 //waktu akhir
		$diff  = $akhir - $awal;
		$jam   = floor($diff / (60 * 60));
		$menit = $diff - $jam * (60 * 60);

		$total_waktu = $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit';

        $totaljarak = $getclocks->clockout_km - $getclocks->clockin_km;

        $arrayNames = array(    
            'clockin_time' => $getclocks->clockin_time, 
            'clockout_time' => $getclocks->clockout_time,
            'clockin_date' => $getclocks->clockin_date, 
            'clockout_date' => $getclocks->clockout_date,
            'clockin_jarak' => $getclocks->clockin_km,
            'clockout_jarak' => $getclocks->clockout_km,
            'clockin_actual' => $getclocks->clockin_actual,
            'clockout_actual' => $getclocks->clockout_actual,
            'pretripcheck' => $tripcheck ? $tripcheck->time : '-', 
            'total_jarak' => $totaljarak,
            'total_waktu' => $total_waktu,
            'dcu' => $getdcu ? $getdcu->time : '-',
        );

        return response()->json($arrayNames);

    }


}
