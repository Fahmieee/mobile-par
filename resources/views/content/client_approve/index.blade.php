@include('layout.contenthead')
  <div class="main-content">   
    <div class="container-fluid pb-4 pt-3 pt-md-8">
      <div class="row">
        <div class="col">
          <button type="button" id="back" class='btn btn-sm btn-success'>Back</button>
            <div class="ct-page-title">
              <h1 class="ct-title" id="content">Approve</h1><span class="badge badge-primary">{{ $date }}</span>
            </div>
            <input type="text" placeholder="Cari Tanggal Perjalanan" class="form-control">
            <br>
            <div class="muncul_data">
              
            </div>
          </div>
        
      </div>
      
      @include('content.client_approve.modal')
      @include('layout.contentfooter')
      @include('script.client_approve')

</body>

</html>