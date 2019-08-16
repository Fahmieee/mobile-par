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

          <table>
            <tr><h5 class="ct-title" id="content"><b>Keterangan :</b></h5></td>
            </tr>
            <tr>
              <td width="5%"><div class="alert alert-success" role="alert"></div></td>
              <td width="10%"><h6 class="text-muted-black"> : Oke</h6></td>

              <td width="5%"><div class="alert alert-default" role="alert"></div></td>
              <td><h6 class="text-muted-black"> : Not Oke</h6></td>
            </tr>
          </table>
          <hr>

          <div id="content_tripcheck">
            
          </div>
            
          <table border="0" width="100%">
            <tr>
              <td align="center">
                <button type="button" id="submit_pretrip_check" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger ml-auto" id="batal_submit">Batal</button> 
              </td>
            </tr>
          </table>
          
        </div>
      </div>


    
      @include('content.trip_check.modal')
      @include('layout.contentfooter')
      @include('script.pretrip')

</body>

</html>