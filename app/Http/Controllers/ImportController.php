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

	        ['Winarno','021748','085888355494','Fortuner','2017','B 1374 SJS','2022-05-23','A','2024-04-03','T. P. Pasaribu','VP HSE Pemasaran','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Noval Setya Pramana','020797','087776060932','Fortuner','2017','B 1679 SJT','2022-10-02','A','2023-08-21','Annisrul Waqie','VP QSKM','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Handoko Budi Prasetyo','020778','087775838164','Fortuner','2019','B 1260 SAQ','2024-11-08','A','2023-09-15','Yanuar','SVP Bussiness Operation','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Roland Karim','020823','082124243131','Fortuner','2017','B 1699 SJT','2022-10-02','A','2021-07-10','Ega Legowo','VP Riset Teknologi Center','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Bahtiar Rifai','021086','085697551491','Camry','2019','B 1230 SAQ','2024-10-25','A','2021-06-05','Ivan Airlangga','SVP Bussines Dev. & Excelent','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Aam Aben','021097','087888028480','Fortuner','2019','B 2916 SJA','2024-10-19','A','2021-12-22','Noor Muhammad Zein','VP Asset Management','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Riyanto 2','021291','081212600761','Camry','2019','B 1297 SAQ','2024-11-15','A','2022-05-18','Hendra Jaya','SVP Staf Ahli Dirut','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Jasmin','021293','085890519259','Camry','2017','B 1820 SAN','2022-05-02','A','2023-10-10','Afandi','SVP CBO','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Wisnu Adriansyah','021342','087788003139','Fortuner','2017','B 1603 SJT','2022-09-23','A','2020-09-10','Taswin','VP Organization & Man Power Planning','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Sapii','021525','085210756267','Fortuner','2017','B 1120 SJT','2022-08-10','A','2020-07-05','Kade Ambara Jaya','VP Project Tuban','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Saefudin','021529','081296763930','Fortuner','2019','B 2926 SJA','2024-10-19','A','2021-09-09','Achmad Syaihu Rais','VP Jawa Balinus','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Kodirin','021530','081807999815','Fortuner','2017','B 1130 SJT','2022-08-10','A','2024-10-02','Syamsul Bahri','VP PCMS','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Trima Jeti','021799','081808982885','Fortuner','2017','B 1687 SJT','2022-10-02','A','2024-02-03','Dhani Prasetyawan','VP PPC','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Budi Dharmawan','021801','085713100071','Fortuner','2017','B 1947 SJT','2022-10-27','A','2022-03-26','Irzan Noor Rizki','VP HR MS','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Ronny S','020009','081287916979','Voxy','2019','B 2659 SIQ','2024-10-24','A','2021-02-06','','Pool','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Markusen','021904','085775351885','Camry','2017','B 1204 SAO','2022-08-25','B-I','2024-05-09','Ekariza','VP Portofolio','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['M Zaenuri','022237','082141634869','Fortuner','2017','B 1669 SJT','2022-10-02','A','2024-12-22','Irwan Priyasa','VP Legal Mega Proyek','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Nur Rachman','022271','087875908030','Fortuner','2017','B 1413 SJT','2022-09-07','A','2022-10-10','Syafii Triyono','VP Mega Proyek 2','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Melania Wulandria','022413','081210176138','Fortuner','2017','B 1698 SJT','2022-10-02','A','2021-09-14','Arief Wahidin S','VP Eksplorasi','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Zainal Fauzi','022414','08111666458','Fortuner','2019','B 2901 SJA','2024-10-17','A','2024-10-24','Charles P Siallagan','VP D&P','Toyota','Rahmat Hidayat','023256','081318692453','rahmat.hidayat@prima-armada-raya.com'],
			['Jonh Seven Alpacrison S','022425','081376996336','Fortuner','2019','B 2884 SJA','2024-10-19','B-II Umum','2021-07-15','Lindung Nainggolan','VP Complience','Toyota','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Sutrisno','022426','087839091242','Camry','2017','B 1209 SAO','2022-08-25','B-I Umum','2020-07-14','Dadi Sugiana','VP Acess & Facility','Toyota','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Tugiman','022460','081932920777','Camry','2016','B 1458 SAN','2021-11-26','A','2021-07-30','Suwahyanto','SVP Mega Proyek','Toyota','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Wisnu Barata','021836','087784621029','Fortuner','2017','B 1704 SJT','2022-10-02','A','2022-12-05','Manson Sihotang','VP CPS','Toyota','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Mustofa Haris','020160','081311220943','Serena','2017','B 2051 SZK','2022-11-10','A','2021-07-21','','POOL','Nissan','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Kartono Wijaya','020034','081311662803','Innova','2017','B 2157 SZJ','2022-10-30','A','2023-07-23','','POOL','Toyota','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Imam Dian Segara','020147','087888067141','Innova','2017','B 2491 SZJ','2022-11-02','A','2023-02-18','','POOL','Toyota','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Riko Syaputra','020648','081370181227','Innova','2018','B 2445 SYB','2023-06-21','A','2024-11-02','','POOL','Toyota','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Kamsari','020663','087880442378','Innova','2019','B 2169 SIR','2024-11-01','A','2021-02-06','','POOL','Toyota','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Mulya jaya','020664','085779940049','Serena','2017','B 2059 SZK','2022-11-10','A','2021-01-12','','POOL','Nissan','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Yusuf Ramli','020676','081546202826','Innova','2019','B 2440 SIR','2024-11-07','A','2023-04-04','','POOL','Toyota','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Khairul Rizki Ritonga','020733','085714081558','Innova','2018','B 2447 SYB','2023-06-21','A','2020-12-09','','POOL','Toyota','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Asep Nana Soviandi','020761','08567574016','Innova','2017','B 2119 SZJ','2022-10-30','A','2022-09-16','','POOL','Toyota','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Heryanto','020796','081293606140','Innova','2016','B 2915 SOI','2021-12-20','A','2024-03-23','','Pool Alokasi (Petrothemical)','Toyota','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Said','020825','085782878111','Innova','2016','B 2671 SOD','2021-10-26','A','2021-12-28','','POOL','Toyota','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Mastara Asmara','020827','085763861021','Innova','2016','B 2674 SOD','2021-10-26','A','2020-03-14','','POOL','Toyota','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Aris Pujianto','020828','081280864117','Innova','2017','B 2156 SZJ','2022-10-30','A','2020-06-06','','POOL','Toyota','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Faldi Andriansya','021885','085886112336','Innova','2019','B 2441 SIR','2024-11-05','A','2021-06-06','','POOL','Toyota','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Rajab S Djaha','021886','085257980663','Innova','2016','B 2303 SOF','2021-11-09','A','2021-05-05','','POOL','Toyota','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
			['Yaumar Ilif','022424','089603107006','Innova','2018','B 2429 SYB','2023-06-21','A','2022-11-06','','POOL','Toyota','Hadi Prayitno','020834','082299035665','hadiprayitno0011@gmail.com'],
		];

		foreach ($rows as $data) {

			$nama = $data[0];
			$nik = $data[1];
			$notlp = $data[2];
			$model = $data[3];
			$tahun = $data[4];
			$noplat = $data[5];
			$masastnk = $data[6];
			$jenissim = $data[7];
			$masasim = $data[8];
			$namauser = $data[9];
			$jabatan = $data[10];
			$merk = $data[11];

			$korlap = $data[12];
			$nikkorlap = $data[13];
			$nokorlap = $data[14];
			$email = $data[15];

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
		        $units->varian = 'TRD';
		        $units->years = $tahun;
		        $units->mes = '2700 cc';
		        $units->transmition = 'A/T';
		        $units->no_police = $noplat;
		        $units->mileage = '0';
		        $units->save();

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
		        $userkorlaps->wilayah_id = '42';
		        $userkorlaps->username = $nikkorlap;
		        $userkorlaps->password = '$2y$10$0Jp/X.QKiELqwUDrg.YghOPFsxRZqDXRu31/sYLupClkXXBmiWGB6';
		        $userkorlaps->first_name = $korlap;
		        $userkorlaps->phone = $nokorlap;
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

			$drive = new Drivers();
	        $drive->driver_id = $drivers->id;
	        $drive->unit_id = $unitss->id;
	        $drive->korlap_id = $korlaps->id;
	        $drive->user_id = $client->id;
	        $drive->asmen_id = '90';
	        $drive->manager_id = '91';
	        $drive->save();

	        if($masasim){

	        	$masa = new DocDriver();
		        $masa->user_id = $drivers->id;
		        $masa->document_id = '1';
		        $masa->exp_date = $masasim;
		        $masa->save();

	        }

	        if($masastnk){

	        	$masas = new DocUnit();
		        $masas->unit_id = $unitss->id;
		        $masas->document_id = '5';
		        $masas->exp_date = $masastnk;
		        $masas->save();

	        }


		}

		return view('import.index', compact('rows'));

    }
}
