<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\Users;
use App\Units;
use App\Jabatan;
use App\Drivers;
use App\DocDriver;
use App\DocUnit;
use App\UnitDrivers;

class ImportController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');

    	$rows = [

	        ['Mulyadi','023488','','Toyota','Innova','G','2019','B 2183 SIR','2024-11-01','','Sr. Account Manager Polymer Industry'],
			['M. Zaenuri','022237','081210215220','Toyota','Fortuner','VRZ Diesel','2017','B 1406 SJT','2022-09-07','IRWAN PRIYASA','VP PROJECT LEGAL'],
			['Sutrisno','022426','082249101077','Toyota','Camry','V','2017','B 1209 SAO','','',''],
			['Noval Setya Pramana','020797','087776060932','Toyota','Fortuner','VRZ Diesel','2017','B 1679 SJT','','',''],
			['M Luthfi Yuda','020819','085725870966','Toyota','Fortuner','VRZ Diesel','2017','B 1691 SJT','','',''],
			['Supriyadi','020752','081290806578','Toyota','Fortuner','VRZ Diesel','2019','B 2961 SJA','','',''],
			['Edi Santoso','023676','081285179362','Toyota','Fortuner','VRZ Diesel','2019','B 2881 SJA','','',''],
					];

		foreach ($rows as $data) {

			$nama = $data[0];
			$nik = $data[1];
			$merk = $data[3];
			$mes = '2000 cc';
			$model = $data[4];
			$transmisi = 'A/T';
			$noplat = $data[7];
			$masaasuransi = '';
			$masakeur = '';
			$masastnk = $data[8];
			$jenissim = '';
			$masasim = '';
			$namauser = $data[9];
			$jabatan = $data[10];
			$tahun = $data[6];

			$varian = $data[5];

			$noplatspasi = str_replace(' ', '', $noplat);

			$adaunit = Units::where("no_police",$noplat)
			->first();

			$adajabatan = Jabatan::where("jabatan_name",$jabatan)
			->first();

			if(!$adajabatan){

	        	$jabatans = new Jabatan();
		        $jabatans->jabatan_name = $jabatan;
		        $jabatans->save();
		        
	        }

	        $jabs = Jabatan::where("jabatan_name",$jabatan)
			->first();

			$adaclient = Users::where("username",$noplatspasi)
			->first();

			if(!$adaclient){

		        $userclient = new Users();
		        $userclient->jabatan_id = $jabs->id;
		        $userclient->company_id = '2';
		        $userclient->wilayah_id = '42';
		        $userclient->username = $noplatspasi;
		        $userclient->password = '$2y$10$0Jp/X.QKiELqwUDrg.YghOPFsxRZqDXRu31/sYLupClkXXBmiWGB6';
		        $userclient->first_name = $namauser;
		        $userclient->flag_pass = '0';
		        $userclient->flag_prof = '0';
		        $userclient->save();

		        $roleclients = new Role();
		        $roleclients->user_id = $userclient->id;
		        $roleclients->role_id = '3';
		        $roleclients->save();
		    }

			if(!$adaunit){

				$units = new Units();
				$units->wilayah_id = '42';
		        $units->pemilik = 'PAR';
		        $units->merk = $merk;
		        $units->model = $model;
		        $units->years = $tahun;
		        $units->mes = $mes;
		        $units->transmition = $transmisi;
		        $units->no_police = $noplat;
		        $units->mileage = '0';
		        $units->save();

		    } else {

		    	$clocks = Units::where(['no_police'=>$noplat])
                ->update(['merk'=>$merk, 'model'=>$model, 'years'=>$tahun, 'mes'=> $mes, 'transmition'=> $transmisi]);
		    }


		    $adadrivers = Users::where("username",$nik)
			->first();

			if(!$adadrivers){

			    $userdrivers = new Users();
		        $userdrivers->jabatan_id = '1';
		        $userdrivers->company_id = '1';
		        $userdrivers->wilayah_id = '42';
		        $userdrivers->username = $nik;
		        $userdrivers->password = '$2y$10$0Jp/X.QKiELqwUDrg.YghOPFsxRZqDXRu31/sYLupClkXXBmiWGB6';
		        $userdrivers->first_name = $nama;
		        $userdrivers->driver_type = '1';
		        $userdrivers->nik = $nik;
		        $userdrivers->flag_pass = '0';
		        $userdrivers->flag_prof = '0';
		        $userdrivers->save();

		        $roledrivers = new Role();
		        $roledrivers->user_id = $userdrivers->id;
		        $roledrivers->role_id = '2';
		        $roledrivers->save();

		    } else {

		    	$userdrivers = Users::where(['username'=>$nik])
                ->update(['driver_type'=>'2','first_name'=>$nama, 'password'=>'$2y$10$0Jp/X.QKiELqwUDrg.YghOPFsxRZqDXRu31/sYLupClkXXBmiWGB6', 'flag_pass'=>'0', 'flag_prof'=>'0']);

		    }

			$drivers = Users::where("username",$nik)
			->first();

			$clients = Users::where("username",$noplatspasi)
			->first();

			$unitss = Units::where("no_police",$noplat)
			->first();

			$adadriverss = Drivers::where("driver_id",$drivers->id)
			->first();

			if(!$adadriverss){

				$drive = new Drivers();
				$drive->unit_id = $unitss->id;
				$drive->user_id = $clients->id;
		        $drive->driver_id = $drivers->id;
		        $drive->korlap_id = '168';
		        $drive->asmen_id = '90';
		        $drive->manager_id = '91';
		        $drive->save();

			} else {

				$driverz = Drivers::where(['id'=>$adadriverss->id])
                ->update(['driver_id'=>$drivers->id, 'korlap_id'=>'168']);

			}

			if($masasim != ''){

	        	$adadocsim = DocDriver::where([
	                ['user_id', '=', $drivers->id],
	                ['document_id', '=', '1'],
	            ])
				->first();

				if(!$adadocsim){

					$masa = new DocDriver();
			        $masa->user_id = $drivers->id;
			        $masa->document_id = '1';
			        $masa->exp_date = $masasim;
			        $masa->save();

				}

	        }

	        if($masastnk != ''){

	        	$adadocstnk = DocUnit::where([
	                ['unit_id', '=', $unitss->id],
	                ['document_id', '=', '5'],
	            ])
				->first();

				if(!$adadocstnk){

					$masas = new DocUnit();
			        $masas->unit_id = $unitss->id;
			        $masas->document_id = '5';
			        $masas->exp_date = $masastnk;
			        $masas->save();

				}
	        }

	        if($masaasuransi != ''){

	        	$adadocasuransi = DocUnit::where([
	                ['unit_id', '=', $unitss->id],
	                ['document_id', '=', '3'],
	            ])
				->first();

				if(!$adadocasuransi){

					$masas = new DocUnit();
			        $masas->unit_id = $unitss->id;
			        $masas->document_id = '3';
			        $masas->exp_date = $masaasuransi;
			        $masas->save();

				}
	        }

	        if($masakeur != ''){

	        	$adadockeur = DocUnit::where([
	                ['unit_id', '=', $unitss->id],
	                ['document_id', '=', '4'],
	            ])
				->first();

				if(!$adadockeur){

		        	$masas = new DocUnit();
			        $masas->unit_id = $unitss->id;
			        $masas->document_id = '4';
			        $masas->exp_date = $masakeur;
			        $masas->save();

			    }

	        }

	        $driverada = UnitDrivers::where([
                ['unit_id', '=', $unitss->id],
                ['user_id', '=', $drivers->id],
            ])
            ->first();	

            if(!$driverada){

		        $masas = new UnitDrivers();
		        $masas->unit_id = $unitss->id;
		        $masas->user_id = $drivers->id;
		        $masas->save();

		    }

		}

		return view('import.index', compact('rows'));

    }

    public function tambahan()
    {
    	date_default_timezone_set('Asia/Jakarta');
    	
    	$drivers = Drivers::all();

    	foreach($drivers as $driver){

    		if($driver->unit_id != null){

    			$driverada = UnitDrivers::where([
	                ['unit_id', '=', $driver->unit_id],
	                ['user_id', '=', $driver->driver_id],
	            ])
	            ->first();	

	            if(!$driverada){

	            	$masas = new UnitDrivers();
			        $masas->unit_id = $driver->unit_id;
			        $masas->user_id = $driver->driver_id;
			        $masas->save();
	            }

    		}
    		


    	}

    }
}
