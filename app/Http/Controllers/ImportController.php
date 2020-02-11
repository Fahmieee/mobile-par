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

	        ['BUDI DARMAWAN','023123','B 7080 SDB','HI ACE','','M/T','','COMMUTER','JTFSS22P3J0177904','2KDA976508'],
			['DIAN EKA PUTRA','023125','B 2151 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EMXJ1024524','1TRA571974'],
			['ANA','023128','B 7079 SDB','HI ACE','','M/T','','COMMUTER','JTFSS22P2J0180485','2KDA984878'],
			['IWAN DARMAWAN','023132','B 2095 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM2J1024422','1TRA570005'],
			['TEGUH SULISTYO','023134','B 7090 SDB','HI ACE','','M/T','','COMMUTER','JTFSS22P8J0176599','2KD  A972747'],
			['MUJIYONO','023135','B 2956 SYR','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM9J1024398','1TRA569678'],
			['YANDREZAL','023138','B 2133 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM8J1024537','1TRA572052'],
			['ROLIK','023147','B 2932 SYR','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM3J1024543','1TRA572046'],
			['SUYATNO','023331','B 2101 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM3J1024381','1TRA569329'],
			['Parno','023149','B 2952 SYR','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM8J1024375','1TRA569345'],
			['Rustanto Wibowo','023150','B 2936 SYR','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM5J1024348','1TRA568984'],
			['Suherman','023151','B 2105 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM3J1024509','1TRA571653'],
			['Ujang Iim','023152','B 2142 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM7J1024142','1TRA565307'],
			['Sandi Rismansyah','023154','B 2093 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM2J1024386','1TRA569501'],
			['DENNY IRMANSYAH','023299','B 2139 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM8J1024554','1TRA572499'],
			['KHAIRUL','023157','B 2147 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM9J1024546','1TRA572256'],
			['Nurhasan','023158','B 2131 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM8J1024392','1TRA569595'],
			['Usman Suryadiraga','023159','B 2115 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM5J1024544','1TRA572049'],
			['Soemarno','023160','B 2101 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM3J1024381','1TRA569329'],
			['Royani','023161','B 2097 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM2J1024520','1TRA571875'],
			['Keman Mulyadi','023163','B 1570 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS2J0883314','2GD  C438065'],
			['Adnan Pasaribu','023164','B 2644 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM4J1024227','1TRA566852'],
			['Umar Husen','023165','B 2099 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM2J1024548','1TRA572258'],
			['Abdul Hamid','023166','B 2912 SYR','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM0J1024256','1TRA567390'],
			['Abdullah','023167','B 2135 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM8J1024540','1TRA572162'],
			['M RUKANDAR','023168','B 2109 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM4J1024552','1TRA572350'],
			['IRFAN FIRDAUS','023169','B 2225 SYT','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM1J1024539','1TRA571975'],
			['RUSNANDAR','023170','B 2227 SYT','Toyota','V','A/T','2000 cc','Innova','MHFGW8EMXJ1024040','1TRA563591'],
			['AHMAD YANI','023171','B 2223 SYT','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM1J1024069','1TRA564026'],
			['MUNIEF INDRAJAYA','023172','B 2087 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM1J1023469','1TRA554444'],
			['EKO SUYATNO','023173','B 2149 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EMXJ1023616','1TRA556566'],
			['DONI CANDRA','023174','B 2918 SYR','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM2J1023643','1TRA557041'],
			['SUPRAPTO','023175','B 2117 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM7J1024125','1TRA565060'],
			['ACHMAD FATHONI','023176','B 2125 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM7J1024545','1TRA572252'],
			['SAEPUDIN ZAFAR','023177','B 2930 SYR','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM3J1024512','1TRA571581'],
			['SUHERUL','023178','B 2926 SYR','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM3J1024266','1TRA567598'],
			['NURTANTO','023179','B 2968 SYR','Toyota','V','A/T','2000 cc','Innova','MHFGW8EMXJ1024510','1TRA571659'],
			['ALI ROHMAN','023180','B 2277 SJB','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFJB8GS4K1577930','2GDC651864'],
			['SAPRONI','023181','B 2924 SYR','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM2J1024534','1TRA572032'],
			['SAHRONI','023182','B 2958 SYR','Toyota','V','A/T','2000 cc','Innova','MHFGW8EMXJ1024541','1TRA572166'],
			['RULLY MAYNAR','023183','B 2940 SYR','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM6J1024424','1TRA570209'],
			['JULKHAIDIR','023184','B 2928 SYR','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM3J1024526','1TRA571946'],
			['MATHIAS CONRAD','023185','B 2119 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM7J1024223','1TRA566871'],
			['HERI SULISTYANTO','023186','B 2091 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM1J1023701','1TRA557894'],
			['PACHLAFIND IMAN','023187','B 2085 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM0J1024547','1TRA572254'],
			['SAPRI','023189','B 2083 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM0J1024449','1TRA570399'],
			['SUPARMAN','023190','B 2916 SYR','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM1J1024511','1TRA571577'],
			['RIZAL','023191','B 2914 SYR','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM0J1024516','1TRA571676'],
			['ROCHMAT','023192','B 2121 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM7J1024240','1TRA567090'],
			['ROJALI MR, HM','023193','B 2135 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM8J1024540','1TRA572162'],
			['ATRYAN BRAMADEA YUDHISTIRA','023194','B 7100 SDB','HI ACE','','M/T','','COMMUTER','JTFSS22P9J0181388','2KDA987948'],
			['MARJUKI','023195','B 7086 SDB','HI ACE','','M/T','','COMMUTER','JTFSS22P6J0180506','2KDA985054'],
			['DONI SUWARNO','023196','B 7098 SDB','HI ACE','','M/T','','COMMUTER','JTFSS22P3J0180611','2KDA985252'],
			['WAHYU MARDIANTO','023197','B 7088 SDB','HI ACE','','M/T','','COMMUTER','JTFSS22P5J0181193','2KDA987233'],
			['HERU PURWANTO','023198','B 7080 SDB','HI ACE','','M/T','','COMMUTER','JTFSS22P3J0177904','2KDA976508'],
			['NAMID ZAELANI','023199','B 7103 SDB','HI ACE','','M/T','','COMMUTER','JTFSS22P1J0177514','2KDA975492'],
			['MANGARA TUAH SIRAGIH','023200','B 7087 SDB','HI ACE','','M/T','','COMMUTER','JTFSS22P1J0177397','2KDA975122'],
			['MAULANA JUSUF','023201','B 7084 SDB','HI ACE','','M/T','','COMMUTER','JTFSS22P7J0177307','2KD  A974902'],
			['MULYADI','023202','B 1547 SJY','Toyota','VRZ TRD LUXURY','A/T','2400 cc','FORTUNER','MHFGB8GS6J0883347','2GD  C438252'],
			['NUR IKHSAN','023204','B 7085 SDB','HI ACE','','M/T','','COMMUTER','JTFSS22P3J0176462','2KD  A972457'],
			['REZA ANDRIAN','023205','B 7077 SDB','HI ACE','','M/T','','COMMUTER','JTFSS22P7J0177761','2KD  A976213'],
			['SARTONO','022675','B 7082 SDB','HI ACE','','M/T','','COMMUTER','JTFSS22P0J0177665','2KD  A975848'],
			['SOLIKIN','023207','B 7081 SDB','HI ACE','','M/T','','COMMUTER','JTFSS22P4J0177846','2KD  A976422'],
			['SUJUD WIDODO','023208','B 1058 SJZ','Toyota','VRZ G Diesel','M/T','2400 cc','FORTUNER','MHFJB8GS1K1564875','2GDC501981'],
			['SURIPTO','023209','B 1041 SJZ','Toyota','VRZ G Diesel','M/T','2400 cc','FORTUNER','MHFJB8GS1K1564133','2GDC491283'],
			['SYAIFUL AZWAR','023210','B 1022 SJZ','Toyota','VRZ G Diesel','M/T','2400 cc','FORTUNER','MHFJB8GS7K1564461','2GDC497525'],
			['TUBAGUS RIFKI','023211','B 1043 SJZ','Toyota','VRZ G Diesel','M/T','2400 cc','FORTUNER','MHFJB8GS5K1564314','2GDC496479'],
			['ZULFADLI','023212','B 1030 SJZ','Toyota','VRZ G Diesel','M/T','2400 cc','FORTUNER','MHFJB8GS9K1563926','2GDC493823'],
			['MASRI','023213','B 1018 SJZ','Toyota','VRZ G Diesel','M/T','2400 cc','FORTUNER','MHFJB8GS7K1563892','2GDC489829'],
			['AGUS SUPARDI','023214','B 1045 SJZ','Toyota','VRZ G Diesel','M/T','2400 cc','FORTUNER','MHFJB8GS8K1564372','2GDC495288'],
			['ABRIYANTO','023215','B 1074 SJZ','Toyota','VRZ G Diesel','M/T','2400 cc','FORTUNER','MHFJB8GS5K1563499','2GDC482079'],
			['ALI SAID','023216','B 1130 SJZ','Toyota','VRZ G Diesel','M/T','2400 cc','FORTUNER','MHFKB8FS0K0087125','2GDC523490'],
			['DEDY RACHMAT','023217','B 1026 SJZ','Toyota','VRZ G Diesel','M/T','2400 cc','FORTUNER','MHFJB8FS4K0087094','2GDC513310'],
			['IWAN ROHENDI','023218','','','','','','','',''],
			['IWAN SANTIKA','023219','','','','','','','',''],
			['JUWEDI','023220','','','','','','','',''],
			['KUSUMAYANTO','023221','','','','','','','',''],
			['MUHAMMAD YASIN','023222','','','','','','','',''],
			['MARCO BASTIAN','023223','','','','','','','',''],
			['AGUS SETIAWAN','023300','','','','','','','',''],
			['MERI HANDOYO','023332','','','','','','','',''],
			['NUR ALAM','023442','B 2944 SYR','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM7J1024156','1TRA565471'],
			['MUHAMAD NURAFANDU','023559','B 2731 SIO','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM9K1028212','1TRA678559'],
			['HARI MUSLIM','023560','B 2338 SIO','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM7K1028421','1TRA683063'],
			['RUCHBIAN TADARUS','023544','B 2330 SIO','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM2K1028438','1TRA683843'],
			['YAYA RUHYANA','023687','B 9231 SAF','Hilux','','','','','MROAS12GOEOO14567','2KDS371303'],
			['HENDRA SURYANA PUTRA','023547','B 2703 SIO','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM3K1028254','1TRA679306'],
			['CANDRA GUNAWAN','023548','B 2376 SIO','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM4K1028490','1TRA684164'],
			['ENGKIN ZAINAL MUTAQIN','023550','B 2334 SIO','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM3K1028433','1TRA683253'],
			['BAHRUDDIN','023551','B 2336 SIO','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM4K1028392','1TRA682474'],
			['ARDIANA RIFAI','023552','B 2317 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM3J1024364','1TRA569119'],
			['NARSO','023688','','','','','','','',''],
			['SIRODJUDIN','023554','B 2113 SYS','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM5J1024169','1TRA565844'],
			['ARIE RADITIYA','023555','B 2328 SIO','Toyota','V','A/T','2000 cc','Innova','MHFGW8EMOK1028485','1TRA684072'],
			['HERY CAHYADI','023557','B 2697 SIO','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM2K1028293','1TRA680231'],
			['NAWAWIH','023558','B 2326 SIO','Toyota','V','A/T','2000 cc','Innova','MHFGW8EMXK1028302','1TRA680498'],
			['MAULANA MUCHAMAD','023689','B 2401 SIU','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM4K1029266','1TRA705349'],
			['SAKTI DJODY EKAPUTRA','023690','B 2441 SIU','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM6K1029270','1TRA705959'],
			['JAYA KARINA','023691','B 2287 SJB','Toyota','VRZ G Diesel','M/T','2400 cc','FORTUNER','MHFGB8GS4K0906691','2GDC659416'],
			['M DANDI RHAMARSA','023692','B 2397 SIU','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM9K1029229','1TRA704592'],
			['EKO MARWOTO','023693','B 2044 SIU','Toyota','V','A/T','2000 cc','Innova','MHFGW8EM8K1029285','1TRA705777'],
			['SUKIRNO','023749','','','','','','','',''],
			['Subana','023750','','','','','','','',''],
			['Sahrudin','023751','','','','','','','',''],
			['Nirwan Anwar','023752','','','','','','','',''],
			['OKI NURAHMAT','023606','B 7117 SDB','Isuzu','NLR55B','','','','MHCNLR55EKJ082966','M082966'],
			['ROBBY ROHIM','023703','B 7126 SDB','HI ACE','','M/T','','COMMUTER','JTFSS22P0K0183239','2KDA993898'],
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
			$namauser = '';
			$jabatan = '';

			$korlap = '';
			$nikkorlap = '';
			$varian = $data[4];
			$norangka = $data[8];
			$nomesin = $data[9];

			$noplatspasi = str_replace(' ', '', $noplat);

			$adaunit = Units::where("no_police",$noplat)
			->first();

			if(!$noplat == ''){

				if(!$adaunit){

					$units = new Units();
					$units->wilayah_id = '43';
					$units->pemilik = 'PAR';
					$units->merk = $merk;
			        $units->merk = $merk;
			        $units->model = $model;
			        $units->varian = $varian;
			        $units->mes = $mes;
			        $units->transmition = $transmisi;
			        $units->no_police = $noplat;
			        $units->mileage = '0';
			        $units->save();

			    } else {

			    	$clocks = Units::where(['no_police'=>$noplat])
	                ->update(['merk'=>$merk, 'model'=>$model, 'varian'=>$varian, 'mes'=> $mes, 'transmition'=> $transmisi]);
			    }

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
		        $drive->korlap_id = '37';
		        $drive->asmen_id = '90';
		        $drive->manager_id = '91';
		        $drive->save();

			} else {

				$driverz = Drivers::where(['id'=>$adadriverss->id])
                ->update(['driver_id'=>$drivers->id, 'korlap_id'=>'37']);

			}

		}

		return view('import.index', compact('rows'));

    }
}
