@include('layout.contenthead')
  <div class="main-content">
    <!-- Header -->
    <div class="container-fluid pb-4 pt-5 pt-md-8">
          <!-- Card stats -->
      <div class="row">
        <div class="col">
          <div class="ct-page-title">
            <h1 class="ct-title" id="content">Pre Trip Checks</h1><span class="badge badge-primary">{{ $date }}</span>
          </div>
            <div class="card-body bg-white">
              <h6 class="heading-small text-muted">Pilih Kategori yang Tersedia</h6><br>
              <input type="hidden" id="count_terisi">
              <div class="pl-lg-4">
                @foreach($gettypes as $type)
                  <div class="alert2 alert_{{ $type->id }} alert-primary" onclick="GetModal({{ $type->id }})" role="alert">
                      <table width="100%">
                        <tr>
                          <td width="10%"><i class="fa {{ $type->icons }}" style="color: #ffffff"></i></td>
                          <td align="left"><h5 class="text-white">{{ $type->name }}</h5></td>
                          <td align="right" id="sudah_{{ $type->id }}"></td>
                        </tr>
                      </table>
                  </div>
                @endforeach
              </div>
              <div align="center">
              <button class="btn btn-success" id="kirim_ptc">Kirim</button>
              </div>
            </div>
            
        </div>
      </div>
    
      @include('content.trip_check.modal')
      @include('layout.contentfooter')
      @include('script.pretrip')

</body>

</html>