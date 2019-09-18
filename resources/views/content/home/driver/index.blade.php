@include('layout.contenthead')
  <div class="main-content">
    <!-- Header -->
    <div class="container-fluid pb-4 pt-5 pt-md-8">
         
          <div class="alert2 alert-danger fade show" role="alert">
            <table width="100%">
              <tr>
                <td align="left"><span class="alert-inner--text"><h6 class="text-white"> Asuransi Anda akan segera Berakhir!</h6></span></td>
                <td align="right"><i class="fa fa-times"></i></td>
              </tr>       
            </table>
          </div>
          <div class="alert2 alert-danger fade show" role="alert">
            <table width="100%">
              <tr>
                <td align="left"><span class="alert-inner--text"><h6 class="text-white"> KEUR Anda akan segera Berakhir!</h6></span></td>
                <td align="right"><i class="fa fa-times"></i></td>
              </tr>       
            </table>
          </div>
          <div class="row" id="approve_driver" style="display: none;">
            <div class="col">
              <div class="card shadow">
                <div class="card-header bg-blue-par">
                  <h6 class="text-uppercase text-white ls-1 mb-1">MENU</h6>
                </div>
                <div class="card-body bg-blue-par2">
                  <table border="0" align="center" width="100%">
                    <tr>
                      <td id="pair_driver" colspan="2">
                        <h5 align="center" class="text-white">Anda Belum Memiliki Client Saat ini, Tunggu Saat Client Pairing dengan Anda!</h5>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" id="terima">
                        
                      </td>
                      <td align="center" id="tolak">
                        
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>    
          </div>

          <div class="row" id="menudrivers" style="display: block;">
            <div class="col">
              <div class="card shadow">
                <div class="card-header bg-blue-par">
                  <h6 class="text-uppercase text-white ls-1 mb-1">MENU</h6>
                </div>
                <div class="card-body bg-blue-par2" id="menu_icons">
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

                  <table border="0" align="center" width="100%">
                    <tr>
                      <td align="center" width="25%">
                        <div id="pretripcheck" class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-check-circle" style="color: #0166b5"></i>
                        </div>
                      </td>
                      <td align="center" width="25%">
                        <div id="medical" class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-medkit" style="color: #0166b5"></i>
                        </div>
                      </td>
                      <td align="center" width="25%" id="clock_icon">
                        <div id="clockin" class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-car" style="color: #0166b5"></i>
                            <input type="hidden" id="selesai" value="0">
                        </div>
                      </td>
                      <td align="center" width="25%">
                        <div id="history" class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-history" style="color: #0166b5"></i>
                        </div>
                        
                      </td>
                    </tr>
                    <tr>
                       <td height="10px" colspan="7"></td> 
                    </tr>
                    <tr>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Pre-Trip Check</h6>
                      </td>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Daily Check Up</h6>
                      </td>
                      <td align="center" id="clock_desc">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Clock In</h6>
                      </td>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Riwayat Perjalanan</h6>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>    
          </div>
          <br>

          
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
                  <div class="progress-wrapper">
                    <div class="progress-info">
                      <div class="progress-label">
                        <span>Service</span>
                      </div>
                      <div class="progress-percentage">
                        <span class="text-km">-</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-default percent" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                    </div>
                  </div>

                </div>
              </div>
            </div>    
          </div>
          <br>
          <div class="row" id="client" style="display: block;">
            <div class="col">
              <div class="card shadow">
                <div class="card-header bg-green-par">
                  <table width="100%">
                    <tr>
                      <td><h5 class="text-uppercase text-white">INFORMASI CLIENT</h5></td>
                    </tr>
                  </table>
                </div>
                <div class="card-body-par" id="menu">
                  <table border="0" align="center" width="100%">
                    <tr height ="10px">
                      <td width="22px" rowspan="6"></td>
                      <td colspan="4"></td>
                      <td rowspan="6" align="right" >
                        <img src="./assets/content/img/theme/users.png" width="75%">
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <h5 class="text-black" id="nama_users"><b>Azzam Khalif Prastyo</b></h5>
                      </td>
                    </tr>
                    <tr>
                      <td><h6>Jabatan</h6></td>
                      <td><h6>:</h6></td>
                      <td><h6>Manager HR</h6></td>  
                    </tr>
                    <tr>
                      <td><h6>Perusahaan</h6></td>
                      <td><h6>:</h6></td>
                      <td><h6>PT Pertamina</h6></td>  
                    </tr>
                    <tr>
                      <td><h6>Unit Kerja</h6></td>
                      <td><h6>:</h6></td>
                      <td><h6>MOR 2 - Jakarta</h6></td>  
                    </tr>
                    <tr>
                      <td><h6>No HP</h6></td>
                      <td><h6>:</h6></td>
                      <td><h6>089809809809</h6></td>  
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

          <div class="row">
            <div class="col">
              <div class="card shadow">
                <div class="card-header bg-green-par">
                  <table width="100%">
                    <tr>
                      <td style="padding-top: 5px"><h5 class="text-uppercase text-white">INFO ANDA</h5></td>
                      <td align="right"><span class="badge badge-dark">DDT</span> <span class="badge badge-light">MCU</span> <span class="badge badge-dark">SVX</span> <span class="badge badge-dark">FA</span> <span class="badge badge-light">FF</span></td>
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
                        <h5 class="text-black" id="nama_drivers"><b>Bayu Rahardjo</b></h5>
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
                      <td><h6>3 Mei 2020</h6></td>  
                    </tr>
                    <tr>
                      <td><h6>No HP</h6></td>
                      <td><h6>:</h6></td>
                      <td><h6>089809809809</h6></td>  
                    </tr>
                    <tr>
                      <td><h6>Masa MCU </h6></td>
                      <td><h6>:</h6></td>
                      <td><h6>3 Agustus 2019</h6></td>  
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
          
          <div class="row">
            <div class="col">
              <div class="card shadow">
                <div class="card-header bg-green-par">
                  <table width="100%">
                    <tr>
                      <td><h5 class="text-uppercase text-white">INFORMASI KENDARAAN</h5></td>
                    </tr>
                  </table>
                </div>
                <div class="card-body-par" id="menu" style="display: block;">
                  <input type="hidden" id="nopols" value="0">
                  <table align="center" width="100%">
                    <tr height ="10px">
                      <td width="22px" rowspan="6"></td>
                      <td colspan="4"></td>
                      <td rowspan="7" align="right" >
                        <img src="./assets/content/img/theme/cars.png" width="75%">
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4">
                        <h5 class="text-black" id="nopol"><b></b></h5>
                      </td>  
                    </tr>
                    <tr>
                      <td><h6>Model</h6></td>
                      <td><h6>:</h6></td>
                      <td id="model"></td>  
                    </tr>
                    <tr>
                      <td><h6>Tahun</h6></td>
                      <td><h6>:</h6></td>
                      <td id="tahun"></td>  
                    </tr>
                    <tr>
                      <td><h6>Masa Asuransi</h6></td>
                      <td><h6>:</h6></td>
                      <td><h6>2 Januari 2020 </h6></td>  
                    </tr>
                    <tr>
                      <td><h6>Masa KEUR</h6></td>
                      <td><h6>:</h6></td>
                      <td><h6>23 Mei 2019</h6></td>  
                    </tr>

                    <tr height="10px">
                      <td colspan="4"></td>
                    </tr>
                    
                  </table>
                </div>
              </div>
            </div>    
          </div>
      </div>
    </div>
          

      @include('content.home.driver.modal')
      @include('layout.contentfooter')
      @include('script.driver')
  </body>
</html>