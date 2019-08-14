<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');

    	return view('content.home.client.index', compact('date'));

    }
}
