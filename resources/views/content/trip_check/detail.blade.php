@include('layout.contenthead')
  <div class="main-content">
    <!-- Header -->
    <div class="container-fluid pb-4 pt-4 pt-md-8">
          <!-- Card stats -->
      <div class="row">
        <div class="col">
          <a href="/pretripcheck"><button type="button" id="back" class='btn btn-sm btn-success'>Back</button></a>
          <div class="ct-page-title">
            <h1 class="ct-title" id="content">PTC {{ $types->name }}</h1>
          </div>

          <br>
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

          <div class="row">

            @foreach($getdetails as $getdetail)

            @php
              date_default_timezone_set('Asia/Jakarta');
              $harini = date('Y-m-d');
              
              $countdetail = DB::table('check_detail')
              ->where('subdetail_id', $getdetail->id)
              ->count();

              $mobil = DB::table('check_detail')
              ->where('subdetail_id', $getdetail->id)
              ->first();

              $ptc = DB::table('pretrip_check_notoke')
              ->select('check_answer.value')
              ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
              ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
              ->where([
                  ['pretrip_check.date', '=', $harini],
                  ['check_answer.checkdetail_id', '=', $getdetail->id],
                  ['pretrip_check.user_id', '=', $user_id],
              ])
              ->first();


              $ptc2 = DB::table('pretrip_check_notoke')
              ->select('check_answer.value')
              ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
              ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
              ->leftJoin("check_detail", "check_answer.checkdetail_id", "=", "check_detail.id")
              ->where([
                  ['pretrip_check.date', '=', $harini],
                  ['pretrip_check.user_id', '=', $user_id],
                  ['check_detail.subdetail_id', '=', $getdetail->id],
              ])
              ->first();
              
            @endphp
            
            <div class="col-6">
                @if($countdetail == '0')
                  @php
                    if(!$ptc){
                      $warna = '';
                    } else {
                      $warna = 'bg-red';
                    }
                  @endphp
                  <div class="card {{ $warna }} shadow" id="detail_{{ $getdetail->id }}" onclick="GetAnswer({{ $getdetail->id }})">
                  
                @else
                    @php
                      if(!$ptc2){
                        $warna = '';
                      } else {
                        $warna = 'bg-red';
                      }

                    @endphp

                    @if($mobil->mobil != null)
                    <a href="/pretripcheck/detail/mobil/{{ $getdetail->id }}">
                      <div class="card {{ $warna }} shadow">
                    @else 
                    <a href="/pretripcheck/detail/{{ $getdetail->id }}">
                      <div class="card {{ $warna }} shadow">
                    @endif
                @endif
                    <div class="card-body">
                    <table width="100%" border="0">
                      <tr>
                        <td align="center"><i class="fa fa-car" style="font-size: 30px; color: #01497f"></i></td>
                      </tr>
                      <tr>
                        <td height="7px"></td>
                      </tr>
                      <tr>
                        <td align="center"><h5><b>{{ $getdetail->name }}</b></h5></td>
                      </tr>
                    </table>
                  </div>
                @if($countdetail != '0')
                  </a>
                @endif
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>

    </div>
  </div>
    
      @include('content.trip_check.modal')
      @include('layout.contentfooter')
      @include('script.pretrip')

</body>

</html>