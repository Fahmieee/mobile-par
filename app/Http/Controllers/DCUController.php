<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MedicalCheckup;
use Auth;
use DataTables;
use DB;

class DCUController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');

        $user = Auth::user();

        $getdcus = MedicalCheckup::where('user_id', $user->id)
        ->orderBy('id', 'desc')
        ->get();

    	return view('content.dcu.index', compact('date','getdcus'));

    }

    public function get(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        $user = Auth::user();

        $getdcu = MedicalCheckup::select("medical_checkup.*", DB::raw('DATE_FORMAT(medical_checkup.date, "%d %b %Y") as dates'))
        ->where('user_id', $user->id)
        ->orderBy('id', 'desc')
        ->get();

        return Datatables::of($getdcu)->make(true);
    }
}
