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
                <h1 class="ct-title" id="content">Pre Trip Checks</h1><span class="badge badge-primary">Tanggal : 2019-08-22</span>
              </div>
              <div class="alert alert-success" role="alert">
                <table border="0" width="100%">
                  <tr>
                    <td align="justify">
                      <span class="alert-inner--text"> <h6 class="text-muted-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h6></span>
                      <span class="badge badge-default">Body Mobil</span>
                    </td>
                    <td width="10px"></td>
                    <td align="right">
                      <label class="custom-toggle">
                        <input type="checkbox" checked>
                        <span class="custom-toggle-slider rounded-circle"></span>
                      </label>
                    </td>
                  </tr>
                </table>
              </div> 
              <div class="alert alert-danger" role="alert">
                <table border="0" width="100%">
                  <tr>
                    <td align="justify">
                      <span class="alert-inner--text"> <h6 class="text-muted-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h6></span>
                    </td>
                    <td width="10px"></td>
                    <td align="right">
                      <label class="custom-toggle">
                        <input type="checkbox">
                        <span class="custom-toggle-slider rounded-circle"></span>
                      </label>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="alert alert-danger" role="alert">
                <table border="0" width="100%">
                  <tr>
                    <td align="justify">
                      <span class="alert-inner--text"> <h6 class="text-muted-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h6></span>
                    </td>
                    <td width="10px"></td>
                    <td align="right">
                      <label class="custom-toggle">
                        <input type="checkbox">
                        <span class="custom-toggle-slider rounded-circle"></span>
                      </label>
                    </td>
                  </tr>
                </table>
              </div>  
              <table border="0" width="100%">
                <tr>
                  <td align="center">
                    <button type="button" id="pair" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Batal</button> 
                  </td>
                </tr>
              </table>
              
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