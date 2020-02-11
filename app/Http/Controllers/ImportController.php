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

	        ['ASLAHUDIN','023118','B 1525 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GSXJ0883531','2GD  C440036','MUHAMMAD DENIS','VP HR & GA PHE'],
			['BUDIONO','023119','B 1558 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS9J0884282','2GD  C448146','UNTUNG BS','VP PRODUCTION ASSET MANAGEMENT PHE'],
			['ALAMSYAH','023120','B 1723 SAP','Toyota','V','A/T','2500 cc','New camry','MR2BF3HK5K4000806','2AR2118348','AFIF SAIFUDIN','DIR. DEVELOPMENT PHE'],
			['NOVRIWANTO','023121','B 1572 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS5J0885784','2GD  C460153','DERI SAFARI','CHIEF INTERNAL AUDITOR PHE'],
			['ASEP JOHANA','023122','B 1579 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS9J0884251','2GD  C447575','RAHMAT WIJAYA','VP SUBSURFACE DEVELOPMENT PHE'],
			['CASRONO','023124','B 1586 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS7J0885348','2GD  C456406','TATANG SURYANA','VP FINANCE & TREASURY PHE'],
			['SAROJI','023126','B 1562 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS0J0883912','2GD  C444015','ARTONO','VP PRODUCTION & OPERATION PHE'],
			['FAHMI FAJAR HARUNY','023127','B 1564 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS7J0883874','2GD  C443257','BAMBANG RUDI','VP ICT & DATA MANAGEMENT PHE'],
			['HARUN ISKANDAR','023129','B 1560 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS3J0884262','2GD  C447883','ICEU CAHYANI','VP PPRM PHE'],
			['HERFIAN NUR ANDRIANSYAH','023130','B 1549 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS3J0883967','2GD  C444432','TINA AMALIA','VP LEGAL PHE'],
			['HERU HARIYADI','023131','B 1601 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS5J0884098','2GD  C445668','SLAMET SUSILO','VP PROJECT STRATEGIC DEV MANAGEMENT PHE'],
			['JUMARI','023133','B 1527 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS8J0884242','2GD  C447247','IFKI SUKARYA','CORPORATE SECRETARY PHE'],
			['MUHTADI','023136','B 1580 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS3J0884987','2GD  C452604','RIO DASMANTO','VP QHSSE PHE'],
			['VIVIN BUDHI SAPUTRA','023137','B 1733 SAP','Toyota','V','A/T','2500 cc','New camry','MR2BF3HK3K4000786','2AR2110983','TAUFIK','DIR. OPERATION & PRODUCTION PHE'],
			['SUTIYONO','023139','B 1706 SAP','Toyota','V','A/T','2500 cc','New camry','MR2BF3HK5K4000837','2AR2120314','ABDUL MUTALIB','DIR. EXPLORATION PHE'],
			['SIHABUDIN','023140','B 1672 SAP','Toyota','V','A/T','2500 cc','New camry','MR2BF3HK2K4000813','2AR2116597','MEIDAWATI','PRESIDENT DIRECTOR PHE'],
			['SUNJAYA','023141','B 1578 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS4J0883587','2GD  C440754','ADNAN','VP EXP OPERATION & ASSET MANAGEMENT PHE'],
			['RUSLI LANDI BIN LANI','023143','B 1537 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS5J0887793','2GD  C476890','ARI SAMODRA','VP EXP SUBSURFACE, PLANNING & EVAL PHE'],
			['NANA SURYANA','023144','B 1574 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS7J0883616','2GD  C440732','RATIH ESTI PRIHATINI','VP COMMERCIAL PHE'],
			['AGUS RIYONO','023145','B 1531 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS9J0884072','2GD  C445833','IMAN BASTARI','VP SCM PHE'],
			['EDI PRIYANTO','023146','B 1535 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS2J0884043','2GD  C445386','YOKE SYAMSIDAR','VP CONTROLLER PHE'],
			['Agustinus Tarigan','023155','B 1543 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS6J0883574','2GD  C440286','ALFI RUSIN','GM PHE OSES '],
			['Ratim Supriyanto','023156','B 1533 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS5J0883324','2GD  C438112','AKHMAD MIFTAH','GM PHE NSB'],
			['Asep Jaenal Aripin','023162','B 1078 PJP','Toyota','V','A/T','2500 cc','New camry','MHFGB8GS6K0895323','2GDC549087','','GM PHKT'],
			['NANANG WAHIDIN','023203','B 1601 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS5J0884098','2GD  C445668','COSMAS','GM PHE ONWJ'],
			['AKHMAD KHOLIJAN','023595','B 1675 SAP','Toyota','V','A/T','2500 cc','New camry','MR2BF3HK0K4000874','2AR2116560','SAID REZA PAHLEFI','DIR. FINANCE & BUSSINES SUPPORT PHE'],
		];

		foreach ($rows as $data) {

			$nama = $data[0];
			$nik = $data[1];
			$merk = $data[3];
			$mes = $data[6];
			$model = $data[7];
			$transmisi = $data[5];
			$noplat = $data[2];
			$masaasuransi = '';
			$masakeur = '';
			$masastnk = '';
			$jenissim = '';
			$masasim = '';
			$namauser = $data[10];
			$jabatan = $data[11];

			$varian = $data[4];
			$nokerangka = $data[8];
			$nomesin = $data[9];

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
				$units->wilayah_id = '43';
		        $units->pemilik = 'PAR';
		        $units->merk = $merk;
		        $units->model = $model;
		        $units->varian = $varian;
		        $units->mes = $mes;
		        $units->transmition = $transmisi;
		        $units->no_police = $noplat;
		        $units->mileage = '0';
		        $units->chassis_number = $nokerangka;
		        $units->machine_number = $nomesin;
		        $units->save();

		    } else {

		    	$clocks = Units::where(['no_police'=>$noplat])
                ->update(['merk'=>$merk, 'model'=>$model, 'varian'=>$varian, 'mes'=> $mes, 'transmition'=> $transmisi]);
		    }

		    $jabs = Jabatan::where("jabatan_name",$jabatan)
			->first();

			$adaclient = Users::where("username",$noplatspasi)
			->first();

			if(!$adaclient){

		        $userclient = new Users();
		        $userclient->jabatan_id = $jabs->id;
		        $userclient->company_id = '2';
		        $userclient->wilayah_id = '43';
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
		        $userdrivers->wilayah_id = '43';
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
		        $drive->korlap_id = '37';
		        $drive->user_id = $client->id;
		        $drive->asmen_id = '90';
		        $drive->manager_id = '91';
		        $drive->save();

			} else {

				$driverz = Drivers::where(['id'=>$adadriverss->id])
                ->update(['driver_id'=>$drivers->id, 'unit_id'=>$unitss->id, 'korlap_id'=>'37', 'user_id' => $client->id]);

			}

		}

		return view('import.index', compact('rows'));

    }
}
