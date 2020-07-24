@include('layout.contenthead')
  <div class="main-content">   
    <div class="container-fluid pb-4 pt-3 pt-md-8">
      <div class="row">
        <div class="col">
          <button type="button" id="back" class='btn btn-sm btn-success'>Back</button>
          <div class="ct-page-title">
            <h1 class="ct-title" id="content">Approve</h1><span class="badge badge-primary">Tanggal Hari ini : {{ date('d F Y', strtotime($date)) }}</span>
          </div>
          <div style="font-size: 14px;">
            Cari Perjalanan Anda
            <hr>
          </div>
          <br>
          @foreach($getdatas as $getdata)
          <div class='alert alert-default' role='alert'>
            <table width="100%">
              <tr>
                <td>
                  <h5 class='text-white'>Tanggal : {{ date('d F Y', strtotime($getdata->clockin_date)) }}</h5>
                  <h6 class='text-white'>Driver : {{ $getdata->first_name }}</h6>
                </td>
                <td align="right" class="btn_{{ $getdata->id }}">
                  <button type='button' class='btn btn-sm btn-success' onclick='Lihat({{ $getdata->id }})'>Lihat</button>
                </td>
              </tr>
            </table>
            <div id='detail_{{ $getdata->id }}'></div>
          </div>
          @endforeach
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <i class="fa fa-angle-left"></i>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">
                  <i class="fa fa-angle-right"></i>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      
      @include('content.client_approve.modal')
      @include('layout.contentfooter')
      @include('script.client_approve')

</body>

</html>