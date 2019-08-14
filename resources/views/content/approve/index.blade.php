@include('layout.contenthead')
  <div class="main-content">
    <!-- Header -->
    <div class="header pt-4 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col">
              <button type="button" id="back" class='btn btn-sm btn-success'>Back</button>
              <div class="ct-page-title">
                <h1 class="ct-title" id="content">Approve Pre-Trip Check</h1>
              </div>
              <table width="100%">
                <tr><h5 class="ct-title" id="content">Keterangan :</h5></td>
                </tr>
                <tr>
                  <td width="5%"><div class="alert alert-danger" role="alert"></div></td>
                  <td><h6 class="text-muted-black"> : High</h6></td>
                  <td width="8%"></td>

                  <td width="5%"><div class="alert alert-warning" role="alert"></div></td>
                  <td><h6 class="text-muted-black"> : Medium</h6></td>
                  <td width="8%"></td>

                  <td width="5%"><div class="alert alert-primary" role="alert"></div></td>
                  <td><h6 class="text-muted-black"> : Low</h6></td>
                </tr>
              </table>
              <hr>

              <div id="muncul_approve">
                
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>

      @include('content.approve.modal')
      @include('layout.contentfooter')
      @include('script.approve')
</body>

</html>