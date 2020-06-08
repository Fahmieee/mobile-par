<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clocks;
use App\Pretrip_Check;
use App\MedicalCheckup;
use App\Perdin;
use Auth;
use DataTables;
use DB;
use Validator;
use Image;

class HistoryController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('d M Y');

    	return view('content.history.index', compact('date'));

    }

    public function gets(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        $user = Auth::user();

        $gethistory = Clocks::select("clocks.*", DB::raw('DATE_FORMAT(clocks.clockin_date, "%d %b %Y") as date'))
        ->where([
            ['user_id', '=', $user->id],
            ['clockout_time', '!=', null],
        ])
        ->get();

        return Datatables::of($gethistory)->make(true);
    }

    public function detail(Request $request)
    {   
        $user = Auth::user();

    	$getclocks = Clocks::select("clocks.*","perdin.doc")
        ->leftJoin("perdin", "clocks.id", "=", "perdin.clock_id")
        ->where('clocks.id', '=', $request->id)
        ->first();

        $tripcheck = Pretrip_Check::select("time")
        ->where([
            ['user_id', '=', $user->id],
            ['date', '=', $getclocks->clockin_date],
        ])
        ->first();

        $getdcu = MedicalCheckup::select("time")
        ->where([
            ['user_id', '=', $user->id],
            ['date', '=', $getclocks->clockin_date],
        ])
        ->first();

        if ($getclocks->clockin_actual == null){

            $awal  = strtotime($getclocks->clockin_date.' '.$getclocks->clockin_time);

        } else {

            $awal  = strtotime($getclocks->clockin_date.' '.$getclocks->clockin_actual);

        }

        if ($getclocks->clockout_actual == null){

            $akhir = strtotime($getclocks->clockout_date.' '.$getclocks->clockout_time);

        } else {

            $akhir = strtotime($getclocks->clockoutdate_actual.' '.$getclocks->clockout_actual);

        }
        
		 //waktu akhir
		$diff  = $akhir - $awal;
		$jam   = floor($diff / (60 * 60));
		$menit = $diff - $jam * (60 * 60);

		$total_waktu = $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit';

        $totaljarak = $getclocks->clockout_km - $getclocks->clockin_km;

        $arrayNames = array(    
            'clockin_time' => $getclocks->clockin_time, 
            'perdin' => $getclocks->perdin,
            'doc' => $getclocks->doc,
            'clockout_time' => $getclocks->clockout_time,
            'clockin_date' => $getclocks->clockin_date, 
            'clockout_date' => $getclocks->clockout_date,
            'clockin_jarak' => $getclocks->clockin_km,
            'clockout_jarak' => $getclocks->clockout_km,
            'clockin_actual' => $getclocks->clockin_actual,
            'clockout_actual' => $getclocks->clockout_actual,
            'pretripcheck' => $tripcheck ? $tripcheck->time : '-', 
            'total_jarak' => $totaljarak,
            'total_waktu' => $total_waktu,
            'dcu' => $getdcu ? $getdcu->time : '-',
        );

        return response()->json($arrayNames);

    }

    public function updatekilometer(Request $request)
    {
        $user = Auth::user();

        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        $updates = Clocks::where(['id'=>$request->id])
        ->update(['clockin_km'=>$request->awal, 'clockout_km'=>$request->akhir]);

        return response()->json($updates);

    }

    public function updateperdin(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $updates = Clocks::where(['id'=>$request->perdin])
        ->update(['perdin'=>'yes']);

        return response()->json($updates);

    }

    public function uploadperdin(Request $request)
    {   
        date_default_timezone_set('Asia/Jakarta');

        $validation = Validator::make($request->all(), [
            'file' => 'mimes:jpeg,bmp,png,svg,pdf',
        ]);

        if($validation->passes()) {

            $image = $request->file('file');
            $input['imagename'] = rand() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('assets/img_spd');

            $img = Image::make($image->getRealPath());
            $img->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);


            $clock = new Perdin();
            $clock->clock_id = $request->id;
            $clock->doc = $input['imagename'];
            $clock->save();

            return response()->json([
                'message'  => 'Upload Anda Tersimpan',
                'icon' => 'success',
                'name' => $input['imagename'],
                'status' => '1',
            ]);

        } else {

            return response()->json([
                'message' => $validation->errors()->all(),
                'icon' => 'error',
                'status' => '0',
            ]);
        }

    }

    public function cekperdin(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $adaperdin = Perdin::where('clock_id', $request->id)
        ->first();

        if($adaperdin){

            return response()->json([
                'name' => $adaperdin->doc,
                'status' => '1',
            ]);

        } else {

            return response()->json([
                'status' => '0',
            ]);

        }

    }

    public function hapusperdin(Request $request)
    {

        $hapusperdin = Perdin::where('clock_id', $request->id)
        ->delete();

        return response()->json($hapusperdin);

    }

    public function editperdin(Request $request)
    {   
        date_default_timezone_set('Asia/Jakarta');

        $validation = Validator::make($request->all(), [
            'file' => 'mimes:jpeg,bmp,png,svg,pdf',
        ]);

        if($validation->passes()) {

            $image = $request->file('file');
            $input['imagename'] = rand() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('assets/img_spd');

            $img = Image::make($image->getRealPath());
            $img->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $updates = Perdin::where(['clock_id'=>$request->id])
            ->update(['doc'=>$input['imagename']]);

            return response()->json([
                'message'  => 'Upload Anda Tersimpan',
                'icon' => 'success',
                'name' => $input['imagename'],
                'status' => '1',
            ]);

        } else {

            return response()->json([
                'message' => $validation->errors()->all(),
                'icon' => 'error',
                'status' => '0',
            ]);
        }

    }

}
