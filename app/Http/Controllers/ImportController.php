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

	        ['Saidun Naiusaf','020582','081519906082','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2451 SYB','2020-07-30','','2020-06-21','A','2021-03-13','IMA ARIFARMA','AST. DEALEAR SHIP & GENERAL ADM','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.4 G'],
			['Dedi Chandra S.','020570','081283608696','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2614 SYB','2021-07-30','','2020-06-23','A','2020-10-14','','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.4 G'],
			['Iman Kurniawan','020290','087781658627','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2449 SYB','2020-07-30','','2020-06-23','A','2019-03-31','','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.4 G'],
			['Budianto','020532','08170843245','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2641 SYB','2021-07-30','','2020-06-23','A','2022-03-06','','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.4 G'],
			['Moch Firmansyah','020565','081322091156','Isuzu','5400 cc','Panther Pick Up TBR','Turbo','2018','B 9643 SAI','2019-08-27','2020-02-29','2020-06-22','A','','RENI RIKA WATI','GA','ANDRIANTO','20281','andrianto@prima-armada-raya.com','54 TURBO'],
			['Saepuloh Suryadin','020575','081317346687','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2649 SYB','2021-07-30','','2020-06-23','A','','OPS','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.4 G'],
			['Basidi','021764','081381111371','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2512 SYE','2019-08-27','','2020-07-23','A','','PUSPA','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Suyatno','020545','087888583760','Toyota','1800 cc','New Corolla Altis','AT','2018','B 1175 SAP','2021-07-30','','2020-07-30','A','','FENITA FEBRIYANTI','MGR. ASET OPS','ANDRIANTO','20281','andrianto@prima-armada-raya.com','1.8  V'],
			['Muryanto','020768','085925350780','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2633 SYB','2021-07-30','','2020-06-23','A','','0PS','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.4 G'],
			['Bagus Sujatmiko','020701','081286795211','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2596 SYB','2021-07-30','','2020-06-23','A','','','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.4 G'],
			['Novie Alfian Palar','020557','082113642866','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2448 SYB','2020-07-30','','2020-06-21','A','','PUSPA','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.4 G'],
			['Mulyadi','020544','082114723300','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2462 SYB','2020-07-30','','2020-06-21','A','','SAEFUL ARIF BUDIMAN','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.4 G'],
			['Azrul Naimuddin','021776','081322495587','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2675 SYB','2021-07-30','','2020-06-23','A','','PUSPA','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Djuhadicha','021768','0812381652132','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2638 SYB','2021-07-30','','2020-06-23','A','','OPS','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Heri Wahyu Sugiarto','021865','081288811322','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2656 SYC','2019-08-27','','2020-07-05','A','','OPS','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Deden','020627','081281872479','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2963 SYC','2020-07-30','','2020-07-06','A','','FADIL ANDAS','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Armyn','021752','085776229692','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2508 SYE','2020-08-27','','2020-07-23','A','','WAWAN HERMAWAN','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Irwan Galih Rahman','020577','081382226792','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2639 SYB','2021-07-30','','2020-06-23','A','','OPS','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Tommy Ardhanny','020288','082324124569','Isuzu','5400 cc','Panther Pick Up TBR','Turbo','2018','B 9681 SAI','2020-08-27','2020-01-30','2020-07-07','A','','OPS','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','54 TURBO'],
			['Wahyu Hidayat','020547','083834155577','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2592 SYB','2021-07-30','','2020-06-23','A','','HARI PURNOMO','OH','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.4 G'],
			['Sarji','020569','085281669164','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2969 SYC','2020-07-30','','2020-07-06','A','','OPS','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Sugiyatno','020541','081808470647','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2170 SYF','2020-08-27','','2020-08-01','A','','OPS','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Muhammad Ali','020593','081287788120','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2637 SYB','2018-08-01','','2020-06-23','B','','HENDRA ARIF','AST. MANAGER CHANEL SUPORT','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Ali Hasan ','021770','082259989865','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2940 SYC','2019-07-30','','2020-07-06','A','','RISNA','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Suman Riadi','020592','087884095002','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2612 SYB','2018-08-01','','2020-06-23','A','','OPS','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.4 G'],
			['Anang S.','021766','08136030685','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2972 SYC','2020-07-30','','2020-07-06','A','','PUSPA','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Fernando','022841','081291315282','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2939 SYC','2020-07-30','','2020-07-06','A','','PUSPA','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Moh Novianto','020596','082111869657','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2892 SYC','2019-07-30','','2020-07-06','A','','PUSPA','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Oki Setiadji','021777','081317158485','Toyota','2400 cc','Kijang Innova (Reborn)','MT','2018','B 2444 SYB','2020-07-30','','2020-06-21','A','','PUSPA','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.4 G'],
			['Basidi','021764','081381111371','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2512 SYE','2019-08-27','','2020-07-23','A','','PUSPA','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Husni Firdaus','020578','082244580478','Toyota','1800 cc','New Corolla Altis','AT','2017','B 1193 SAO','2021-01-04','','2020-08-18','A','','','MGR','ANDRIANTO','20281','andrianto@prima-armada-raya.com','1.8  V'],
			['Suwanto','020590','082111963040','Toyota','1800 cc','New Corolla Altis','AT','2017','B 1190 SAO','2021-01-04','','2020-08-18','A','','F ADITYA DIPO ALAM','MGR. REGAL COUNSEL & COMPLIACE JBB','ANDRIANTO','20281','andrianto@prima-armada-raya.com','1.8  V'],
			['Ikrom','021765','081314066745','Toyota','1800 cc','New Corolla Altis','AT','2017','B 1182 SAO','2021-01-04','','2020-08-18','A','','DWI MUHAMAD ABDU','MGR. SND','ANDRIANTO','20281','andrianto@prima-armada-raya.com','1.8  V'],
			['Darminto','021781','081282334276','Toyota','1800 cc','New Corolla Altis','AT','2017','B 1178 SAO','2021-01-04','','2020-08-18','A','','NURHADIA','MGR RITEL','ANDRIANTO','20281','andrianto@prima-armada-raya.com','1.8  V'],
			['Suroto','021783','081776995413','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2017','B 2882 SZC','2021-01-04','','2020-08-11','A','','PUSPA','ASMENT GA','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Prasetya K. Sena','022485','081382354292','Toyota','1800 cc','New Corolla Altis','AT','2017','B 1192 SAO','2021-01-04','','2020-08-18','A','','','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','1.8  V'],
			['Achmad Fauzi R.','022228','087880706951','Toyota','1800 cc','New Corolla Altis','AT','2017','B 1189 SAO','2021-01-04','','2020-08-18','A','','','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','1.8  V'],
			['Suparmin','021774','081316156322','Toyota','1800 cc','New Corolla Altis','AT','2017','B 1186 SAO','2021-01-04','','2020-08-18','A','','SAMSUL ARIFIN','MGR. ASE','ANDRIANTO','20281','andrianto@prima-armada-raya.com','1.8  V'],
			['Wiliam','020571','081310994520','Toyota','1800 cc','New Corolla Altis','AT','2017','B 1179 SAO','2021-01-04','','2020-08-18','A','','IWAN YUDHA WIBAWA','MGR. CORPORATE SALES 3','ANDRIANTO','20281','andrianto@prima-armada-raya.com','1.8  V'],
			['Tanari','021779','08778190074','Toyota','1800 cc','New Corolla Altis','AT','2017','B 1175 SAO','2021-01-04','','2020-08-18','A','','M DJULLAWAN','MGR. IT','ANDRIANTO','20281','andrianto@prima-armada-raya.com','1.8  V'],
			['Indrajid','020619','087886777354','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2896 SYC','2020-07-30','','2020-07-06','A','','PUSPA','ASMENT GA','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Febriansyah','022383','087781767238','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2599 SYB','2021-07-30','','2020-08-11','A','','PUSPA','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Afri Sugiarto','022384','081291944093','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2600 SYB','2021-07-30','','2020-06-23','A','','PUSPA','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Sarji','020569','085281669164','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2969 SYC','2020-07-30','','2020-07-06','A','','PUSPA','ASMENT GA','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Budiyanto','020885','0817825009','Toyota','1800 cc','New Corolla Altis','AT','2017','B 1174 SAO','2021-01-04','','2020-08-18','A','','JUNIOR SINAGA','MGR. RELL & PROJECK DEF 3','ANDRIANTO','20281','andrianto@prima-armada-raya.com','1.8  V'],
			['Karsono','020708','08816142782','Toyota','1800 cc','New Corolla Altis','AT','2017','B 1183 SAO','2021-01-04','','2020-08-18','A','','','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','1.8  V'],
			['Wahmad','021778','087888404466','Toyota','1800 cc','New Corolla Altis','AT','2017','B 1181 SAO','2021-01-04','','2020-08-18','A','','','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','1.8  V'],
			['Raynaldo Ferdinand','023288','081293596125','Toyota','1800 cc','New Corolla Altis','AT','2017','B 1203 SAO','2021-01-04','','2020-08-23','A','','','','ANDRIANTO','20281','andrianto@prima-armada-raya.com','1.8  V'],
			['Herdiansyah','020562','081287900666','Toyota','2000 cc','Kijang Innova (Reborn)','MT','2018','B 2632 SYB','2021-07-30','','2020-06-23','A','','PUSPA','ASMENT GA','ANDRIANTO','20281','andrianto@prima-armada-raya.com','2.0 G'],
			['Agus Setiadi','020696','0822703377','Toyota','1800 cc','New Corolla Altis','AT','2017','B 1184 SAO','2021-01-04','','2020-08-18','A','','OOS KOSASIH','SAM INDUSTRI 3','ANDRIANTO','20281','andrianto@prima-armada-raya.com','1.8  V'],
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
                ->update(['driver_id'=>$drivers->id, 'unit_id'=>$unitss->id, 'korlap_id'=>$korlaps->id, 'user_id'=> $client->id]);

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
