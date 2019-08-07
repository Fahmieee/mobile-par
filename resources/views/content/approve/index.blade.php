@include('layout.contenthead')
  <div class="main-content">
    <!-- Header -->
    <div class="header pt-4 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col">
              <div class="ct-page-title">
                <h1 class="ct-title" id="content">Approve Pre-Trip Check</h1><span class="badge badge-primary">Tanggal : 2019-08-22</span>
              </div>
              <div class="alert alert-danger" role="alert">
                <table border="0" width="100%">
                  <tr>
                    <td align="left">
                      <span class="alert-inner--text"> <h5 class="text-muted-white">AGUS BUDI PRASETYO</h5>
                      </span>
                      <span class="badge badge-default">High</span> <span class="badge badge-default">2019-08-23</span> <span class="badge badge-default">B 7900 BGT</span>
                    </td>
                    <td width="10px"></td>
                    <td align="right">
                      <button type="button" id="pair" class="btn btn-sm btn-success">Lihat</button>
                    </td>
                  </tr>
                </table>
              </div> 
              <div class="alert alert-warning" role="alert">
                <table border="0" width="100%">
                  <tr>
                    <td align="justify">
                      <span class="alert-inner--text"> <h5 class="text-muted-white">AHMAD PRASETYO (B 5678 IJK)</h5></span>
                      <span class="badge badge-default">Middle</span> <span class="badge badge-default">2019-08-23</span>
                    </td>
                    <td width="10px"></td>
                    <td align="right">
                      <button type="button" id="pair" class="btn btn-sm btn-success">Lihat</button>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="alert alert-primary" role="alert">
                <table border="0" width="100%">
                  <tr>
                    <td align="justify">
                      <span class="alert-inner--text"><h5 class="text-muted-white">AHMAD PRASETYO (B 5678 IJK)</h5></span>
                      <span class="badge badge-default">Low</span> <span class="badge badge-default">2019-08-23</span>
                    </td>
                    <td width="10px"></td>
                    <td align="right">
                      <button type="button" id="pair" class="btn btn-sm btn-success">Lihat</button>
                    </td>
                  </tr>
                </table>
              </div>  
              
            </div>
          </div>
        </div>
      </div>
    </div>
    

      @include('partial.pairing')
      @include('layout.contentfooter')

  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>

  <script type="text/javascript">

      function Loadings(){

          $("#loader").attr("style","display: none;");
          $("#pengemudi").attr("style","display: block;");
      }

      function SudahPairing(argument) {

          $("#menu").attr("style","display: block;");
          $("#nopairing").attr("style","display: none;");

          $("#list-kendaraan").attr("style","display: block;");
          $("#list-pengemudi").attr("style","display: block;");
          $("#kendaraan-content").attr("style","display: block;");
          $("#pengemudi-content").attr("style","display: block;");
      }

      $('#pairing').on('click', function () {

          $('#modal-default').modal('show');

          $("#loader").attr("style","display: block;");
          $("#pengemudi").attr("style","display: none;");
          setTimeout(Loadings, 4000);
          $("#pengemudi-1").attr("class","alert alert-default");
          $("#pengemudi-2").attr("class","alert alert-default");
          $("#pengemudi-3").attr("class","alert alert-default");
          $("#pengemudi-4").attr("class","alert alert-default");
      });
      
      $('#pengemudi-1').on('click', function () {

        $("#pengemudi-1").attr("class","alert alert-success");
        $("#pengemudi-2").attr("class","alert alert-default");
        $("#pengemudi-3").attr("class","alert alert-default");
        $("#pengemudi-4").attr("class","alert alert-default");

      });

      $('#pengemudi-2').on('click', function () {

        $("#pengemudi-1").attr("class","alert alert-default");
        $("#pengemudi-2").attr("class","alert alert-success");
        $("#pengemudi-3").attr("class","alert alert-default");
        $("#pengemudi-4").attr("class","alert alert-default");

      });

      $('#pengemudi-3').on('click', function () {

        $("#pengemudi-1").attr("class","alert alert-default");
        $("#pengemudi-2").attr("class","alert alert-default");
        $("#pengemudi-3").attr("class","alert alert-success");
        $("#pengemudi-4").attr("class","alert alert-default");

      });

      $('#pengemudi-4').on('click', function () {

        $("#pengemudi-1").attr("class","alert alert-default");
        $("#pengemudi-2").attr("class","alert alert-default");
        $("#pengemudi-3").attr("class","alert alert-default");
        $("#pengemudi-4").attr("class","alert alert-success");

      });

      $('#pair').on('click', function () {


           swal({
                text: "Pairing Anda Berhasil!",
                icon: "success",
                buttons: false,
                timer: 4000,
            });

            $('#modal-default').modal('hide');

            setTimeout(SudahPairing, 4500);


      });

      $('#logout').on('click', function () {

          setTimeout(function(){ window.location.href = 'login'; }, 500);

      });

  </script>
</body>

</html>