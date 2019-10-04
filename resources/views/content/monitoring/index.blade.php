@include('layout.contenthead')
  <div class="main-content">   
    <div class="container-fluid pb-4 pt-3 pt-md-8">
      <div class="row">
        <div class="col">
            <div class="ct-page-title">
              <h1 class="ct-title" id="content">Monitoring</h1>
            </div>
            <input type="text" placeholder="Cari Tanggal Monitoring" class="form-control">
            <br>
            <div class="alert alert-primary detail" role="alert">
              <table border="0" width="100%">
                <tr>
                  <td>
                    <div class="progress-wrapper">
                      <div class="progress-info">
                        <div class="progress-percentage">
                          <span class="text-lembur text-white">30 Sep 2019 (25/50)</span>
                        </div>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-success lembur" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>
                      </div>
                    </div>
                  </td>
                  <td width="5%"></td>
                  <td width="20%"><h1 class="text-white">85%</h1></td>
                </tr>
              </table>
            </div>
            <div class="alert alert-primary detail" role="alert">
              <table border="0" width="100%">
                <tr>
                  <td>
                    <div class="progress-wrapper">
                      <div class="progress-info">
                        <div class="progress-percentage">
                          <span class="text-lembur text-white">29 Sep 2019 (22/50)</span>
                        </div>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-success lembur" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                      </div>
                    </div>
                  </td>
                  <td width="5%"></td>
                  <td width="20%"><h1 class="text-white">78%</h1></td>
                </tr>
              </table>
            </div>
            <div class="alert alert-primary detail" role="alert">
              <table border="0" width="100%">
                <tr>
                  <td>
                    <div class="progress-wrapper">
                      <div class="progress-info">
                        <div class="progress-percentage">
                          <span class="text-lembur text-white">28 Sep 2019 (21/50)</span>
                        </div>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-success lembur" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 74%;"></div>
                      </div>
                    </div>
                  </td>
                  <td width="5%"></td>
                  <td width="20%"><h1 class="text-white">74%</h1></td>
                </tr>
              </table>
            </div>
            <div class="alert alert-primary detail" role="alert">
              <table border="0" width="100%">
                <tr>
                  <td>
                    <div class="progress-wrapper">
                      <div class="progress-info">
                        <div class="progress-percentage">
                          <span class="text-lembur text-white">27 Sep 2019 (20/50)</span>
                        </div>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-success lembur" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                      </div>
                    </div>
                  </td>
                  <td width="5%"></td>
                  <td width="20%"><h1 class="text-white">72%</h1></td>
                </tr>
              </table>
            </div>
          </div>
        
      </div>
      
<!--       @include('content.history.modal') -->
      @include('layout.contentfooter')
      @include('script.monitoring')

</body>

</html>