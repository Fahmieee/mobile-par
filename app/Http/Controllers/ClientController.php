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
        $getdatas = Clocks::select("clocks.id","first_name","clockin_date","last_name","clocks.client_id")
        ->join("users", "clocks.user_id", "=", "users.id")
        ->where([
            ['client_id', '=', $request->user_id],
            ['clockin_status', '=', 'NOT APPROVED'],
        ])
        ->orwhere('clockout_status', '=', 'NOT APPROVED')
        ->groupby('clockin_date','first_name','last_name', 'clocks.client_id','clocks.id')
        ->get();

        return response()->json($getdatas);

    }

    public function getdataapprovedetail(Request $request)
    {

        $getclockin = Clocks::where("id", $request->clocks_id)
        ->first();

        return response()->json($getclockin);

    }


    public function approve(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');

        if ($request->type == '0'){

            $approved = Clocks::findOrFail($request->id);
            $approved->clockin_status = "APPROVED";
            $approved->clockin_approved_at = $date;
            $approved->clockin_actual = $request->waktu;
            $approved->save();

        } else {

            $approved = Clocks::findOrFail($request->id);
            $approved->clockout_status = "APPROVED";
            $approved->clockout_approved_at = $date;
            $approved->clockout_actual = $request->waktu;
            $approved->save();

        }

        

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
