@include('layout.contenthead')
  <div class="main-content">
    <!-- Header -->
    <div class="container-fluid pb-4 pt-5 pt-md-8">
          <!-- Card stats -->
      <div class="row">
        <div class="col">
          <button type="button" id="back" class='btn btn-sm btn-success'>Back</button>
          <div class="ct-page-title">
            <h1 class="ct-title" id="content">Suara Anda</h1>
          </div>
          <input type="hidden" class="form-control" id="created_by" value="{{Auth::guard('user')->user()->id}}">

          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h5 class="mb-0">Masukan Suara Anda </h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Keluhan Untuk :</label>
                        <select class="form-control keluhan" id="types">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Driver">Driver</option>
                            <option value="kendaraan">Kendaraan</option>
                            <option value="callcenter">Call Center</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Keluhan/Saran Tentang :</label>
                        <select class="form-control keluhan" id="jenis">
                            <option>-</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Suara Anda</label>
                        <textarea rows="4" id="suara" class="form-control form-control-alternative keluhan" placeholder="Masukan Suara Anda"></textarea>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group" align="center">
                        <button type="button" id="simpan_suara" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger ml-auto" id="batal_submit">Batal</button> 
                      </div>
                    </div>
                  </div>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
      @include('content.suara.modal')
      @include('layout.contentfooter')
      @include('script.suara')

</body>

</html>