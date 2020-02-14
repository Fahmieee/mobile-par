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

class ImportController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Jakarta');

    	$rows = [

	        ['Dadan Hidayat','023407','081905479009','Toyota','Innova','2019','B 2119 SIR','2024-11-01','2021-08-09'],
			['Harjito','023479','087836145608','Toyota','Innova','2019','B 2199 SIT','2024-11-13','2023-10-10'],
			['Kiki Wahyudi','023664','','Toyota','Innova','2019','B 2113 SIR','2024-11-01',''],
			['Mamad','023475','081280108579','Toyota','Innova','2019','B 2806 SIQ','2024-11-01','2023-10-11'],
			['Priyanto','023663','082211225880','Toyota','Innova','2019','B 2318 SIT','2024-11-18','2024-10-25'],
			['Saripan','023603','081296325004','Isuzu','Elf NHR','2017','B 7841 SDA','2022-10-05','2020-02-07'],
		];

		foreach ($rows as $data) {

			$nama = $data[0];
			$nik = $data[1];
			$merk = $data[3];
			$mes = '2400 cc';
			$model = $data[4];
			$transmisi = 'A/T';
			$noplat = $data[6];
			$masaasuransi = '';
			$masakeur = '';
			$masastnk = $data[7];
			$jenissim = '';
			$masasim = $data[8];
			$namauser = '';
			$jabatan = '';
			$tahun = $data[5];

			$varian = '';

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
                ->update(['driver_type'=>'2']);

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

		}

		return view('import.index', compact('rows'));

    }
}
