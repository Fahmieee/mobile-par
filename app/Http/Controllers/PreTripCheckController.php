<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CheckType;
use App\CheckDetail;

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

}
