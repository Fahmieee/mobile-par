@include('layout.contenthead')
  <div class="main-content">   
    <div class="container-fluid pb-4 pt-5 pt-md-8">
      <div class="row">
        <div class="col">
          <button type="button" id="back" class='btn btn-sm btn-success'>Back</button>
            <div class="ct-page-title">
              <h1 class="ct-title" id="content">Daily Checkup</h1>
            </div>
            <button type="button" id="dcu" class='btn btn-sm btn-primary'><i class="fa fa-plus"></i> DCU Baru</button>
            <hr>
            <table width="100%">
              <tr><h5 class="ct-title" id="content">Keterangan :</h5></td>
              </tr>
              <tr>
                <td width="15%"><button type="button" class='btn btn-success'></button></td>
                <td><h6 class="text-muted-black"> : Sehat/Normal</h6></td>
                <td width="5%"></td>
                <td width="15%"><button type="button" class='btn btn-yellow'></button></td>
                <td><h6 class="text-muted-black"> : Sedang</h6></td>
              </tr>
              <tr>
                <td colspan="2" height="10px"></td>
              </tr>
              <tr>
                <td width="15%"><button type="button" class='btn btn-warning'></button></td>
                <td><h6 class="text-muted-black"> : Waspada</h6></td>
                <td width="5%"></td>
                <td width="15%"><button type="button" class='btn btn-danger'></button></td>
                <td><h6 class="text-muted-black"> : Sakit</h6></td>
              </tr>
            </table>
            <br>
            <div class="card shadow">
              <div class="card-body-white">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Suhu</th>
                      <th scope="col">Tekanan Darah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">16-09-2019</th>
                      <th scope="row"><button type="button" class='btn btn-sm btn-success'>20 C</button></th>
                      <th scope="row"><button type="button" class='btn btn-sm btn-warning'>90 /120 mmHg</button></th>
                    </tr>
                    <tr>
                      <th scope="row">13-09-2019</th>
                      <th scope="row"><button type="button" class='btn btn-sm btn-yellow'>29 C</button></th>
                      <th scope="row"><button type="button" class='btn btn-sm btn-success'>90 /80 mmHg</button></th>
                    </tr>
                    <tr>
                      <th scope="row">12-09-2019</th>
                      <th scope="row"><button type="button" class='btn btn-sm btn-success'>25 C</button></th>
                      <th scope="row"><button type="button" class='btn btn-sm btn-danger'>80 /150 mmHg</button></th>
                    </tr>
                    <tr>
                      <th scope="row">11-09-2019</th>
                      <th scope="row"><button type="button" class='btn btn-sm btn-success'>21 C</button></th>
                      <th scope="row"><button type="button" class='btn btn-sm btn-yellow'>80 /100 mmHg</button></th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
      
      @include('content.home.driver.modal')
      @include('layout.contentfooter')
      @include('script.driver')

</body>

</html>