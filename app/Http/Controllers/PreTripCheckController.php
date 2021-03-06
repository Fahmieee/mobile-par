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
use App\Clocks;
use App\Drivers;
use App\PTCNotOk;
use Auth;

class PreTripCheckController extends Controller
{
    
	public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
    	$date = date('d M Y');
        $harini = date('Y-m-d');

        $gettypes = CheckType::select("id","name","icons")
        ->get();

        $user = Auth::user();

        $user_id = $user->id;

        $getanswers = PretripCheckNotOke::select("check_answer.parameter","check_detail.name")
        ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        ->join("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
        ->where([
            ['pretrip_check.date', '=', $harini],
            ['pretrip_check.user_id', '=', $user_id]
        ])
        ->get();

        $ptcterakhir = Pretrip_Check::select("pretrip_check.id")
        ->join("pretrip_check_notoke", "pretrip_check.id", "=", "pretrip_check_notoke.pretripcheck_id")
        ->where([
            ['pretrip_check.date', '!=', $harini],
            ['pretrip_check.user_id', '=', $user_id],
            ['pretrip_check_notoke.appr', '=', 'N'],
        ])
        ->orderBy('pretrip_check.id', 'desc')
        ->first();

        if(!$ptcterakhir){

            $getanswerkemarins = '0';
            $tanggal = date('d M Y', strtotime($harini));

        } else {

            $getanswerkemarins = PretripCheckNotOke::select("check_answer.parameter","check_detail.name","pretrip_check_notoke.id","check_answer.kategori","check_answer.id as answer_id", "check_answer.checkdetail_id")
            ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
            ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
            ->join("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
            ->where([
                ['pretrip_check.id', '=', $ptcterakhir->id],
                ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
                ['pretrip_check_notoke.appr', '=', 'N'],
            ])
            ->get();

            $tanggal = date('d M Y', strtotime($ptcterakhir->date));
        }

    	return view('content.trip_check.index', compact('gettypes', 'date','user_id','getanswers','getanswerkemarins','tanggal'));

    }

    public function detail($id)
    {

        $getdetails = CheckDetail::select("id","name")
        ->where([
            ['checktype_id', '=', $id],
            ['subdetail_id', '=', '0']
        ])
        ->get();

        $types = CheckType::where('id', $id)
        ->first();

        $user = Auth::user();

        $user_id = $user->id;

        return view('content.trip_check.detail', compact('getdetails','types','user_id'));

    }

    public function mobil($id)
    {

        $lebihdetails = CheckDetail::select("id","name")
        ->where('subdetail_id', $id)
        ->get();

        $details = CheckDetail::where('id', $id)
        ->first();

        $user = Auth::user();

        $user_id = $user->id;

        $mobils = CheckDetail::where('subdetail_id', $id)
        ->first();

        return view('content.trip_check.'.$mobils->mobil.'', compact('lebihdetails','details','mobils','user_id'));

    }

    public function langsungmobil($id)
    {

        $lebihdetails = CheckDetail::select("id","name")
        ->where([
            ['checktype_id', '=', $id],
            ['subdetail_id', '=', '0'],
            ['mobil', '!=', null],
        ])
        ->get();

        $details = CheckType::where('id', $id)
        ->first();

        $user = Auth::user();

        $user_id = $user->id;

        $mobils = CheckDetail::where([
            ['checktype_id', '=', $id],
            ['subdetail_id', '=', '0'],
        ])
        ->first();

        return view('content.trip_check.'.$mobils->mobil.'', compact('lebihdetails','details','mobils','user_id'));

    }

    public function lebihdetail($id)
    {

        $lebihdetails = CheckDetail::select("id","name")
        ->where('subdetail_id', $id)
        ->get();

        $details = CheckDetail::where('id', $id)
        ->first();

        $user = Auth::user();   

        $user_id = $user->id;

        $countdetails = CheckDetail::where([
            ['subdetail_id', '=', '0'],
            ['mobil', '!=', null],
            ['id', '=', $id],
        ])
        ->count();

        return view('content.trip_check.lebihdetail', compact('lebihdetails','details','user_id','countdetails'));

    }

    public function GetData(Request $request)
    {
        $gettype = CheckDetail::select("check_detail.*","check_types.name As type_name")
        ->leftJoin("check_types", "check_detail.checktype_id", "=", "check_types.id")
        ->where("check_detail.checktype_id", $request->checktype_id)
        ->get();

        return response()->json($gettype);
    }

    public function getdataanswer(Request $request)
    {
        $getanswer = CheckAnswer::select("check_answer.*","check_detail.name as detail_name")
        ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        ->where("check_answer.checkdetail_id", $request->checkdetail_id)
        ->get();

        return response()->json($getanswer);
    }

    public function ptcanswer(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $harini = date('Y-m-d');

        $getanswer = PretripCheckNotOke::select("check_answer.*")
        ->join("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
        ->where([
            ['checkanswer_id', '=', $request->checkanswer_id],
            ['pretrip_check.date', '=', $harini]
        ])
        ->first();

        return response()->json($getanswer);
    }


    public function getsubmited(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $harini = date('Y-m-d');

        $gettypesx = CheckType::select('check_types.id')
        ->join("check_detail", "check_types.id", "=", "check_detail.checktype_id")
        ->join("check_answer", "check_detail.id", "=", "check_answer.checkdetail_id")
        ->join("pretrip_check_detail", "check_answer.id", "=", "pretrip_check_detail.checkanswer_id")
        ->join("pretrip_check", "pretrip_check_detail.pretripcheck_id", "=", "pretrip_check.id")
        ->where([
            ['pretrip_check.user_id', '=', $request->user_id],
            ['pretrip_check.date', '=', $harini]
        ])
        ->groupby('check_types.id')
        ->get();

        return response()->json($gettypesx);
    }

    public function SubmitPretripCheck(Request $request) {

        date_default_timezone_set('Asia/Jakarta');
    	$harini = date('Y-m-d');
    	$time = date("H:i:s");
        $fulltime = date('Y-m-d H:i:s');
        $kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));

        $userx = Drivers::where('driver_id', $request->created_by)
        ->first();

        $adaga = Pretrip_Check::where([
            ['user_id', '=', $request->created_by],
            ['date', '=', $harini],
        ])
        ->first();

        $answer = CheckAnswer::where('id', $request->checkanswer_id)
        ->first();

        if(!$adaga){

            $pretrip_check = new Pretrip_Check();
            $pretrip_check->user_id= $request->created_by;
            $pretrip_check->unit_id= $userx->unit_id;
            $pretrip_check->date= $harini;
            $pretrip_check->time= $time;
            $pretrip_check->status= 'NOT SUBMITED';
            $pretrip_check->save();

            if($answer->value == '1'){

                $detail_tripcheck = new Pretrip_Check_Detail();
                $detail_tripcheck->pretripcheck_id = $pretrip_check->id;
                $detail_tripcheck->checkanswer_id = $request->checkanswer_id;
                $detail_tripcheck->save();

            } else {


                $detail_tripchecknot = new PretripCheckNotOke();
                $detail_tripchecknot->pretripcheck_id = $pretrip_check->id;
                $detail_tripchecknot->checkanswer_id = $request->checkanswer_id;
                $detail_tripchecknot->status = 'NOT APPROVED';
                $detail_tripchecknot->days = '1';
                $detail_tripchecknot->approve_sementara = 'No';
                $detail_tripchecknot->appr = 'N';
                $detail_tripchecknot->save();

            }

        } else {

            $cekdetail = Pretrip_Check_Detail::select("pretrip_check_detail.id")
            ->leftJoin("check_answer", "pretrip_check_detail.checkanswer_id", "=", "check_answer.id")
            ->where([
                ['pretripcheck_id', '=', $adaga->id],
                ['checkdetail_id', '=', $answer->checkdetail_id],
            ])
            ->first();

            $ceknot = PretripCheckNotOke::select("pretrip_check_notoke.id")
            ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
            ->where([
                ['pretripcheck_id', '=', $adaga->id],
                ['checkdetail_id', '=', $answer->checkdetail_id],
            ])
            ->first();

            if (!$cekdetail && !$ceknot){

                if($answer->value == '1'){

                    $detail_tripcheck = new Pretrip_Check_Detail();
                    $detail_tripcheck->pretripcheck_id = $adaga->id;
                    $detail_tripcheck->checkanswer_id = $request->checkanswer_id;
                    $detail_tripcheck->save();

                } else{

                    $detail_tripchecknot = new PretripCheckNotOke();
                    $detail_tripchecknot->pretripcheck_id = $adaga->id;
                    $detail_tripchecknot->checkanswer_id = $request->checkanswer_id;
                    $detail_tripchecknot->status = 'NOT APPROVED';
                    $detail_tripchecknot->approve_sementara = 'No';
                    $detail_tripchecknot->days = '1';
                    $detail_tripchecknot->appr = 'N';
                    $detail_tripchecknot->save();

                }

            } else {

                if($cekdetail){

                    if($answer->value == '1'){

                        $updates_answer = Pretrip_Check_Detail::where(['id'=>$cekdetail->id])->update(['checkanswer_id'=>$request->checkanswer_id]);

                    } else {

                        $deletedetail = Pretrip_Check_Detail::where('id', $cekdetail->id)
                        ->delete();

                        $detail_tripchecknot = new PretripCheckNotOke();
                        $detail_tripchecknot->pretripcheck_id = $adaga->id;
                        $detail_tripchecknot->checkanswer_id = $request->checkanswer_id;
                        $detail_tripchecknot->status = 'NOT APPROVED';
                        $detail_tripchecknot->approve_sementara = 'No';
                        $detail_tripchecknot->days = '1';
                        $detail_tripchecknot->appr = 'N';
                        $detail_tripchecknot->save();

                    }

                } else {

                    $ptcnow = PretripCheckNotOke::select('pretrip_check_notoke.checkanswer_id','pretrip_check_notoke.id')
                    ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
                    ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
                    ->where([
                        ['pretrip_check.date', '=', $harini],
                        ['check_answer.checkdetail_id', '=', $answer->checkdetail_id],
                    ])
                    ->first();

                    if($answer->value != '1'){

                        if($ptcnow->checkanswer_id != $request->checkanswer_id){

                            $updates_days = PretripCheckNotOke::where(['id'=>$ptcnow->id])->update(['checkanswer_id'=>$request->checkanswer_id]);  

                         } 

                    } else {

                        $adacount = PretripCheckNotOke::select("pretrip_check_notoke.id","pretrip_check_notoke.days")
                        ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
                        ->where([
                            ['pretrip_check.date', '=', $harini],
                            ['pretrip_check_notoke.checkanswer_id', '=', $ptcnow->checkanswer_id],
                        ])
                        ->delete();

                        $detail_tripcheck = new Pretrip_Check_Detail();
                        $detail_tripcheck->pretripcheck_id = $adaga->id;
                        $detail_tripcheck->checkanswer_id = $request->checkanswer_id;
                        $detail_tripcheck->save();

                    }

                }
            }

        }

        // if (!$adaga){

        // 	$pretrip_check = new Pretrip_Check();
        //     $pretrip_check->user_id= $request->created_by;
        //     $pretrip_check->unit_id= $userx->unit_id;
        //     $pretrip_check->date= $harini;
        //     $pretrip_check->time= $time;
        //     $pretrip_check->status= 'NOT SUBMITED';
        //     $pretrip_check->save();

        //     $count = count($request->checkanswer_id);

        //     for($i=0; $i < $count; $i++){

        //         $detail_tripcheck = new Pretrip_Check_Detail();
        //         $detail_tripcheck->pretripcheck_id = $pretrip_check->id;
        //         $detail_tripcheck->checkanswer_id = $request->checkanswer_id[$i];
        //         $detail_tripcheck->save();

        //         $ada = CheckAnswer::where([
        //             ['id', '=', $request->checkanswer_id[$i]],
        //             ['value', '=', '1'],
        //         ])
        //         ->first();

        //         if (!$ada){

        //             $ceknotoke = PretripCheckNotOke::select('pretrip_check_notoke.id','pretrip_check_notoke.days')
        //             ->leftJoin("pretrip_check_detail", "pretrip_check_notoke.pretripcheckdetail_id", "=", "pretrip_check_detail.id")
        //             ->leftJoin("pretrip_check", "pretrip_check_detail.pretripcheck_id", "=", "pretrip_check.id")
        //             ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        //             ->where([
        //                 ['pretrip_check.date', '=', $kemarin],
        //                 ['pretrip_check.user_id', '=', $request->created_by],
        //                 ['pretrip_check_notoke.checkanswer_id', '=', $request->checkanswer_id[$i]],
        //             ])
        //             ->first();

        //             if (!$ceknotoke){

        //                 $detail_tripchecknot = new PretripCheckNotOke();
        //                 $detail_tripchecknot->pretripcheckdetail_id = $detail_tripcheck->id;
        //                 $detail_tripchecknot->checkanswer_id = $request->checkanswer_id[$i];
        //                 $detail_tripchecknot->status = 'NOT APPROVED';
        //                 $detail_tripchecknot->approve_sementara = 'No';
        //                 $detail_tripchecknot->days = '1';
        //                 $detail_tripchecknot->save();

        //             } else {

        //                 $nambah = $ceknotoke->days + 1;

        //                 $updates_days = PretripCheckNotOke::where(['id'=>$ceknotoke->id])->update(['days'=>$nambah]);

        //             }

        //         } else {

        //             $cekdetail = PretripCheckNotOke::select("pretrip_check_notoke.id as not_id","check_detail.id")
        //             ->leftJoin("pretrip_check_detail", "pretrip_check_notoke.pretripcheckdetail_id", "=", "pretrip_check_detail.id")
        //             ->leftJoin("pretrip_check", "pretrip_check_detail.pretripcheck_id", "=", "pretrip_check.id")
        //             ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        //             ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        //             ->where([
        //                 ['pretrip_check.date', '=', $kemarin],
        //                 ['pretrip_check.user_id', '=', $request->created_by],
        //                 ['check_detail.id', '=', $ada->checkdetail_id],
        //             ])
        //             ->first();

        //             if ($cekdetail){

        //                 $approveptcdrivers = PretripCheckNotOke::where(['id'=>$cekdetail->not_id])->update(['status'=>'APPROVED', 'approved_at'=> $fulltime, 'approved_by'=> $request->created_by]);

        //             }

        //         }

        //     }

        // } else {

        //     $ptc_updates = Pretrip_Check::where(['user_id'=>$request->created_by],['date'=>$harini])->update(['time'=>$time]);

        //     $adagadetail = Pretrip_Check_Detail::join("check_answer", "pretrip_check_detail.checkanswer_id", "=", "check_answer.id")
        //     ->join("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        //     ->where([
        //         ['pretripcheck_id', '=', $adaga->id],
        //         ['checktype_id', '=', $request->type_id],
        //     ])
        //     ->first();

        //         if (!$adagadetail){

        //             $count = count($request->checkanswer_id);

        //             for($i=0; $i < $count; $i++){

        //                 $detail_tripcheck = new Pretrip_Check_Detail();
        //                 $detail_tripcheck->pretripcheck_id = $adaga->id;
        //                 $detail_tripcheck->checkanswer_id = $request->checkanswer_id[$i];
        //                 $detail_tripcheck->save();

        //                 $ada = CheckAnswer::where([
        //                     ['id', '=', $request->checkanswer_id[$i]],
        //                     ['value', '=', '1'],
        //                 ])
        //                 ->first();

        //                 if (!$ada){

        //                     $ceknotoke = PretripCheckNotOke::select('pretrip_check_notoke.id','pretrip_check_notoke.days')
        //                     ->join("pretrip_check_detail", "pretrip_check_notoke.pretripcheckdetail_id", "=", "pretrip_check_detail.id")
        //                     ->join("pretrip_check", "pretrip_check_detail.pretripcheck_id", "=", "pretrip_check.id")
        //                     ->join("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        //                     ->where([
        //                         ['pretrip_check.date', '=', $kemarin],
        //                         ['pretrip_check.user_id', '=', $request->created_by],
        //                         ['pretrip_check_notoke.checkanswer_id', '=', $request->checkanswer_id[$i]],
        //                     ])
        //                     ->first();

        //                     if (!$ceknotoke){

        //                         $detail_tripchecknot = new PretripCheckNotOke();
        //                         $detail_tripchecknot->pretripcheckdetail_id = $detail_tripcheck->id;
        //                         $detail_tripchecknot->checkanswer_id = $request->checkanswer_id[$i];
        //                         $detail_tripchecknot->status = 'NOT APPROVED';
        //                         $detail_tripchecknot->approve_sementara = 'No';
        //                         $detail_tripchecknot->days = '1';
        //                         $detail_tripchecknot->save();

        //                     } else {

        //                         $nambah = $ceknotoke->days + 1;

        //                         $updates_days = PretripCheckNotOke::where(['id'=>$ceknotoke->id])->update(['days'=>$nambah]);

        //                     }

        //                 } else {

        //                     $cekdetail = PretripCheckNotOke::select("pretrip_check_notoke.id as not_id","check_detail.id")
        //                     ->leftJoin("pretrip_check_detail", "pretrip_check_notoke.pretripcheckdetail_id", "=", "pretrip_check_detail.id")
        //                     ->leftJoin("pretrip_check", "pretrip_check_detail.pretripcheck_id", "=", "pretrip_check.id")
        //                     ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        //                     ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        //                     ->where([
        //                         ['pretrip_check.date', '=', $kemarin],
        //                         ['pretrip_check.user_id', '=', $request->created_by],
        //                         ['check_detail.id', '=', $ada->checkdetail_id],
        //                     ])
        //                     ->first();

        //                     if ($cekdetail){

        //                         $approveptcdrivers = PretripCheckNotOke::where(['id'=>$cekdetail->not_id])->update(['status'=>'APPROVED', 'approved_at'=> $fulltime, 'approved_by'=> $request->created_by]);

        //                     }

        //                 }

        //             }

                    
        //         } else {

        //             $notoke = PretripCheckNotOke::join("pretrip_check_detail", "pretrip_check_notoke.pretripcheckdetail_id", "=", "pretrip_check_detail.id")
        //             ->join("check_answer", "pretrip_check_detail.checkanswer_id", "=", "check_answer.id")
        //             ->join("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        //             ->where([
        //                 ['pretripcheck_id', '=', $adaga->id],
        //                 ['checktype_id', '=', $request->type_id]
        //             ])
        //             ->delete();

        //             $detail = Pretrip_Check_Detail::join("check_answer", "pretrip_check_detail.checkanswer_id", "=", "check_answer.id")
        //             ->join("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        //             ->where([
        //                 ['pretripcheck_id', '=', $adaga->id],
        //                 ['checktype_id', '=', $request->type_id]
        //             ])
        //             ->delete();

        //             $count = count($request->checkanswer_id);

        //             for($i=0; $i < $count; $i++){

        //                 $detail_tripcheck = new Pretrip_Check_Detail();
        //                 $detail_tripcheck->pretripcheck_id = $adaga->id;
        //                 $detail_tripcheck->checkanswer_id = $request->checkanswer_id[$i];
        //                 $detail_tripcheck->save();

        //                 $ada = CheckAnswer::where([
        //                     ['id', '=', $request->checkanswer_id[$i]],
        //                     ['value', '=', '1'],
        //                 ])
        //                 ->first();

        //                 if (!$ada){

        //                     $ceknotoke = PretripCheckNotOke::select('pretrip_check_notoke.id','pretrip_check_notoke.days')
        //                     ->join("pretrip_check_detail", "pretrip_check_notoke.pretripcheckdetail_id", "=", "pretrip_check_detail.id")
        //                     ->join("pretrip_check", "pretrip_check_detail.pretripcheck_id", "=", "pretrip_check.id")
        //                     ->join("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        //                     ->where([
        //                         ['pretrip_check.date', '=', $kemarin],
        //                         ['pretrip_check.user_id', '=', $request->created_by],
        //                         ['pretrip_check_notoke.checkanswer_id', '=', $request->checkanswer_id[$i]],
        //                     ])
        //                     ->first();

        //                     if (!$ceknotoke){

        //                         $detail_tripchecknot = new PretripCheckNotOke();
        //                         $detail_tripchecknot->pretripcheckdetail_id = $detail_tripcheck->id;
        //                         $detail_tripchecknot->checkanswer_id = $request->checkanswer_id[$i];
        //                         $detail_tripchecknot->status = 'NOT APPROVED';
        //                         $detail_tripchecknot->approve_sementara = 'No';
        //                         $detail_tripchecknot->days = '1';
        //                         $detail_tripchecknot->save();

        //                     } else {

        //                         $nambah = $ceknotoke->days + 1;

        //                         $updates_days = PretripCheckNotOke::where(['id'=>$ceknotoke->id])->update(['days'=>$nambah]);

        //                     }

        //                 } else {

        //                     $cekdetail = PretripCheckNotOke::select("pretrip_check_notoke.id as not_id","check_detail.id")
        //                     ->leftJoin("pretrip_check_detail", "pretrip_check_notoke.pretripcheckdetail_id", "=", "pretrip_check_detail.id")
        //                     ->leftJoin("pretrip_check", "pretrip_check_detail.pretripcheck_id", "=", "pretrip_check.id")
        //                     ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        //                     ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        //                     ->where([
        //                         ['pretrip_check.date', '=', $kemarin],
        //                         ['pretrip_check.user_id', '=', $request->created_by],
        //                         ['check_detail.id', '=', $ada->checkdetail_id],
        //                     ])
        //                     ->first();

        //                     if ($cekdetail){

        //                         $approveptcdrivers = PretripCheckNotOke::where(['id'=>$cekdetail->not_id])->update(['status'=>'APPROVED', 'approved_at'=> $fulltime, 'approved_by'=> $request->created_by]);

        //                     }

        //                 }

        //             }

        //         }

        // }


        return response()->json($answer->value);

    }

    public function Validasi2(Request $request) {

        date_default_timezone_set('Asia/Jakarta');
        $harini = date('Y-m-d');
        $kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));

        $user = Auth::user();

        $drivers = Drivers::where("driver_id", $user->id)
        ->first();

        $validatekemarin = Clocks::where([
            ['user_id', '=', $request->user_id],
            ['clockin_date', '=', $kemarin],
            ['clockout_time', '=', null],
        ])
        ->first();

        if (!$validatekemarin){

            $validate = Pretrip_Check::where([
                ['user_id', '=', $request->user_id],
                ['unit_id', '=', $drivers->unit_id],
                ['date', '=', $harini],
                ['status', '=', 'SUBMITED'],
            ])
            ->get();

        } else {

            $validate = Pretrip_Check::where([
                ['user_id', '=', $request->user_id],
                ['unit_id', '=', $drivers->unit_id],
                ['date', '=', $kemarin],
                ['status', '=', 'SUBMITED'],
            ])
            ->get();

        }

        return response()->json($validate);

    }


    public function Validasi(Request $request) {

        date_default_timezone_set('Asia/Jakarta');
    	$harini = date('Y-m-d');
        $kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));

        $drivers = Drivers::leftJoin("units", "drivers.unit_id", "=", "units.id")
        ->where([
            ['drivers.driver_id', '=', $request->user_id],
            ['units.pemilik', '=', 'PAR'],
        ])
        ->first();

        $validatekemarin = Clocks::where([
            ['user_id', '=', $request->user_id],
            ['clockin_date', '=', $kemarin],
            ['clockout_time', '=', null],
        ])
        ->first();

        if(!$drivers){

            $data = '1';

        } else {

            if (!$validatekemarin){

                $validate = Pretrip_Check::where([
                    ['user_id', '=', $request->user_id],
                    ['unit_id', '=', $drivers->unit_id],
                    ['date', '=', $harini],
                    ['status', '=', 'SUBMITED'],
                ])
                ->count();

                if($validate == '0'){

                    $data = '0';

                } else {

                    $data = '1';

                }

            } else {

                $validate = Pretrip_Check::where([
                    ['user_id', '=', $request->user_id],
                    ['unit_id', '=', $drivers->unit_id],
                    ['date', '=', $kemarin],
                    ['status', '=', 'SUBMITED'],
                ])
                ->count();

                if($validate == '0'){

                    $data = '0';

                } else {

                    $data = '1';

                }

            }

        }

        return response()->json($data);

    }

    public function validasinotoke(Request $request) {

        date_default_timezone_set('Asia/Jakarta');
        $harini = date('Y-m-d');

        $validate = Pretrip_Check::select("pretrip_check.id","pretrip_check_notoke.status","pretrip_check.time","check_answer.level")
        ->leftJoin("pretrip_check_notoke", "pretrip_check.id", "=", "pretrip_check_notoke.pretripcheck_id")
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


    public function kirimptc(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $harini = date('Y-m-d');
        $time = date("H:i:s");

        $user = Auth::user();

        $drivers = Drivers::where("driver_id", $user->id)
        ->first();

        $sudahptc = Pretrip_Check::where([
            ['user_id', '=', $request->user_id],
            ['date', '=', $harini],
            ['unit_id', '=', $drivers->unit_id],
        ])
        ->first();

        $userx = Drivers::where('driver_id', $request->user_id)
        ->first();

        if(!$sudahptc){

            $pretrip_check = new Pretrip_Check();
            $pretrip_check->user_id= $request->user_id;
            $pretrip_check->unit_id= $userx->unit_id;
            $pretrip_check->date= $harini;
            $pretrip_check->time= $time;
            $pretrip_check->status= 'SUBMITED';
            $pretrip_check->save();

        } else {

            $pretrip_check = Pretrip_Check::where([
                ['user_id', '=', $request->user_id],
                ['date', '=', $harini],
            ])
            ->update(['status'=>'SUBMITED', 'time'=>$time]);

        }

        $ptcs = Pretrip_Check::where([
            ['user_id', '=', $request->user_id],
            ['date', '=', $harini],
        ])
        ->first();

        $ceknotoke = PretripCheckNotOke::select('check_detail.approve_role_id')
        ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        ->where("pretrip_check_notoke.pretripcheck_id", $ptcs->id)
        ->distinct()
        ->get();

        return response()->json($ceknotoke);

    }


    public function approveptckemarin(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $dates = date('Y-m-d H:i:s');

        $user = Auth::user();
        $user_id = $user->id;

        $ptc = PretripCheckNotOke::select('pretrip_check.user_id','pretrip_check.unit_id','pretrip_check_notoke.checkanswer_id')
        ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
        ->where("pretrip_check_notoke.id", $request->ptc_id)
        ->first();

        $approveptc = PretripCheckNotOke::leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")->where(['pretrip_check.user_id'=>$ptc->user_id, 'pretrip_check.unit_id'=>$ptc->unit_id, 'pretrip_check_notoke.checkanswer_id'=>$ptc->checkanswer_id])->update(['pretrip_check_notoke.status'=>'APPROVED', 'pretrip_check_notoke.approved_at'=>$dates, 'pretrip_check_notoke.approved_by'=>$user_id, 'pretrip_check_notoke.appr'=>'Y']);

        return response()->json($approveptc);
    }

    public function tidakapproveptckemarin(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $harini = date('Y-m-d');
        $time = date("H:i:s");

        $user = Auth::user();
        $user_id = $user->id;

        $userx = Drivers::where('driver_id', $user_id)
        ->first();

        $ptchariini = Pretrip_Check::where([
            ['date', '=', $harini],
            ['user_id', '=', $user_id],
        ])
        ->first();

        $approveptc = PretripCheckNotOke::where(['id'=>$request->ptc_id])->update(['appr'=>'Y']);

        if(!$ptchariini){

            $pretrip_check = new Pretrip_Check();
            $pretrip_check->user_id= $user_id;
            $pretrip_check->unit_id= $userx->unit_id;
            $pretrip_check->date= $harini;
            $pretrip_check->time= $time;
            $pretrip_check->status= 'NOT SUBMITED';
            $pretrip_check->save();

            $ptcsebelumnya = PretripCheckNotOke::where("id", $request->ptc_id)
            ->first();

            $detail_tripchecknot = new PretripCheckNotOke();
            $detail_tripchecknot->pretripcheck_id = $pretrip_check->id;
            $detail_tripchecknot->checkanswer_id = $ptcsebelumnya->checkanswer_id;
            $detail_tripchecknot->status = 'NOT APPROVED';
            $detail_tripchecknot->approve_sementara = 'No';
            $detail_tripchecknot->days = '1';
            $detail_tripchecknot->appr = 'N';
            $detail_tripchecknot->save();

        } else {

            $ptcsebelumnya = PretripCheckNotOke::where("id", $request->ptc_id)
            ->first();

            $detail_tripchecknot = new PretripCheckNotOke();
            $detail_tripchecknot->pretripcheck_id = $ptchariini->id;
            $detail_tripchecknot->checkanswer_id = $ptcsebelumnya->checkanswer_id;
            $detail_tripchecknot->status = 'NOT APPROVED';
            $detail_tripchecknot->approve_sementara = 'No';
            $detail_tripchecknot->days = '1';
            $detail_tripchecknot->appr = 'N';
            $detail_tripchecknot->save();

        }

        return response()->json($detail_tripchecknot);

    }

    public function updateanswer(Request $request)
    {

        $updates = PretripCheckNotOke::leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        ->where('pretrip_check_notoke.id', $request->id)
        ->first();

        $answerss = CheckAnswer::where([
            ['checkdetail_id', '=', $updates->checkdetail_id],
            ['kategori', '=', 'WAJIB']
        ])
        ->get();

        return response()->json($answerss);
    }   

    public function submitupdates(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $harini = date('Y-m-d');
        $time = date("H:i:s");

        $user = Auth::user();
        $user_id = $user->id;

        $userx = Drivers::where('driver_id', $user_id)
        ->first();

        $cekptc = PretripCheckNotOke::where('id', $request->ids)
        ->first();

        $ptchariini = Pretrip_Check::where([
            ['date', '=', $harini],
            ['user_id', '=', $user_id],
        ])
        ->first();

        if(!$ptchariini){

            $pretrip_check = new Pretrip_Check();
            $pretrip_check->user_id= $user_id;
            $pretrip_check->unit_id= $userx->unit_id;
            $pretrip_check->date= $harini;
            $pretrip_check->time= $time;
            $pretrip_check->status= 'NOT SUBMITED';
            $pretrip_check->save();

            if($cekptc->checkanswer_id == $request->answers_now){

                $approveptc = PretripCheckNotOke::where(['id'=>$request->ids])->update(['appr'=>'Y']);

                $detail_tripchecknot = new PretripCheckNotOke();
                $detail_tripchecknot->pretripcheck_id = $pretrip_check->id;
                $detail_tripchecknot->checkanswer_id = $request->answers_now;
                $detail_tripchecknot->status = 'NOT APPROVED';
                $detail_tripchecknot->approve_sementara = 'No';
                $detail_tripchecknot->days = '1';
                $detail_tripchecknot->appr = 'N';
                $detail_tripchecknot->save();

            } else {

                $approveptc = PretripCheckNotOke::where(['id'=>$request->ids])->update(['appr'=>'Y', 'status' => 'UPDATED']);

                $detail_tripchecknot = new PretripCheckNotOke();
                $detail_tripchecknot->pretripcheck_id = $pretrip_check->id;
                $detail_tripchecknot->checkanswer_id = $request->answers_now;
                $detail_tripchecknot->status = 'NOT APPROVED';
                $detail_tripchecknot->approve_sementara = 'No';
                $detail_tripchecknot->days = '1';
                $detail_tripchecknot->appr = 'N';
                $detail_tripchecknot->save();

            }

        } else {

            if($cekptc->checkanswer_id == $request->answers_now){

                $approveptc = PretripCheckNotOke::where(['id'=>$request->ids])->update(['appr'=>'Y']);

                $detail_tripchecknot = new PretripCheckNotOke();
                $detail_tripchecknot->pretripcheck_id = $ptchariini->id;
                $detail_tripchecknot->checkanswer_id = $request->answers_now;
                $detail_tripchecknot->status = 'NOT APPROVED';
                $detail_tripchecknot->approve_sementara = 'No';
                $detail_tripchecknot->days = '1';
                $detail_tripchecknot->appr = 'N';
                $detail_tripchecknot->save();

            } else {

                $approveptc = PretripCheckNotOke::where(['id'=>$request->ids])->update(['appr'=>'Y', 'status' => 'UPDATED', 'checkanswer_id'=>$request->answers_now]);

                $detail_tripchecknot = new PretripCheckNotOke();
                $detail_tripchecknot->pretripcheck_id = $ptchariini->id;
                $detail_tripchecknot->checkanswer_id = $request->answers_now;
                $detail_tripchecknot->status = 'NOT APPROVED';
                $detail_tripchecknot->approve_sementara = 'No';
                $detail_tripchecknot->days = '1';
                $detail_tripchecknot->appr = 'N';
                $detail_tripchecknot->save();

            }

        }

        return response()->json($detail_tripchecknot);

    }

    public function ptcnotif(Request $request)
    {   
        $user = Auth::user();

        if($request->role == '5'){

            $drivers = Drivers::select("users.*")
            ->leftJoin("users", "drivers.korlap_id", "=", "users.id")
            ->where("driver_id", $user->id)
            ->first();

        } else if($request->role == '6'){

            $drivers = Drivers::select("users.*")
            ->leftJoin("users", "drivers.asmen_id", "=", "users.id")
            ->where("driver_id", $user->id)
            ->first();

        } else {

            $drivers = Drivers::select("users.*")
            ->leftJoin("users", "drivers.manager_id", "=", "users.id")
            ->where("driver_id", $user->id)
            ->first();

        }

        $arrayNames = array(    
            'driver' => $user->first_name,
            'fcm' => $drivers->fcm_token,
        );

        return response()->json($arrayNames);

    }

}
