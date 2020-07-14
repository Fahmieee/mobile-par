<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Pretrip_Check_Detail;
use App\Drivers;
use App\PretripCheckNotOke;

class ApproveController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');
    	$tes = 'Cuma Coba Aja';

    	return view('content.approve.index', compact('date','tes'));

    }

    public function getdata(Request $request)
    {
    	$getdatas = PretripCheckNotOke::select("users.first_name","users.last_name", "units.no_police","pretrip_check_notoke.id","check_answer.level","pretrip_check_notoke.created_at")
    	->join("pretrip_check_detail", "pretrip_check_notoke.pretripcheckdetail_id", "=", "pretrip_check_detail.id")
        ->join("pretrip_check", "pretrip_check_detail.pretripcheck_id", "=", "pretrip_check.id")
    	->join("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
    	->join("users", "pretrip_check.user_id", "=", "users.id")
    	->join("drivers", "users.id", "=", "drivers.driver_id")
    	->join("units", "drivers.unit_id", "=", "units.id")
    	->where([
            ['drivers.korlap_id', '=', $request->user_id],
            ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
        ])
    	->orderBy('check_answer.level', 'desc')
        ->get();

    	return response()->json($getdatas);

    }

    public function getdetail(Request $request)
    {
    	$getdetail = PretripCheckNotOke::select("check_types.name as type", "check_detail.name as detail_name","check_answer.parameter","pretrip_check_notoke.id")
    	->join("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        ->join("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
    	->join("check_types", "check_detail.checktype_id", "=", "check_types.id")
    	->where("pretrip_check_notoke.id", $request->id)
        ->first();

    	return response()->json($getdetail);

    }

    public function approve(Request $request)
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d H:i:s');

    	$approved = PretripCheckNotOke::findOrFail($request->id);
        $approved->status = "APPROVED";
        $approved->approved_at = $date;
        $approved->approved_by = $request->user_id;
        $approved->save();

        return response()->json($approved);
    }
}
