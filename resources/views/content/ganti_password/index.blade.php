@include('layout.contenthead')
  <div class="main-content">   
    <div class="container-fluid pb-4 pt-5 pt-md-8">
      <div class="row">
        <div class="col">
          <div id="buttonback">
            <a href="/home"><button type="button" id="back" class='btn btn-sm btn-success'>Back</button></a>
          </div>
          <div class="ct-page-title">
            <h1 class="ct-title" id="content">Ubah Password</h1><span class="badge badge-primary">{{ $date }}</span>
          </div>
          <br>
          <div class="">
            
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-body">
              <h6 class="heading-small text-muted mb-4">Ubah Password Anda</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Password Baru</label>
                      <input type="password" id="password_new" class="form-control form-control-alternative ubah" placeholder="Password Baru Anda">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Konfirmasi Password Baru</label>
                      <input type="password" id="password_confirm" class="form-control form-control-alternative ubah" placeholder="Konfirmasi Password Baru">
                    </div>
                  </div>
                  
                </div>
                
              </div>
              <hr class="my-4" />
              
              <div align="center"><button class="btn btn-success" id="ubah">Ubah Password</button></div>
            </div>
          </div>
        </div>
      </div>

      
<!--       @include('content.history.modal') -->
      @include('layout.contentfooter')
      @include('script.gantipassword')

</body>

</html>