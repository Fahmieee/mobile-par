@include('layout.contenthead')
  <div class="main-content">   
    <div class="container-fluid pb-4 pt-3 pt-md-8">
      <div class="row">
        <div class="col">
            <div class="ct-page-title">
              <h1 class="ct-title" id="content">Detail Monitoring <br>({{ date('d M Y', strtotime($dates)) }})</h1>
            </div>
            <input type="text" placeholder="Cari Driver" class="form-control">
            <br>
            <table width="100%">
              <tr><h5 class="ct-title" id="content">Keterangan :</h5></td>
              </tr>
              <tr>
                <td width="5%"><div class="alert alert-default" role="alert"></div></td>
                <td><h5 class="text-muted-black"> : Belum DCU</h5></td>
                <td width="8%"></td>

                <td width="5%"><div class="alert alert-success" role="alert"></div></td>
                <td><h5 class="text-muted-black"> : Sudah DCU</h5></td>
                <td width="8%"></td>
              </tr>
            </table>

            @foreach($details as $detail)

              @php

              if ($detail->photo == null){

                  $photos = '/assets/content/img/theme/team-1-800x800.jpg';

              } else {

                  $photos = '/assets/profile_photo/'.$detail->photo;

              }

              $mcu = DB::table('medical_checkup')
              ->where([
                  ['user_id', '=', $detail->id],
                  ['date', '=', $dates],
              ])
              ->first();

              if (!$mcu){

                $alert = 'default';
                $times = '-';
                $hasil = '-';

              } else {

                $alert = 'success';
                $times = $mcu->time;

                if ($mcu->hasil == '3'){

                  $hasil = 'UNFIT';

                } else {

                  $hasil = 'FIT';

                }
              }

              @endphp
            <div class="alert alert-{{ $alert }}" role="alert">
              <table width="100%" border="0">
                <tr>
                  <td width="25%" rowspan="4"><img src="{{ $photos }}" width="100%" class="rounded-circle"></td>
                  <td width="5%" rowspan="4"></td>
                  <td><h5 class="text-white">{{ $detail->first_name }} {{ $detail->last_name }}</h5></td>
                  <td rowspan="4">
                    <i class="fa fa-exclamation" style="font-size: 30px"></i>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h6 class="text-white"><i class="fa fa-map-marker"></i> {{ $detail->unitkerja_name }} - {{ $detail->wilayah_name }}</h6>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h6 class="text-white"><i class="fa fa-heart"></i> {{ $hasil }}</h6>
                  </td>
                </tr>
                <tr>
                  <td><h2 class="text-white"><i class="fa fa-clock"></i> {{ $times }}</h2></td>
                </tr>
              </table>
            </div>
            @endforeach
            

          </div>
        
      </div>
      
<!--       @include('content.history.modal') -->
      @include('layout.contentfooter')

</body>

</html>