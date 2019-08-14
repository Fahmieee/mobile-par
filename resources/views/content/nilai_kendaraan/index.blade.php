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
                    <img src="./assets/content/img/theme/team-1-800x800.jpg" class="rounded-circle">
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
                  <h3 class="ct-title" id="content"><b>Penilaian Kendaraan</b></h3>
                </div>
                <div id="tampilkan_content"></div>
              </div>
              <table border="0" width="100%">
                <tr>
                  <td align="center" id="button">
                    <button type="button" id="submit_nilai" class="btn btn-primary">Kirim Nilai</button>
                    <button type="button" class="btn btn-danger ml-auto" id="batal_submit">Batal</button> 
                  </td>
                </tr>
              </table>
              <br>
            </div>
          </div>
        </div>
        @include('content.nilai_kendaraan.modal')
        @include('layout.contentfooter')
        @include('script.nilaikendaraan')
</body>

</html>