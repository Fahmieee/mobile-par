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

            </div>
          </div>
        
      </div>
      
<!--       @include('content.history.modal') -->
      @include('layout.contentfooter')
      @include('script.lihatsuara')

</body>

</html>