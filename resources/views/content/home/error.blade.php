@include('layout.contenthead')
<div class="main-content">
  <!-- Header -->
  <div class="loading" style="display: none;">Loading&#8230;</div>
    <div class="container-fluid pb-2 pt-4 pt-md-8">

      <div class="row" style="display: block;">
        <div class="col">
          <div class="card shadow">
            <div class="card-body">
              <table width="100%">
                <tr>
                  <td align="center">
                    <img width="100%" src="/assets/content/img/theme/produkempty.jpg">
                  </td>
                </tr>
                <tr>
                  <td align="center">
                    <div class="text-danger" style="font-size: 20px;"><b>Ouuppsss! Pairing dulu!</b></div>
                  </td>
                </tr>
                <tr>
                  <td align="center">
                    <div style="font-size: 12px;">Harap hubungi Admin PAR untuk proses Pairing agar Aplikasi ini bisa digunakan.</div>
                  </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="center">
                    <a href="/login/logout"><button class="btn btn-danger">Kembali</button></a>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  @include('layout.contentfooter')
  </body>
</html>