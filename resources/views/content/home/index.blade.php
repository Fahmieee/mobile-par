@include('layout.contenthead')
  <div class="main-content">
    <!-- Header -->
    <div class="header pt-4 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
                
          <div class="row">
            <div class="col">
              <div class="card shadow">
                
                <div class="card-header bg-blue-par">
                  <h6 class="text-uppercase text-white ls-1 mb-1">MENU</h6>
                </div>
                <div class="card-body bg-blue-par2" id="menu" style="display: block;">
                  <table border="0" align="center" width="100%">
                    <tr>
                      <td align="center">
                        <div class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-check-circle" style="color: #0166b5"></i>
                        </div>
                      </td>
                      <td width="15px"></td>
                      <td align="center">
                        <div class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-clock-o" style="color: #0166b5"></i>
                        </div>
                      </td>
                      <td width="15px"></td>
                      <td align="center">
                        <div class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-history" style="color: #0166b5"></i>
                        </div>
                      </td>
                    </tr>
                    <tr>
                       <td height="10px" colspan="7"></td> 
                    </tr>
                    <tr>
                      <td align="center" width="100px">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Pre-Trip Check</h6>
                      </td>
                      <td width="35px"></td>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Clock-In</h6>
                      </td>
                      <td width="35px"></td>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Riwayat Perjalanan</h6>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>    
          </div>


          <div class="row">
            <div class="col">
              <div class="card shadow">
                <div class="card-header bg-blue-par">
                  <h6 class="text-uppercase text-white ls-1 mb-1">MENU</h6>
                </div>
                <div class="card-body bg-blue-par2" id="menu" style="display: block;">
                  <table border="1" align="center" width="100%">
                    <tr>
                      <td align="center">
                        <div class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-car" style="color: #0166b5"></i>
                        </div>
                      </td>
                      <td width="15px"></td>
                      <td align="center">
                        <div class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-user" style="color: #0166b5"></i>
                        </div>
                      </td>
                      <td width="15px"></td>
                      <td align="center">
                        <div class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-comment" style="color: #0166b5"></i>
                        </div>
                      </td>
                      <td width="15px"></td>
                      <td align="center">
                        <div class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-check-circle" style="color: #0166b5"></i>
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
                      <td width="35px"></td>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Nilai Pengemudi</h6>
                      </td>
                      <td width="35px"></td>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Suara Pelanggan</h6>
                      </td>
                      <td width="35px"></td>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Approval</h6>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>    
          </div>

          @else 

          <div class="row">
            <div class="col">
              <div class="card shadow">
                <div class="card-header bg-blue-par">
                  <h6 class="text-uppercase text-white ls-1 mb-1">MENU</h6>
                </div>
                <div class="card-body bg-blue-par2" id="menu" style="display: block;">
                  <table border="1" align="center" width="100%">
                    <tr>
                      <td align="center">
                        <div class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-car" style="color: #0166b5"></i>
                        </div>
                      </td>
                      <td width="15px"></td>
                      <td align="center">
                        <div class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-user" style="color: #0166b5"></i>
                        </div>
                      </td>
                      <td width="15px"></td>
                      <td align="center">
                        <div class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-comment" style="color: #0166b5"></i>
                        </div>
                      </td>
                      <td width="15px"></td>
                      <td align="center">
                        <div class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-check-circle" style="color: #0166b5"></i>
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
                      <td width="35px"></td>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Nilai Pengemudi</h6>
                      </td>
                      <td width="35px"></td>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Keluhan</h6>
                      </td>
                      <td width="35px"></td>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Approval</h6>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>    
          </div>

          @endif

          <br>
          <div class="row">
            <div class="col">
              <div class="card shadow">
                <div class="card-header bg-green-par">
                  <h6 class="text-uppercase text-white ls-1 mb-1">PROFILE ANDA</h6s>
                </div>
                <div class="card-body-par" id="menu" style="display: block;">
                  <table border="0" align="center" width="100%">
                    <tr height="50px">
                      <td width="22px" rowspan="6"></td>
                      <td colspan="3">
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Azzam Khalif Prastyo</h6>
                      </td>
                      <td rowspan="6" align="right" >
                        <img src="./assets/content/img/theme/users.png">
                      </td>
                    </tr>
                    <tr height="23px">
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Jabatan</h6>
                      </td>
                      <td width="20px">
                        <h6 class="text-uppercase text-muted ls-1 mb-1">:</h6>
                      </td>
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Head Operasional</h6>
                      </td>
                    </tr>
                    <tr height="23px">
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Perusahaan</h6>
                      </td>
                      <td width="20px">
                        <h6 class="text-uppercase text-muted ls-1 mb-1">:</h6>
                      </td>
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Nusantara Digital</h6>
                      </td>
                    </tr>
                    <tr height="23px">
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">E-Mail</h6>
                      </td>
                      <td width="20px">
                        <h6 class="text-uppercase text-muted ls-1 mb-1">:</h6>
                      </td>
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">azzam@gmail.com</h6>
                      </td>
                    </tr>
                    <tr height="23px">
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Seluler</h6>
                      </td>
                      <td width="20px">
                        <h6 class="text-uppercase text-muted ls-1 mb-1">:</h6>
                      </td>
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">0896789200</h6>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        
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
                  <h4 class="text-uppercase text-white ls-1 mb-1">Informasi Driver</h4>
                </div>
                <div class="card-body-par" id="menu" style="display: block;">
                  <table border="0" align="center" width="100%">
                    <tr height="50px">
                      <td width="22px" rowspan="6"></td>
                      <td colspan="3">
                        <h4 class="text-uppercase text-muted ls-1 mb-1"><b>Azzam Khalif Prastyo</b></h4>
                      </td>
                      <td rowspan="6" align="right" >
                        <img src="./assets/content/img/theme/drivers.png">
                      </td>
                    </tr>
                    <tr height="23px">
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Jabatan</h6>
                      </td>
                      <td width="20px">
                        <h6 class="text-uppercase text-muted ls-1 mb-1">:</h6>
                      </td>
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Head Operasional</h6>
                      </td>
                    </tr>
                    <tr height="23px">
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Perusahaan</h6>
                      </td>
                      <td width="20px">
                        <h6 class="text-uppercase text-muted ls-1 mb-1">:</h6>
                      </td>
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Nusantara Digital</h6>
                      </td>
                    </tr>
                    <tr height="23px">
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">E-Mail</h6>
                      </td>
                      <td width="20px">
                        <h6 class="text-uppercase text-muted ls-1 mb-1">:</h6>
                      </td>
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">azzam@gmail.com</h6>
                      </td>
                    </tr>
                    <tr height="23px">
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Seluler</h6>
                      </td>
                      <td width="20px">
                        <h6 class="text-uppercase text-muted ls-1 mb-1">:</h6>
                      </td>
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">0896789200</h6>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        
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
                  <h4 class="text-uppercase text-white ls-1 mb-1">INFORMASI KENDARAAN</h4>
                </div>
                <div class="card-body-par" id="menu" style="display: block;">
                  <table border="0" align="center" width="100%">
                    <tr height="50px">
                      <td width="22px" rowspan="6"></td>
                      <td colspan="3">
                        <h4 class="text-uppercase text-muted ls-1 mb-1"><b>Azzam Khalif Prastyo</b></h4>
                      </td>
                      <td rowspan="6" align="right" >
                        <img src="./assets/content/img/theme/cars.png">
                      </td>
                    </tr>
                    <tr height="23px">
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Jabatan</h6>
                      </td>
                      <td width="20px">
                        <h6 class="text-uppercase text-muted ls-1 mb-1">:</h6>
                      </td>
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Head Operasional</h6>
                      </td>
                    </tr>
                    <tr height="23px">
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Perusahaan</h6>
                      </td>
                      <td width="20px">
                        <h6 class="text-uppercase text-muted ls-1 mb-1">:</h6>
                      </td>
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Nusantara Digital</h6>
                      </td>
                    </tr>
                    <tr height="23px">
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">E-Mail</h6>
                      </td>
                      <td width="20px">
                        <h6 class="text-uppercase text-muted ls-1 mb-1">:</h6>
                      </td>
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">azzam@gmail.com</h6>
                      </td>
                    </tr>
                    <tr height="23px">
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Seluler</h6>
                      </td>
                      <td width="20px">
                        <h6 class="text-uppercase text-muted ls-1 mb-1">:</h6>
                      </td>
                      <td>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">0896789200</h6>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        
                      </td>
                      
                    </tr> 
                    
                  </table>
                </div>
              </div>
            </div>    
          </div>
        </div>
      </div>
    </div>
    

      @include('partial.pairing')
      @include('layout.contentfooter')

  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>

  <script type="text/javascript">

      function Loadings(){

          $("#loader").attr("style","display: none;");
          $("#pengemudi").attr("style","display: block;");
      }

      function SudahPairing(argument) {

          $("#menu").attr("style","display: block;");
          $("#nopairing").attr("style","display: none;");

          $("#list-kendaraan").attr("style","display: block;");
          $("#list-pengemudi").attr("style","display: block;");
          $("#kendaraan-content").attr("style","display: block;");
          $("#pengemudi-content").attr("style","display: block;");
      }

      $('#pairing').on('click', function () {

          $('#modal-default').modal('show');

          $("#loader").attr("style","display: block;");
          $("#pengemudi").attr("style","display: none;");
          setTimeout(Loadings, 4000);
          $("#pengemudi-1").attr("class","alert alert-default");
          $("#pengemudi-2").attr("class","alert alert-default");
          $("#pengemudi-3").attr("class","alert alert-default");
          $("#pengemudi-4").attr("class","alert alert-default");
      });
      
      $('#pengemudi-1').on('click', function () {

        $("#pengemudi-1").attr("class","alert alert-success");
        $("#pengemudi-2").attr("class","alert alert-default");
        $("#pengemudi-3").attr("class","alert alert-default");
        $("#pengemudi-4").attr("class","alert alert-default");

      });

      $('#pengemudi-2').on('click', function () {

        $("#pengemudi-1").attr("class","alert alert-default");
        $("#pengemudi-2").attr("class","alert alert-success");
        $("#pengemudi-3").attr("class","alert alert-default");
        $("#pengemudi-4").attr("class","alert alert-default");

      });

      $('#pengemudi-3').on('click', function () {

        $("#pengemudi-1").attr("class","alert alert-default");
        $("#pengemudi-2").attr("class","alert alert-default");
        $("#pengemudi-3").attr("class","alert alert-success");
        $("#pengemudi-4").attr("class","alert alert-default");

      });

      $('#pengemudi-4').on('click', function () {

        $("#pengemudi-1").attr("class","alert alert-default");
        $("#pengemudi-2").attr("class","alert alert-default");
        $("#pengemudi-3").attr("class","alert alert-default");
        $("#pengemudi-4").attr("class","alert alert-success");

      });

      $('#pair').on('click', function () {


           swal({
                text: "Pairing Anda Berhasil!",
                icon: "success",
                buttons: false,
                timer: 4000,
            });

            $('#modal-default').modal('hide');

            setTimeout(SudahPairing, 4500);


      });

      $('#logout').on('click', function () {

          setTimeout(function(){ window.location.href = 'login'; }, 500);

      });

  </script>
</body>

</html>