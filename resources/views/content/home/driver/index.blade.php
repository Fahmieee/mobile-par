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
                <div class="card-body bg-blue-par2" id="menu_icons" style="display: block;">
                  <table border="0" align="center" id="foricons" width="100%" style="display: none;">
                    <tr>
                      <td width="5%"> </td>
                      <td width="5%" id="icon_check">
                      </td>
                      <td width="20%" style="padding-top: 10px" id="word_check">
                      </td>
                      <td width="5%" id="icon_clock">
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
                      <td align="center" width="33%">
                        <div id="pretripcheck" class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-check-circle" style="color: #0166b5"></i>
                        </div>
                      </td>
                      <td align="center" width="33%" id="clock_icon">
                        <div id="clockin" class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-car" style="color: #0166b5"></i>
                            <input type="hidden" id="selesai" value="0">
                        </div>
                      </td>
                      <td align="center" width="33%">
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
          <div class="row">
            <div class="col">
              <div class="card shadow">
                <div class="card-header bg-green-par">
                  <h6 class="text-uppercase text-white">INFORMASI CLIENT</h6>
                </div>
                <div class="card-body-par" id="menu" style="display: block;">
                  <table border="0" align="center" width="100%">
                    <tr height ="10px">
                      <td width="22px" rowspan="6"></td>
                      <td colspan="4"></td>
                      <td rowspan="6" align="right" >
                        <img src="./assets/content/img/theme/users.png" width="65%">
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
                      <td><h6>PT NDT</h6></td>  
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
                  <h6 class="text-uppercase text-white">INFORMASI ANDA</h6>
                </div>
                <div class="card-body-par" id="menu" style="display: block;">
                  <table border="0" align="center" width="100%">
                    <tr height ="10px">
                      <td width="22px" rowspan="6"></td>
                      <td colspan="4"></td>
                      <td rowspan="6" align="right" >
                        <img src="./assets/content/img/theme/drivers.png" width="65%">
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
                      <td><h6>3 Oktober 2019</h6></td>  
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
                  <h6 class="text-uppercase text-white">INFORMASI KENDARAAN</h6>
                </div>
                <div class="card-body-par" id="menu" style="display: block;">
                  <table border="0" align="center" width="100%">
                    <tr height ="10px">
                      <td width="22px" rowspan="5"></td>
                      <td colspan="4"></td>
                      <td rowspan="5" align="right" >
                        <img src="./assets/content/img/theme/cars.png" width="65%">
                      </td>
                    </tr>
                    <tr>
                      <td><h6>Nopol</h6></td>
                      <td><h6>:</h6></td>
                      <td id="nopol"><h6>-</h6></td>  
                    </tr>
                    <tr>
                      <td><h6>Model</h6></td>
                      <td><h6>:</h6></td>
                      <td id="model"><h6>-</h6></td>  
                    </tr>
                    <tr>
                      <td><h6>Date STNK</h6></td>
                      <td><h6>:</h6></td>
                      <td id="date"><h6>089809809809</h6></td>  
                    </tr>

                    <tr height="10px">
                      <td colspan="4"></td>
                    </tr>
                    
                  </table>
                </div>
              </div>
            </div>    
          </div>

      @include('content.home.driver.modal')
      @include('layout.contentfooter')

      @include('script.driver')
</body>

</html>