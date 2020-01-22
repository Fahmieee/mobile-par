<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Role;
use Hash;
use Auth;
use Validator;

class ProfileController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');

        $user = Auth::user();

        $views = Users::select("wilayah.wilayah_name", "unit_kerja.unitkerja_name")
        ->leftJoin("wilayah", "users.wilayah_id", "=", "wilayah.id")
        ->leftJoin("unit_kerja", "wilayah.unitkerja_id", "=", "unit_kerja.id")
        ->where('users.id', $user->id)
        ->first();

    	return view('content.profile.index', compact('date','views'));

    }

    public function getdata(Request $request)
    {

    	$getprof = Users::leftJoin("users_roles", "users.id", "=", "users_roles.user_id")
        ->where("users.id", $request->user_id)
        ->first();

    	return response()->json($getprof);

    }

    public function store(Request $request)
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d H:i:s');

    	$profile = Users::findOrFail($request->user_id);
        $profile->username = $request->username;
        $profile->email = $request->email;
        $profile->address = $request->alamat;
        $profile->phone = $request->no_hp;
        $profile->flag_prof = '1';
        $profile->save();

        $role = Role::select('role.id')
        ->leftJoin("role", "users_roles.role_id", "=", "role.id")
        ->where('user_id',$request->user_id)
        ->first();

        $arrayNames = array(    
            'sebagai' => $role->id
        );

        return response()->json($arrayNames);

    }

    public function ubahpassword()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d');

    	return view('content.ganti_password.index', compact('date'));

    }

    public function updatepass(Request $request)
    {

    	$pass = Users::findOrFail($request->user_id);
        $pass->password = Hash::make($request->password);
        $pass->flag_pass = '1';
        $pass->save();

        $role = Role::select('role.id')
        ->leftJoin("role", "users_roles.role_id", "=", "role.id")
        ->where('user_id',$request->user_id)
        ->first();

        $users = Users::where('id', $request->user_id)
        ->first();

        $arrayNames = array(
            'sebagai' => $role->id,
            'flag_prof' => $users->flag_prof
        );

        return response()->json($arrayNames);

    }

    public function role(Request $request)
    {
    	$role = Role::select('role.id')
        ->leftJoin("role", "users_roles.role_id", "=", "role.id")
        ->where('user_id',$request->user_id)
        ->first();

        $arrayNames = array(    
            'sebagai' => $role->id
        );

        return response()->json($arrayNames);

    }

    public function gantiphoto(Request $request)
    {   
        date_default_timezone_set('Asia/Jakarta');
        $hari = date('Y-m-d');
        $time = date("H:i:s");

        $validation = Validator::make($request->all(), [
        'file1' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);

        if($validation->passes()) {

            $image = $request->file('file1');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();


            $unitkms = Users::where(['id'=>$request->user_id])
            ->update(['photo'=>$new_name]);

            $image->move(public_path('/assets/profile_photo'), $new_name);

            return response()->json([
                'message'   => 'success',
            ]);

        } else {

            return response()->json([                                                                                                                    
            'message'   => $validation->errors()->all(),

            ]);
        }

    }

    public function gettoken(Request $request)
    { 

        $clocks = Users::where(['id'=>$request->user_id])
        ->update(['fcm_token'=>$request->fcmtoken]);

        $arrayNames = array(    
            'actions' => 'Berhasil'
        );

        return response()->json($arrayNames);

    }
}
