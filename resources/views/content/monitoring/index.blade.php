@include('layout.contenthead')
  <div class="main-content">   
    <div class="container-fluid pb-4 pt-3 pt-md-8">
      <div class="row">
        <div class="col">
          <div class="ct-page-title">
            <h1 class="ct-title" id="content">Monitoring</h1>
          </div>
          <input type="text" placeholder="Cari Tanggal Monitoring" class="form-control">
          <br>
          @foreach ($getdcus as $getdcu)
          @php

            $drivers = DB::table('drivers')
            ->where('korlap_id', $user->id)
            ->count();
            
            $checkup = DB::table('medical_checkup')
            ->leftJoin("drivers", "drivers.driver_id", "=", "medical_checkup.user_id")
            ->where([
                ['date', '=', $getdcu->date],
                ['korlap_id', '=', $user->id],
            ])
            ->count();

            $persen = round(($checkup / $drivers) * 100);

            $sehat = DB::table('medical_checkup')
            ->leftJoin("drivers", "drivers.driver_id", "=", "medical_checkup.user_id")
            ->where([
                ['date', '=', $getdcu->date],
                ['korlap_id', '=', $user->id],
                ['hasil', '=', '1']
            ])
            ->count();

            $hatihati = DB::table('medical_checkup')
            ->leftJoin("drivers", "drivers.driver_id", "=", "medical_checkup.user_id")
            ->where([
                ['date', '=', $getdcu->date],
                ['korlap_id', '=', $user->id],
                ['hasil', '=', '2']
            ])
            ->count();

            $sakit = DB::table('medical_checkup')
            ->leftJoin("drivers", "drivers.driver_id", "=", "medical_checkup.user_id")
            ->where([
                ['date', '=', $getdcu->date],
                ['korlap_id', '=', $user->id],
                ['hasil', '=', '3']
            ])
            ->count();


          @endphp
          <a href="detailmonitoring/{{ $getdcu->date }}">
            <div class="alert alert-primary" role="alert">
            <table border="0" width="100%">
              <tr>
                <td>
                  <div class="progress-wrapper">
                    <div class="progress-info">
                      <div class="progress-percentage">
                        <span class="text-lembur text-white">{{ date('d M Y', strtotime($getdcu->date)) }} | {{ $checkup }}/{{ $drivers }}</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-success lembur" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: {{ $persen }}%;"></div>
                    </div>
                  </div>
                </td>
                <td width="5%"></td>
                <td width="20%"><h1 class="text-white">{{ $persen }}%</h1></td>
              </tr>
            </table>
            <table width="100%">
              <tr>
                <td><h5 class="text-white">SEHAT : {{ $sehat }} | HATI-HATI : {{ $hatihati }} | SAKIT : {{ $sakit }} </h5></td>
              </tr>
            </table>
          </div>
          </a>
          @endforeach 
        </div>
        
      </div>
      
<!--       @include('content.history.modal') -->
      @include('layout.contentfooter')

</body>

</html>