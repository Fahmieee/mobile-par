<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Pretrip_Check;
use App\PretripCheckNotOke;
use App\Drivers;
use Auth;

class AsmenController extends Controller
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

        $getptchighs = PretripCheckNotOke::Select('users.first_name','check_answer.parameter','check_answer.level','check_detail.name','units.no_police','pretrip_check_notoke.approve_sementara', 'pretrip_check_notoke.checkanswer_id','pretrip_check.user_id')
        ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
        ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
        ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
        ->leftJoin("check_types", "check_detail.checktype_id", "=", "check_types.id")
        ->leftJoin("drivers", "pretrip_check.user_id", "=", "drivers.driver_id")
        ->leftJoin("units", "pretrip_check.unit_id", "=", "units.id")
         ->leftJoin("users", "pretrip_check.user_id", "=", "users.id")
        ->where([
                ['drivers.asmen_id', '=', $user->id],
                ['level', '=', 'HIGH'],
                ['pretrip_check.status', '=', 'SUBMITED'],
                ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
                ['check_detail.approve_role_id', '=', '6'],
            ])
        ->orWhere('pretrip_check_notoke.status','APPROVED SEMENTARA')
        ->orderBy('pretrip_check.id', 'desc')
        ->groupBy('users.first_name','check_answer.parameter','check_answer.level','check_detail.name','units.no_police','pretrip_check_notoke.approve_sementara', 'pretrip_check_notoke.checkanswer_id', 'pretrip_check.user_id')
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
                ['drivers.asmen_id', '=', $user->id],
                ['level', '=', 'MEDIUM'],
                ['pretrip_check.status', '=', 'SUBMITED'],
                ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
                ['check_detail.approve_role_id', '=', '6'],
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
                ['drivers.asmen_id', '=', $user->id],
                ['level', '=', 'LOW'],
                ['pretrip_check.status', '=', 'SUBMITED'],
                ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
                ['check_detail.approve_role_id', '=', '6'],
            ])
        ->orWhere('pretrip_check_notoke.status','APPROVED SEMENTARA')
        ->orderBy('pretrip_check.id', 'desc')
        ->groupBy('users.first_name','check_answer.parameter','check_answer.level','check_detail.name','units.no_police','pretrip_check_notoke.approve_sementara', 'pretrip_check_notoke.checkanswer_id', 'pretrip_check.user_id')
        ->get();

    	return view('content.home.asmen.index', compact('date','getkorlaps','getptchighs','getptcmediums','getptclows'));

    }

}
