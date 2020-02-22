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

	        ['Dede Fahrurozi','020391','081219229447','Toyota','Innova','G Gasoline','2019','B 2159 SIR',''],
			['Riyan Saeputra','021881','081370181227','Toyota','Innova','G Gasoline','2019','B 2125 SIR','2024-11-01'],
			['Ayanil','020672','0817876928','Toyota','Innova','G Gasoline','2019','B 2173 SIR',''],
			['Wahyu Fadilah','020392','08121845948','Toyota','New Innova','G','2019','B 2808 SIQ','2024-11-01'],
			['Ahmad Fuad','020399','081219229447','Toyota','New Innova','G','2019','B 2125 SIR','2024-11-01'],
			['Dadang','020401','085719488191','Toyota','New Innova','G','2019','B 2159 SIR','2024-11-01'],
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
			$namauser = '';
			$jabatan = '';
			$tahun = $data[6];

			$varian = $data[5];

			$noplatspasi = str_replace(' ', '', $noplat);

			$adaunit = Units::where("no_police",$noplat)
			->first();

			// $adajabatan = Jabatan::where("jabatan_name",$jabatan)
			// ->first();

			// if(!$adajabatan){

	  //       	$jabatans = new Jabatan();
		 //        $jabatans->jabatan_name = $jabatan;
		 //        $jabatans->save();
		        
	  //       }

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
		        $userdrivers->driver_type = '2';
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

			$unitss = Units::where("no_police",$noplat)
			->first();

			$adadriverss = Drivers::where("driver_id",$drivers->id)
			->first();

			if(!$adadriverss){

				$drive = new Drivers();
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
