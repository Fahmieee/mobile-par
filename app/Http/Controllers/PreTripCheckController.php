<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CheckType;
use App\CheckDetail;
use App\CheckAnswer;
use App\Koordinat;
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

    public function getdataanswer(Request $request)
    {
        $getanswer = CheckAnswer::select("check_answer.*")
        ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        ->where("check_answer.checkdetail_id", $request->checkdetail_id)
        ->get();

        return response()->json($getanswer);
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
    	$time = date("H:i:s");

    	$pretrip_check = new Pretrip_Check();
        $pretrip_check->user_id= $request->created_by;
        $pretrip_check->date= $harini;
        $pretrip_check->time= $time;
        $pretrip_check->save();

        $count = count($request->checkanswer_id);

        for($i=0; $i < $count; $i++){

            $detail_tripcheck = new Pretrip_Check_Detail();
            $detail_tripcheck->pretripcheck_id = $pretrip_check->id;
            $detail_tripcheck->checkanswer_id = $request->checkanswer_id[$i];
            $detail_tripcheck->save();

            $ada = CheckAnswer::where([
                ['id', '=', $request->checkanswer_id[$i]],
                ['value', '=', '1'],
            ])
            ->first();

            if (!$ada){

                $detail_tripchecknot = new PretripCheckNotOke();
                $detail_tripchecknot->pretripcheckdetail_id = $detail_tripcheck->id;
                $detail_tripchecknot->checkanswer_id = $request->checkanswer_id[$i];
                $detail_tripchecknot->status = 'NOT APPROVED';
                $detail_tripchecknot->save();

            }

        }

        $arrayNames = array(    
            'ptc_id' => $pretrip_check->id
        );

        return response()->json($arrayNames);

    }


    public function submitnotoke(Request $request) {

        date_default_timezone_set('Asia/Jakarta');
        $harini = date('Y-m-d');
        $time = date("H:i:s");

        $pretrip_check = new Pretrip_Check();
        $pretrip_check->user_id= $request->user_id;
        $pretrip_check->date= $harini;
        $pretrip_check->time= $time;
        $pretrip_check->save();

        $count = count($request->check_id);

        if ($count <= 1){

        } else {

            for($i=0; $i < $count; $i++){

                $detail_tripcheck = new PretripCheckNotOke();
                $detail_tripcheck->pretripcheck_id = $pretrip_check->id;
                $detail_tripcheck->checkdetail_id = $request->check_id[$i];
                $detail_tripcheck->status = 'NOT APPROVED';
                $detail_tripcheck->save();

            }
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

        $validate = Pretrip_Check::select("pretrip_check.id","pretrip_check_notoke.status","pretrip_check.time","check_answer.level")
        ->leftJoin("pretrip_check_detail", "pretrip_check.id", "=", "pretrip_check_detail.pretripcheck_id")
        ->leftJoin("pretrip_check_notoke", "pretrip_check_detail.id", "=", "pretrip_check_notoke.pretripcheckdetail_id")
        ->join("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        ->where([
            ['pretrip_check.user_id', '=', $request->user_id],
            ['pretrip_check.date', '=', $harini],
            ['check_answer.level', '=', 'HIGH'],
            ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
        ])
        ->get();

        return response()->json($validate);

    }

    public function koordinat(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $koordinat = new Koordinat();
        $koordinat->action_id = $request->ptc_id;
        $koordinat->type = $request->type;
        $koordinat->long = $request->long;
        $koordinat->lat = $request->lat;
        $koordinat->save();

        return response()->json($koordinat);

    }

}
