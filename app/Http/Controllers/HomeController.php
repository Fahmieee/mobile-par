<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Drivers;
use App\Units;
use App\UnitDrivers;
use App\Role;
use App\Lembur;
use App\DocDriver;
use App\DocUnit;
use App\Trainings;
use App\Clocks;
use App\Driving;
use App\MedicalCheckup;
use App\PretripCheckNotOke;
use App\AttendanceStatuses;
use App\Attendances;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');

        $user = Auth::user();

        $roles = Role::select('role_id')
        ->where('user_id', $user->id)
        ->first();

        if($roles->role_id == '2'){

        	$getdrivers = Users::where('users.id', $user->id)
	        ->first();

	        $getsim = DocDriver::where([
	                ['user_id', '=', $user->id],
	                ['document_id', '=', '1'],
	            ])
	        ->first();

	        $getmcu = DocDriver::where([
	                ['user_id', '=', $user->id],
	                ['document_id', '=', '2'],
	            ])
	        ->first();

	        $get = Drivers::where('driver_id', $user->id)
	        ->first();

	        $getusers = Users::leftJoin("jabatan", "users.jabatan_id", "=", "jabatan.id")
	        ->leftJoin("wilayah", "users.wilayah_id", "=", "wilayah.id")
	        ->leftJoin("unit_kerja", "wilayah.unitkerja_id", "=", "unit_kerja.id")
	        ->leftJoin("company", "users.company_id", "=", "company.id")
	        ->where('users.id', $get->user_id)
	        ->first();

	        $getunits = Units::where('id', $get->unit_id)
	        ->first();

	        $getasuransi = DocUnit::where([
	                ['unit_id', '=', $get->unit_id],
	                ['document_id', '=', '3'],
	            ])
	        ->first();

	        $getkeur= DocUnit::where([
	                ['unit_id', '=', $get->unit_id],
	                ['document_id', '=', '4'],
	            ])
	        ->first();

	        $getkorlaps = Users::where('id', $get->korlap_id)
	        ->first();

	        $getperdin = Clocks::where([
	                ['user_id', '=', $user->id],
	                ['perdin', '=', 'yes'],
	            ])
	        ->get();

	        $gettrainings = Trainings::all();

	        $statuses = AttendanceStatuses::where([
                ['id', '!=', '1'],
                ['id', '!=', '5'],
            ])
            ->get();

            $adaizin = Attendances::leftJoin("attendance_statuses", "attendances.status_id", "=", "attendance_statuses.id")
            ->where([
                ['date_in', '=', $date],
                ['driver_id', '=', $user->id],
            ])
            ->first();

	        $cekclockin = Clocks::where([
                ['user_id', '=', $user->id],
        	])
        	->orderBy('id', 'desc')
	        ->first();

	        $getunitdrives = UnitDrivers::select("units.*")
	        ->leftJoin("units", "unit_drivers.unit_id", "=", "units.id")
	        ->where("unit_drivers.user_id", $user->id)
	        ->get();

	        if($cekclockin){

	        	$getdriving = Driving::leftJoin("clocks", "driving.clock_id", "=", "clocks.id")
		        ->where("clock_id", $cekclockin->id)
		        ->orderBy("driving.id", "desc")
		        ->first();

	        } else {

	        	$getdriving = Clocks::where([
	                ['user_id', '=', $user->id],
	        	])
	        	->first();

	        }

	        

	    	return view('content.home.index', compact('date','getdrivers','getusers','getunits','getkorlaps','getsim','getmcu','getasuransi','getkeur','gettrainings','getperdin','roles','getunitdrives','get','cekclockin','getdriving','statuses','adaizin'));

        } else if($roles->role_id == '3'){

        	$getusers = Users::leftJoin("jabatan", "users.jabatan_id", "=", "jabatan.id")
	        ->leftJoin("wilayah", "users.wilayah_id", "=", "wilayah.id")
	        ->leftJoin("unit_kerja", "wilayah.unitkerja_id", "=", "unit_kerja.id")
	        ->leftJoin("company", "users.company_id", "=", "company.id")
	        ->where('users.id', $user->id)
	        ->first();

	        $gettrainings = Trainings::all();

	        $get = Drivers::where('user_id', $user->id)
	        ->first();

	        $getdrivers = Users::where('users.id', $get->driver_id)
	        ->first();

	        $getsim = DocDriver::where([
	                ['user_id', '=', $get->driver_id],
	                ['document_id', '=', '1'],
	            ])
	        ->first();

	        $getmcu = DocDriver::where([
	                ['user_id', '=', $get->driver_id],
	                ['document_id', '=', '2'],
	            ])
	        ->first();

	        $getunits = Units::where('id', $get->unit_id)
	        ->first();

	        $getstnk = DocUnit::where([
	                ['unit_id', '=', $get->unit_id],
	                ['document_id', '=', '5'],
	            ])
	        ->first();

	        $getdcu = MedicalCheckup::leftJoin("drivers", "medical_checkup.user_id", "=", "drivers.driver_id")
	        ->where([
	                ['drivers.user_id', '=', $user->id],
	                ['medical_checkup.date', '=', $date],
	            ])
	        ->count();

	    	return view('content.home.index', compact('date','getusers','gettrainings','getdrivers','getsim','getmcu','getunits','getstnk','getdcu','roles'));

        } else if($roles->role_id == '5'){

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

	    	return view('content.home.index', compact('date','getkorlaps','getptchighs','getptcmediums','getptclows','roles'));

        } else if($roles->role_id == '6'){

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

	    	return view('content.home.index', compact('date','getkorlaps','getptchighs','getptcmediums','getptclows','roles'));

        } else {

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
	                ['drivers.manager_id', '=', $user->id],
	                ['level', '=', 'HIGH'],
	                ['pretrip_check.status', '=', 'SUBMITED'],
	                ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
	                ['check_detail.approve_role_id', '=', '7'],
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
	                ['drivers.manager_id', '=', $user->id],
	                ['level', '=', 'MEDIUM'],
	                ['pretrip_check.status', '=', 'SUBMITED'],
	                ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
	                ['check_detail.approve_role_id', '=', '7'],
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
	                ['drivers.manager_id', '=', $user->id],
	                ['level', '=', 'LOW'],
	                ['pretrip_check.status', '=', 'SUBMITED'],
	                ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
	                ['check_detail.approve_role_id', '=', '7'],
	            ])
	        ->orWhere('pretrip_check_notoke.status','APPROVED SEMENTARA')
	        ->orderBy('pretrip_check.id', 'desc')
	        ->groupBy('users.first_name','check_answer.parameter','check_answer.level','check_detail.name','units.no_police','pretrip_check_notoke.approve_sementara', 'pretrip_check_notoke.checkanswer_id', 'pretrip_check.user_id')
	        ->get();

	    	return view('content.home.index', compact('date','getkorlaps','getptchighs','getptcmediums','getptclows','roles'));

        }

        

    }
}
