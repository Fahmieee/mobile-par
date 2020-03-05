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
                    <img src="#" id="photo_profile" class="rounded-circle" width="150" height="130">
                </div>
              </div>
            </div>
            <div class="card-header border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div align="center" id="tombol_ganti">
                <!-- <button id="ganti" class="btn btn-sm btn-primary">Ganti Photo</button> -->
                <!-- <div onclick="$('#uploadpost').click();" class="icon icon-shape bg-white text-white rounded-circle shadow">
                    <i class="fas fa-camera" style="color: #0166b5"></i>
                </div> -->
                <button onclick="$('#uploadpost').click();" class="btn btn-primary"><i class="fas fa-camera"></i>&nbsp;&nbsp;Ganti Photo</button>
                <input id="uploadpost" name="file" type="file" style="display:none;"/>
              </div>
              <br>
              <div class="text-center" id="namalengkap"></div>

              <div class="h5 font-weight-300" align="center">
                <i class="ni location_pin mr-2"></i>{{ $views->unitkerja_name }} - {{ $views->wilayah_name }}
              </div>
              <br>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Profil Saya</h3>
                </div>
                <div class="col-4 text-right" id="button">
                  <button class="btn btn-sm btn-primary" id="edited">Ubah Profil</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="heading-small text-muted mb-4">Informasi User</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Username</label>
                      <input type="text" id="username" class="form-control form-control-alternative harus" placeholder="Username" disabled>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Email</label>
                      <input type="text" id="email" class="form-control form-control-alternative edited harus" placeholder="budi@example.com" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Nama Driver</label>
                      <input type="text" id="first-name" class="form-control form-control-alternative" placeholder="Nama Depan" disabled>
                    </div>
                  </div>
                  <!-- <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">Nama Belakang</label>
                      <input type="text" id="last-name" class="form-control form-control-alternative" placeholder="Nama Belakang" disabled>
                    </div>
                  </div> -->
                </div>
                
              </div>
              <hr class="my-4" />
              <!-- Address -->
              <h6 class="heading-small text-muted mb-4">Informasi Kontak</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">Alamat</label>
                      <input id="alamat" class="form-control form-control-alternative edited harus" placeholder="Alamat Lengkap" type="text" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">Nomor Handphone</label>
                      <input id="no_hp" class="form-control form-control-alternative edited harus" placeholder="Nomor Handphone Anda" type="text" disabled>
                    </div>
                  </div>
                </div>
                
              </div>
              <div id="button-simpan" align="center"><button class="btn btn-warning" id="kembali">Kembali</button></div>
            </div>
          </div>
        </div>
      </div>
      <br>
    </div>
      @include('content.profile.modal')
      @include('layout.contentfooter')
      @include('script.profile')
</body>

</html>