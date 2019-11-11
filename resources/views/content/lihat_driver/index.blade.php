@include('layout.contenthead')
  <div class="main-content">   
    <div class="container-fluid pb-4 pt-5 pt-md-8">
      <div class="row">
        <div class="col">
          <button type="button" id="back" class='btn btn-sm btn-success'>Back</button>
            <div class="ct-page-title">
              <h1 class="ct-title" id="content">Penilaian Diver</h1><span class="badge badge-primary"></span>
            </div>
            <select class="form-control">
              <option>Periode Bulan September</option>
              <option>Periode Bulan Oktober</option>
            </select>
            <br>
            <div class="lihatnilai_driver">
              <div class="alert alert-primary" role="alert">
                <h6 class="text-white">Belum ada Driver yang Dinilai untuk Saat ini</h6>
              </div>

              <!-- <div class="alert alert-primary" role="alert">

                <table width="100%" border="0"> 
                  <tr>
                    <td width="25%" rowspan="3"><img src="./assets/content/img/theme/team-1-800x800.jpg" width="100%" class="rounded-circle"></td>
                    <td width="5%" rowspan="3"></td>
                    <td><h5 class="text-white">Agus Budi Sudarsono</h5></td>
                    <td rowspan="3">
                      <h1 class="text-white">4.8</h1>
                    </td>
                  </tr>
                  <tr>
                    <td><h6 class="text-white">AVANZA - B 6789 KIL</h6></td>
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
                    <td width="25%" rowspan="3"><img src="./assets/content/img/theme/team-1-800x800.jpg" width="100%" class="rounded-circle"></td>
                    <td width="5%" rowspan="3"></td>
                    <td><h5 class="text-white">Ahmad Hasani</h5></td>
                    <td rowspan="3">
                      <h1 class="text-white">4.7</h1>
                    </td>
                  </tr>
                  <tr>
                    <td><h6 class="text-white">AVANZA - B 8890 KIS</h6></td>
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
                    <td width="25%" rowspan="3"><img src="./assets/content/img/theme/team-1-800x800.jpg" width="100%" class="rounded-circle"></td>
                    <td width="5%" rowspan="3"></td>
                    <td><h5 class="text-white">Darmadi Wicaksono</h5></td>
                    <td rowspan="3">
                      <h1 class="text-white">4.5</h1>
                    </td>
                  </tr>
                  <tr>
                    <td><h6 class="text-white">AVANZA - B 9900 KIV</h6></td>
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
                    <td width="25%" rowspan="3"><img src="./assets/content/img/theme/team-1-800x800.jpg" width="100%" class="rounded-circle"></td>
                    <td width="5%" rowspan="3"></td>
                    <td><h5 class="text-white">Asman Bayu Sotejo</h5></td>
                    <td rowspan="3">
                      <h1 class="text-white">4.3</h1>
                    </td>
                  </tr>
                  <tr>
                    <td><h6 class="text-white">AVANZA - B 9900 KIV</h6></td>
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
              </div> -->
            </div>
            </div>
          </div>
        
      </div>
      
<!--       @include('content.history.modal') -->
      @include('layout.contentfooter')
      @include('script.lihatdriver')
</body>

</html>