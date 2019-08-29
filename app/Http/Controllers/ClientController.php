<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Drivers;
use App\Pairing;
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

        $pairingin = Pairing::where([
            ['user_id', '=', $request->user_id],
            ['status', '=', 'NOT APPROVED'],
        ])
        ->first();

        if($get){

            $getdrivers = Users::where('id', $get->driver_id)
            ->first();

            $getunits = Units::where('id', $get->unit_id)
            ->first();

        }

        $arrayNames = array(    
            'nama_depan' => $getusers->first_name,
            'nama_belakang' => $getusers->last_name,
            'no_hp' => $getusers->phone,
            'driver_depan' => $get ? $getdrivers->first_name : '-',
            'driver_belakang' => $get ? $getdrivers->last_name : '-',
            'no_polisi' => $get ? $getunits->no_police : '-',
            'model' => $get ? $getunits->model : '-', 
            'varian' => $get ? $getunits->varian : '-',
            'years' => $get ? $getunits->years : '-',
            'stnk' => $get ? $getunits->stnk_due_date : '-',
            'pair' => $pairingin ? 'ada' : 'tidakada'   
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
        $date = date('Y-m-d H:i:s');

        $approved = Clocks::findOrFail($request->id);
        $approved->status = "APPROVED";
        $approved->approved_at = $date;
        $approved->actual = $request->waktu;
        $approved->save();

        return response()->json($approved);
    }

    public function listdriver(Request $request)
    {

        $getbranch = Users::select('branch_id')
        ->join("user_branches", "users.id", "=", "user_branches.user_id")
        ->where('users.id', $request->user_id)
        ->first();

        $branch = $getbranch->branch_id;

        $getdrivers = Users::select("users.id","users.first_name","users.last_name","units.no_police","units.model")
        ->join("users_roles", "users.id", "=", "users_roles.user_id")
        ->join("drivers", "users.id", "=", "drivers.driver_id")
        ->join("user_branches", "users.id", "=", "user_branches.user_id")
        ->join("units", "drivers.unit_id", "=", "units.id")
        ->leftjoin("pairing", "drivers.driver_id", "=", "pairing.driver_id")
        ->where([
            ['users_roles.role_id', '=', '2'],
            ['drivers.user_id', '=', null],
            ['user_branches.branch_id', '=', $branch]
        ])
        ->get();

        return response()->json($getdrivers);

    }

    public function pairing(Request $request)
    {

        $pairs = new Pairing();
        $pairs->user_id = $request->user_id;
        $pairs->driver_id = $request->driver_id;
        $pairs->status = 'NOT APPROVED';
        $pairs->save();

        return response()->json($pairs);
    }
}
