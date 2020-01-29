@include('layout.contenthead')
  <div class="main-content">
    <!-- Header -->
    <div class="container-fluid pb-4 pt-4 pt-md-8">
          <!-- Card stats -->
      <div class="row">
        <div class="col">
          <a href="/home"><button type="button" id="back" class='btn btn-sm btn-success'>Back</button></a>
          <div class="ct-page-title">
            <h1 class="ct-title" id="content">Pre Trip Checks</h1>
          </div>
          <table width="100%">
              <tr><h4 class="ct-title" id="content"><b>Keterangan :</b></h4></td>
              </tr>
              <tr>
                <td width="5%"><div class="card shadow"><div class="card-body"></div></div></td>
                <td><h5 class="text-muted-black"> : OK</h5></td>
                <td width="8%"></td>

                <td width="5%"><div class="card bg-red shadow"><div class="card-body"></div></div></td>
                <td><h5 class="text-muted-black"> : NOT OK</h5></td>
                <td width="8%"></td>
              </tr>
            </table>
          <br>
          @if($getanswerkemarins != '0')
          <div class="row">
            <div class="col-12">
              <div class="card shadow bg-red">
                <div class="card-body">
                  <h5 class="text-white">PTC Masalah Kemarin ({{ $tanggal }})</h5>
                  <hr>

                  @foreach($getanswerkemarins as $getanswerkemarin)
                  <div class="alert2 alert-secondary fade show" role="alert">
                    <table width="100%" border="0">
                      <tr>
                        <td width="25%" rowspan="2">
                          <div class="icon icon-shape text-white bg-red rounded-circle shadow">
                            <i class="fas fa-wrench" style="color: #ffffff"></i>
                        </div>
                        </td>
                        <td><h5><b>{{ $getanswerkemarin->name }}</b></h5></td>
                      </tr>
                      <tr>
                        <td><h6>{{ $getanswerkemarin->parameter }}</h6></td>
                      </tr>
                    </table>
                    <hr>
                    <table width="100%" border="0">
                      <tr>
                        <td><h6>Apakah Permasalahan Mengenai ini Sudah Di Perbaiki?</h6></td>
                      </tr>
                      <tr>
                        <td height="10px"></td>
                      </tr>
                      <tr>
                        <td align="center"><button type="button" onclick="Sudah({{ $getanswerkemarin->id }})" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Sudah</button><button type="button" onclick="Belum({{ $getanswerkemarin->id }})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Belum</button>
                        @php
                          $detailss = DB::table('check_answer')
                          ->where([
                              ['checkdetail_id', '=', $getanswerkemarin->checkdetail_id],
                              ['kategori', '=', 'WAJIB'],
                          ]) 
                          ->count();
                        @endphp

                        @if($detailss >= 2)
                          <button type="button" onclick="Update({{ $getanswerkemarin->id }}, {{ $getanswerkemarin->answer_id }})" class="btn btn-sm btn-primary"><i class="fa fa-bolt"></i> Update</button>
                        @endif
                        </td>
                      </tr>
                    </table>
                  </div>
                  @endforeach

                </div>
              </div>
            </div>
          </div>
          @endif

          <br>
          @if($getanswers->count() >= 1)
          <div class="row" style="display: block;">
          @else
          <div class="row" style="display: none;">
          @endif
            <div class="col-12">
              <div class="card shadow bg-red">
                <div class="card-body">
                  <h5 class="text-white">Summary PTC Bermasalah Hari Ini</h5>
                  <hr>
                  <br>
                  @foreach($getanswers as $getanswer)
                  <div class="alert2 alert-secondary fade show" role="alert">
                    <table width="100%">
                      <tr>
                        <td><h6><b>{{ $getanswer->name }} - {{ $getanswer->parameter }}</b></h6></td>
                      </tr>
                    </table>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">

            @foreach($gettypes as $type)

            @php
              $harini = date('Y-m-d');
              $ptc = DB::table('pretrip_check_notoke')
              ->select('check_answer.value')
              ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
              ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
              ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
              ->where([
                  ['pretrip_check.date', '=', $harini],
                  ['check_detail.checktype_id', '=', $type->id],
                  ['pretrip_check.user_id', '=', $user_id],
              ])  
              ->count();

              if($ptc == '0'){
                $warna = '';
              } else {
                $warna = 'bg-red';
              }

              $ptcmobil = DB::table('check_detail')
              ->where([
                  ['checktype_id', '=', $type->id],
                  ['subdetail_id', '=', '0'],
                  ['mobil', '!=', null],
              ])
              ->count();

            @endphp
            
            <div class="col-4">
              <div class="card {{ $warna }} shadow">
                @if($getanswerkemarins != '0')
                  <div class="ptckemarin">
                @else

                  @if($ptcmobil == '0')
                    <a href="/pretripcheck/{{ $type->id }}">
                  @else
                    <a href="/pretripcheck/langsungmobil/{{ $type->id }}">
                  @endif

                @endif

                    <div class="card-body">
                      <table width="100%" border="0">
                        <tr>
                          <td align="center"><i class="fa {{ $type->icons }}" style="font-size: 30px; color: #01497f"></i></td>
                        </tr>
                        <tr>
                          <td height="7px"></td>
                        </tr>
                        <tr>
                          <td align="center"><h6><b>{{ $type->name }}</b></h6></td>
                        </tr>
                      </table>
                    </div>

                @if($getanswerkemarins != '0')
                  </div>
                @else
                  </a>
                @endif
                  
              </div>
            </div>
            @endforeach
          </div>
          

        </div>
      </div>

      <div align="center">
        @if($getanswerkemarins != '0')
          <button class="btn btn-success ptckemarin">Kirim PTC</button>
        @else
          <button class="btn btn-success" id="kirim_ptc">Kirim PTC</button>
        @endif
      </div>
            

            <!-- <div class="card-body">
              <h6 class="heading-small text-muted">Pilih Kategori yang Tersedia</h6><br>
              <input type="hidden" id="count_terisi">
              <div class="pl-lg-4">
                <div class="col-6">
                  <div class="alert2 alert-primary" role="alert">

                  </div>
                </div> -->
                <!-- @foreach($gettypes as $type)
                  <div class="alert2 alert_{{ $type->id }} alert-primary" onclick="GetModal({{ $type->id }})" role="alert">
                      <table width="100%">
                        <tr>
                          <td width="10%"><i class="fa {{ $type->icons }}" style="color: #ffffff"></i></td>
                          <td align="left"><h5 class="text-white">{{ $type->name }}</h5></td>
                          <td align="right" id="sudah_{{ $type->id }}"></td>
                        </tr>
                      </table>
                  </div>
                @endforeach -->
              <!-- </div>
              <div align="center">
              <button class="btn btn-success" id="kirim_ptc">Kirim</button>
              </div>
            </div> -->
            
        </div>
      </div>
    
      @include('content.trip_check.modal')
      @include('layout.contentfooter')
      @include('script.pretrip')

</body>

</html>