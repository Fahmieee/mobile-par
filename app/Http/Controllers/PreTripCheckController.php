<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CheckType;
use App\CheckDetail;
use App\Pretrip_Check;
use App\Pretrip_Check_Detail;

class PreTripCheckController extends Controller
{
    
	public function index()
    {

    	$date = date('Y-m-d');

    	$types = CheckDetail::select("check_detail.*","check_types.name As type_name")
        ->leftJoin("check_types", "check_detail.checktype_id", "=", "check_types.id")
        ->get();

    	return view('content.trip_check.index', compact('types', 'date'));

    }

    public function GetData()
    {
        $gettype = CheckDetail::select("check_detail.*","check_types.name As type_name")
        ->leftJoin("check_types", "check_detail.checktype_id", "=", "check_types.id")
        ->get();

        return response()->json($gettype);
    }

    public function SubmitPretripCheck(Request $request) {

    	$harini = date('Y-m-d');
    	$time = date("h:i:sa");

    	$pretrip_check = new Pretrip_Check();
        $pretrip_check->user_id= $request->created_by;
        $pretrip_check->date= $harini;
        $pretrip_check->time= $time;
        $pretrip_check->status= 'PENDING';
        $pretrip_check->save();

        $count = count($request->check_id);

        for($i=0; $i < $count; $i++){

            $detail_tripcheck = new Pretrip_Check_Detail();
            $detail_tripcheck->pretripcheck_id = $pretrip_check->id;
            $detail_tripcheck->checkdetail_id = $request->check_id[$i];
            $detail_tripcheck->value = $request->value[$i];
            $detail_tripcheck->save();

        }

        $notoke = Pretrip_Check_Detail::select('id')
        ->where([
            ['pretripcheck_id', '=', $pretrip_check->id],
            ['value', '=', '0'],
        ])
        ->get();

        $countcheck = count($notoke);

        if ($countcheck == '0'){

        	$updates = Pretrip_Check::findOrFail($pretrip_check->id);
	        $updates->status = 'APPROVED';
	        $updates->save();

        } else {

        	$updates = Pretrip_Check::findOrFail($pretrip_check->id);
	        $updates->status = 'NOT APPROVED';
	        $updates->save();

        }

        return response()->json($detail_tripcheck);

    }

    public function Validasi(Request $request) {

    	$harini = date('Y-m-d');

    	$validate = Pretrip_Check::where([
            ['user_id', '=', $request->user_id],
            ['date', '=', $harini],
        ])
        ->get();

        return response()->json($validate);

    }

}
