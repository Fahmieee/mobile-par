<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\UserBranch;
use App\Role;
use App\Branch;
use Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginUser(Request $request)
    {

        $userc = Users::select('role_id','flag_pass','flag_prof')
        ->leftJoin("users_roles", "users.id", "=", "users_roles.user_id")
        ->where('users.username', $request->username)
        ->first();

        // Attempt Login for members
        if (Auth::guard('user')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {

            $msg = array(
                'role' => $userc->role_id,
                'status' => 'success',
                'flag_pass' => $userc->flag_pass,
                'flag_prof' => $userc->flag_prof
            );

            return response()->json($msg);

        } else {

            $msg = array(
                'status'  => 'error',
            );

            return response()->json($msg);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();

        return redirect()->guest(route('login.user'));
    }

    public function showLoginForm()
    {

        $branch = Branch::all();

        return view('login.index', compact('branch'));
    }

    public function Coba()
    {

        $password = Hash::make('akupastibisa');
        return($password);

    }

    public function store(Request $request)
    {

        $usernew = new Users();
        $usernew->first_name = $request->nama_depan;
        $usernew->last_name = $request->nama_belakang;
        $usernew->email = $request->email;
        $usernew->phone = $request->no_hp;
        $usernew->company = $request->perusahaan;
        $usernew->address = $request->alamat;
        $usernew->username = $request->username;
        $usernew->password = Hash::make($request->password_confirm);
        $usernew->flag_pass = '1';
        $usernew->flag_prof = '1';
        $usernew->save();


        $branches = new UserBranch();
        $branches->branch_id = $request->branch;
        $branches->user_id = $usernew->id;
        $branches->save();

        $roles = new Role();
        $roles->role_id = '3';
        $roles->user_id = $usernew->id;
        $roles->save();

        return response()->json($usernew);

    }

}
