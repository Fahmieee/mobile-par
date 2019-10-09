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
                        <div id="monitoring" class="icon icon-shape bg-white text-white rounded-circle shadow">
                            <i class="fas fa-paper-plane" style="color: #0166b5"></i>
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
                        <h6 class="text-uppercase text-white ls-1 mb-1">Suara User</h6>
                      </td>
                      <td align="center">
                        <h6 class="text-uppercase text-white ls-1 mb-1">Monitoring</h6>
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
                
                <div class="card-header bg-blue-par">
                  <h6 class="text-uppercase text-white ls-1 mb-1">Notifikasi</h6>
                </div>
                <div class="card-body bg-blue-par2" id="menu_icons" style="display: block;">
                  <button id="ptc" class="btn btn-sm btn-success menus" type="button">PTC</button>
                  <button id="dcu" class="btn btn-sm btn-secondary menus" type="button">DCU</button>
                  <button id="doc" class="btn btn-sm btn-secondary menus" type="button">DOC</button>
                  <button id="lainnya" class="btn btn-sm btn-secondary menus" type="button">LAINNYA</button>
                  <br><hr>
                  <div id="ptcbtn" style="display: block;">
                  <button class="btn btn-sm btn-danger tombol" id="btnhigh" type="button">HIGH</button>
                  <button class="btn btn-sm btn-secondary tombol" id="btnmedium" type="button">MEDIUM</button>
                  <button class="btn btn-sm btn-secondary tombol" id="btnlow" type="button">LOW</button>
                  <br><br>
                  </div>

                  <div id="contentlain" class="inilain" style="display: none;">

                    <div class="alert2 alert-secondary" role="alert">
                      <table width="100%" border="0"> 
                        <tr>
                          <td width="20%" rowspan="3">
                            <div class="icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow">
                              <i class="fas fa-child" style="color: #ffffff"></i>
                          </div>
                          </td>
                          <td><h5><b>Irsyad Bahrudin</b></h5></td>
                        </tr>
                        <tr>
                          <td><h6>Batasan Lembur Hampir Tercapai</h6></td>
                        </tr>
                      </table>  
                      <hr>
                      <div class="progress-wrapper">
                        <div class="progress-info">
                          <div class="progress-label">
                            <span>Batas Lembur</span>
                          </div>
                          <div class="progress-percentage">
                            <span class="text-lembur">38 Jam / 40 Jam</span>
                          </div>
                        </div>
                        <div class="progress">
                          <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                        </div>
                      </div>
                    </div>

                    <div class="alert2 alert-secondary" role="alert">
                      <table width="100%" border="0"> 
                        <tr>
                          <td width="20%" rowspan="3">
                            <div class="icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow">
                              <i class="fas fa-child" style="color: #ffffff"></i>
                          </div>
                          </td>
                          <td><h5><b>Agus Budi Sudarsono</b></h5></td>
                        </tr>
                        <tr>
                          <td><h6>Batasan Lembur Hampir Tercapai</h6></td>
                        </tr>
                      </table>  
                      <hr>
                      <div class="progress-wrapper">
                        <div class="progress-info">
                          <div class="progress-label">
                            <span>Batas Lembur</span>
                          </div>
                          <div class="progress-percentage">
                            <span class="text-lembur">35 Jam / 40 Jam</span>
                          </div>
                        </div>
                        <div class="progress">
                          <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div id="contentdoc" class="inidoc" style="display: none;">

                    <div class="alert2 alert-secondary" role="alert">
                      <table width="100%" border="0"> 
                        <tr>
                          <td width="20%" rowspan="3">
                            <div class="icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow">
                              <i class="fas fa-file" style="color: #ffffff"></i>
                          </div>
                          </td>
                          <td colspan="2"><h5><b>Agus Budi Sudarsono</b></h5></td>
                        </tr>
                        <tr>
                          <td colspan="2"><h6>Dokument KEUR Driver Akan segera Habis, Mohon untuk segera diperpanjang</h6></td>
                        </tr>
                        <tr>
                          <td width="20%"><span class="badge badge-pill badge-primary" style="font-size: 9px;"><i class="fas fa-calendar"></i> Exp : 21 Sep 2019</span></td>
                          <td><span class="badge badge-pill badge-danger" style="font-size: 9px;"><i class="fas fa-clock"></i> 12 Hari Lagi</span></td>
                        </tr> 
                      </table>  
                    </div>
                    
                    <div class="alert2 alert-secondary" role="alert">
                      <table width="100%" border="0"> 
                        <tr>
                          <td width="20%" rowspan="3">
                            <div class="icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow">
                              <i class="fas fa-file" style="color: #ffffff"></i>
                          </div>
                          </td>
                          <td colspan="2"><h5><b>Bambang Prayitno</b></h5></td>
                        </tr>
                        <tr>
                          <td colspan="2"><h6>Dokument Asuransi Driver Akan segera Habis, Mohon untuk segera diperpanjang</h6></td>
                        </tr>
                        <tr>
                          <td width="20%"><span class="badge badge-pill badge-primary" style="font-size: 9px;"><i class="fas fa-calendar"></i> Exp : 21 Sep 2019</span></td>
                          <td><span class="badge badge-pill badge-danger" style="font-size: 9px;"><i class="fas fa-clock"></i> 22 Hari Lagi</span></td>
                        </tr> 
                      </table>  
                    </div>

                  </div>

                  <div id="contentdcu" class="inidcu" style="display: none;">

                    <div class="alert2 alert-secondary" role="alert">
                      <table width="100%" border="0"> 
                        <tr>
                          <td width="20%" rowspan="4">
                            <div class="icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow">
                              <i class="fas fa-medkit" style="color: #ffffff"></i>
                            </div>
                          </td>
                          <td><h5><b>Agus Budi Sudarsono</b></h5></td>
                        </tr>
                        <tr>
                          <td><h6>Kondisi Driver Tidak memungkinkan untuk Melakukan Perjalanan</h6></td>
                        </tr>
                        <tr>
                          <td><span class="badge badge-pill badge-primary" style="font-size: 9px;"><i class="fas fa-map-marker"></i> MOR III - Semarang</span></td>
                        </tr> 
                      </table>
                      <hr>
                      <div class="alert2 alert-primary" role="alert">
                        <table width="100%" border="0"> 
                          <tr>
                            <td align="center"><h6 class="text-white">Suhu Badan</h6></td>
                            <td align="center"><h6 class="text-white">Tekanan Darah</h6></td>
                          </tr>
                          <tr>
                            <td align="center"><h2 class="text-white">25 C</h2><h6 class="text-white">Normal</h6></td>
                            <td align="center"><h2 class="text-white">120/90 </h2><h6 class="text-red"><b>High Blood Preasure</b></h6></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    
                    <div class="alert2 alert-secondary" role="alert">
                      <table width="100%" border="0"> 
                        <tr>
                          <td width="20%" rowspan="4">
                            <div class="icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow">
                              <i class="fas fa-medkit" style="color: #ffffff"></i>
                            </div>
                          </td>

                          <td><h5><b>Sujatmiko Prayoga</b></h5></td>
                        </tr>
                        <tr>
                          <td><h6>Kondisi Driver Tidak memungkinkan untuk Melakukan Perjalanan</h6></td>
                        </tr>
                        <tr>
                          <td><span class="badge badge-pill badge-primary" style="font-size: 9px;"><i class="fas fa-map-marker"></i> MOR III - Cirebon</span></td>
                        </tr>
                      </table>
                      <hr>
                      <div class="alert2 alert-primary" role="alert">
                        <table width="100%" border="0"> 
                          <tr>
                            <td align="center"><h6 class="text-white">Suhu Badan</h6></td>
                            <td align="center"><h6 class="text-white">Tekanan Darah</h6></td>
                          </tr>
                          <tr>
                            <td align="center"><h2 class="text-white">30 C</h2><h6 class="text-red"><b>Sakit</b></h6></td>
                            <td align="center"><h2 class="text-white">130/100 </h2><h6 class="text-red"><b>High Blood Preasure</b></h6></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>

                   <div id="ptccontent" class="iniptc" style="display: block;">
                    
                    
                  </div>

                  <div id="ptcmedium" class="iniptc" style="display: none;">
                    <div class="alert2 alert-secondary" role="alert">
                      <table width="100%" border="0"> 
                        <tr>
                          <td width="20%" rowspan="3">
                            <div class="icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow">
                              <i class="fas fa-car" style="color: #ffffff"></i>
                          </div>
                          </td>
                          <td colspan="3"><h5><b>Mahfud Zulfikar</b></h5></td>
                        </tr>
                        <tr>
                          <td colspan="3"><h6>Pintu Depan / Belakang Sisi Kanan - Baret  (Bagian : Exterior) </h6></td>
                        </tr>
                        <tr>
                          <td><span class="badge badge-pill badge-primary" style="font-size: 9px;"><i class="fas fa-calendar"></i> 24 Sep 2019</span></td>
                          <td><span class="badge badge-pill badge-warning" style="font-size: 9px;"><i class="fas fa-exclamation-triangle"></i> MEDIUM</span></td>
                          <td><span class="badge badge-pill badge-danger" style="font-size: 9px;"><i class="fas fa-clock"></i> 2 Hari</span></td>
                        </tr> 
                      </table>  
                      
                    </div>
                    
                    <div class="alert2 alert-secondary" role="alert">
                      <table width="100%" border="0"> 
                        <tr>
                          <td width="20%" rowspan="3">
                            <div class="icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow">
                              <i class="fas fa-car" style="color: #ffffff"></i>
                          </div>
                          </td>
                          <td colspan="3"><h5><b>Agus Budi Sudarsono</b></h5></td>
                        </tr>
                        <tr>
                          <td colspan="3"><h6>Fender Depan Sisi Kanan - Baret  (Bagian : Exterior)</h6></td>
                        </tr>
                        <tr>
                          <td width="20%"><span class="badge badge-pill badge-primary" style="font-size: 9px;"><i class="fas fa-calendar"></i> 22 Sep 2019</span></td>
                          <td><span class="badge badge-pill badge-warning" style="font-size: 9px;"><i class="fas fa-exclamation-triangle"></i> MEDIUM</span></td>
                          <td><span class="badge badge-pill badge-danger" style="font-size: 9px;"><i class="fas fa-clock"></i> 2 Hari</span></td>
                        </tr> 
                      </table>  
                    </div>
                  </div>

                  <div id="ptclow" class="iniptc" style="display: none;">
                    <div class="alert2 alert-secondary" role="alert">
                      <table width="100%" border="0"> 
                        <tr>
                          <td width="20%" rowspan="3">
                            <div class="icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow">
                              <i class="fas fa-car" style="color: #ffffff"></i>
                          </div>
                          </td>
                          <td colspan="3"><h5><b>Mahfud Zulfikar</b></h5></td>
                        </tr>
                        <tr>
                          <td colspan="3"><h6>Sarung Jok Belakang - Terpasang Rapi / Bersih (Bagian : Perlengkapan Kendaraan) </h6></td>
                        </tr>
                        <tr>
                          <td><span class="badge badge-pill badge-primary" style="font-size: 9px;"><i class="fas fa-calendar"></i> 22 Sep 2019</span></td>
                          <td><span class="badge badge-pill badge-primary" style="font-size: 9px;"><i class="fas fa-exclamation-triangle"></i> LOW</span></td>
                          <td><span class="badge badge-pill badge-danger" style="font-size: 9px;"><i class="fas fa-clock"></i> 4 Hari</span></td>
                        </tr> 
                      </table>  
                      
                    </div>
                    
                    <div class="alert2 alert-secondary" role="alert">
                      <table width="100%" border="0"> 
                        <tr>
                          <td width="20%" rowspan="3">
                            <div class="icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow">
                              <i class="fas fa-car" style="color: #ffffff"></i>
                          </div>
                          </td>
                          <td colspan="3"><h5><b>Agus Budi Sudarsono</b></h5></td>
                        </tr>
                        <tr>
                          <td colspan="3"><h6>Kemoceng Tidak Ada (Bagian : Perlengkapan Kendaraan)</h6></td>
                        </tr>
                        <tr>
                          <td width="20%"><span class="badge badge-pill badge-primary" style="font-size: 9px;"><i class="fas fa-calendar"></i> 22 Sep 2019</span></td>
                          <td><span class="badge badge-pill badge-primary" style="font-size: 9px;"><i class="fas fa-exclamation-triangle"></i> LOW</span></td>
                          <td><span class="badge badge-pill badge-danger" style="font-size: 9px;"><i class="fas fa-clock"></i> 2 Hari</span></td>
                        </tr> 
                      </table>  
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>    
          </div>
          <br>
          <div class="row">
            <div class="col">
              <div class="card shadow">
                <div class="card-header bg-green-par">
                  <h5 class="text-uppercase text-white">Profile Anda</h5>
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
                        <h5>{{ $getkorlaps->first_name }} {{ $getkorlaps->last_name }}</h5>
                      </td>
                    </tr>
                    <tr>
                      <td><h6>Jabatan</h6></td>
                      <td><h6>:</h6></td>
                      <td width="40%"><h6>{{ $getkorlaps->jabatan_name }}</h6></td>  
                    </tr>
                    <tr>
                      <td width="20%"><h6>Unit Kerja</h6></td>
                      <td><h6>:</h6></td>
                      <td><h6>{{ $getkorlaps->unitkerja_name }} - {{ $getkorlaps->wilayah_name }}</h6></td>  
                    </tr>
                    <tr>
                      <td><h6>Email</h6></td>
                      <td><h6>:</h6></td>
                      <td><h6>{{ $getkorlaps->email }}</h6></td>  
                    </tr>
                    <tr>
                      <td><h6>Seluler</h6></td>
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

      @include('content.home.korlap.modal')
      @include('layout.contentfooter')
      @include('script.korlap')
      
</body>

</html>