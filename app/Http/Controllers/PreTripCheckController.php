<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CheckType;
use App\CheckDetail;
use App\Pretrip_Check;
use App\Pretrip_Check_Detail;
use App\PretripCheckNotOke;

class PreTripCheckController extends Controller
{
    
	public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');

    	$types = CheckDetail::select("check_detail.*","check_types.name As type_name")
        ->leftJoin("check_types", "check_detail.checktype_id", "=", "check_types.id")
        ->get();

    	return view('content.trip_check.index', compact('types', 'date'));

    }

    public function GetData(Request $request)
    {
        $gettype = CheckDetail::select("check_detail.*","check_types.name As type_name")
        ->leftJoin("check_types", "check_detail.checktype_id", "=", "check_types.id")
        ->where("check_detail.checktype_id", $request->check_id)
        ->get();

        return response()->json($gettype);
    }


    public function getkategori()
    {
        $gettypes = CheckType::select("id","name")
        ->get();

        return response()->json($gettypes);
    }

    public function SubmitPretripCheck(Request $request) {

        date_default_timezone_set('Asia/Jakarta');
    	$harini = date('Y-m-d');
    	$time = date("h:i:sa");

    	$pretrip_check = new Pretrip_Check();
        $pretrip_check->user_id= $request->created_by;
        $pretrip_check->date= $harini;
        $pretrip_check->time= $time;
        $pretrip_check->save();

        $count = count($request->check_id);

        for($i=0; $i < $count; $i++){

            $detail_tripcheck = new Pretrip_Check_Detail();
            $detail_tripcheck->pretripcheck_id = $pretrip_check->id;
            $detail_tripcheck->checktype_id = $request->check_id[$i];
            $detail_tripcheck->value = $request->value[$i];
            $detail_tripcheck->save();

        }

        $ada = Pretrip_Check_Detail::where([
            ['pretripcheck_id', '=', $pretrip_check->id],
            ['value', '=', 0],
        ])
        ->count();

        $arrayNames = array(    
            'ada' => $ada, 
            'pretripcheck_id' => $pretrip_check->id
        );


        return response()->json($arrayNames);

    }


    public function submitnotoke(Request $request) {

        $count = count($request->checkdetail_id);

        for($i=0; $i < $count; $i++){

            $detail_tripcheck = new PretripCheckNotOke();
            $detail_tripcheck->pretripcheck_id = $request->pretripcheck_id;
            $detail_tripcheck->checkdetail_id = $request->checkdetail_id[$i];
            $detail_tripcheck->status = 'NOT APPROVED';
            $detail_tripcheck->save();

        }

    }

    public function Validasi(Request $request) {

        date_default_timezone_set('Asia/Jakarta');
    	$harini = date('Y-m-d');

    	$validate = Pretrip_Check::where([
            ['pretrip_check.user_id', '=', $request->user_id],
            ['pretrip_check.date', '=', $harini],
        ])
        ->get();

        return response()->json($validate);

    }

    public function validasinotoke(Request $request) {

        date_default_timezone_set('Asia/Jakarta');
        $harini = date('Y-m-d');

        $validate = Pretrip_Check::select("pretrip_check.id","pretrip_check_notoke.status","pretrip_check.time","check_detail.level")
        ->leftJoin("pretrip_check_detail", "pretrip_check.id", "=", "pretrip_check_detail.pretripcheck_id")
        ->leftJoin("pretrip_check_notoke", "pretrip_check_detail.id", "=", "pretrip_check_notoke.pretripdetail_id")
        ->join("check_detail", "pretrip_check_detail.checkdetail_id", "=", "check_detail.id")
        ->where([
            ['pretrip_check.user_id', '=', $request->user_id],
            ['pretrip_check.date', '=', $harini],
            ['check_detail.level', '=', 'High'],
            ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
        ])
        ->get();

        return response()->json($validate);

    }

}
