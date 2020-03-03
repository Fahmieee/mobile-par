@include('layout.contenthead')

  <style type="text/css">
    
    tr.border_bottom td {
      border-bottom:1pt solid #e9ecef;
    }

    td.border_left {
      border-left:1pt solid #e9ecef;
    }
  </style>
  <div class="main-content">   
    <div class="container-fluid pb-4 pt-3 pt-md-8">
      <div class="row">
        <div class="col">
          <button type="button" id="back" class='btn btn-sm btn-success'>Back</button>
            <div class="ct-page-title">
              <h1 class="ct-title" id="content">Riwayat Perjalanan</h1><span class="badge badge-primary">{{ $date }}</span>
            </div>
            
            <input type="search" id="cari" class="form-control" placeholder="Cari Perjalanan" >
            <br>
            <table class="table align-items-center datatables" border="0">
              <thead class="thead-light">
                <tr>
                    <th scope="col" style="display: none;">
                        Date
                    </th>
                    <th scope="col">
                        History
                    </th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>

            <!-- <div class="muncul_data">
              
            </div> -->
          </div>
        
      </div>
      
<!--       @include('content.history.modal') -->
      @include('layout.contentfooter')
      @include('script.history')

</body>

</html>