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

	        ['M. Zaenuri','022237','081210215220','Toyota','Fortuner','2017','B 1406 SJT','2022-09-07','','IRWAN PRIYASA','VP PROJECT LEGAL'],
			['Tugiman','022460','081932920777','Toyota','Camry','2019','B 1442 SAQ','2025-01-16','','SUWAHYANTO','SVP PROJECT EXECUTION / MP2'],
			['Galuh Setya Budi','022811','087877023165','Toyota','Fortuner','2019','B 2896 SJA','2024-10-19','','HERAGUNG UJIANTORO','VP UPSTREAM PERFORMANCE EVALUATION'],
			['Nanang Kuswanto','020005','082113999001','Toyota','Fortuner','2019','B 2074 SJA','2024-10-19','','FERIYANI','VP REFINING BUSINESS DEVELOPMENT'],
			['Ahmad Rizmi','023729','085715301814','Toyota','Fortuner','2017','B 1410 SJT','2024-11-11','','','VP SHIPPING OPERATION'],
			['Amiruddin','023684','','Toyota','Fortuner','2017','B 1669 SJT','2022-10-02','2022-04-27','','VP Corporate Business Initiative Management'],
			['Deni Kuswanto','021800','','Toyota','Innova','2019','B 2558 SIT','2024-11-21','','','Sr. Account Manager Bitumen Industry'],
			['Eko Maryanto','023720','','Toyota','Innova','2019','B 2117 SIR','2024-11-01','2020-12-10','','RTC'],
			['Hardiansyah','023662','089502196303','Toyota','Fortuner','2019','B 2906 SJA','2024-10-19','2021-01-05','','VP Project Leader Rokam Hulu'],
			['Kristianto','023723','','Toyota','Fortuner','2017','B 1395 SJT','2022-09-07','2023-12-25','','VP STAKEHOLDER RELATIONS'],
			['Muhsinudin','020775','085282400469','Toyota','Innova','2019','B 2187 SIR','2024-11-01','','','Account Manager Chemical Industry II'],
			['Muslim','023602','081286258870','Toyota','Innova','2019','B 2926 SIQ','2024-11-02','2024-10-25','','Board Support'],
			['Nurdin','023632','081298408835','Toyota','Fortuner','2019','B 2928 SJA','2024-10-19','','','CEO Advisor Office'],
			['Parining Sabdo','023717','081314403552','Toyota','Fortuner','2019','B 2909 SJA','2024-10-17','2024-11-21','','VP URT'],
			['Rianto Aftur Sobirin','023359','081285737499','Toyota','Alphard','2016','B 2209 SOJ','','2023-11-16','',''],
			['Siswanto 2','023730','','Mercedez ','Benz','2017','B 1827 SAO','2023-02-24','','','Dir Keuangan'],
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
			$namauser = $data[9];
			$jabatan = $data[10];
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
                ->update(['driver_type'=>'1']);

		    }

			$drivers = Users::where("username",$nik)
			->first();

			$unitss = Units::where("no_police",$noplat)
			->first();

			$client = Users::where("username",$noplatspasi)
			->first();

			$adadriverss = Drivers::where("driver_id",$drivers->id)
			->first();

			if(!$adadriverss){

				$drive = new Drivers();
		        $drive->driver_id = $drivers->id;
		        $drive->unit_id = $unitss->id;
		        $drive->korlap_id = '419';
		        $drive->user_id = $client->id;
		        $drive->asmen_id = '90';
		        $drive->manager_id = '91';
		        $drive->save();

			} else {

				$driverz = Drivers::where(['id'=>$adadriverss->id])
                ->update(['driver_id'=>$drivers->id, 'unit_id'=>$unitss->id, 'korlap_id'=>'419', 'user_id' => $client->id]);

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
