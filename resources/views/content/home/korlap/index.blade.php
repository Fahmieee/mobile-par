@include('layout.contenthead')
  <div class="main-content">
    <!-- Header -->
    <div class="container-fluid pb-4 pt-4 pt-md-8">
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
                      <h6>Belum ada Notifikasi Apapun pada Tab ini</h6>
                    </div>

                    <!-- <div class="alert2 alert-secondary" role="alert">
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
                    </div> -->

                  </div>

                  <div id="contentdoc" class="inidoc" style="display: none;">

                    <div class="alert2 alert-secondary" role="alert">
                      <h6>Saat ini Tidak ada Dokumen yang akan Habis</h6>
                    </div>

                    <!-- <div class="alert2 alert-secondary" role="alert">
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
                    </div> -->

                  </div>

                  <div id="contentdcu" class="inidcu" style="display: none;">

                    
                  </div>

                  <div id="ptchigh" class="iniptc" style="display: block;">
                    @if($getptchighs->count() == 0)
                    <div class="alert2 alert-secondary" role="alert">
                      <h6>Tidak Ada PTC Bermasalah Pada Tab ini!</h6>
                    </div>
                    @else
                    @foreach($getptchighs as $ptc)
                    @php
                    $high = DB::table('pretrip_check_notoke')
                    ->select('checkanswer_id')
                    ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
                    ->where([
                        ['checkanswer_id', '=', $ptc->checkanswer_id],
                        ['pretrip_check.user_id', '=', $ptc->user_id],
                        ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
                    ])
                    ->count();

                    $tanggal = DB::table('pretrip_check_notoke')
                    ->select('pretrip_check.date')
                    ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
                    ->where([
                        ['checkanswer_id', '=', $ptc->checkanswer_id],
                        ['pretrip_check.user_id', '=', $ptc->user_id],
                        ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
                    ])
                    ->orderBy('pretrip_check.id', 'desc')
                    ->first();

                    if($ptc->approve_role_id == '5'){
                      $displays = 'none';
                      $btns = 'Approve';
                    } else if($ptc->approve_role_id == '6'){
                      $proses = 'Proses Approve Dilakukan Oleh ASMEN';
                      $displays = 'block';
                      $btns = 'Approve2';
                    } else {
                      $proses = 'Proses Approve Dilakukan Oleh MANAGER';
                      $displays = 'block';
                      $btns = 'Approve2';
                    }

                    @endphp

                    <div class="alert2 alert-secondary" role="alert" onclick="{{ $btns }}({{ $ptc->user_id }}, {{ $ptc->checkanswer_id }})">
                      <table width="100%" border="0"> 
                        <tr>
                          <td width="20%" rowspan="2" align="center">
                            <div class="icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow">
                              <i class="fas fa-car" style="color: #ffffff"></i>
                            </div>
                          </td>
                          <td colspan="3"><h5><b>{{ $ptc->first_name }}</b></h5></td>
                        </tr>
                        <tr>
                          <td colspan="3"><h6>{{ $ptc->name }} - {{ $ptc->parameter }} </h6></td>
                        </tr>
                        <tr>
                          <td><span class="badge badge-pill badge-success" style="font-size: 8.5px;"> {{ $ptc->no_police }}</span></td>
                          <td><span class="badge badge-pill badge-primary" style="font-size: 8.5px;"><i class="fas fa-calendar"></i> {{ date('d M Y', strtotime($tanggal->date)) }}</span></td>
                          <td><span class="badge badge-pill badge-danger" style="font-size: 8.5px;"><i class="fas fa-exclamation-triangle"></i> {{ $ptc->level }}</span></td>
                          <td><span class="badge badge-pill badge-danger" style="font-size: 8.5px;"><i class="fas fa-clock"></i> {{ $high }} Hari</span></td>
                        </tr> 
                      </table>
                      <div style="display: {{ $displays }};">
                        <hr>
                        <table width="100%">
                          <tr>
                            <td align="center"><h6>{{ $proses }}</h6></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    @endforeach
                    @endif
                  </div>


                  <div id="ptcmedium" class="iniptc" style="display: none;">
                    @if($getptcmediums->count() == 0)
                    <div class="alert2 alert-secondary" role="alert">
                      <h6>Tidak Ada PTC Bermasalah Pada Tab ini!</h6>
                    </div>
                    @else
                    @foreach($getptcmediums as $ptc)
                    @php
                    $high = DB::table('pretrip_check_notoke')
                    ->select('checkanswer_id')
                    ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
                    ->where([
                        ['checkanswer_id', '=', $ptc->checkanswer_id],
                        ['pretrip_check.user_id', '=', $ptc->user_id],
                        ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
                    ])
                    ->orWhere('pretrip_check_notoke.status', 'UPDATED')
                    ->count();

                    $tanggal = DB::table('pretrip_check_notoke')
                    ->select('pretrip_check.date')
                    ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
                    ->where([
                        ['checkanswer_id', '=', $ptc->checkanswer_id],
                        ['pretrip_check.user_id', '=', $ptc->user_id],
                        ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
                    ])
                    ->orderBy('pretrip_check.id', 'desc')
                    ->first();

                    @endphp

                    <div class="alert2 alert-secondary" role="alert" onclick="Approve({{ $ptc->user_id }}, {{ $ptc->checkanswer_id }})">
                      <table width="100%" border="0"> 
                        <tr>
                          <td width="20%" rowspan="2" align="center">
                            <div class="icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow">
                              <i class="fas fa-car" style="color: #ffffff"></i>
                            </div>
                          </td>
                          <td colspan="3"><h5><b>{{ $ptc->first_name }}</b></h5></td>
                        </tr>
                        <tr>
                          <td colspan="3"><h6>{{ $ptc->name }} - {{ $ptc->parameter }} </h6></td>
                        </tr>
                        <tr>
                          <td><span class="badge badge-pill badge-success" style="font-size: 8.5px;"> {{ $ptc->no_police }}</span></td>
                          <td><span class="badge badge-pill badge-primary" style="font-size: 8.5px;"><i class="fas fa-calendar"></i> {{ date('d M Y', strtotime($tanggal->date)) }}</span></td>
                          <td><span class="badge badge-pill badge-danger" style="font-size: 8.5px;"><i class="fas fa-exclamation-triangle"></i> {{ $ptc->level }}</span></td>
                          <td><span class="badge badge-pill badge-danger" style="font-size: 8.5px;"><i class="fas fa-clock"></i> {{ $high }} Hari</span></td>
                        </tr> 
                      </table>  
                    </div>
                    @endforeach
                    @endif
                  </div>

                  <div id="ptclow" class="iniptc" style="display: none;">
                    @if($getptclows->count() == 0)
                    <div class="alert2 alert-secondary" role="alert">
                      <h6>Tidak Ada PTC Bermasalah Pada Tab ini!</h6>
                    </div>
                    @else
                    @foreach($getptclows as $ptc)
                    @php
                    $high = DB::table('pretrip_check_notoke')
                    ->select('checkanswer_id')
                    ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
                    ->where([
                        ['checkanswer_id', '=', $ptc->checkanswer_id],
                        ['pretrip_check.user_id', '=', $ptc->user_id],
                        ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
                    ])
                    ->count();

                    $tanggal = DB::table('pretrip_check_notoke')
                    ->select('pretrip_check.date')
                    ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
                    ->where([
                        ['checkanswer_id', '=', $ptc->checkanswer_id],
                        ['pretrip_check.user_id', '=', $ptc->user_id],
                        ['pretrip_check_notoke.status', '=', 'NOT APPROVED'],
                    ])
                    ->orWhere('pretrip_check_notoke.status', 'UPDATED')
                    ->orderBy('pretrip_check.id', 'desc')
                    ->first();

                    @endphp

                    <div class="alert2 alert-secondary" role="alert" onclick="Approve({{ $ptc->user_id }}, {{ $ptc->checkanswer_id }})">
                      <table width="100%" border="0"> 
                        <tr>
                          <td width="20%" rowspan="2" align="center">
                            <div class="icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow">
                              <i class="fas fa-car" style="color: #ffffff"></i>
                            </div>
                          </td>
                          <td colspan="3"><h5><b>{{ $ptc->first_name }}</b></h5></td>
                        </tr>
                        <tr>
                          <td colspan="3"><h6>{{ $ptc->name }} - {{ $ptc->parameter }} </h6></td>
                        </tr>
                        <tr>
                          <td><span class="badge badge-pill badge-success" style="font-size: 8.5px;"> {{ $ptc->no_police }}</span></td>
                          <td><span class="badge badge-pill badge-primary" style="font-size: 8.5px;"><i class="fas fa-calendar"></i> {{ date('d M Y', strtotime($tanggal->date)) }}</span></td>
                          <td><span class="badge badge-pill badge-danger" style="font-size: 8.5px;"><i class="fas fa-exclamation-triangle"></i> {{ $ptc->level }}</span></td>
                          <td><span class="badge badge-pill badge-danger" style="font-size: 8.5px;"><i class="fas fa-clock"></i> {{ $high }} Hari</span></td>
                        </tr> 
                      </table>  
                    </div>
                    @endforeach
                    @endif
                  </div>
                  
                </div>
              </div>
            </div>    
          </div>
          
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