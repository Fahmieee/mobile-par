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
                        <div id="keluhan" class="icon icon-shape bg-white text-white rounded-circle shadow">
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
                        <h6 class="text-uppercase text-white ls-1 mb-1">Penilaian Kendaraan</h6>
                      </td>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Penilaian Pengemudi</h6>
                      </td>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Keluhan</h6>
                      </td>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Approve</h6>
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
                  <h6 class="text-uppercase text-white">Profile Anda</h6>
                </div>
                <div class="card-body-par" id="menu" style="display: block;">
                  <table border="0" align="center" width="100%">
                    <tr height ="10px">
                      <td width="22px" rowspan="6"></td>
                      <td colspan="4"></td>
                      <td rowspan="6" align="right" >
                        <img src="./assets/content/img/theme/users.png" width="68%">
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <h5 class="text-black" id="nama"></h5>
                      </td>
                    </tr>
                    <tr>
                      <td><h6>Jabatan</h6></td>
                      <td><h6>:</h6></td>
                      <td><h6>Korlap</h6></td>  
                    </tr>
                    <tr>
                      <td><h6>Email</h6></td>
                      <td><h6>:</h6></td>
                      <td><h6 class="email"></h6></td>  
                    </tr>
                    <tr>
                      <td><h6>Seluler</h6></td>
                      <td><h6>:</h6></td>
                      <td><h6 class="seluler"></h6></td>  
                    </tr>

                    <tr height="10px">
                      <td colspan="4"></td>
                    </tr>
                    
                    
                    
                  </table>
                </div>
              </div>
            </div>    
          </div>

      @include('layout.contentfooter')

      @include('script.korlap')
</body>

</html>