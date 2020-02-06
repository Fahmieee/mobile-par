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

	        ['Aam Aben','021097','087780530912','Toyota','Fortuner','2019','B 2916 SJA','2024-10-19','2021-12-22','Noor Muhammad Zein','VP ASSET MANAGEMENT'],
			['Abdul Kadir Sanusi','020842','081388589494','Toyota','Fortuner','2019','B 2905 SJA','2024-10-17','','','VP UPSTREAM GAS & NRE INTERNAL AUDIT'],
			['Achmad Jaenudin','023287','081288156076','Mercedez Benz','C200','2017','B 1702 SAO','2022-12-27','2024-05-31','','Direktur Hulu'],
			['Adi Rusnadi','020750','','Toyota','Alphard','2019','B 2657 SIQ','2024-10-24','','','Direktur PIMR'],
			['Adman','021341','081322570505','Toyota','Alphard','2019','B 2484 SIQ','2024-10-29','','','DIRektur PEMASARAN RETAIL'],
			['Afipuddin','022640','082112800681','Toyota','Fortuner','2017','B 1740 SJT','2022-10-06','2021-05-06','','VP HSSE Refinery'],
			['Agus Murtanto','022489','0818701237','Toyota','Camry','2019','B 1230 SAQ','2024-10-25','2024-08-11','','SVP REFAINING PERFORMANCE EXCELENT'],
			['Ahmad Mujacky','022385','081210215220','Toyota','Fortuner','2019','B 2915 SJA','2024-10-17','2024-09-11','','VP Corporate Action & Sinergy'],
			['Ahmad Rizmi','','','Toyota','Fortuner','2017','B 1410 SJT','2024-11-11','','','VP SHIPPING OPERATION'],
			['Ahmad Sulaiman','020459','085776588764','Toyota','Fortuner','2017','B 1399 SJT','2022-09-07','','','VP FUEL SALLES'],
			['Ali Ahmadi','020715','081291070655','Toyota','Alphard','2019','B 2653 SIQ','2024-10-24','','','Direktur PENGOLAHAN'],
			['Alkisah','020737','085880306044','Toyota','Fortuner','2019','B 2922 SJA','2024-10-19','','','VP PROJECT MANAGEMENT OFFICE'],
			['Amiruddin','','','Toyota','Fortuner','2017','B 1669 SJT','2022-10-02','2022-04-27','','VP Corporate Business Initiative Management'],
			['Andrianto','021903','085313186637','Toyota','Fortuner','2017','B 1705 SJT','2022-10-02','','','VP HUMAN CAPITAL MANAGEMENT UPSTREAM'],
			['Anthony Etta','022415','','Toyota','Alphard','2019','B 2482 SIQ','2024-10-29','2024-04-22','','Direktur Pemasaran Corporate'],
			['Arif Rahman','','','Toyota','Kijang  Innova','2019','B 2133 SIR','2024-11-01','2021-05-09','','Ops SSC/ GANJIL (Gd.Elnusa)'],
			['Asep Nana Rohana','021091','','Toyota','Camry','2019','B 1295 SAQ','2024-11-15','','','SVP CORPORATE MARKETING BUSINESS '],
			['Asep Rukmana','021880','082116077477','Toyota','Fortuner','2017','B 1670 SJT','2022-10-02','','','VP COMMUNICATION PROJECT COORDINATOR'],
			['Asep Yudi Muchtar','020763','087880534116','Toyota','Camry','2019','B 1421 SAQ','2024-12-26','','',' SVP CSS'],
			['Bayu Saputra','023438','082122846868','Toyota','Camry','2017','B 1465 SAO','2022-10-04','2023-07-02','','SVP Refining Operation'],
			['Benny Bahri','020271','081219328061','Nissan','Xtrail','2019','B 2400 SIW','2024-12-30','','','BOD'],
			['Beny Sukardi','020779','','Toyota','Camry','2019','B 1220 SAQ','2024-10-29','','','SVP UPSTREAM BUSINESS DEVELOPMENT'],
			['Budi Akman','022637','0812082582200','Toyota',' Innova Venturer','2017','B 2739 SOY','2022-06-22','','','DEKOM'],
			['Budi Santoso','020410','','Toyota','Fortuner','2019','B 2930 SJA','2024-10-19','','','VP CRUDE AND PRODUCT TRADING &COMMERCIAL -ISC'],
			['Budianto Kamal','020783','','Toyota','Camry','2019','B 1299 SAQ','2024-11-15','','','SVP DEVELOPMENT & PRODUCTION'],
			['Budiyono','020780','082113388710','Toyota','Fortuner','2019','B 2883 SJA','2024-10-17','','','VP IT OPERATION'],
			['Dadan Wildan','023651','082125513823','Toyota','Fortuner','2019','B 2893 SJA','2024-10-17','2022-06-28','','VP INVESTIGATION AUDIT'],
			['Dani Riswara','021793','0852 2172 6878','Toyota','Kijang  Innova','2019','B 2802 SIQ','2024-11-01','','','RDMP CILACAP'],
			['Danny Antarekhsa','022641','087788530119','Toyota','Kijang  Innova','2018','B 2359 SZN','2024-02-19','2022-10-14','','Key Account'],
			['Darmaji','022246','081283025461','Toyota','Fortuner','2017','B 1128 SJT','2022-08-10','','','VP BUSINESS DEMAND'],
			['David Stanly','023285','081293625980','Toyota','Fortuner','2019','B 2946 SJA','2024-10-21','2021-03-15','','VP SPBD'],
			['David Verawan','020063','081288346277','Toyota','Fortuner','2017','B 1401 SJT','2022-09-07','','','VP COORPORATE SECURITY'],
			['Dede payo','020736','082210048899','Toyota','Camry','2017','B 1925 SAN','2022-06-09','','','SVP CONTROLLER'],
			['Deden Murdiana','021775','081908800011','Toyota','Kijang  Innova','2017','B 2945 SZD','2022-08-28','','','Technical service'],
			['Deni Kuswanto','','','Toyota','Kijang  Innova','2019','B 2558 SIT','2024-11-21','','','Sr. Account Manager Bitumen Industry'],
			['Deny Syaiful','022410','','Toyota','Fortuner','2017','B 1394 SJT','2022-09-07','2021-07-02','','VP DEVELOPMENT & PRODUCTION OFTIMIZATION'],
			['Dhaniel Nurmansyah ','023437','','Toyota','Fortuner','2019','B 2887 SJA','2024-10-17','2021-08-23','','VP QAS'],
			['Dodi Prayitno','021750','088211435185','Toyota','Fortuner','2017','B 1364 SJS','2022-05-23','','','VP INDUSTRIAL FUEL MARKETING'],
			['Edi Santoso','023675','','Toyota','Fortuner','2019','B 2881 SJA','2024-10-17','2020-05-30','','VP MARINE'],
			['Eka Kurnia','022809','087781252564','Toyota','Fortuner','2018','B 1928 SJV','2023-06-23','2021-09-07','','VP NON JAWABALINUS'],
			['Eko Candra','020803','081380592850','Toyota','Fortuner','2019','B 2013 SJB','2024-10-26','','','VP PEOPLE MANAGEMENT'],
			['Eko Maryanto','','','Toyota','Kijang  Innova','2019','B 2117 SIR','2024-11-01','2020-12-10','','RTC'],
			['Eko Saputra','023421','081386849209','Toyota','Fortuner','2017','B 1702 SJT','2022-10-02','2020-12-14','','VP ENGINERING SERVICE'],
			['Eko Widoro Adistya L','021090','','Toyota','Kijang  Innova','2016','B 2798 SOJ','2021-12-29','','','Manager Inmar Marketing'],
			['Erwin Yulianto','021767','081807805077','Toyota','Camry','2019','B 1407 SAQ','2024-12-19','','','SVP RETAIL MARKETING BUSINESS'],
			['Fahrul Rozi','022436','08978449004','Toyota','Kijang  Innova','2018','B 2450 SYB','2023-06-21','2024-03-18','','SSC'],
			['Fahrurozi','022434','085697520666','Toyota','Kijang  Innova','2018','B 2459 SYB','2023-06-21','2021-08-10','','BBM SATU HARGA'],
			['Faisal Ruslani','020018','081807575682','Toyota','Fortuner','2017','B 1411 SJT','2022-09-07','','','VP CSR & SME PARTNERSHIP PROGRAM'],
			['Fardli Syachri','021829','081280957576','Toyota','Camry','2017','B 1565 SAO','2022-10-21','','','SVP Supply Distribution & Infrastrukture'],
			['Fatchurrahman','020116','087834167316','Toyota','Kijang  Innova','2019','B 2604 SIT','2024-11-22','','','Petrochemical Operation-operasional fungsi Operation & Services'],
			['Feri Supriatna','020826','081213653978','Toyota','Camry','2019','B 1427 SAQ','2025-01-07','','','SVP CORPORATE STRATEGIC PLANNING & DEV'],
			['Frans Lahilatu','020105','','Toyota','Kijang  Innova','2016','B 2796 SOJ','2021-12-29','','','Manager Marene'],
			['Galuh Setya Budi','022811','','Toyota','Fortuner','2019','B 2896 SJA','2024-10-19','2022-05-06','','VP UPSTREAM PERFORMANCE EVALUATION'],
			['Gandi','020113','','Toyota','Kijang  Innova','2018','B 2357 SZN','2020-12-22','','','S&D'],
			['Gatot Wahyudiono','021884','081351880608','Toyota','Kijang  Innova','2019','B 2135 SIR','2024-11-01','','','RDMP CILACAP'],
			['Gusti Fadli','020101','','Toyota','Kijang  Innova','2018','B 2941 SZM','2022-12-27','','','Dom Gas'],
			['Hadi Purwoko','020781','087881444671','Toyota','Fortuner','2017','B 1703 SJT','2022-10-02','','','VP PROCUREMENT EXCELLEN CENTER'],
			['Hadiyana','020765','081388456072','Toyota','Camry','2017','B 1564 SAO','2022-10-21','2021-04-23','','SVP ENGINERING'],
			['Haerudin','021830','082123195051','Toyota','Fortuner','2017','B 1695 SJT','2022-10-02','','','VP OMS'],
			['Hardiansyah','','','Toyota','Fortuner','2019','B 2906 SJA','2024-10-19','2021-01-05','','VP Project Leader Rokam Hulu'],
			['Hari Budiman','020115','','Toyota','Kijang  Innova','2018','B 2403 SZN','2020-12-22','','','Key Account'],
			['Hartono','021817','082123759800','Toyota','Camry','2019','B 1224 SAQ','2024-10-29','','','SVP FINANCING BUSS SUPPORT'],
			['Hendra','020785','','Mercedez Benz','C200','2017','B 1831 SAO','2023-02-24','','','Dir Pemasaran Corporate'],
			['Hendra Kuswara','022813','','Toyota','Fortuner','2019','B 2914 SJA','2024-10-19','2023-01-15','','VP UPSTREAM BUSINESS GROWTH'],
			['Herdian Iskandar','022482','081220986667','Mitsubishi','Triton DC','2018','B 9266 SBC','2023-07-18','2023-11-12','','SCURITY'],
			['Herlan Wahyudi','023395','081383068148','Toyota','Fortuner','2019','B 2908 SJA','2024-10-19','2022-07-07','','VP PERFORMANCE SUPPORT'],
			['Hernomo Catur Wulan','020310','081284123054','Mercedez Benz','C200','2017','B 1704 SAO','2022-12-27','','','Dir SDM'],
			['Hidayat','022270','089693813715','Toyota','Kijang  Innova','2019','B 2139 SIR','2024-11-01','2021-09-22','','Fungsi Quality & Audit Support'],
			['Hot Budi Saragih','020402','','Toyota','Kijang  Innova','2019','B 2016 SIR','2024-11-04','','','Petrothemical'],
			['Idrus','023470','087771279059','Toyota','Fortuner','2019','B 2904 SJA','2024-10-19','2020-07-08','','VP Operation & Service'],
			['Iman Kustaman','020620','081317814862','Toyota','Kijang  Innova','2019','B 2149 SIR','2024-11-01','','','Technical Service'],
			['Indra Hermawan','020806','0878279551088','Toyota','Fortuner','2019','B 2945 SJA','2024-10-19','','','VP SUPPLY & DISTRIBUTION'],
			['Indranata','021860','087786622015','Toyota','Fortuner','2019','B 2921 SJA','2024-10-18','','','VP Project Finance Controller'],
			['Irwan','022386','081382007937','Toyota','Kijang  Innova','2019','B 2822 SIQ','2024-11-01','2022-05-23','','QAS'],
			['Iskandar Fauzi','020753','081287155530','Toyota','Kijang  Innova','2018','B 2556 SZN','2020-12-22','','','RFM'],
			['Jaenal Aripin','020110','','Toyota','Kijang  Innova','2018','B 2937 SZM','2022-12-27','','','RFM'],
			['Jalal','022775','','Toyota','Fortuner','2017','B 1402 SJT','2022-09-07','','','VP TAX'],
			['Jamhari Bahrum','020751','081291294999','Toyota','Kijang  Innova','2019','B 2175 SIR','2024-11-01','','','Enginering Service'],
			['Jasmin','021293','085890519259','Toyota','Camry','2017','B 1820 SAN','2022-05-02','2023-10-10','Afandi','SVP CORPORATE BUSINESS OPTIMIZATION'],
			['Jejen Zaelani','022800','','Toyota','Fortuner','2017','B 1690 SJT','2022-10-02','2023-07-28','','VP ASSET OPTIMIZATION'],
			['Jerry William Toppa','','','Toyota','Fortuner','2017','B 1700 SJT','2022-09-30','','','VP Reliability'],
			['Jikin','021910','085920647083','Toyota','Fortuner','2017','B 1686 SJT','2022-10-02','2021-05-10','','VP IT ARCHITECTURE, SECURITY & POLICY CORPORATE'],
			['Jimmy Hendrik','020095','','Toyota','Kijang  Innova','2018','B 2945 SZM','2020-12-22','','','Key Account'],
			['Johan Wahyudi','020841','0817180661','Toyota','Fortuner','2017','B 1426 SJT','2022-09-07','','','VP DOWNSTREAM INTERNAL AUDIT'],
			['Joko Yunanto','020581','08892561559','Toyota','Kijang  Innova','2018','B 2502 SYE','2023-07-23','','','GASTEK'],
			['Jonh Seven Alpacrison','022425','081292928525','Toyota','Fortuner','2019','B 2884 SJA','2024-10-19','2021-07-15','','VP COMPLIANCE'],
			['Junaydi','021902','085813330522','Toyota','Alphard','2019','B 2486 SIQ','2024-10-25','2019-09-29','','Direktur Utama'],
			['Kamalludin','023294','085111612400','Toyota','Fortuner','2019','B 2965 SJA','2024-10-21','2024-11-14','','VP Upstream Planning & Portfolio'],
			['Kandi Antono','020746','081298110631','Toyota','Fortuner','2019','B 2918 SJA','2024-10-19','','','VP HCP'],
			['Kasanuddin','022774','083875990142','Toyota','Fortuner','2019','B 2879 SJA','2024-10-17','2024-06-15','','VP SHARED PROCESSING CENTER-ICT'],
			['Kasmari Trio Isdarwato','020099','','Toyota','Kijang  Innova','2018','B 2461 SZN','2022-12-27','','','Dom Gas'],
			['Khalid Regize A','020296','','Toyota','Kijang  Innova','2018','B 2585 SZN','2020-12-22','','','Key Account'],
			['Khamami','021883','081318828702','Toyota','Fortuner','2017','B 1407 SJT','2022-09-07','','','VP LEGAL COUNSEL UPSTREAM & GAS'],
			['Kholidin','021094','','Toyota','Kijang  Innova','2016','B 2011 SOJ','2021-12-21','','','Petrothemical'],
			['Kiki Wahyudi','','','Toyota','Kijang  Innova','2019','B 2113 SIR','2024-11-01','','','Ops SSC /GANJIL (Gd Pelita Air)'],
			['Komarudin','022393','','Toyota','Fortuner','2017','B 1412 SJT','2022-09-07','2023-07-05','','VP STRATEGIC PROJECT INTERNAL AUDIT'],
			['Kosim','020311','081381842873','Mercedez Benz','C200','2017','B 1690 SAN','2022-03-20','','','Dir PIMR'],
			['Krisnanto','020121','','Toyota','Kijang  Innova','2018','B 2296 SZN','2020-12-22','','','Gas Dom'],
			['Kristianto','','','Toyota','Fortuner','2017','B 1395 SJT','2022-09-07','2023-12-25','','VP STAKEHOLDER RELATIONS'],
			['Kusmarwanto','021551','','Toyota','Kijang  Innova','2018','B 2939 SZM','2020-12-22','','','Aviasi'],
			['Ludwig Marius S','022389','087888482001','Toyota','Fortuner','2019','B 2898 SJA','2024-10-19','2022-03-18','','VP PROJECT COORDINATOR RDMP CILACAP'],
			['Lutfi Maulana','020820','','Toyota','Kijang  Innova','2019','B 2893 SIR','2024-11-11','','','Gas Dom'],
			['M Ikhwani','020300','081385239237','Toyota','Fortuner','2017','B 1582 SJT','2022-09-20','2023-03-17','','VP LEGAL DOWNSTREEM'],
			['M Luthfi Yuda','020819','081311662741','Toyota','Fortuner','2017','B 1691 SJT','2022-10-02','','','VP HUMAN CAPITAL MANAGEMENT DOWNSTREAM'],
			['M Yohansyah','022638','081245885243','Toyota','Fortuner','2019','B 2899 SJA','2024-10-17','2024-03-08','','VP IT SOLUTION'],
			['M. Candra','023537','081281855707','Toyota','Fortuner','2017','B 1696 SJT','2022-10-02','2024-01-04','','VP OWN FLEET'],
			['M. Feri Haryanto','020818','085888385771','Toyota','Fortuner','2019','B 2912 SJA','2024-10-19','','','VP CORPORATE INTERNAL AUDIT'],
			['M. Irfan','020320','082111340377','Toyota','Kijang  Innova','2019','B 2312 SIT','2024-11-18','','','BOD'],
			['M. Khairul Fachrudin','020006','0811965192','Toyota','Hilux DC','2019','B 9933 SBC','2024-10-24','','','RTC Pulogadung'],
			['M. Nur Khozim','020551','081327004832','Toyota','Kijang  Innova','2018','B 2126 SYE','2023-07-18','','','GASTEK'],
			['M. Rizky','020475','085777749501','Toyota','Fortuner','2017','B 1707 SJT','2022-10-02','','','VP EXPLORATION EVALUATION'],
			['M. Teguh Iman Sentosa','021791','087877439330','Toyota','Kijang  Innova','2016','B 2326 SOJ','2021-12-23','','','MARKOM'],
			['M. Zaenuri','022237','082141634869','Toyota','Fortuner','2017','B 1406 SJT','2022-09-07','','','VP PROJECT LEGAL'],
			['Mahpud','020717','081288257710','Toyota','Kijang  Innova','2019','B 2046 SIR','2024-11-04','','','Key Account'],
			['Mamad','','','Toyota','Kijang  Innova','2019','B 2806 SIQ','2024-11-01','2023-10-11','','Fungsi Operasi ISC'],
			['Mariyadi','023476','','Toyota','Fortuner','2019','B 2943 SJA','2024-10-19','2023-08-06','','VP PROJECT FINANCE-CONTROLLER'],
			['Markusen','021904','081317706258','Toyota','Camry','2017','B 1204 SAO','2022-08-25','2024-05-09','Ekariza','SVP Upstream Strategic Planning & Performance Evaluation'],
			['Maryanto','021882','081389511566','Toyota','Fortuner','2017','B 1667 SJT','2022-10-02','','','VP HUMAN CAPITAL MANAGEMENT CORPORATE'],
			['Masrizal','020045','081314999354','Toyota','Kijang  Innova','2017','B 2122 SZJ','2022-10-30','','','Dom Gas'],
			['Maulana','023236','081286897377','Toyota','Fortuner','2019','B 2902 SJA','2024-10-19','2022-09-19','','VP BUSINESS INTIATIVES & VALUATION'],
			['Melania Wulandria','022413','','Toyota','Fortuner','2017','B 1698 SJT','2022-10-02','2021-09-14','Arief Wahidin S','VP EXPLORATIONI OPTIMIZATION'],
			['Mualim','020010','081316407672','Toyota','Fortuner','2017','B 1697 SJT','2022-10-02','','','VP SSC'],
			['Muhamad Asaduddin','020104','','Toyota','Kijang  Innova','2018','B 2360 SZN','2020-12-22','','','Key Account'],
			['Muhamad Fauzi','020477','085882037280','Toyota','Alphard','2019','B 2480 SIQ','2024-10-29','','','Dir Asset Management'],
			['Muhammad Edwin','022468','081290075200','Toyota','Fortuner','2019','B 2895 SJA','2024-10-17','2023-07-01','','VP FINANCIAL ACOUNTING & REPORTING CONTROLLER'],
			['Muhammad Romli','020102','','Toyota','Kijang  Innova','2018','B 2549 SZN','2020-12-22','','','RFM'],
			['Muhammad Syafrudin','020134','081383653511','Toyota','Fortuner','2019','B 2897 SJA','2024-10-17','','','VP PROJECT COORDINATOR NGRR BONTANG'],
			['Muhsinudin','','','Toyota','Kijang  Innova','2019','B 2187 SIR','2024-11-01','','','Account Manager Chemical Industry II'],
			['Muhtar','020303','081314095029','Toyota','Alphard','2016','B 2925 SOH','2021-12-09','','','Cadangan BOD'],
			['Mulkan Syarif','','','Toyota','Kijang  Innova','2018','B 2943 SZM','2020-12-22','','','Aviasi'],
			['Mulyadi','020108','085211576482','Toyota','Kijang  Innova','2018','B 2542 SZN','2020-12-22','2023-02-27','','RFM'],
			['Mulyadi','','','Toyota','Kijang  Innova','2019','B 2183 SIR','2024-11-01','','','Sr. Account Manager Polymer Industry'],
			['Munawir','023336','085608560881','Toyota','Fortuner','2017','B 1428 SJT','2022-09-07','2023-02-11','','VP FBS'],
			['Mursid Nawawi','020046','081366660256','Toyota','Kijang  Innova','2017','B 2151 SZJ','2022-10-30','','','Dom Gas'],
			['Muslih','022273','087880461266','Mercedez Benz','C200','2016','B 1152 SAP','2023-07-12','2020-07-28','','Dir Pemasaran Retail'],
			['Muslim','','','Toyota','Kijang  Innova','2019','B 2926 SIQ','2024-11-02','2024-10-25','','Board Support'],
			['Musnawir','021859','081218790789','Toyota','Camry','2019','B 1409 SAQ','2024-12-19','','','SVP HCD'],
			['Najmudin','020404','','Toyota','Kijang  Innova','2019','B 2314 SIT','2024-11-18','','','Aviasi'],
			['Nanang Kuswanto','020005','081249373339','Toyota','Fortuner','2019','B 2974 SJA','2024-10-19','','','VP REFINING BUSINESS DEVELOPMENT'],
			['Nanang S','020848','','Mercedez Benz','C200','2017','B 1834 SAO','2023-02-24','','','Dir Megaproyek'],
			['Nasril Manmiansyah','020847','','Toyota','Kijang  Innova','2019','B 2165 SIR','2024-11-01','','','Enginering Service'],
			['Noval Setya Pramana','020797','087776060932','Toyota','Fortuner','2017','B 1679 SJT','2022-10-02','2023-08-21','Annisrul Waqie','VP QUALITY SYSTEM & KNOWLEDGE'],
			['Novianto Prasetyo','021526','088210284928','Toyota','Kijang  Innova','2019','B 2177 SIR','2024-11-01','','','RDMP TUBAN'],
			['Nur Rachman','022271','081289882249','Toyota','Fortuner','2017','B 1413 SJT','2022-09-07','2022-10-10','Syafii Triyono','VP MEGAPROYEK MP2'],
			['Nurdin','020621','','Toyota','Kijang  Innova','2019','B 2596 SIT','2024-11-22','2021-09-30','','Technical Service'],
			['Nurdin','','','Toyota','Fortuner','2019','B 2928 SJA','2024-10-19','','','CEO Advisor Office'],
			['Nurodin','020107','','Toyota','Kijang  Innova','2018','B 2942 SZM','2022-12-27','','','RFM'],
			['Nuzurullah','020552','081284241387','Toyota','Kijang  Innova','2018','B 2484 SYE','2023-07-23','','','GASTEK'],
			['Oki Kurniawan','020284','081296663799','Toyota','Alphard','2018','B 2522 SYA','2023-05-31','','','DEKOM'],
			['Otot Sundaru','020810','082113244657','Toyota','Fortuner','2019','B 2913 SJA','2024-10-17','','','VP RELIABILITY & PROJECT DEVELOPMENT'],
			['Parining Sabdo','','','Toyota','Fortuner','2019','B 2909 SJA','2024-10-17','2024-11-21','','VP URT'],
			['Priyanto','','','Toyota','Kijang  Innova','2019','B 2318 SIT','2024-11-18','2024-10-25','','Fungsi Operation & Maintenance Support,'],
			['Puji','021103','08179164454','Toyota','Kijang  Innova','2016','B 2010 SOJ','2021-12-21','','','Manager Key Account Industri'],
			['Purwadi','020774','081316862024','Toyota','Kijang  Innova','2018','B 2425 SYB','2023-06-21','','','AVIASI'],
			['Purwanto 2','023235','085290036032','Toyota','Fortuner','2017','B 1674 SJT','2022-10-02','2021-01-24','','VP UPSTREAM TECHNOLOGY CENTER'],
			['Rahmat Edinaya','023600','082112326953','Toyota','Camry','2019','B 1303 SAQ','2024-11-18','2024-11-28','','SVP (Corporate Secretary)'],
			['Rhamza A','020004','082123647302','Toyota','Alphard','2017','B 2981 SZK','2022-11-24','','','Dir Megaproyek'],
			['Rianto Aftur Sobirin','','','Toyota','Alphard','2016','B 2209 SOJ','','2023-11-16','',''],
			['Ridwan Permana','023359','081285737499','Toyota','Kijang  Innova','2019','B 2840 SIQ','2024-11-01','','','UBD'],
			['Riyanto','021291','081212600761','Toyota','Camry','2019','B 1297 SAQ','2024-11-15','','','SVP/STAF AHLI DIRUT'],
			['Rizal','022459','081395122036','Mercedez Benz','C200','2017','B 1830 SAO','2023-02-24','2021-01-06','','Dir Pengolahan'],
			['Rizal','022633','081410492221','Toyota','Kijang  Innova','2019','B 2105 SIR','2024-11-01','2020-02-07','','Sr Account Manager SOEs II'],
			['Roland Karim','020823','082124243131','Toyota','Fortuner','2017','B 1699 SJT','2022-10-02','2021-07-10','Ega Legowo','VP CUSTOMER CARE'],
			['Romdhoni','020100','','Toyota','Kijang  Innova','2018','B 2355 SZN','2020-12-22','','','Key Account'],
			['Romel Sandiego','020114','','Toyota','Kijang  Innova','2018','B 2366 SZN','2020-12-22','','','Key Account'],
			['Ronal Sorimuda','020769','085691197589','Toyota','Kijang  Innova','2016','B 2009 SOJ','2021-12-21','','','Key Account'],
			['Ruan Maryoto','022250','081295999243','Toyota','Fortuner','2017','B 1673 SJT','2022-10-02','2021-10-07','','VP HSSE MANAGEMENT SYSTEM'],
			['Saepuloh','021810','','Toyota','Kijang  Innova','2018','B 2514 SYE','2023-07-23','','','Direktur LSCI'],
			['Saiful Bahri','020111','','Toyota','Kijang  Innova','2018','B 2946 SZM','2020-12-22','','','HR'],
			['Saipul Anwar','021755','081285652148','Toyota','Fortuner','2019','B 2920 SJA','2024-10-19','','','VP R&T PLANNING & COMMERCIAL'],
			['Samsul Maarif','020738','085792341411','Toyota','Camry','2019','B 1232 SAQ','2024-10-28','','','SVP exploration'],
			['Sanim','022812','081806311687','Toyota','Fortuner','2019','B 2892 SJA','2024-10-19','2020-06-05','','VP TREASURY'],
			['Sarkono','021531','085694564393','Toyota','Fortuner','2017','B 1754 SJT','2022-10-06','','','VP CBIM'],
			['Sendi Kurniawan','021821','082114820799','Toyota','Fortuner','2019','B 2963 SJA','2024-10-21','','','VP SCPO'],
			['Seno','020747','085219464379','Toyota','Camry','2017','B 1459 SAO','2022-10-04','','','SVP ASSET MANAGEMENT'],
			['Siswandi Wibiantoro','020148','','Toyota','Kijang  Innova','2018','B 2549 SYB','2023-06-21','','','AVIASI'],
			['Siswanto','020822','081284690329','Mercedez Benz','C200','2017','B 1740 SAN','2022-03-23','','','Dir LSCI'],
			['Siswanto 2','','','Mercedez Benz','C200','2017','B 1827 SAO','2023-02-24','','','Dir Keuangan'],
			['Slamet','021550','','Mitsubishi','Triton SC','2018','B 9711 SAI','2023-07-14','','','MTC'],
			['Sodikin','021816','085890425145','Toyota','Fortuner','2017','B 1751 SJT','2022-10-06','','','VP ASSET PLANNING OPERATION'],
			['Sofyan','023393','08993995639','Toyota','Fortuner','2019','B 2947 SJA','2024-10-19','2023-08-14','','VP LEGAL COUNCEL CORPORATE MATTERS'],
			['Solihagus','021813','085284290190','Toyota','Alphard','2019','B 2474 SIQ','2024-10-29','','','DIRT HULU'],
			['Sriyanto','020150','','Toyota','Kijang  Innova','2018','B 2536 SYB','2023-06-23','','','AVIASI'],
			['Suardi','020027','0811131394','Toyota','Kijang  Innova','2017','B 2049 SZJ','2022-10-27','','','MP2 Megaproyek'],
			['Subur','020812','','Toyota','Fortuner','2019','B 2885 SJA','2024-10-17','','','VP COMMERCIAL'],
			['Sudiyono','020821','','Toyota','Fortuner','2017','B 1701 SJT','2022-10-02','','','VP CONTRACTING & PROCUREMENT SERVICES'],
			['Suganda','020754','085782288608','Toyota','Camry','2019','B 1228 SAQ','2024-10-25','','','SVP SUPPLY DISTRIBUTION & INFRASTRUCTURE'],
			['Sugeng Riyadi','020735','085624632310','Toyota','Fortuner','2017','B 1134 SJT','2022-08-10','','','vacant'],
			['Sulaiman','020416','081218267628','Toyota','Kijang  Innova','2019','B 2816 SIQ','2024-11-01','','','RDMP BALONGAN'],
			['Suparman','021811','08138199802','Toyota','Camry','2019','B 1218 SAQ','2024-10-29','','','SVP CORPORATE HSSE'],
			['Suparno 1','020777','','Toyota','Fortuner','2017','B 1397 SJT','2022-09-07','','','VP PETROTHEMICAL TRADING'],
			['Suparno 2','020802','081314922853','Toyota','Camry','2019','B 1236 SAQ','2024-10-28','','','SVP CICT'],
			['Suparyanto','022636','','Toyota','Kijang  Innova','2017','B 2757 SZK','2022-11-21','','','Dir SDM'],
			['Supriyadi','020752','081290806578','Toyota','Fortuner','2019','B 2961 SJA','2024-10-21','','','VP CORPORATE BUSS STRATEGIC PLANNING'],
			['Supriyanto','023266','','Toyota','Fortuner','2019','B 2894 SJA','2024-10-19','2021-04-06','','VP CORPORATE COMMUNICATION CORPORATE SECRETARY'],
			['Supriyono A. P.','022412','','Toyota','Camry','2019','B 1301 SAQ','2024-11-15','2023-05-04','','SVP CHIEF LEGAL COUNSEL & COMPLIANCE '],
			['Sutoyo','020403','','Toyota','Kijang  Innova','2019','B 2171 SIR','2024-11-01','','','Aviasi'],
			['Sutrisno','022426','087839091242','Toyota','Camry','2017','B 1209 SAO','2022-08-25','2020-07-14','Dadi Sugiana','SVP RTC'],
			['Suyatmo','020743','0818491476','Toyota','Kijang  Innova','2019','B 2560 SIT','2024-11-21','','','Development & Production (D&P)'],
			['Suyono','022390','081228783696','Mercedez Benz','C200','2017','B 1829 SAO','2023-02-24','2022-07-22','','Dir Asset Management'],
			['Syafrudin Lessy','022274','','Toyota','Fortuner','2017','B 1681 SJT','2022-10-02','2023-04-07','','VP CORPORATE INVESTMENT REVIEW'],
			['Syahril','021795','0813 1869 0079','Toyota','Fortuner','2019','B 2903 SJA','2024-10-17','','','VP CORPORATE BUSINESS INITIATIVE MANAGEMENT'],
			['Syaifullah','022433','081218408680','Toyota','Kijang  Innova','2018','B 2419 SYB','2023-06-21','2020-06-29','','SPBD'],
			['Syawaludin','020307','085810694834','Nissan','Xtrail','2019','B 2909 SIW','2024-12-30','','','BOD'],
			['Takim','020384','','Toyota','Kijang  Innova','2019','B 2836 SIQ','2024-11-01','','','Sekper Insert, Steakholder'],
			['Tamsil Budiman','021861','087877130507','Toyota','Fortuner','2017','B 1403 SJT','2022-09-07','','','VP OPO'],
			['Tarso','023406','','Toyota','Fortuner','2017','B 1137 SJS','2022-04-11','2021-08-18','','VP RDMP Cilacap'],
			['Tasruhin','022801','081316729175','Toyota','Fortuner','2017','B 1398 SJT','2022-09-07','2020-03-03','','VP LNG'],
			['Taufik Taryana','021085','081319214748','Toyota','Camry','2017','B 1311 SAO','2022-09-14','','','SVP HCM'],
			['Tharmizi Ismail','020308','081280128095','Toyota','Kijang  Innova','2019','B 2255 SIR','2024-11-02','','','Ops BOD'],
			['Trima Jeti','021799','081808982885','Toyota','Fortuner','2017','B 1687 SJT','2022-10-02','2024-02-03','Dhani Prasetyawan','VP PETROCHEMICAL PROJECT COORDINATOR'],
			['Tugiman','022460','082114310870','Toyota','Camry','2019','B 1004 SSV','2021-11-26','2021-07-30','Suwahyanto','SVP PROJECT EXECUTION / MP2'],
			['Ujang Durrohman','023396','089522197603','Toyota','Fortuner','2019','B 2924 SJA','2024-10-19','2023-06-12','','VP MARKETING & SALLES SUPPORT'],
			['Usep Romansyah','020661','082124046692','Toyota','Kijang  Innova','2019','B 2895 SIR','2024-11-11','','','ISC'],
			['Usman','020686','081386812614','Toyota','Hilux DC','2019','B 9982 SAJ','2024-11-25','','','HSSE'],
			['Vahmi Zulfikar','021796','0896 5635 3105','Toyota','Kijang  Innova','2016','B 2039 SOJ','2021-12-21','','','Key Account'],
			['Wahyu Sulistiono','020685','08122096101','Toyota','Kijang  Innova','2019','B 2916 SIT','2024-11-26','','','Sr Account Manager Government Institutions'],
			['Waisul Kurnie','020831','081586276138','Toyota','Kijang  Innova','2019','B 2022 SIR','2024-11-04','','','D&P / HULU'],
			['Wakiman','020745','081315301009','Toyota','Alphard','2016','B 2209 SOJ','2021-12-22','','','Dir LSCI'],
			['Warsim','020400','','Toyota','Kijang  Innova','2019','B 2606 SIT','2024-11-22','','','Technical Service'],
			['Warsito','020313','081327638302','Toyota','Alphard','2019','B 2472 SIQ','2024-10-30','','','Cadangan BOD'],
			['Widiarso','021824','081381815759','Toyota','Fortuner','2019','B 2900 SJA','2024-10-19','','','VP STRATEGIC PLANNING & BUSS DEV'],
			['Wisnu Adriansyah','021342','082258661657','Toyota','Fortuner','2017','B 1603 SJT','2022-09-23','2020-09-10','Taswin','VP Organization & Man Power Planning'],
			['Yunus 2','020824','081290688553','Toyota','Kijang  Innova','2018','B 2356 SZN','2020-12-22','','','Aviasi'],
			['Yusuf Ismail','023436','081384821139','Toyota','Fortuner','2019','B 2910 SJA','2024-10-19','2020-10-08','','FSPPB'],
			['Zainul KTK','020815','081286229580','Toyota','Camry','2019','B 1226 SAQ','2024-10-25','','','SVP SHIPPING'],
			['Zul Asep Suhendar','021096','','Toyota','Kijang  Innova','2016','B 2138 SOO','2021-02-11','','','Key Account'],
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
			$namauser = $data[9];
			$jabatan = $data[10];

			$korlap = 'Bernadus Trinus (Dodi)';
			$nikkorlap = '023710';
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

		    } else {

		    	$userdrivers = Users::where(['username'=>$nik])
                ->update(['driver_type'=>'1']);

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
		        $userkorlaps->phone = '081286595990';
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
