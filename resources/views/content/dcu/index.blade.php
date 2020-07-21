@include('layout.contenthead')
  <style>
  #customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #customers td, #customers th {
    border: 1px solid #ddd;
    padding-top: 12px;
    padding-bottom: 12px;
    padding-left: 8px;
    padding-right: 8px;
  }

  #customers tr:hover {background-color: #ddd;}

  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #2566AF;
    color: white;
  }
</style>
  <div class="main-content">   
    <div class="container-fluid pb-4 pt-3 pt-md-8">
      <div class="row">
        <div class="col">
          <button type="button" id="back" class='btn btn-sm btn-success btnload'>Back</button>
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
            <input type="search" id="cari" class="form-control" placeholder="Cari DCU" ><br>
            <div class="card shadow">
              <div class="card-body-white">

                  <table id="customers" class="datatables" border="0">
                    <thead>
                      <tr>
                          <th style="display: none;">Tanggal</th>
                          <th align="center">Tanggal</th>
                          <th align="center">Suhu</th>
                          <th align="center">Darah</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                  
                </table>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
      
      @include('content.dcu.modal')
      @include('layout.contentfooter')
      @include('script.dcu')

</body>

</html>