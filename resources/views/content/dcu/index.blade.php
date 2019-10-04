@include('layout.contenthead')
  <div class="main-content">   
    <div class="container-fluid pb-4 pt-5 pt-md-8">
      <div class="row">
        <div class="col">
          <button type="button" id="back" class='btn btn-sm btn-success'>Back</button>
            <div class="ct-page-title">
              <h1 class="ct-title" id="content">Daily Checkup</h1>
            </div>
            <button type="button" id="dcu" class='btn btn-sm btn-primary'><i class="fa fa-plus"></i> DCU Baru</button>
            <hr>
            <table width="100%">
              <tr><h5 class="ct-title" id="content">Keterangan :</h5></td>
              </tr>
              <tr>
                <td width="15%"><button type="button" class='btn btn-success'></button></td>
                <td><h6 class="text-muted-black"> : Sehat/Normal</h6></td>
                <td width="5%"></td>
                <td width="15%"><button type="button" class='btn btn-yellow'></button></td>
                <td><h6 class="text-muted-black"> : Sedang</h6></td>
              </tr>
              <tr>
                <td colspan="2" height="10px"></td>
              </tr>
              <tr>
                <td width="15%"><button type="button" class='btn btn-warning'></button></td>
                <td><h6 class="text-muted-black"> : Waspada</h6></td>
                <td width="5%"></td>
                <td width="15%"><button type="button" class='btn btn-danger'></button></td>
                <td><h6 class="text-muted-black"> : Sakit</h6></td>
              </tr>
            </table>
            <br>
            <div class="card shadow">
              <div class="card-body-white">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Suhu</th>
                      <th scope="col">Tekanan Darah</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getdcus as $getdcu)
                      @php

                      if($getdcu->suhu > 36){

                        $btn = "btn-danger";

                      } else {

                        $btn = "btn-success";

                      }

                      $gets = explode("/",$getdcu->darah);

                      $depandarah = $gets[0];
                      $belakangdarah = $gets[1];

                      if ($depandarah < 120 && $belakangdarah < 80){

                          $btndarah = "btn-success";

                      } else if ($depandarah >= 120 && $depandarah < 140 || $belakangdarah >= 80 && $belakangdarah < 90){

                          $btndarah = "btn-yellow";

                      } else if ($depandarah >= 140 && $depandarah < 160 || $belakangdarah >= 90 && $belakangdarah < 100){

                          $btndarah = "btn-warning";

                      } else if ($depandarah >= 160 || $belakangdarah >= 100){

                          $btndarah = "btn-danger";
                      }

                      @endphp
                      <tr>
                        <th scope="row">{{ $getdcu->date }}</th>
                        <th scope="row"><button type="button" class='btn btn-sm {{ $btn }}'>{{ $getdcu->suhu }} C</button></th>
                        <th scope="row"><button type="button" class='btn btn-sm {{ $btndarah }}'>{{ $getdcu->darah }}  mmHg</button></th>
                      </tr>

                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
      
      @include('content.dcu.modal')
      @include('layout.contentfooter')
      @include('script.dcu')

</body>

</html>