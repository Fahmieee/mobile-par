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

	        ['Abdul Manan','021101','085693721521','Toyota','Kijang Innova','2016','B 2892 SOI','2021-12-21','','POOL ALOKASI SPBD'],
			['Abdul Qodir Jauwas','020054','085883795655','Toyota','Kijang Innova','2019','B 2830 SIQ','2024-11-01','','Pool Alokasi Fungsi (Enginering Service)'],
			['Abdul Syarifuddin','022435','085694326181','Toyota','Kijang Innova','2018','B 2464 SYB','2023-06-21','2021-05-15','POOL'],
			['Abdullah Ali','022440','08388547340','Toyota','Kijang Innova','2019','B 2179 SIR','2024-11-01','2021-01-28','Pool Alokasi Fungsi UTC'],
			['Acep Yudi','021092','','Toyota','Kijang Innova','2019','B 2316 SIT','2024-11-18','','Pool Alokasi Sr. Account Manager Aromatic Industry'],
			['Achmad Faisal','021100','081281981774','Toyota','Kijang Innova','2016','B 2795 SOJ','2021-12-23','','POOL Fungsi Key Account'],
			['Achmad Fauzi','021093','0817159709','Toyota','Kijang Innova','2016','B 2799 SOJ','2021-12-29','','POOL Fungsi Key Account'],
			['Agus Ariyanto','020457','081914340025','Toyota','Kijang Innova','2019','B 2103 SIR','2024-11-01','','POOL'],
			['Agus K','020673','085885098780','Toyota','Kijang Innova','2019','B 2189 SIR','2024-11-01','','POOL'],
			['Agus Parmanto','020674','081311370767','Toyota','Kijang Innova','2019','B 2158 SIR','2024-11-05','','POOL'],
			['Agus Rahman','020106','','Toyota','Kijang Innova','2018','B 2389 SZN','2020-12-22','','Pool Alokasi HSSE M&T'],
			['Agus Rianto','020389','','Toyota','Hilux','2019','B 9931 SBC','2024-10-24','','POOL'],
			['Agus Rusli','020486','082110777774','Toyota','Kijang Innova','2019','B 2134 SIR','2024-11-04','','Pool Alokasi HSSE'],
			['Agus Suroso Widodo','020294','085743891199','Toyota','Kijang Innova','2017','B 2152 SZJ','2022-10-30','','Pool Alokasi Dom Gas'],
			['Agus Susanto ','020658','081318387144','Toyota','Kijang Innova','2019','B 2181 SIR','2024-11-01','','POOL'],
			['Ahmad Fuad','020399','','Toyota','Kijang Innova','2019','B 2159 SIR','2024-11-01','','POOL'],
			['Ahmad Furkon','021862','089698228418','Toyota','Kijang Innova','2019','B 2844 SIQ','2024-11-01','','POOL'],
			['Ahmad Rifai','020033','081282607142','Toyota','Kijang Innova','2017','B 2033 SZJ','2022-10-27','','POOL'],
			['Ahmad Sarif Hidayat','021099','','Toyota','Kijang Innova','2019','B 2887 SIR','2024-11-11','','POOL'],
			['Ajat Kurniawan','020654','087881457187','Toyota','Kijang Innova','2017','B 2915 SOS','2022-04-11','','Pool Alokasi SSC'],
			['Alamsyah','020135','085691167723','Toyota','Kijang Innova','2017','B 2030 SZJ','2022-10-27','','POOL'],
			['Alan Abraham A','020151','08566363153','Mitsubishi','Col Dis FE84G BC','2017','B 9937 SDC','2023-09-12','','POOL'],
			['Alip Sugito','020132','085210001119','Mitsubishi','Col Dis FE84G BC','2019','B 7066 SJA','2023-06-07','','POOL'],
			['Ambar Priyambodo','020037','081318399212','Toyota','Kijang Innova','2018','B 2421 SYB','2023-06-21','','POOL'],
			['Anang Sih Mulyono','020026','08985021224','Toyota','Kijang Innova','2017','B 2023 SZJ','2022-10-27','','POOL'],
			['Andri Faizal','020051','081280508008','Toyota','Kijang Innova','2017','B 2121 SZJ','2022-10-30','','Pool Alokasi Dom Gas'],
			['Angga Satiya Nusantara','021084','083871693748','Toyota','Kijang Innova','2017','B 2062 SZJ','2022-10-27','','POOL'],
			['Apandi Sumardi','023301','085795393923','Toyota','Kijang Innova','2017','B 2261 SON','2022-02-02','2022-01-04','POOL'],
			['Apriyono','023661','0812127111811','Toyota','Kijang Innova','2019','B 2153 SIR','2024-11-01','2020-04-19','Pool Alokasi Customer Relationship Management'],
			['Archila Septiawan','022431','081316060132','Toyota','Kijang Innova','2018','B 2384 SYB','2023-06-21','2023-09-30','POOL'],
			['Ardi Sasmita','023536','081382195650','Toyota','Kijang Innova','2017','B 2048 SZK','2022-11-10','2023-05-03','POOL'],
			['Ari Nurmansyah Lubis','020652','081281006969','Toyota','Kijang Innova','2019','B 2121 SIR','2024-11-01','','Pool Alokasi MTC'],
			['Arief Budhiman','020048','081384986860','Toyota','Kijang Innova','2017','B 2055 SZJ','2022-10-27','','POOL'],
			['Arifin','020053','081219741435','Toyota','Kijang Innova','2019','B 2488 SIQ','2024-10-29','','POOL'],
			['Arifin Supriono','020042','081315008901','Toyota','Kijang Innova','2017','B 2054 SZJ','2022-10-27','','Pool Alokasi Sekper Insert, Steakholder'],
			['Aris Budhi Hartanto','020109','','Toyota','Kijang Innova','2018','B 2250 SZN','2020-12-22','','Pool Alokasi Key Account'],
			['Asep Mulyana','020395','','Toyota','Kijang Innova','2019','B 2648 SIR','2024-11-11','','POOL'],
			['Aspar','020398','','Toyota','Kijang Innova','2019','B 2185 SIR','2024-11-01','','POOL'],
			['Ayanil','020672','','Toyota','Kijang Innova','2019','B 2173 SIR','2024-11-01','','POOL'],
			['Bakhmizal','020653','082112372965','Toyota','Kijang Innova','2019','B 2048 SIR','2024-11-04','','Pool Alokasi MP2 Megaproyek'],
			['Bambang Gunadi','022275','081312985447','Toyota','Kijang Innova','2018','B 2358 SZN','2020-12-22','2019-10-06','Pool Alokasi S&D'],
			['Bambang Sarwoko A','020678','081284146868','Toyota','Kijang Innova','2016','B 7008 SOW','2023-06-25','','POOL'],
			['Boncu Rama Pangayom','021098','','Toyota','Kijang Innova','2016','B 2797 SOJ','2021-12-29','','Pool Alokasi Key Account'],
			['Bujang BOH','020097','','Toyota','Kijang Innova','2018','B 2361 SZN','2022-12-27','','Pool Alokasi Dom Gas'],
			['Carmin','020650','081282962285','Toyota','Kijang Innova','2019','B 2975 SIQ','2024-10-28','','Pool Alokasi HSSE'],
			['Cecep Ramdani','021815','085890387273','Toyota','Kijang Innova','2016','B 2914 SOI','2021-12-20','','Pool Alokasi (Manager Inmar Support)'],
			['Cherry Firmansyah','020164','','Toyota','Kijang Innova','2018','B 2463 SYB','2023-06-21','','POOL'],
			['Dadan Hidayat','','','Toyota','Kijang Innova','2019','B 2119 SIR','2024-11-01','2021-08-09','POOL'],
			['Dadang','020401','','Toyota','Kijang Innova','2018','B 2507 SZN','2022-12-27','','Pool Alokasi RFM'],
			['Dadang','021532','','Toyota','Kijang Innova','2019','B 2143 SIR','2024-11-01','','POOL'],
			['Dani Komarudin','021819','081389131000','Toyota','Kijang Innova','2019','B 2834 SIQ','2024-11-01','','Pool Fungsi Land Ownership'],
			['Dani Mulyadi','','','Toyota','Kijang Innova','2019','B 2988 SIR','2024-11-15','','Pool Ops SSC /GENAP (Gd.Elnusa)'],
			['David','021331','','Toyota','Kijang Innova','2019','B 2129 SIR','2024-11-01','','POOL (D&P)'],
			['Dede Supriadi','020662','081932360576','Toyota','Kijang Innova','2019','B 2838 SIQ','2024-11-01','','POOL'],
			['Dickson Mitra Thama P','020055','','Toyota','Kijang Innova','2017','B 2024 SZJ','2022-10-27','','POOL'],
			['Didit Apriyadi','023452','087741445183','Mitsubishi','Col Dis FE84G BC','2014','B 7394 SDA','2025-01-07','2023-05-15','POOL'],
			['Dwi Kristiono','020659','081314961230','Toyota','Kijang Innova','2019','B 2014 SIR','2024-11-04','','POOL'],
			['Edi Supardi','020060','085881384252','Mitsubishi','Col Dis FE84G BC','2019','B 7068 SJA','2023-06-07','','POOL'],
			['Eko Purnama','021299','081381763362','Toyota','Kijang Innova','2019','B 2846 SIQ','2024-11-12','','POOL'],
			['Eman Suproni','020675','','Toyota','Kijang Innova','2018','B 2458 SYB','2023-06-21','','POOL'],
			['Harjito','','','Toyota','Kijang Innova','2019','B 2199 SIT','2024-11-13','2023-10-10','Pool Dedikasi Fungsi'],
			['Herry Kiswanto','020040','082113959521','Toyota','Kijang Innova','2017','B 2032 SZJ','2022-10-27','','POOL'],
			['Imam Dian Segara','020147','087771702909','Toyota','Kijang Innova','2017','B 2491 SZJ','2022-11-02','2023-02-18','POOL'],
			['Indra Kesuma','020670','085280950529','Toyota','Kijang Innova','2019','B 2191 SIR','2024-11-01','','POOL'],
			['Ipuy Sanjaya','021858','081289327118','Toyota','Kijang Innova','2018','B 2729 SYB','2023-06-25','','POOL'],
			['Iwan Setiawan','020049','081283172484','Mitsubishi','Col Dis FE84G BC','2017','B 9939 SDC','2023-09-12','','POOL'],
			['Joko Tri Winarso','020668','081318083569','Mitsubishi','Col Dis FE84G BC','2019','B 7060 SJA','2022-05-09','','POOL'],
			['Juanda','022461','085779312340','Toyota','Kijang Innova','2019','B 2930 SIQ','2024-11-02','2020-10-07','POOL'],
			['Karyo Susanto','021789','081212793772','Toyota','Kijang Innova','2019','B 2141 SIR','2024-11-01','','POOL'],
			['Keimal Risal','020681','081315765699','Toyota','Kijang Innova','2019','B 9983 SAJ','2024-11-14','','POOL'],
			['Khamdan Saptaji','020131','','Toyota','Kijang Innova','2019','B 2161 SIR','2024-11-01','','POOL'],
			['Kusnadi','022430','081317175038','Toyota','Kijang Innova','2018','B 2510 SYE','2023-07-23','2020-10-31','POOL'],
			['M. Azwar Fahrizal','020485','085718713461','Toyota','Kijang Innova','2019','B 2155 SIR','2024-11-01','','POOL'],
			['M. Hendrik Novianto','020426','085244031440','Toyota','Kijang Innova','2017','B 2431 SZJ','2022-11-02','','POOL'],
			['M. Takari Mahendradani','021866','081315169999','Toyota','Kijang Innova','2017','B 2022 SZJ','2022-10-27','','POOL'],
			['M. Yanis','020680','','Toyota','Kijang Innova','2019','B 2026 SIR','2024-11-04','','POOL'],
			['Maman Suryaman','020655','081210833135','Toyota','Kijang Innova','2019','B 2814 SIQ','2024-11-01','','POOL'],
			['Mamat','020829','081389606668','Toyota','Kijang Innova','2017','B 2031 SZJ','2022-10-27','','POOL'],
			['Mansyuri S','020651','081395102755','Toyota','Kijang Innova','2017','B 2574 SOO','2022-02-17','','POOL'],
			['Masdiono','020039','081381336345','Toyota','Kijang Innova','2017','B 2057 SZJ','2022-10-27','','POOL'],
			['Mocahamad Nur','020120','081806642492','Toyota','Kijang Innova','2017','B 2644 SZA','2022-07-21','','POOL'],
			['Muhadi','020809','081319638374','Toyota','Kijang Innova','2017','B 2912 SOS','2022-04-11','','POOL'],
			['Mulya Jaya','020664','087886521121','Toyota','Kijang Innova','2017','B 2059 SZK','2022-11-10','2021-01-12','POOL'],
			['Nurhalim','020393','08161360553','Toyota','Kijang Innova','2019','B 2151 SIR','2024-11-01','','POOL'],
			['Prabowo','020394','','Toyota','Kijang Innova','2019','B 2820 SIQ','2024-11-01','','POOL'],
			['R. Taufikur Rachman','020656','085234507879','Toyota','Kijang Innova','2019','B 2804 SIQ','2024-11-01','','POOL'],
			['Rachmad Putra W','020043','08568216901','Toyota','Kijang Innova','2017','B 2242 SZJ','2022-10-31','','POOL'],
			['Radi','020016','','Toyota','Kijang Innova','2019','B 2107 SIR','2024-11-01','','POOL'],
			['Rahman S','022272','','Toyota','Kijang Innova','2019','B 2396 SIW','2024-12-30','2022-07-21','POOL'],
			['Riko Syaputra','020714','085321789345','Toyota','Kijang Innova','2018','B 2445 SYB','2023-06-21','2024-11-02','POOL'],
			['Riyan Saeputra','020648','081370181227','Toyota','Kijang Innova','2019','B 2125 SIR','2024-11-01','','POOL'],
			['Rusmanto','021296','081326159707','Toyota','Kijang Innova','2018','B 2456 SYB','2023-06-21','','POOL'],
			['Sahat Situmorang','020028','081288024937','Toyota','Kijang Innova','2017','B 2056 SZJ','2022-10-27','','POOL'],
			['Sahrudin','020657','','Toyota','Kijang Innova','2018','B 2538 SYB','2023-06-21','','POOL'],
			['Said','020825','081222817111','Toyota','Kijang Innova','2019','B 2109 SIR','2021-10-26','2021-12-28','POOL'],
			['Saiful Amin','021591','081333000119','Toyota','Kijang Innova','2019','B 2339 SIR','2024-11-04','','POOL'],
			['Saripan','','','Isuzu','Elf NHR 55 Microbus','2017','B 7841 SDA','2022-10-05','2020-02-07','POOL'],
			['Setyo Purwito','020032','','Toyota','Kijang Innova','2017','B 2058 SZJ','2022-10-27','','POOL'],
			['Sholahudin','020066','081617183626','Toyota','Kijang Innova','2017','B 2120 SZJ','2022-10-30','','POOL'],
			['Subechi Hartono','020767','','Toyota','Kijang Innova','2019','B 2808 SIQ','2024-11-01','','POOL'],
			['Sudibyo','022773','081393516272','Nissan','Serena','2019','B 2398 SIW','2024-12-30','2023-06-04','POOL'],
			['Sudir','020059','087573737412','Mitsubishi','Col Dis FE84G BC','2019','B 7067 SJA','2023-05-31','','POOL'],
			['Sugino','022437','081280363313','Toyota','Kijang Innova','2018','B 2420 SYB','2023-06-21','2024-03-11','POOL'],
			['Sumarsono','020390','','Toyota','Kijang Innova','2019','B 2018 SIR','2024-11-04','','POOL'],
			['Tarmono','020035','082112853544','Toyota','Kijang Innova','2017','B 2050 SZJ','2022-10-27','','POOL'],
			['Tjaswan','021298','082312308955','Toyota','Kijang Innova','2019','B 2443 SIR','2024-11-05','','POOL'],
			['Toni','020057',' 081212451062','Isuzu','Elf NHR 55 Microbus','2017','B 7842 SDA','2022-10-05','','POOL'],
			['Tri Rahmad Agung','021330','081380813268','Toyota','Kijang Innova','2017','B 2573 SOO','2022-02-17','','POOL'],
			['Vadly Padila','020830','081382221615','Toyota','Kijang Innova','2017','B 2061 SZJ','2022-10-27','','POOL'],
			['Wahyu Fadilah','020392','','Toyota','Kijang Innova','2019','B 2115 SIR','2024-11-01','','POOL'],
			['Wahyu Tri Antono','020690','081211634617','Toyota','Kijang Innova','2019','B 2824 SIQ','2024-11-01','','POOL'],
			['Windra Hernuari','022438','087876011680','Toyota','Kijang Innova','2018','B 2427 SYB','2023-06-21','2024-01-13','POOL'],
			['Yasin Rofiudin','020667','081586933115','Toyota','Kijang Innova','2019','B 2157 SIR','2024-11-01','','POOL'],
			['Yunus 1','020682','081386113247','Toyota','Kijang Innova','2019','B 2928 SIQ','2024-11-02','','POOL'],
			['Yuyus Munandar','022439','085315497397','Toyota','Kijang Innova','2018','B 2404 SYB','2023-06-21','2021-10-09','POOL'],
		];

		foreach ($rows as $data) {

			$nama = $data[0];
			$nik = $data[1];
			$notlp = $data[2];
			$merk = $data[3];
			$mes = '2000 cc';
			$model = $data[4];
			$transmisi = 'M/T';
			$tahun = $data[5];
			$noplat = $data[6];
			$masaasuransi = '';
			$masakeur = '';
			$masastnk = $data[7];
			$jenissim = '';
			$masasim = $data[8];
			$namauser = '';
			$jabatan = $data[9];

			$korlap = '';
			$nikkorlap = '020834';
			$email = '';
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

		    } else {

		    	$userdrivers = Users::where(['username'=>$nik])
                ->update(['driver_type'=>'2']);

		    }

		    $adakorlap = Users::where("username",$nikkorlap)
			->first();

			if(!$adakorlap){

				$userkorlaps = new Users();
		        $userkorlaps->jabatan_id = '2';
		        $userkorlaps->company_id = '1';
		        $userkorlaps->wilayah_id = '42';
		        $userkorlaps->username = $nikkorlap;
		        $userkorlaps->password = '$2y$10$0Jp/X.QKiELqwUDrg.YghOPFsxRZqDXRu31/sYLupClkXXBmiWGB6';
		        $userkorlaps->first_name = 'Hadi Prayitno';
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
		        $drive->unit_id = null;
		        $drive->korlap_id = $korlaps->id;
		        $drive->user_id = null;
		        $drive->asmen_id = '90';
		        $drive->manager_id = '91';
		        $drive->save();

			} else {

				$driverz = Drivers::where(['id'=>$adadriverss->id])
                ->update(['driver_id'=>$drivers->id, 'unit_id'=>null, 'korlap_id'=>$korlaps->id, 'user_id' => null]);

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
