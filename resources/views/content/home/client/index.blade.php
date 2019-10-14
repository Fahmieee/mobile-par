@include('layout.contenthead')
  <div class="main-content">
    <!-- Header -->
    <div class="container-fluid pb-4 pt-5 pt-md-8">
          <!-- Card stats -->
          <div class="row">
            <div class="col">
              <div class="card shadow">
                
                <div class="card-header bg-blue-par">
                  <h6 class="text-uppercase text-white ls-1 mb-1">MENU</h6>
                </div>
                <div class="card-body bg-blue-par2" id="menu_icons" style="display: none;">
                  
                  <table border="0" align="center" width="100%">
                    <tr>
                      <td align="center" width="25%">
                        <div id="kendaraan" class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-car" style="color: #0166b5"></i>
                        </div>
                      </td>
                      <td align="center" width="25%">
                        <div id="pengemudi" class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-child" style="color: #0166b5"></i>
                            <input type="hidden" id="selesai" value="0">
                        </div>
                      </td>
                      <td align="center" width="25%">
                        <div id="suara" class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-bullhorn" style="color: #0166b5"></i>
                        </div>
                      </td>
                      <td align="center" width="25%">
                        <div id="approve" class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-check" style="color: #0166b5"></i>
                        </div>
                      </td>
                    </tr>
                    <tr>
                       <td height="10px" colspan="7"></td> 
                    </tr>
                    <tr>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Nilai Kendaraan</h6>
                      </td>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Nilai Pengemudi</h6>
                      </td>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Suara Pelanggan</h6>
                      </td>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Approve</h6>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="card-body bg-blue-par2" id="menu_pairing" style="display: none;"> 
                  <table border="0" align="center" width="100%">
                    <tr>
                      <td>
                        <h5 align="center" class="text-white">Anda Belum Memiliki Driver Saat ini, Klik Pairing Sekarang untuk Memilih Driver Anda!</h5>
                      </td>
                    </tr>
                    <tr align="center">
                      <td id="pairs">
                      <button class="btn btn-success" id="pairing" type="button">Pairing Sekarang</button>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>    
          </div>
          <br>
          @php

            if ($getdcu == '0'){

                $alert = 'warning';
                $ket = 'Belum DCU';
                $detail = 'Driver Anda Belum Melakukan DCU';
                $colour = '#fc7c5f';

            } else {
            
                $alert = 'success';
                $ket = 'Driver SEHAT';
                $detail = 'Driver Anda Sudah Melakukan DCU';
                $colour = '#92C04F';
            }

          @endphp
          <div class="row">
            <div class="col-12">
              <div class="alert2 alert-{{ $alert }}" role="alert">

                <table width="100%" border="0"> 
                  <tr>
                    <td colspan="2"> </td>
                  </tr>
                  <tr>
                    <td width="23%" rowspan="3">
                      <div class="icon icon-shape bg-white text-white rounded-circle shadow">
                        <i class="fas fa-medkit" style="color: {{ $colour }}"></i>
                    </div>
                    </td>
                    <td><h3 class="text-white"><b>{{ $ket }}</b></h3></td>
                  </tr>
                  <tr>
                    <td><h6 class="text-white">{{ $detail }}</h6></td>
                  </tr>
                </table>  
              </div>
            </div>    
          </div>
          <div class="row">
            <div class="col">
              <div class="card shadow">
                <div class="card-header bg-green-par">
                  <table width="100%">
                    <tr>
                      <td><h5 class="text-uppercase text-white">INFORMASI ANDA</h5></td>
                    </tr>
                  </table>
                </div>
                <div class="card-body-par" id="menu" style="display: block;">
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
                        <h5><b>{{ $getusers->first_name }} {{ $getusers->last_name }}</b></h5>
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

          <br>

          <div class="row" id="infodriver" style="display: block;">
            <div class="col">
              <div class="card shadow">
                <div class="card-header bg-green-par">
                  <table width="100%">
                    <tr>
                      <td style="padding-top: 5px"><h5 class="text-uppercase text-white">PENGEMUDI</h5></td>
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
                      <td width="22px" rowspan="7"></td>
                      <td colspan="4"></td>
                      <td rowspan="7" align="right" >
                        <img src="./assets/content/img/theme/drivers.png" width="70%">
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <h5><b>{{ $getdrivers->first_name }} {{ $getdrivers->last_name }}</b></h5>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding-top: 5px"><h6>Jenis SIM</h6></td>
                      <td><h6>:</h6></td>
                      <td><h6>SIM A</h6></td>  
                    </tr>
                    <tr>
                      <td><h6>Masa SIM</h6></td>
                      <td><h6>:</h6></td>
                      <td><h6>{{ $getsim ? date('d M Y', strtotime($getsim->exp_date)) : '-' }}</h6></td>  
                    </tr>
                    <tr>
                      <td><h6>No HP</h6></td>
                      <td><h6>:</h6></td>
                      <td><h6>{{ $getdrivers->phone }}</h6></td>  
                    </tr>
                    <tr>
                      <td><h6>Lembur</h6></td>
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

          <br>
          
          <div class="row" id="infokendaraan" style="display: block;">
            <div class="col">
              <div class="card shadow">
                <div class="card-header bg-green-par">
                  <table width="100%">
                    <tr>
                      <td><h5 class="text-uppercase text-white">INFORMASI KENDARAAN</h5></td>
                    </tr>
                  </table>
                </div>
                <div class="card-body-par" id="menu">
                  <table border="0" align="center" width="100%">
                    <tr height ="10px">
                      <td width="22px" rowspan="6"></td>
                      <td colspan="4"></td>
                      <td rowspan="6" align="right" >
                        <img src="./assets/content/img/theme/cars.png" width="100%">
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <h5><b>{{ $getunits->no_police }}</b></h5>
                      </td>  
                    </tr>
                    <tr>
                      <td><h6>Model</h6></td>
                      <td><h6>:</h6></td>
                      <td><h6>{{ $getunits->model }} {{ $getunits->varian }}</h6></td>  
                    </tr>
                    <tr>
                      <td><h6>Tahun</h6></td>
                      <td><h6>:</h6></td>
                      <td><h6>{{ $getunits->years }}</h6></td>  
                    </tr>
                    <tr>
                      <td width="20%"><h6>Masa STNK</h6></td>
                      <td><h6>:</h6></td>
                      <td width="40%"><h6>{{ $getstnk ? date('d M Y', strtotime($getstnk->exp_date)) : '-' }}</h6></td>  
                    </tr>

                    @php

                      $persen = ($getunits->mileage / 10000) * 100;

                    @endphp
                    <tr>
                      <td><h6>Service</h6></td>
                      <td><h6>:</h6></td>
                      <td><h6>{{ $getunits->mileage }} Km / 10000 Km ({{ $persen }}%)</h6></td>  
                    </tr>

                    <tr height="10px">
                      <td colspan="4"></td>
                    </tr>
                    
                  </table>
                </div>
              </div>
            </div>    
          </div>

      @include('content.home.client.modal')
      @include('layout.contentfooter')
      @include('script.client')
</body>

</html>