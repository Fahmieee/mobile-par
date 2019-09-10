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
    	$date = date('Y-m-d');

    	return view('content.history.index', compact('date'));

    }

    public function GetData(Request $request)
    {
        $gethistory = Clocks::select("date","id")
        ->where([
            ['user_id', '=', $request->user_id],
            ['type', '=', 'clock_out'],
        ])
        ->limit(10)
        ->orderBy('id', 'desc')
        ->get();

        return response()->json($gethistory);
    }

    public function detail(Request $request)
    {
    	$getdate = Clocks::select("date")
    	->where([
            ['user_id', '=', $request->user_id],
            ['id', '=', $request->id],
        ])
        ->first();

    	$getclocksin = Clocks::select("time","kilometer")
    	->where([
            ['user_id', '=', $request->user_id],
            ['type', '=', 'clock_in'],
            ['date', '=', $getdate->date],
        ])
        ->first();

        $getclocksout = Clocks::select("time","kilometer")
    	->where([
            ['user_id', '=', $request->user_id],
            ['type', '=', 'clock_out'],
            ['date', '=', $getdate->date],
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

        $awal  = strtotime($getclocksin->time); //waktu awal
		$akhir = strtotime($getclocksout->time); //waktu akhir
		$diff  = $akhir - $awal;
		$jam   = floor($diff / (60 * 60));
		$menit = $diff - $jam * (60 * 60);

		$total_waktu = $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit';

        $totaljarak = $getclocksout->kilometer - $getclocksin->kilometer;

        $arrayNames = array(    
            'clockin_time' => $getclocksin->time, 
            'clockout_time' => $getclocksout->time,
            'clockin_jarak' => $getclocksin->kilometer,
            'clockout_jarak' => $getclocksout->kilometer,
            'pretripcheck' => $tripcheck ? $tripcheck->time : '-', 
            'total_jarak' => $totaljarak,
            'total_waktu' => $total_waktu,
            'dcu' => $getdcu ? $getdcu->time : '-',
        );

        return response()->json($arrayNames);

    }


}
