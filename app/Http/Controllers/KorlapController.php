<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Pretrip_Check;
use App\PretripCheckNotOke;
use App\Drivers;
use App\MedicalCheckup;
use Auth;

class KorlapController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');

        $user = Auth::user();

        $getkorlaps = Users::leftJoin("jabatan", "users.jabatan_id", "=", "jabatan.id")
        ->leftJoin("wilayah", "users.wilayah_id", "=", "wilayah.id")
        ->leftJoin("unit_kerja", "wilayah.unitkerja_id", "=", "unit_kerja.id")
        ->where('users.id', $user->id)
        ->first();

        $getptchighs = PretripCheckNotOke::Select('users.first_name','check_answer.parameter','check_answer.level','check_detail.name','units.no_police','pretrip_check_notoke.approve_sementara', 'pretrip_check_notoke.checkanswer_id','pretrip_check.user_id','check_detail.approve_role_id')
        ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
        ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        ->leftJoin("check_types", "check_detail.checktype_id", "=", "check_types.id")
        ->leftJoin("drivers", "pretrip_check.user_id", "=", "drivers.driver_id")
        ->leftJoin("units", "pretrip_check.unit_id", "=", "units.id")
         ->leftJoin("users", "pretrip_check.user_id", "=", "users.id")
        ->where([
                ['drivers.korlap_id', '=', $user->id],
                ['level', '=', 'HIGH'],
                ['pretrip_check.status', '=', 'SUBMITED'],
                ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
                
            ])
        ->orWhere('pretrip_check_notoke.status','APPROVED SEMENTARA')
        ->orderBy('pretrip_check.id', 'desc')
        ->groupBy('users.first_name','check_answer.parameter','check_answer.level','check_detail.name','units.no_police','pretrip_check_notoke.approve_sementara', 'pretrip_check_notoke.checkanswer_id', 'pretrip_check.user_id','check_detail.approve_role_id')
        ->get();

        $getptcmediums = PretripCheckNotOke::Select('users.first_name','check_answer.parameter','check_answer.level','check_detail.name','units.no_police','pretrip_check_notoke.approve_sementara', 'pretrip_check_notoke.checkanswer_id','pretrip_check.user_id')
        ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
        ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        ->leftJoin("check_types", "check_detail.checktype_id", "=", "check_types.id")
        ->leftJoin("drivers", "pretrip_check.user_id", "=", "drivers.driver_id")
        ->leftJoin("units", "pretrip_check.unit_id", "=", "units.id")
         ->leftJoin("users", "pretrip_check.user_id", "=", "users.id")
        ->where([
                ['drivers.korlap_id', '=', $user->id],
                ['level', '=', 'MEDIUM'],
                ['pretrip_check.status', '=', 'SUBMITED'],
                ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
                ['check_detail.approve_role_id', '=', '5'],
            ])
        ->orWhere('pretrip_check_notoke.status','APPROVED SEMENTARA')
        ->orderBy('pretrip_check.id', 'desc')
        ->groupBy('users.first_name','check_answer.parameter','check_answer.level','check_detail.name','units.no_police','pretrip_check_notoke.approve_sementara', 'pretrip_check_notoke.checkanswer_id', 'pretrip_check.user_id')
        ->get();

        $getptclows = PretripCheckNotOke::Select('users.first_name','check_answer.parameter','check_answer.level','check_detail.name','units.no_police','pretrip_check_notoke.approve_sementara', 'pretrip_check_notoke.checkanswer_id','pretrip_check.user_id')
        ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
        ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        ->leftJoin("check_types", "check_detail.checktype_id", "=", "check_types.id")
        ->leftJoin("drivers", "pretrip_check.user_id", "=", "drivers.driver_id")
        ->leftJoin("units", "pretrip_check.unit_id", "=", "units.id")
         ->leftJoin("users", "pretrip_check.user_id", "=", "users.id")
        ->where([
                ['drivers.korlap_id', '=', $user->id],
                ['level', '=', 'LOW'],
                ['pretrip_check.status', '=', 'SUBMITED'],
                ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
                ['check_detail.approve_role_id', '=', '5'],
            ])
        ->orWhere('pretrip_check_notoke.status','APPROVED SEMENTARA')
        ->orderBy('pretrip_check.id', 'desc')
        ->groupBy('users.first_name','check_answer.parameter','check_answer.level','check_detail.name','units.no_police','pretrip_check_notoke.approve_sementara', 'pretrip_check_notoke.checkanswer_id', 'pretrip_check.user_id')
        ->get();

    	return view('content.home.korlap.index', compact('date','getkorlaps','getptchighs','getptcmediums','getptclows'));

    }

    public function getptchigh(Request $request)
    {
           
        // $getptc = PretripCheckNotOke::Select('users.first_name','users.last_name','check_detail.name as detail_name','check_answer.parameter','check_answer.level','check_types.name as type_name', 'pretrip_check.date','pretrip_check_notoke.id','units.no_police','pretrip_check_notoke.approve_sementara','pretrip_check_notoke.days')
        // ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
        // ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        // ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        // ->leftJoin("check_types", "check_detail.checktype_id", "=", "check_types.id")
        // ->leftJoin("drivers", "pretrip_check.user_id", "=", "drivers.driver_id")
        // ->leftJoin("units", "pretrip_check.unit_id", "=", "units.id")
        //  ->leftJoin("users", "pretrip_check.user_id", "=", "users.id")
        // ->where([
        //         ['drivers.korlap_id', '=', $request->user_id],
        //         ['level', '=', 'HIGH'],
        //         ['pretrip_check.status', '=', 'SUBMITED'],
        //         ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
        //     ])
        // ->orWhere('pretrip_check_notoke.status','APPROVED SEMENTARA')
        // ->orderBy('pretrip_check.id', 'desc')
        // ->get();

        $getptc = PretripCheckNotOke::Select('users.first_name','users.last_name','check_answer.parameter','check_answer.level','check_detail.name','units.no_police','pretrip_check_notoke.approve_sementara','pretrip_check_notoke.days')
        ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
        ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        ->leftJoin("check_types", "check_detail.checktype_id", "=", "check_types.id")
        ->leftJoin("drivers", "pretrip_check.user_id", "=", "drivers.driver_id")
        ->leftJoin("units", "pretrip_check.unit_id", "=", "units.id")
         ->leftJoin("users", "pretrip_check.user_id", "=", "users.id")
        ->where([
                ['drivers.korlap_id', '=', $request->user_id],
                ['level', '=', 'HIGH'],
                ['pretrip_check.status', '=', 'SUBMITED'],
                ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
            ])
        ->orWhere('pretrip_check_notoke.status','APPROVED SEMENTARA')
        ->orderBy('pretrip_check.id', 'desc')
        ->groupBy('users.first_name','users.last_name','check_answer.parameter','check_answer.level','check_detail.name','units.no_police','pretrip_check_notoke.approve_sementara','pretrip_check_notoke.days')
        ->get();

        return response()->json($getptc);

    }

    public function getptcmedium(Request $request)
    {
           
        $getptcmedium = PretripCheckNotOke::Select('users.first_name','users.last_name','check_detail.name as detail_name','check_answer.parameter','check_answer.level','check_types.name as type_name', 'pretrip_check.date','pretrip_check_notoke.id','units.no_police','pretrip_check_notoke.approve_sementara','pretrip_check_notoke.days')
        ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
        ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        ->leftJoin("check_types", "check_detail.checktype_id", "=", "check_types.id")
        ->leftJoin("drivers", "pretrip_check.user_id", "=", "drivers.driver_id")
        ->leftJoin("units", "pretrip_check.unit_id", "=", "units.id")
         ->leftJoin("users", "pretrip_check.user_id", "=", "users.id")
        ->where([
                ['drivers.korlap_id', '=', $request->user_id],
                ['level', '=', 'MEDIUM'],
                ['pretrip_check.status', '=', 'SUBMITED'],
                ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
            ])
        ->orderBy('pretrip_check.id', 'desc')
        ->get();

        return response()->json($getptcmedium);

    }

    public function getptclow(Request $request)
    {
           
        $getptclow = PretripCheckNotOke::Select('users.first_name','users.last_name','check_detail.name as detail_name','check_answer.parameter','check_answer.level','check_types.name as type_name', 'pretrip_check.date','pretrip_check_notoke.id','units.no_police','pretrip_check_notoke.approve_sementara','pretrip_check_notoke.days')
        ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
        ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        ->leftJoin("check_types", "check_detail.checktype_id", "=", "check_types.id")
        ->leftJoin("drivers", "pretrip_check.user_id", "=", "drivers.driver_id")
        ->leftJoin("units", "pretrip_check.unit_id", "=", "units.id")
         ->leftJoin("users", "pretrip_check.user_id", "=", "users.id")
        ->where([
                ['drivers.korlap_id', '=', $request->user_id],
                ['level', '=', 'LOW'],
                ['pretrip_check.status', '=', 'SUBMITED'],
                ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
            ])
        ->orderBy('pretrip_check.id', 'desc')
        ->get();

        return response()->json($getptclow);

    }

    public function getptcforapprove(Request $request)
    {
        
        date_default_timezone_set('Asia/Jakarta');
           
        $getapproved = PretripCheckNotOke::Select('users.first_name','users.last_name','check_detail.name as detail_name','check_answer.parameter','check_answer.level','check_types.name as type_name', 'pretrip_check.date','pretrip_check_notoke.id','units.no_police','unit_kerja.unitkerja_name', 'wilayah.wilayah_name','pretrip_check_notoke.approve_sementara','pretrip_check_notoke.days','pretrip_check_notoke.checkanswer_id','pretrip_check.user_id')
        ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
        ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        ->leftJoin("check_types", "check_detail.checktype_id", "=", "check_types.id")
        ->leftJoin("units", "pretrip_check.unit_id", "=", "units.id")
        ->leftJoin("users", "pretrip_check.user_id", "=", "users.id")
        ->leftJoin("wilayah", "users.wilayah_id", "=", "wilayah.id")
        ->leftJoin("unit_kerja", "wilayah.unitkerja_id", "=", "unit_kerja.id")
        ->where([
                ['pretrip_check.user_id', '=', $request->user_id],
                ['pretrip_check_notoke.checkanswer_id', '=', $request->checkanswer_id],
            ])
        ->first();

        return response()->json($getapproved);

    }

    public function approveptcnow(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $create = date('Y-m-d H:i:s');

        $user = Auth::user();
        $user_id = $user->id;

        $approvenow = PretripCheckNotOke::
        leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
        ->where([
                ['pretrip_check.user_id', '=', $request->driver_id],
                ['pretrip_check_notoke.checkanswer_id', '=', $request->checkanswer_id],
            ])
        ->update(['pretrip_check_notoke.status'=>'APPROVED','pretrip_check_notoke.appr'=>'Y', 'approved_by'=>$user_id, 'approved_at'=>$create]);

        return response()->json($approvenow);

    }

    public function approveptcsementara(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $create = date('Y-m-d H:i:s');

        $approvesementara = PretripCheckNotOke::where(['id'=>$request->id])
        ->update(['approve_sementara'=>'Yes', 'sementara_by'=>$request->user_id, 'sementara_at'=>$create, 'status'=>'APPROVED SEMENTARA']);

        return response()->json($approvesementara);

    }

    public function getdcusakit(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');
           
        $getsakit = MedicalCheckup::Select('medical_checkup.*','wilayah_name','unitkerja_name','first_name','last_name')      
        ->leftJoin("drivers", "medical_checkup.user_id", "=", "drivers.driver_id")
        ->leftJoin("users", "medical_checkup.user_id", "=", "users.id")
        ->leftJoin("wilayah", "users.wilayah_id", "=", "wilayah.id")
        ->leftJoin("unit_kerja", "wilayah.unitkerja_id", "=", "unit_kerja.id")
        ->where([
                ['drivers.korlap_id', '=', $request->user_id],
                ['hasil', '=', '3'],
                ['date', '=', $date],
            ])
        ->get();

        return response()->json($getsakit);

    }

    public function getdcudetail(Request $request)
    {
        $getdcudet = MedicalCheckup::where("id", $request->id)
        ->first();

        return response()->json($getdcudet);
    }

    public function lihatdriver()
    {
        
        return view('content.lihat_driver.index', compact('date'));

    }

    public function lihatkendaraan()
    {
        
        return view('content.lihat_kendaraan.index', compact('date'));

    }

    public function getnilaidriver(Request $request)
    {
        $getprof = Drivers::join("users", "drivers.driver_id", "=", "users.id")
        ->join("nilai_driver", "drivers.driver_id", "=", "nilai_driver.driver_id")
        ->where("drivers.korlap_id", $request->user_id)
        ->get();

        return response()->json($getprof);
    }
}
