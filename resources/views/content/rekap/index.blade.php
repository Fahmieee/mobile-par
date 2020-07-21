@include('layout.contenthead')
  <style>

  #customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #customers tr:nth-child(even){background-color: #f2f2f2;}

  #customers th {
    padding-top: 8px;
    padding-bottom: 8px;
    text-align: left;
    background-color: #2566AF;
    color: white;
  }
</style>
@php

function Hari($tanggal){

    $hari = date('D', $tanggal);

    switch($hari){
        case 'Sun':
            $hari_ini = "Minggu";
        break;

        case 'Mon':
            $hari_ini = "Senin";
        break;

        case 'Tue':
            $hari_ini = "Selasa";
        break;

        case 'Wed':
            $hari_ini = "Rabu";
        break;

        case 'Thu':
            $hari_ini = "Kamis";
        break;

        case 'Fri':
            $hari_ini = "Jumat";
        break;

        case 'Sat':
            $hari_ini = "Sabtu";
        break;

        default:
            $hari_ini = "Tidak di ketahui";
        break;
    }

    return $hari_ini;
}

@endphp
  <div class="main-content">   
    <div class="container-fluid pb-4 pt-3 pt-md-8">
      <div class="row">
        <div class="col">
          <a href="/home"><button type="button" class='btn btn-sm btn-success btnload'>Back</button></a>
            <div class="ct-page-title">
              <h1 class="ct-title" id="content">Rekap Absensi</h1>
            </div>
            <hr>
            <br>
            <table width="100%">
              <tr>
                <td>
                    <select class="form-control" id="bulan">
                      <option value="01" {{ $bulans == '01' ? 'selected' : '' }}>Januari</option>
                      <option value="02" {{ $bulans == '02' ? 'selected' : '' }}>Februari</option>
                      <option value="03" {{ $bulans == '03' ? 'selected' : '' }}>Maret</option>
                      <option value="04" {{ $bulans == '04' ? 'selected' : '' }}>April</option>
                      <option value="05" {{ $bulans == '05' ? 'selected' : '' }}>Mei</option>
                      <option value="06" {{ $bulans == '06' ? 'selected' : '' }}>Juni</option>
                      <option value="07" {{ $bulans == '07' ? 'selected' : '' }}>Juli</option>
                      <option value="08" {{ $bulans == '08' ? 'selected' : '' }}>Agustus</option>
                      <option value="09" {{ $bulans == '09' ? 'selected' : '' }}>September</option>
                      <option value="10" {{ $bulans == '10' ? 'selected' : '' }}>Oktober</option>
                      <option value="11" {{ $bulans == '11' ? 'selected' : '' }}>November</option>
                      <option value="12" {{ $bulans == '12' ? 'selected' : '' }}>Desember</option>
                  </select>
                </td>
                <td></td>
                <td>
                  <select class="form-control" id="tahun">
                      <option value="2019" {{ $tahun == '2019' ? 'selected' : '' }}>2019</option>
                      <option value="2020" {{ $tahun == '2020' ? 'selected' : '' }}>2020</option>
                      <option value="2021" {{ $tahun == '2021' ? 'selected' : '' }}>2021</option>
                      <option value="2022" {{ $tahun == '2022' ? 'selected' : '' }}>2022</option>
                      <option value="2023" {{ $tahun == '2023' ? 'selected' : '' }}>2023</option>
                  </select>
                </td>
                <td></td>
                <td id="tombol">
                  <button class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                </td>
              </tr>
            </table>
            <br>
            <div class="card shadow">
              <div class="card-body-white">

                  <table id="customers" class="datatables" border="0">
                    <thead>
                      <tr>
                          <th>Date</th>
                          <th>Hari</th>
                          <th>Jamker</th>
                          <th>Masuk</th>
                          <th>Pulang</th>
                      </tr>
                    </thead>
                    <tbody>

                      @php
                      $Date1 = $awal; 
                      $Date2 = $akhir; 
                        
                      $Variable1 = strtotime($Date1); 
                      $Variable2 = strtotime($Date2); 

                      $hariini = date('Y-m-d');

                      $banyak = ''; 
                      $all = ''; 
                      $serangs = '';
                      $cilegons = '';
                        
                      for ($currentDate = $Variable1; $currentDate <= $Variable2;  
                                                      $currentDate += (86400)){


                      $jamkerja = DB::table('jam_kerja')
                      ->first();

                      $tangalini = date('Y-m-d', $currentDate);

                      $absensi = DB::table('attendances')
                      ->join('attendance_statuses', 'attendances.status_id', '=', 'attendance_statuses.id')
                      ->where([
                          ['driver_id', '=', $userid],
                          ['date_in', '=', date('Y-m-d', $currentDate)],
                      ])
                      ->first();

                      @endphp
                      <tr>
                        <td style="font-size: 11px">{{ date('d M', $currentDate)  }}</td>
                        <td style="font-size: 11px">{{ Hari($currentDate) }}</td>

                        @if(date('Y-m-d', $currentDate) > $hariini)

                          @if(Hari($currentDate) == 'Sabtu' || Hari($currentDate) == 'Minggu')
                            <td style="font-size: 11px;color: white" colspan="3" bgcolor="#d9534f">LIBUR</td>
                          @else
                             <td style="font-size: 11px">{{ substr($jamkerja->jam_masuk,0,5) }} - {{ substr($jamkerja->jam_keluar,0,5) }}</td>
                             <td></td>
                             <td></td>
                          @endif

                        @else

                          @if(!$absensi)

                            @if(Hari($currentDate) == 'Sabtu' || Hari($currentDate) == 'Minggu')
                              <td style="font-size: 11px;color: white" colspan="3" bgcolor="#d9534f">LIBUR</td>
                            @else
                              <td style="font-size: 11px;color: white" colspan="3" bgcolor="#323232">TIDAK MASUK</td>
                            @endif

                          @else

                            @if($absensi->status_id != '1')
                              <td style="font-size: 11px;color: white" colspan="3" bgcolor="#5cb85c">{{ strtoupper($absensi->name) }}</td>
                            @else
                              <td style="font-size: 11px">{{ substr($jamkerja->jam_masuk,0,5) }} - {{ substr($jamkerja->jam_keluar,0,5) }}</td>
                              <td style="font-size: 11px;">{{ substr($absensi->time_in,0,5) }}</td>
                              <td style="font-size: 11px;">{{ substr($absensi->time_out,0,5) }}</td>
                            @endif
                            
                          @endif
                        @endif
                      </tr>
                      @php
                      }
                      @endphp
                    </tbody>
                  </table>
                </table>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  @include('layout.contentfooter')
<script type="text/javascript">
  
  $('#bulan').on('change', function () {

      var bulan = $(this).val();
      var tahun = $('#tahun').val();

      $('#tombol').html('<a href="/driver/rekap/detail?bulan='+bulan+'&tahun='+tahun+'"><button class="btn btn-primary"><i class="fa fa-search"></i> Cari</button></a>');
  });

  $('#tahun').on('change', function () {

      var tahun = $(this).val();
      var bulan = $('#bulan').val();

      $('#tombol').html('<a href="/driver/rekap/detail?bulan='+bulan+'&tahun='+tahun+'"><button class="btn btn-primary"><i class="fa fa-search"></i> Cari</button></a>');
  });

</script>

</body>

</html>