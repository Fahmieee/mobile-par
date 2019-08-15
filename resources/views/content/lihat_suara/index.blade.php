@include('layout.contenthead')
  <div class="main-content">   
    <div class="container-fluid pb-4 pt-5 pt-md-8">
      <div class="row">
        <div class="col">
          <button type="button" id="back" class='btn btn-sm btn-success'>Back</button>
            <div class="ct-page-title">
              <h1 class="ct-title" id="content">Keluhan/Saran Pelanggan</h1><span class="badge badge-primary"></span>
            </div>
            <input type="text" placeholder="Cari Driver" class="form-control">
            <br>
            <div class="muncul_suara">
              <div class="alert alert-default" role="alert">
                <table width="100%"> 
                  <tr>
                    <td><strong>Default!</strong></td>
                    <td align="right"><button class="btn btn-sm btn-primary" type="button">Lihat</button></td>
                  </tr>
                  <tr>
                    <td colspan="2"><h6 class="text-white"> 2019-09-08</h6></td>
                  </tr>
                </table>
                <hr>
                <div class="alert alert-secondary" role="alert">
                    <strong>Secondary!</strong> This is a secondary alert—check it out!
                </div>
              </div>
              <hr>
              <div class="alert alert-default" role="alert">
                <table width="100%"> 
                  <tr>
                    <td><strong>Default!</strong></td>
                    <td align="right"><button class="btn btn-sm btn-primary" type="button">Lihat</button></td>
                  </tr>
                </table> 
              </div>
              <hr>
            </div>
          </div>
        
      </div>
      
<!--       @include('content.history.modal') -->
      @include('layout.contentfooter')
      @include('script.lihatsuara')

</body>

</html>