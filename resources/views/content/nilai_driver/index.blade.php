@include('layout.contenthead')
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary pb-9 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="#" id="photo_drivers" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="text-center">
                <h3 id="nama"></h3>
                <h1 style="font-size: 60px;" id="rating">0.0</h1>
                <div id="ratings_bintang"></div>
              </div>
              <br>
              <div id="validasi">
                <div class="ct-page-title">
                  <h3 class="ct-title" id="content"><b>Penilaian Pengemudi</b></h3>
                </div>

                @foreach($gettypes as $type)
                  <div class="alert2 alert_{{ $type->id }} alert-primary" onclick="GetModal({{ $type->id }})" role="alert">
                      <table width="100%">
                        <tr>
                          <td width="10%"><i class="fa {{ $type->icon }}" style="color: #ffffff"></i></td>
                          <td align="left"><h5 class="text-white">{{ $type->type }}</h5></td>
                          <td align="right" id="sudah_{{ $type->id }}"></td>
                        </tr>
                      </table>
                      <div id="rating_{{ $type->id }}"></div>
                  </div>
                @endforeach

              </div>
              <div align="center">
                <button class="btn btn-success" id="kembali" type="button">Kembali</button>
              </div>
              <br>
            </div>
          </div>
        </div>
      
        @include('content.nilai_driver.modal')
        @include('layout.contentfooter')

        @include('script.nilaidriver')
</body>

</html>