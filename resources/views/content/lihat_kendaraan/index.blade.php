@include('layout.contenthead')
  <div class="main-content">   
    <div class="container-fluid pb-4 pt-5 pt-md-8">
      <div class="row">
        <div class="col">
          <button type="button" id="back" class='btn btn-sm btn-success'>Back</button>
            <div class="ct-page-title">
              <h1 class="ct-title" id="content">Penilaian Kendaraan</h1><span class="badge badge-primary"></span>
            </div>
            <select class="form-control">
              <option>Periode Bulan September</option>
              <option>Periode Bulan Oktober</option>
            </select>
            <br>
            <div class="lihatnilai_driver">
              <div class="alert alert-primary" role="alert">
                <table width="100%" border="0"> 
                  <tr>
                    <td width="25%" rowspan="3"><img src="./assets/content/img/theme/mobil.jpg" width="100%" class="rounded-circle"></td>
                    <td width="5%" rowspan="3"></td>
                    <td><h5 class="text-white">AVANZA - B 6789 KIL</h5></td>
                    <td rowspan="3">
                      <h1 class="text-white">4.8</h1>
                    </td>
                  </tr>
                  <tr>
                    <td><h6 class="text-white">Agung Prayoga</h6></td>
                  </tr>
                  <tr>
                    <td>
                      <span class='fa fa-star' style='font-size:20px;color:orange;'></span>
                      <span class='fa fa-star' style='font-size:20px;color:orange;'></span>
                      <span class='fa fa-star' style='font-size:20px;color:orange;'></span>
                      <span class='fa fa-star' style='font-size:20px;color:orange;'></span>
                      <span class='fa fa-star' style='font-size:20px;'></span>
                    </td>
                  </tr>
                </table>  
              </div>
              <hr>
              <div class="alert alert-primary" role="alert">
                <table width="100%" border="0"> 
                  <tr>
                    <td width="25%" rowspan="3"><img src="./assets/content/img/theme/mobil.jpg" width="100%" class="rounded-circle"></td>
                    <td width="5%" rowspan="3"></td>
                    <td><h5 class="text-white">AVANZA - B 8890 KIS</h5></td>
                    <td rowspan="3">
                      <h1 class="text-white">4.7</h1>
                    </td>
                  </tr>
                  <tr>
                    <td><h6 class="text-white">Ahmad Hasani</h6></td>
                  </tr>
                  <tr>
                    <td>
                      <span class='fa fa-star' style='font-size:20px;color:orange;'></span>
                      <span class='fa fa-star' style='font-size:20px;color:orange;'></span>
                      <span class='fa fa-star' style='font-size:20px;color:orange;'></span>
                      <span class='fa fa-star' style='font-size:20px;color:orange;'></span>
                      <span class='fa fa-star' style='font-size:20px;'></span>
                    </td>
                  </tr>
                </table>  
              </div>
            </div>
            <hr>
            <div class="alert alert-primary" role="alert">
                <table width="100%" border="0"> 
                  <tr>
                    <td width="25%" rowspan="3"><img src="./assets/content/img/theme/mobil.jpg" width="100%" class="rounded-circle"></td>
                    <td width="5%" rowspan="3"></td>
                    <td><h5 class="text-white">AVANZA - B 9900 KIV</h5></td>
                    <td rowspan="3">
                      <h1 class="text-white">4.5</h1>
                    </td>
                  </tr>
                  <tr>
                    <td><h6 class="text-white">Darmadi Wicaksono</h6></td>
                  </tr>
                  <tr>
                    <td>
                      <span class='fa fa-star' style='font-size:20px;color:orange;'></span>
                      <span class='fa fa-star' style='font-size:20px;color:orange;'></span>
                      <span class='fa fa-star' style='font-size:20px;color:orange;'></span>
                      <span class='fa fa-star' style='font-size:20px;color:orange;'></span>
                      <span class='fa fa-star' style='font-size:20px;'></span>
                    </td>
                  </tr>
                </table>  
              </div>
              <hr>
              <div class="alert alert-primary" role="alert">
                <table width="100%" border="0"> 
                  <tr>
                    <td width="25%" rowspan="3"><img src="./assets/content/img/theme/mobil.jpg" width="100%" class="rounded-circle"></td>
                    <td width="5%" rowspan="3"></td>
                    <td><h5 class="text-white">AVANZA - B 9900 POC</h5></td>
                    <td rowspan="3">
                      <h1 class="text-white">4.3</h1>
                    </td>
                  </tr>
                  <tr>
                    <td><h6 class="text-white">Asman Bayu Sotejo</h6></td>
                  </tr>
                  <tr>
                    <td>
                      <span class='fa fa-star' style='font-size:20px;color:orange;'></span>
                      <span class='fa fa-star' style='font-size:20px;color:orange;'></span>
                      <span class='fa fa-star' style='font-size:20px;color:orange;'></span>
                      <span class='fa fa-star' style='font-size:20px;color:orange;'></span>
                      <span class='fa fa-star' style='font-size:20px;'></span>
                    </td>
                  </tr>
                </table>  
              </div>
            </div>
            </div>
          </div>
        
      </div>
      
<!--       @include('content.history.modal') -->
      @include('layout.contentfooter')
      @include('script.lihatdriver')
</body>

</html>