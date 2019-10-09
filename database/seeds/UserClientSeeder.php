<?php

use App\Users;
use App\Role;
use App\Jabatan;
use Illuminate\Database\Seeder;

class UserClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
	        ['Tanari','021779','KP PEDONGKELAN RT 003/015 KEL KAYU PUTIH KEC PULOGADUNG ','08778190074','B 1175 SAO','IT M&T Jakarta Area Manager','Toyota','New Corolla Altis ','V','1800 cc','AT','Hitam','2017','21','MR053REH2H4103459','2ZRY375418'],
			['Darminto','021781','JL TIPAR CAKUNG RT 006/005 SUKAPURA JAKARTA UTARA ','081282334276','B 1178 SAO','Retail Fuel Marketing Manager Reg. III','Toyota','New Corolla Altis ','V','1800 cc','AT','Hitam','2017','21','MR053REH2H4103459','2ZRY401816'],
			['Wiliam','020571','Pamulang Permai I Blok A-06/6-7 RT/RW 001/010 Kel. Pamulang Barat Kec. Pamulang Kota Tangerang Selatan Banten','081310994520','B 1179 SAO','Industri Fuel Marketting','Toyota','New Corolla Altis ','V','1800 cc','AT','Hitam','2017','21','MR053REH2H4103459','2ZRY384415'],
			['Wahmad','021778','JL KOBER ULU RT 013/009 RAWA BUNGA JATINEGARA JAKARTA TIMUR','087888404466','B 1181 SAO','Finance Manager MOR III','Toyota','New Corolla Altis ','V','1800 cc','AT','Hitam','2017','21','MR053REH2H4103459','2ZRY375146'],
			['Ikrom','021765','DUSUN SUKAWERA RT.016 RW.004 KEL.MEKARJAYA KEC.COMPRENG','081314066745','B 1182 SAO','Manager S&D','Toyota','New Corolla Altis ','V','1800 cc','AT','Hitam','2017','21','MR053REH2H4103725','2ZRY407494'],
			['M. Rodudin','020283','Gang Mangseng IV RT/RW 001/024 Kel.Kaliabang Tengah Kec.Bekasi Utara Kota Bekasi','082113541641','B 1185 SAP','Manager Marine Balongan','Toyota','New Corolla Altis ','V','1800 cc','AT','Hitam','2018','21','MR053REH2J4104305','2ZRX647654'],
			['Suwanto','020590','Rancawiru RT/RW 003/003 Kel.Rancawiru Kec.Pangkah Kota Tegal','082111963040','B 1189 SAO','Area Manager Legal Counsel MOR III','Toyota','New Corolla Altis ','V','1800 cc','AT','Hitam','2017','21','MR053REH2H4103450','2ZRX609463'],
			['Prasetya K. Sena','022485','Cipinang Melayu RT/03 /01 Cipinang Melayu jakarta Timur','081382354292','B 1192 SAO','Man Marketting & Trading Internal Audit Jkt','Toyota','New Corolla Altis ','V','1800 cc','AT','Hitam','2017','21','MR053REH2H4103493','2ZRY377467'],
			['Ramdani','020573','Jl. Cipeucang III No. 36 RT/RW 007/013 Kel. Koja Kec. Koja Jakarta Utara','081288106711','B 2038 SYC','Pool TBBM Tg. Priok','Toyota','Kijang Innova','G','2000 cc','MT','Hitam','2018','25','MHFJW8EM6J2355200','1TRA487337'],
			['Novie Alfian Palar','020557','Jl. Kesenian No. 1 RT/RW 006/009 Kel. Duren Sawit Kec. Duren Sawit Jakarta Timur','082113642866','B 2448 SYB','Senior SE Retail','Toyota','Kijang Innova','G','2400 cc','MT','Hitam','2018','21','MHFJB8EM8J1035393','2GD4454835'],
			['Iman Kurniawan','020290','Jl.Lenteng Agung RT/RW 010/005 Kel.Lenteng Agung Kec.Jagakarsa Kota Jakarta Selatan','087781658627','B 2449 SYB','Senior SE Retail','Toyota','Kijang Innova','G','2400 cc','MT','Hitam','2018','21','MHFJB8EM8J1035183','2GD4452553'],
			['Anwar Sadad','021782','JL BALIMATRAMAN NO 04 RT 008/006 MANGGARAI TEBET JAKARTA SELATAN ','087896558960','B 2494 SYB','Operasional Marine Tg. Gerem','Toyota','Kijang Innova','G','2400 cc','MT','Hitam','2018','25','MHFJB8EM7J1035496','2GD4455848'],
			['Wahyu Hidayat','020547','JL. ANGKASA DLM 1 RT 009 RW 003 KEL. GUNUGN SAHARI SELATAN KEC. KEBAYORAN - JAKARTA PUSAT','083834155577','B 2592 SYB','OH TBBM Plumpang','Toyota','Kijang Innova','G','2400 cc','MT','Hitam','2018','22','MHFJB8EM1J1030388','2GD4411661'],
			['Muhammad Ali','020593','Kartika Wanasari Blok C.1/12 RT/RW 003/031 Kel.Wanasari Kec.Cibitung Kota Bekasi','081287788120','B 2637 SYB','OAM LPG ','Toyota','Kijang Innova','G','2000 cc','MT','Hitam','2018','21','MHFJW8EM5J2353776','1TRA478639'],
			['Bambang Suharto','021772','JL SUMBER PELITA RT 004/ RW 001 KEL SUMUR BATU KEC KEMAYORAN ','085219603024','B 2648 SYB','Head Of Security','Toyota','Kijang Innova','G','2000 cc','MT','Hitam','2018','21','MHFJW8EMXJ2354275','1TRA481632'],
			['M. Jamaludin Akbar','021802','Kp.Warung Jengkol RT/RW 005/013 Kel.Pegangsaan Dua Kec.Kelapa Gading Kota Jakarta Utara','081381334242','B 2649 SYB','OH MWH LPG','Toyota','Kijang Innova','G','2400 cc','MT','Hitam','2018','25','MHFJB8EM5J1032497','2GD4430014'],
			['Hendra Kurniawan','020702','Pondok Sukmajaya Permai Blok A4 No.8 RT/RW 003/003 Kel.Sukmajaya Kec.Sukmajaya Depok','08126363518','B 2835 SYC','Pool Kramat 59','Toyota','Kijang Innova','G','2000 cc','MT','Hitam','2018','21','MHFJW8EM2J2355078','1TRA486289'],
			['Karsono','020708','Jl.Kebon Kelapa Tinggi RT/RW 017/008 Kel.Utan Kayu Selatan Kec.Matraman Kota Jakarta Timur','08816142782','B 2968 SYC','Ops. Aviasi','Toyota','Kijang Innova','G','2000 cc','MT','Hitam','2018','21','MHFJW8EM6J2354547','1TRA483358'],
		];

		foreach ($rows as $data) {

			$first_name = $data[0];
			$username = $data[1];
			$alamat = $data[2];
			$phone = $data[3];
			$no_police = $data[4];
			$jabatan = $data[5];
			$merk_mobil = $data[6];
			$model = $data[7];
			$varian = $data[8];
			$mes = $data[9];
			$transmisi = $data[10];
			$warna = $data[11];
			$tahun = $data[12];
			$wilayah_id = $data[13];
			$chasis = $data[14];
			$no_mesin = $data[15];

			$nopol = str_replace(' ', '', $no_police);


			$jabatan = Jabatan::firstOrCreate(['jabatan_name' => $jabatan]);

			$userclient = Users::firstOrCreate([
				'jabatan_id' => $jabatan->id,
				'company_id' => '2',
				'wilayah_id' => $wilayah_id,
				'username' => $nopol,
				'password' => '$2y$10$0Jp/X.QKiELqwUDrg.YghOPFsxRZqDXRu31/sYLupClkXXBmiWGB6',
				'flag_pass' => '0',
				'flag_prof' => '0',

			]);

			$roles = Role::firstOrCreate([
				'user_id' => $userclient->id,
				'role_id' => '3',
				
			]);

		}
    }
}
