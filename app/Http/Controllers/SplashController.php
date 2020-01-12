<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use Auth;

class SplashController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('d M Y');

    	$user = Auth::user();

    	$roles = Role::where("user_id", $user->id)
    	->first();

    	return view('splash.index', compact('date','roles'));

    }
}
