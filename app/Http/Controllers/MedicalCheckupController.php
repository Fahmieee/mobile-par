<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MedicalCheckup;
use App\Koordinat;
use App\Clocks;
use App\Users;
use App\Drivers;
// use Image;
use Validator;

class MedicalCheckupController extends Controller
{
    public function create(Request $request)
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
            // $input['imagename'] = rand() . '.' . $image->getClientOriginalExtension();

            $darah = $request->darah1.'/'.$request->darah2;

            if ($request->suhuhasil == '3'){

                if ($request->tekananhasil == '3' || $request->tekananhasil == '4'){

                    $hasil = '3';

                } else {

                    $hasil = '2';

                } 

            } else {

                if ($request->tekananhasil == '1'){

                    $hasil = '1';

                }  else {

                    $hasil = '2';

                }

            }


            $checkup = new MedicalCheckup();
            $checkup->date = $hari;
            $checkup->user_id = $request->created_add;
            $checkup->time = $time;
            $checkup->suhu = $request->suhu;
            $checkup->darah = $darah;
            $checkup->img = $new_name;
            $checkup->hasil = $hasil;
            $checkup->save();

            $users = Users::select("first_name","korlap_id")
            ->join("drivers", "users.id", "=", "drivers.driver_id")
            ->where("users.id", $request->created_add)
            ->first();

            $userdriver = Users::select("fcm_token")
            ->where("id", $users->korlap_id)
            ->first();

            // $destinationPath = public_path('assets/img_dcu');

            // $img = Image::make($image->getRealPath());
            // $img->resize(200, 200, function ($constraint) {
            //     $constraint->aspectRatio();
            // })->save($destinationPath.'/'.$input['imagename']);

            $image->move(public_path('assets/img_dcu'), $new_name);

            return response()->json([
                'message'   => 'success',
                'dcu_id'   => $checkup->id,
                'hasil' => $hasil,
                'name' => $users->first_name,
                'fcm' => $userdriver->fcm_token,
            ]);

        } else {

            return response()->json([                                                                                                                    
            'message'   => $validation->errors()->all(),
            ]);
        }

    }

    public function validasi(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
    	$harini = date('Y-m-d');
        $kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));

        $validatekemarin = Clocks::where([
            ['user_id', '=', $request->user_id],
            ['clockin_date', '=', $kemarin],
            ['clockout_time', '=', null],
        ])
        ->first();

        if (!$validatekemarin){

            $validate = MedicalCheckup::where([
                ['user_id', '=', $request->user_id],
                ['date', '=', $harini],
            ])
            ->get();

        } else {

            $validate = MedicalCheckup::where([
                ['user_id', '=', $request->user_id],
                ['date', '=', $kemarin],
            ])
            ->get();

        }

        return response()->json($validate);
    }

    public function koordinat(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $koordinat = new Koordinat();
        $koordinat->action_id = $request->dcu_id;
        $koordinat->type = $request->type;
        $koordinat->long = $request->long;
        $koordinat->lat = $request->lat;
        $koordinat->save();

        return response()->json($koordinat);

    }

}
