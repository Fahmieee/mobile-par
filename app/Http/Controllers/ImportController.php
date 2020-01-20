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

	        ['Supianto ','020555','081213089659','Toyota','Kijang Innova (Reborn)','2.0 G','M/T','2018','B 2385 SYC','2020-07-30','2020-07-02','PAK PROBO','SAM BANTEN'],
			['Bambang Suharto','021772','085219603024','Toyota','Kijang Innova (Reborn)','2.0 G','M/T','2018','B 2648 SYB','2021-07-30','2020-06-23','PUSPA','POOL OPS '],
			['Samsul Arifin','021784','08129643353','Toyota','Kijang Innova (Reborn)','2.0 G','M/T','2018','B 2812 SYC','2020-07-30','2020-07-06','PUSPA ','POOL OPS '],
			['Moch Boradji','020721','085310923468','Toyota','Kijang Innova (Reborn)','2.0 G','M/T','2018','B 2971 SYC','2020-07-30','2020-07-06','','MEDICAL'],
			['Dikky Natalius','023506','085846202851','Toyota','Kijang Innova (Reborn)','2.0 G','M/T','2018','B 2968 SYC','2020-07-30','2020-07-06','RINNA MAULINDA','ASMENT, FUNGSI AVIASIH'],
			['Asep Saeful Arifin','022096','081318563144','Toyota','Kijang Innova (Reborn)','2.0 G','M/T','2019','B 2977 SIR','2020-07-30','2020-07-07','',''],
		];

		foreach ($rows as $data) {

			$nama = $data[0];
			$nik = $data[1];
			$notlp = $data[2];
			$merk = $data[3];
			$mes = '2000 cc';
			$model = $data[4];
			$transmisi = $data[6];
			$tahun = $data[7];
			$noplat = $data[8];
			$masaasuransi = $data[9];
			$masakeur = '';
			$masastnk = $data[10];
			$jenissim = '';
			$masasim = '';
			$namauser = $data[11];
			$jabatan = $data[12];

			$korlap = '';
			$nikkorlap = '020281';
			$email = '';
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

			if(!$adaunit){

				$units = new Units();
		        $units->merk = $merk;
		        $units->model = $model;
		        $units->varian = $varian;
		        $units->years = $tahun;
		        $units->mes = $mes;
		        $units->transmition = $transmisi;
		        $units->no_police = $noplat;
		        $units->mileage = '0';
		        $units->save();

		    } else {

		    	$clocks = Units::where(['no_police'=>$noplat])
                ->update(['merk'=>$merk, 'model'=>$model, 'varian'=>$varian, 'years'=> $tahun, 'mes'=> $mes, 'transmition'=> $transmisi]);
		    }

		    $jabs = Jabatan::where("jabatan_name",$jabatan)
				->first();

			$adaclient = Users::where("username",$noplatspasi)
			->first();

			if(!$adaclient){

		        $userclient = new Users();
		        $userclient->jabatan_id = $jabs->id;
		        $userclient->company_id = '2';
		        $userclient->wilayah_id = '21';
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
		        $userdrivers->wilayah_id = '21';
		        $userdrivers->username = $nik;
		        $userdrivers->password = '$2y$10$0Jp/X.QKiELqwUDrg.YghOPFsxRZqDXRu31/sYLupClkXXBmiWGB6';
		        $userdrivers->first_name = $nama;
		        $userdrivers->phone = $notlp;
		        $userdrivers->driver_type = '1';
		        $userdrivers->nik = $nik;
		        $userdrivers->flag_pass = '0';
		        $userdrivers->flag_prof = '0';
		        $userdrivers->save();

		        $roledrivers = new Role();
		        $roledrivers->user_id = $userdrivers->id;
		        $roledrivers->role_id = '2';
		        $roledrivers->save();

		    }

		    $adakorlap = Users::where("username",$nikkorlap)
			->first();

			if(!$adakorlap){

				$userkorlaps = new Users();
		        $userkorlaps->jabatan_id = '2';
		        $userkorlaps->company_id = '1';
		        $userkorlaps->wilayah_id = '21';
		        $userkorlaps->username = $nikkorlap;
		        $userkorlaps->password = '$2y$10$0Jp/X.QKiELqwUDrg.YghOPFsxRZqDXRu31/sYLupClkXXBmiWGB6';
		        $userkorlaps->first_name = $korlap;
		        $userkorlaps->phone = '021';
		        $userkorlaps->email = $email;
		        $userkorlaps->nik = $nikkorlap;
		        $userkorlaps->flag_pass = '0';
		        $userkorlaps->flag_prof = '0';
		        $userkorlaps->save();

		        $rolekorlaps = new Role();
		        $rolekorlaps->user_id = $userkorlaps->id;
		        $rolekorlaps->role_id = '5';
		        $rolekorlaps->save();

			}

			$drivers = Users::where("username",$nik)
			->first();

			$korlaps = Users::where("username",$nikkorlap)
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
		        $drive->korlap_id = $korlaps->id;
		        $drive->user_id = $client->id;
		        $drive->asmen_id = '90';
		        $drive->manager_id = '91';
		        $drive->save();

			} else {

				$driverz = Drivers::where(['id'=>$adadriverss->id])
                ->update(['driver_id'=>$drivers->id, 'unit_id'=>$unitss->id, 'korlap_id'=>$korlaps->id, 'user_id' => $client->id]);

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
