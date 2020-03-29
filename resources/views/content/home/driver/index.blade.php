<div class="row" style="display: block;">
  <div class="col">
    <div class="card shadow">
      <div class="card-header bg-blue-par">
        <h5 class="text-uppercase text-white">MENU</h5>
      </div>

      @if($getdrivers->driver_type == '1')

        <div class="card-body bg-blue-par2" id="menu_icons">
          @if($adaizin)
          @if($adaizin->status_id != '1')
          <div class="alert alert-secondary" role="alert" align="center" style="padding-top: 0.5rem;padding-bottom: 0.5rem;">
            <h6>Status Anda Saat ini Adalah <b>{{ $adaizin->name }}</b></h6>
          </div>
          <br>
          @endif
          @endif
          <table border="0" align="center" id="foricons" width="100%" style="display: none;">
            <tr>
              <td width="5%" id="icon_check">
              </td>
              <td width="20%" style="padding-top: 10px" id="word_check">
              </td>
              <td width="5%" id="icon_medic">
              </td>
              <td width="20%" style="padding-top: 10px" id="word_medic">
              </td>
              <td  width="5%"id="icon_clock">
              </td>
              <td width="20%" style="padding-top: 10px" id="word_clock">
              </td>
              <td width="5%" id="icon_km">
              </td>
              <td width="20%" style="padding-top: 10px" id="word_km">
              </td>
            </tr>
            <tr height="20px">
              <td colspan="3"></td>
            </tr>
          </table>

          @php
            if($getunits->pemilik == 'PAR'){

              $ids = 'pretripcheck';
              $bg = 'bg-white';
              $iconcolor = '#0166b5';
              $textcolor = '#ffffff';

            } else {

              $ids = 'nopretripcheck';
              $bg = '';
              $iconcolor = '#3384c3';
              $textcolor = '#3384c3';

            }

          @endphp

          <table border="0" align="center" width="100%">
            <tr>
              <td align="center" width="25%">
                <div id="{{ $ids }}" class="icon icon-shape {{ $bg }} text-white rounded-circle shadow">
                    <i class="fas fa-car" style="color: {{ $iconcolor }};"></i>
                </div>
              </td>
              <td align="center" width="25%">
                <div id="medical" class="icon icon-shape bg-white text-white rounded-circle shadow">
                    <i class="fas fa-medkit" style="color: #0166b5"></i>
                </div>
              </td>
              <td align="center" width="25%" class="clock_icon">
                <div id="clockin" class="icon icon-shape bg-white text-white rounded-circle shadow">
                    <i class="fas fa-clock" style="color: #0166b5"></i>
                    <input type="hidden" id="selesai" value="0">
                </div>
              </td>
<!--               <td align="center" width="25%">
                <div id="history" class="icon icon-shape bg-white text-white rounded-circle shadow">
                    <i class="fas fa-history" style="color: #0166b5"></i>
                </div>
              </td> -->
            </tr>
            <tr>
               <td height="10px" colspan="7"></td> 
            </tr>
            <tr>
              <td align="center">
                <h6 class="text-uppercase ls-1 mb-1" style="color: {{ $textcolor }};">PTC</h6>
              </td>
              <td align="center">
                <h6 class="text-uppercase text-white ls-1 mb-1">DCU</h6>
              </td>
              <td align="center" id="clock_desc">
                <h6 class="text-uppercase text-white ls-1 mb-1">Clock In</h6>
              </td>
<!--               <td align="center">
                <h6 class="text-uppercase text-white ls-1 mb-1">Riwayat</h6>
              </td> -->
            </tr>
          </table>
          <br>
          <table border="0" align="center" width="100%">
            <tr>
              <td align="center" width="25%">
                <div id="{{ $adaizin ? 'sudahizin' : 'izin' }}" class="icon icon-shape bg-white text-white rounded-circle shadow">
                    <i class="fas fa-bed" style="color: #0166b5"></i>
                </div>
              </td>
              <td align="center" width="25%">
                <a href="/driver/rekap"><div class="icon icon-shape bg-white text-white rounded-circle shadow">
                    <i class="fas fa-book" style="color: #0166b5"></i>
                </div></a>
              </td>
              <td align="center" width="25%">
                <div id="history" class="icon icon-shape bg-white text-white rounded-circle shadow">
                    <i class="fas fa-road" style="color: #0166b5"></i>
                </div>
              </td>
            </tr>
            <tr>
               <td height="10px" colspan="7"></td> 
            </tr>
            <tr>
              <td align="center">
                <h6 class="text-uppercase text-white ls-1 mb-1">Cuti Izin <br/> Sakit</h6>
              </td>
              <td align="center" id="clock_desc">
                <h6 class="text-uppercase text-white ls-1 mb-1">Rekap<br/> Absensi</h6>
              </td>
              <td align="center">
                <h6 class="text-uppercase text-white ls-1 mb-1">Riwayat<br/> Jalan</h6>
              </td>
            </tr>
          </table>
        </div>

      @else 

        <div class="card-body bg-blue-par2" id="menu_icons" style="padding-left: 5px; padding-right: 5px;">
          <table border="0" align="center" id="foricons" width="100%" style="display: none;">
            <tr>
              <td width="5%" id="icon_check">
              </td>
              <td width="20%" style="padding-top: 10px" id="word_check">
              </td>
              <td width="5%" id="icon_medic">
              </td>
              <td width="20%" style="padding-top: 10px" id="word_medic">
              </td>
              <td  width="5%"id="icon_clock">
              </td>
              <td width="20%" style="padding-top: 10px" id="word_clock">
              </td>
              <td width="5%" id="icon_km">
              </td>
              <td width="20%" style="padding-top: 10px" id="word_km">
              </td>
            </tr>
            <tr height="20px">
              <td colspan="3"></td>
            </tr>
          </table>

          @php
            if(!$cekclockin){

              $bgpilih = '';
              $iconcolorpilih = '#3384c3';
              $textcolorpilih = '#3384c3';

              $bgdrive = '';
              $aksidrive = '#';
              $iconcolordrive = '#3384c3';
              $textcolordrive = '#3384c3'; 

              $bgptc = '';
              $aksiptc = '#';
              $iconcolorptc = '#3384c3';
              $textcolorptc = '#3384c3'; 

            } else {

              if($cekclockin->clockout_time != null){

                $bgpilih = '';
                $iconcolorpilih = '#3384c3';
                $textcolorpilih = '#3384c3';

                $bgdrive = '';
                $aksidrive = '#';
                $iconcolordrive = '#3384c3';
                $textcolordrive = '#3384c3'; 

                $bgptc = '';
                $aksiptc = '#';
                $iconcolorptc = '#3384c3';
                $textcolorptc = '#3384c3'; 

              } else {

                  if($get->unit_id == null){

                      $bgpilih = 'bg-white';
                      $iconcolorpilih = '#0166b5';
                      $textcolorpilih = '#ffffff';

                      $bgdrive = '';
                      $aksidrive = '#';
                      $iconcolordrive = '#3384c3';
                      $textcolordrive = '#3384c3'; 

                      $bgptc = '';
                      $aksiptc = '#';
                      $aksidrive = '#';
                      $iconcolorptc = '#3384c3';
                      $textcolorptc = '#3384c3'; 

                  } else {

                      $bgpilih = 'bg-white';
                      $iconcolorpilih = '#0166b5';
                      $textcolorpilih = '#ffffff';

                      $bgdrive = 'bg-white';
                      $aksidrive = 'drivein';
                      $iconcolordrive = '#0166b5';
                      $textcolordrive = '#ffffff'; 

                      $bgptc = 'bg-white';
                      $aksiptc = 'pretripcheck';
                      $iconcolorptc = '#0166b5';
                      $textcolorptc = '#ffffff'; 

                  }

              } 

            }

            if(!$getdriving){

            } else {

            }

          @endphp

          <table border="0" align="center" width="100%">
            <tr>
              <td align="center" width="25%">
                <div id="medical" class="icon icon-shape bg-white text-white rounded-circle shadow">
                    <i class="fas fa-medkit" style="color: #0166b5"></i>
                </div>
              </td>
              
              <td align="center" width="25%" class="clock_icon">
                <div onclick="ClockinPool();" class="icon icon-shape bg-white text-white rounded-circle shadow">
                  <input type="hidden" id="selesai" value="0">
                    <i class="fas fa-clock" style="color: #0166b5"></i>
                </div>
              </td>

              <td align="center" width="25%">
                <div id="{{ $adaizin ? 'sudahizin' : 'izin' }}" class="icon icon-shape bg-white text-white rounded-circle shadow">
                    <i class="fas fa-bed" style="color: #0166b5"></i>
                </div>
              </td>

              <td align="center" width="25%">
                <div id="history" class="icon icon-shape bg-white text-white rounded-circle shadow">
                    <i class="fas fa-road" style="color: #0166b5"></i>
                </div>
              </td>
            </tr>
            <tr>
               <td height="10px" colspan="7"></td> 
            </tr>
            <tr>
              <td align="center">
                <h6 class="text-uppercase text-white ls-1 mb-1">DCU</h6>
              </td>
              <td align="center" id="clock_desc">
                <h6 class="text-uppercase text-white ls-1 mb-1">Clock In</h6>
              </td>
              <td align="center" id="clock_desc">
                <h6 class="text-uppercase text-white ls-1 mb-1">Cuti Izin <br/> Sakit</h6>
              </td>
              <td align="center">
                <h6 class="text-uppercase text-white ls-1 mb-1">Riwayat <br/> Jalan</h6>
              </td>
            </tr>
          </table>
          <br>
          <table border="0" align="center" width="100%">
            <tr>
              <td align="center" width="25%">
                <a href="/driver/rekap"><div class="icon icon-shape bg-white text-white rounded-circle shadow">
                    <i class="fas fa-book" style="color: #0166b5"></i>
                </div></a>
              </td>
              <td align="center" width="25%">
                <div id="{{ $aksiptc }}" class="icon icon-shape {{ $bgptc }} text-white rounded-circle shadow">
                    <i class="fas fa-check-circle" style="color: {{ $iconcolorptc }}"></i>
                </div>
              </td>
              @if(!$getdriving)
              <td align="center" width="25%">
                <div id="{{ $aksidrive }}" class="icon icon-shape {{ $bgdrive }} text-white rounded-circle shadow">
                    <i class="fas fa-building" style="color: {{ $iconcolordrive }}"></i>
                    <input type="hidden" value="0">
                </div>
              </td>
              <td align="center" width="25%">
                <div id="pilihmobil" class="icon icon-shape {{ $bgpilih }} text-white rounded-circle shadow">
                    <i class="fas fa-car" style="color: {{ $iconcolorpilih }}"></i>
                </div>
              </td>
              @else 
                @if($getdriving->km_akhir == null)
                  <td align="center" width="25%">
                    <div id="driveout" class="icon icon-shape bg-white text-white rounded-circle shadow">
                        <i class="fas fa-building" style="color: #0166b5;"></i>
                        <input type="hidden" value="0">
                    </div>
                  </td>
                  <td align="center" width="25%">
                    <div id="nopilihmobil" class="icon icon-shape {{ $bgpilih }} text-white rounded-circle shadow">
                        <i class="fas fa-car" style="color: {{ $iconcolorpilih }}"></i>
                    </div>
                  </td>
                @else
                  <td align="center" width="25%">
                    <div id="{{ $aksidrive }}" class="icon icon-shape {{ $bgdrive }} text-white rounded-circle shadow">
                        <i class="fas fa-building" style="color: {{ $iconcolordrive }}"></i>
                        <input type="hidden" value="0">
                    </div>
                  </td>
                  <td align="center" width="25%">
                    <div id="pilihmobil" class="icon icon-shape {{ $bgpilih }} text-white rounded-circle shadow">
                        <i class="fas fa-car" style="color: {{ $iconcolorpilih }}"></i>
                    </div>
                  </td>
                @endif

              @endif
            </tr>
            <tr>
               <td height="10px" colspan="7"></td> 
            </tr>
            <tr>
              <td align="center">
                <h6 class="text-uppercase text-white ls-1 mb-1">Rekap <br/> Absensi</h6>
              </td>
              <td align="center">
                <h6 class="text-uppercase ls-1 mb-1" style=" color: {{ $textcolorptc }}">PTC</h6>
              </td>
              @if(!$getdriving)
              <td align="center" id="clock_desc">
                <h6 class="text-uppercase ls-1 mb-1" style=" color: {{ $textcolordrive }}">Drive In</h6>
              </td>
              @else 
                @if($getdriving->km_akhir == null)
                  <td align="center" id="clock_desc">
                    <h6 class="text-uppercase ls-1 mb-1" style=" color: #ffffff;">Drive Out</h6>
                  </td>
                @else
                  <td align="center" id="clock_desc">
                    <h6 class="text-uppercase ls-1 mb-1" style=" color: {{ $textcolordrive }}">Drive In</h6>
                  </td>
                @endif

              @endif
              <td align="center">
                <h6 class="text-uppercase ls-1 mb-1" style=" color: {{ $textcolorpilih }}">Pilih<br/> Mobil</h6>
              </td>
            </tr>
          </table>
        </div>

      @endif


    </div>
  </div>    
</div>

<!-- Card stats -->
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header bg-blue-par">
        <table width="100%">
          <tr>
            <td><h5 class="text-uppercase text-white">DASHBOARD</h5></td>
          </tr>
        </table>
      </div>
      <div class="card-body bg-white" id="menu_icons">
        <div class="progress-wrapper">
          <div class="progress-info">
            <div class="progress-label">
              <span>Batas Lembur</span>
            </div>
            <div class="progress-percentage">
              <span class="text-lembur">0 Jam / 40 Jam</span>
            </div>
          </div>
          <div class="progress">
            <div class="progress-bar bg-default lembur" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
          </div>
        </div>
        <br>  

        @if($get->unit_id != null)
        <div class="progress-wrapper">
          <div class="progress-info">
            <div class="progress-label">
              <span>Service</span>
            </div>
            @php
              $kilo = $getunits->mileage;
              $persen = ($kilo/10000)*100;

              if ($persen <= 70){

                $bg = 'bg-success';

              } else if ($persen > 70 && $persen <= 90){

                $bg = 'bg-kuning';

              } else {

                $bg = 'bg-danger';

              }

            @endphp
            <div class="progress-percentage">
              <span>{{ $getunits->mileage }} Km / 10000 Km ({{ $persen }}%)</span>
            </div>
          </div>
          <div class="progress">
            <div class="progress-bar {{ $bg }}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: {{ $persen }}%;"></div>
          </div>
        </div>
        <br>

        @endif
        <div class="progress-wrapper">
          <div class="progress-info">
            <div class="progress-label">
              <span>Batas Perdin</span>
            </div>
            @php
              $perdins = $getperdin->count();
              if($perdins >= '1'){
                $hasil = ($perdins/5)*100;
              } else {
                $hasil = '0';
              }

              if($hasil >= 80){
                $alert = 'danger';
              } else {
                $alert = 'success';
              }

            @endphp
            <div class="progress-percentage">
              <span class="text-perdin">{{ $perdins }} Kali / 5 Kali ({{ $hasil }}%)</span>
            </div>
          </div>
          <div class="progress">
            <div class="progress-bar bg-{{ $alert }}" role="progressbar" aria-valuenow="{{ $hasil }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $hasil }}%;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>    
</div>

@if($get->user_id != null)
<div class="row" id="client" style="display: block;">
  <div class="col">
    <div class="card shadow">
      <div class="card-header bg-green-par">
        <table width="100%">
          <tr>
            <td><h5 class="text-uppercase text-white">INFO CLIENT</h5></td>
          </tr>
        </table>
      </div>
      <div class="card-body-par" id="menu">
        <table border="0" align="center" width="100%">
          <tr height ="10px">
            <td width="22px" rowspan="6"></td>
            <td colspan="4"></td>
            <td rowspan="6" align="right" >
              <img src="./assets/content/img/theme/users.png" width="100%">
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <h5><b>{{ $getusers->first_name  }}</b></h5>
            </td>
          </tr>
          <tr>
            <td><h6>Jabatan</h6></td>
            <td><h6>:</h6></td>
            <td width="40%"><h6>{{ $getusers->jabatan_name }}</h6></td>  
          </tr>
          <tr>
            <td><h6>Perusahaan</h6></td>
            <td><h6>:</h6></td>
            <td><h6>{{ $getusers->company_name }}</h6></td>  
          </tr>
          <tr>
            <td><h6>Unit Kerja</h6></td>
            <td><h6>:</h6></td>
            <td><h6>{{ $getusers->unitkerja_name }} - {{ $getusers->wilayah_name }}</h6></td>  
          </tr>
          <tr>
            <td><h6>No HP</h6></td>
            <td><h6>:</h6></td>
            <td><h6>{{ $getusers->phone }}</h6></td>  
          </tr>

          <tr height="10px">
            <td colspan="4"></td>
          </tr>
          
        </table>
      </div>
    </div>
  </div>    
</div>
@endif

<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header bg-green-par">
        <table width="100%">
          <tr>
            <td style="padding-top: 5px"><h5 class="text-uppercase text-white">INFO ANDA</h5></td>
            <td align="right">
              @foreach ($gettrainings as $gettraining)
                @php

                  $trainingx = DB::table('training_driver')
                  ->join('trainings', 'training_driver.training_id', '=', 'trainings.id')
                  ->where([
                      ['training_driver.user_id', '=', $getdrivers->id],
                      ['training_driver.training_id', '=', $gettraining->id],
                  ])
                  ->first();

                  if ($trainingx){

                      $bedge = 'badge-primary';

                  } else {
                      
                      $bedge = 'badge-dark';

                  }

                @endphp

                 <span class="badge {{ $bedge }}">{{ $gettraining->nick_name }}</span>

              @endforeach
            </td>
          </tr>
        </table>
        
      </div>
      <div class="card-body-par" id="menu">
        <table border="0" align="center" width="100%">
          <tr height ="10px">
            <td width="22px" rowspan="6"></td>
            <td colspan="4"></td>
            <td rowspan="6" align="right" >
              <img src="./assets/content/img/theme/drivers.png" width="75%">
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <h5 class="text-black" id="nama_drivers"><b>{{ $getdrivers->first_name }}</b></h5>
            </td>
          </tr>
          <tr>
            <td><h6>Jenis SIM</h6></td>
            <td><h6>:</h6></td>
            <td><h6>SIM A</h6></td>  
          </tr>
          <tr>
            <td><h6>Masa SIM</h6></td>
            <td><h6>:</h6></td>
            <td><h6>{{ $getsim ? date('d M Y', strtotime($getsim->exp_date)) : '-' }}</h6></td>  
          </tr>
          <tr>
            <td><h6>Masa MCU </h6></td>
            <td><h6>:</h6></td>
            <td><h6>{{ $getmcu ? date('d M Y', strtotime($getmcu->exp_date)) : '-' }}</h6></td>  
          </tr>
          <tr>
            <td><h6>No HP</h6></td>
            <td><h6>:</h6></td>
            <td><h6>{{ $getdrivers->phone }}</h6></td>  
          </tr>
          <tr height="10px">
            <td colspan="4"></td>
          </tr>     
        </table>
      </div>
    </div>
  </div>    
</div>

@if($get->unit_id != null)
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header bg-green-par">
        <table width="100%">
          <tr>
            <td><h5 class="text-uppercase text-white">INFO KENDARAAN</h5></td>
            @if($getdrivers->driver_type == '1')
            <td align="right"><button id="ganti" class="btn btn-sm btn-primary"><i class="fa fa-car"></i>  Ganti Mobil</button></td>
            @endif
          </tr>
        </table>
      </div>
      <div class="card-body-par" id="menu" style="display: block;">
        <table align="center" width="100%">
          <tr height ="10px">
            <td width="22px" rowspan="7"></td>
            <td colspan="4"></td>
            <td rowspan="8" align="right" >
              <img src="./assets/content/img/theme/cars.png" width="100%">
            </td>
          </tr>
          <tr>
            <td colspan="4">
              <h5><b>{{ $getunits->no_police }}</b></h5>
            </td>  
          </tr>
          <tr>
            <td width="25%"><h6>Model</h6></td>
            <td><h6>:</h6></td>
            <td width="30%"><h6>{{ $getunits->model }}</h6></td>  
          </tr>
          <tr>
            <td><h6>Tahun</h6></td>
            <td><h6>:</h6></td>
            <td><h6>{{ $getunits->years }}</h6></td>  
          </tr>
          <tr>
            <td><h6>Masa Asuransi</h6></td>
            <td><h6>:</h6></td>
            <td><h6>{{ $getasuransi ? date('d M Y', strtotime($getasuransi->exp_date)) : '-' }}</h6></td>  
          </tr>
          <tr>
            <td><h6>Masa KEUR</h6></td>
            <td><h6>:</h6></td>
            <td><h6>{{ $getkeur ? date('d M Y', strtotime($getkeur->exp_date)) : '-' }}</h6></td>  
          </tr>
          <tr>
            <td><h6>Uji Emisi</h6></td>
            <td><h6>:</h6></td>
            <td><h6>-</h6></td>  
          </tr>

          <tr height="10px">
            <td colspan="4"></td>
          </tr>
          
        </table>
      </div>
    </div>
  </div>    
</div>
@endif
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header bg-green-par">
        <table width="100%">
          <tr>
            <td><h5 class="text-uppercase text-white">INFO KORLAP</h5></td>
          </tr>
        </table>
      </div>
      <div class="card-body-par" id="menu" style="display: block;">
        <table align="center" width="100%">
          <tr height ="10px">
            <td width="22px" rowspan="6"></td>
            <td colspan="4"></td>
            <td rowspan="7" align="right" >
              <img src="./assets/content/img/theme/users.png" width="70%">
            </td>
          </tr>
          <tr>
            <td colspan="4">
              <h5><b>{{ $getkorlaps->first_name }}</b></h5>
            </td>  
          </tr>
          <tr>
            <td><h6>Email</h6></td>
            <td><h6>:</h6></td>
            <td width="40%"><h6>{{ $getkorlaps->email }}</h6></td>  
          </tr>
          <tr>
            <td><h6>NoHp</h6></td>
            <td><h6>:</h6></td>
            <td><h6>{{ $getkorlaps->phone }}</h6></td>  
          </tr>

          <tr height="10px">
            <td colspan="4"></td>
          </tr>
          
        </table>
      </div>
    </div>
  </div>    
</div>