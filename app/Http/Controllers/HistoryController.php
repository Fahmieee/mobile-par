<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {

    	$date = date('Y-m-d');

    	return view('content.history.index', compact('date'));

    }
}
