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

	        ['Driver Testing','driver5','080989999','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2451 XXX','2020-07-30','2022-02-28','2020-06-21','A','2021-03-13','User Testing','AST. DEALEAR SHIP & GENERAL ADM','ANDRIANTO','korlap','andrianto@prima-armada-raya.com','2.4 G'],
			['Driver Testing','driver6','080989999','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2614 XXX','2021-07-30','2022-02-28','2020-06-23','A','2020-10-14','User Testing','','ANDRIANTO','korlap','andrianto@prima-armada-raya.com','2.4 G'],
			['Driver Testing','driver7','080989999','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2449 XXX','2020-07-30','2022-02-28','2020-06-23','A','2019-03-31','User Testing','','ANDRIANTO','korlap','andrianto@prima-armada-raya.com','2.4 G'],
			['Driver Testing','driver8','080989999','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2641 XXX','2021-07-30','2022-02-28','2020-06-23','A','2022-03-06','User Testing','','ANDRIANTO','korlap','andrianto@prima-armada-raya.com','2.4 G'],
			['Driver Testing','driver9','080989999','Isuzu','5400 cc','Panther Pick Up TBR','Turbo','2018','B 9643 XXX','2019-08-27','2020-02-28','2020-06-22','A','2022-03-06','User Testing','GA','ANDRIANTO','korlap','andrianto@prima-armada-raya.com','54 TURBO'],
			['Driver Testing','driver10','080989999','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2649 XXX','2021-07-30','2022-02-28','2020-06-23','A','2022-03-06','User Testing','','ANDRIANTO','korlap','andrianto@prima-armada-raya.com','2.4 G'],
			['Driver Testing','driver11','080989999','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2512 XXX','2019-08-27','2022-02-28','2020-07-23','A','2022-03-06','User Testing','','ANDRIANTO','korlap','andrianto@prima-armada-raya.com','2.0 G'],
			['Driver Testing','driver12','080989999','Toyota','1800 cc','New Corolla Altis','AT','2018','B 1175 XXX','2021-07-30','2022-02-28','2020-07-30','A','2022-03-06','User Testing','MGR. ASET OPS','ANDRIANTO','korlap','andrianto@prima-armada-raya.com','1.8  V'],
			['Driver Testing','driver13','080989999','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2633 XXX','2021-07-30','2022-02-28','2020-06-23','A','2022-03-06','User Testing','','ANDRIANTO','korlap','andrianto@prima-armada-raya.com','2.4 G'],
			['Driver Testing','driver14','080989999','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2596 XXX','2021-07-30','2022-02-28','2020-06-23','A','2022-03-06','User Testing','','ANDRIANTO','korlap','andrianto@prima-armada-raya.com','2.4 G'],
			['Driver Testing','driver15','080989999','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2448 XXX','2020-07-30','2022-02-28','2020-06-21','A','2022-03-06','User Testing','','ANDRIANTO','korlap','andrianto@prima-armada-raya.com','2.4 G'],
			['Driver Testing','driver16','080989999','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2462 XXX','2020-07-30','2022-02-28','2020-06-21','A','2022-03-06','User Testing','','ANDRIANTO','korlap','andrianto@prima-armada-raya.com','2.4 G'],
			['Driver Testing','driver17','080989999','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2675 XXX','2021-07-30','2022-02-28','2020-06-23','A','2022-03-06','User Testing','','ANDRIANTO','korlap','andrianto@prima-armada-raya.com','2.0 G'],
			['Driver Testing','driver18','080989999','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2638 XXX','2021-07-30','2022-02-28','2020-06-23','A','2022-03-06','User Testing','','ANDRIANTO','korlap','andrianto@prima-armada-raya.com','2.0 G'],
			['Driver Testing','driver19','080989999','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2656 XXX','2019-08-27','2022-02-28','2020-07-05','A','2022-03-06','User Testing','','ANDRIANTO','korlap','andrianto@prima-armada-raya.com','2.0 G'],
		];

		foreach ($rows as $data) {

			$nama = $data[0];
			$nik = $data[1];
			$notlp = $data[2];
			$merk = $data[3];
			$mes = $data[4];
			$model = $data[5];
			$transmisi = $data[6];
			$tahun = $data[7];
			$noplat = $data[8];
			$masaasuransi = $data[9];
			$masakeur = $data[10];
			$masastnk = $data[11];
			$jenissim = $data[12];
			$masasim = $data[13];
			$namauser = $data[14];
			$jabatan = $data[15];

			$korlap = $data[16];
			$nikkorlap = $data[17];
			$email = $data[18];
			$varian = $data[19];

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
