@include('layout.contenthead')
  <div class="main-content">
    <!-- Header -->
    <div class="container-fluid pb-4 pt-4 pt-md-8">
          <!-- Card stats -->
      <div class="row">
        <div class="col">
          <a href="/pretripcheck/{{ $details->checktype_id }}"><button type="button" id="back" class='btn btn-sm btn-success'>Back</button></a>
          <div class="ct-page-title">
            <h1 class="ct-title" id="content">PTC {{ $details->name }}</h1>
          </div>

          <div class="row">
            <div class="col-12">
              <table width="100%">
                <tr>
                  <td>
                    <div class="eyehide" align="center"> 
                      <img src="{{ asset('assets/content/img/theme/cartops.png') }}">
                      @foreach($lebihdetails as $lebihdetail)

                        @php
                        date_default_timezone_set('Asia/Jakarta');
                        $harini = date('Y-m-d');

                        $ptc = DB::table('pretrip_check_notoke')
                        ->select('check_answer.value')
                        ->leftJoin("pretrip_check", "pretrip_check_notoke.pretripcheck_id", "=", "pretrip_check.id")
                        ->leftJoin("check_answer", "pretrip_check_notoke.checkanswer_id", "=", "check_answer.id")
                        ->where([
                            ['pretrip_check.date', '=', $harini],
                            ['check_answer.checkdetail_id', '=', $lebihdetail->id],
                            ['pretrip_check.user_id', '=', $user_id],
                        ])
                        ->first();

                        if(!$ptc){
                          $warna = 'check_success2';
                        } else {
                          $warna = 'check_danger2';
                        }

                        @endphp
                      <img onclick="GetAnswer({{ $lebihdetail->id }})" class="btnrem{{ $loop->iteration }}" id="detilicon_{{ $lebihdetail->id }}" src="/assets/content/img/theme/{{ $warna }}.png">
                      @endforeach
                    </div>
                  </td>
                </tr>
              </table>
            </div>
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