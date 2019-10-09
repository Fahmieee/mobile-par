<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MedicalCheckup;
use App\Drivers;
use Auth;

class MonitoringController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');

        $user = Auth::user();

        $getdcus = MedicalCheckup::select('medical_checkup.date')
        ->leftJoin("drivers", "medical_checkup.user_id", "=", "drivers.driver_id")
        ->where('drivers.korlap_id', $user->id)
        ->groupBy('medical_checkup.date')
        ->orderBy('medical_checkup.date', 'desc')
        ->get();

    	return view('content.monitoring.index', compact('date','getdcus','user'));

    }

    public function detail($id)
    {
    	$user = Auth::user();

    	$details = Drivers::select("users.first_name","users.last_name","wilayah.wilayah_name","unit_kerja.unitkerja_name","users.photo","users.id")
    	->leftJoin("users", "drivers.driver_id", "=", "users.id")
    	->leftJoin("wilayah", "users.wilayah_id", "=", "wilayah.id")
    	->leftJoin("unit_kerja", "wilayah.unitkerja_id", "=", "unit_kerja.id")
    	->where('drivers.korlap_id', $user->id)
    	->get();

    	$dates = $id;

    	return view('content.monitoring.detail', compact('details','dates'));
    }
}
