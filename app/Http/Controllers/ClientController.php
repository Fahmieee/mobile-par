<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Drivers;
use App\Units;
use App\Clocks;

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

    public function client_approve()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        return view('content.client_approve.index', compact('date'));

    }

    public function getdataapprove(Request $request)
    {
        $getdatas = Clocks::select("first_name","date","last_name","clocks.client_id")
        ->join("users", "clocks.user_id", "=", "users.id")
        ->where([
            ['client_id', '=', $request->user_id],
            ['status', '=', 'NOT APPROVED'],
        ])
        ->groupby('date','first_name','last_name', 'clocks.client_id')
        ->get();

        return response()->json($getdatas);

    }

    public function getdataapprovedetail(Request $request)
    {
        $thn = substr($request->date, 0,4);
        $bln = substr($request->date, 4,2);
        $tgl = substr($request->date, 6,2);

        $date = $thn.'-'.$bln.'-'.$tgl;

        $getclockin = Clocks::where([
            ['client_id', '=', $request->client_id],
            ['date', '=', $date],
            ['type', '=', 'clock_in']
        ])
        ->first();

        $getclockout = Clocks::where([
            ['client_id', '=', $request->client_id],
            ['date', '=', $date],
            ['type', '=', 'clock_out'],
        ])
        ->first();

        if (! $getclockout){
            $ids = '';
            $times = '';
            $stat = '';
        } else {
            $ids = $getclockout->id;
            $times = $getclockout->time;
            $stat = $getclockout->status;
        }

        $arrayNames = array(    
            'clockin_id' => $getclockin->id, 
            'clockout_id' => $ids,
            'clockin_time' => $getclockin->time,
            'clockout_time' => $times,
            'clockin_status' => $getclockin->status,
            'clockout_status' => $stat
        );

        return response()->json($arrayNames);

    }

    public function approve(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d g:i:s');

        $approved = Clocks::findOrFail($request->id);
        $approved->status = "APPROVED";
        $approved->approved_at = $date;
        $approved->time = $request->waktu;
        $approved->save();

        return response()->json($approved);
    }
}
