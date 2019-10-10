<div class="modal fade" id="approveptc" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered" role="document">
        <div class="modal-content bg-blue-par2">
            
            <div class="modal-header">
                <h3 class="modal-title text-white" id="modal-title-default">Konfirmasi Approve</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body" align="center">
                <table border="0" align="center" width="100%">
                    <tr><td height="20px"><input type="hidden" id="id" ></td></tr>
                    <tr>
                        <td align="center"><h5 class="text-muted text-white">Anda Yakin Akan Approve Pre Trip Check ini? </h5></td>
                    </tr>
                </table>
                <hr>
                <div class="alert2 alert-secondary" id="dataptcapprove" role="alert">

                  <table width="100%" border="0"> 
                    <tr>
                      <td width="35%"><h5><b>Pengemudi</b></h5></td>
                      <td width="5%"><h5><b>:</b></h5></td>
                      <td><h5 id="nama"></h5></td>
                    </tr>
                  </table>  
                  <hr>
                  <table width="100%" border="0"> 
                    <tr>
                      <td width="35%"><h5><b>Unit Kerja</b></h5></td>
                      <td width="5%"><h5><b>:</b></h5></td>
                      <td><h5 id="wilayah"></h5></td>
                    </tr>
                  </table>  
                  <hr>
                  <table width="100%" border="0"> 
                    <tr>
                      <td width="35%"><h5><b>Plat Nomor</b></h5></td>
                      <td width="5%"><h5><b>:</b></h5></td>
                      <td><h5 id="plat"></h5></td>
                    </tr>
                  </table>  
                  <hr>
                  <table width="100%" border="0"> 
                    <tr>
                      <td width="35%"><h5><b>Detail PTC</b></h5></td>
                      <td width="5%"><h5><b>:</b></h5></td>
                      <td><h4><b id="detail"></b></h4></td>
                    </tr>
                  </table> 
                  <hr>
                  <table width="100%" border="0"> 
                    <tr>
                      <td width="35%"><h5><b>Bagian PTC</b></h5></td>
                      <td width="5%"><h5><b>:</b></h5></td>
                      <td><h5 id="type"></h5></td>
                    </tr>
                  </table> 
                  <hr>
                  <table width="100%" border="0"> 
                    <tr>
                      <td width="35%"><h5><b>Level</b></h5></td>
                      <td width="5%"><h5><b>:</b></h5></td>
                      <td id="level"></td>
                    </tr>
                  </table> 
                  <hr>
                  <table width="100%" border="0"> 
                    <tr>
                      <td width="35%"><h5><b>Tanggal</b></h5></td>
                      <td width="5%"><h5><b>:</b></h5></td>
                      <td><h5 id="tanggal"></h5></td>
                    </tr>
                  </table> 
                  <hr>
                  <table width="100%" border="0"> 
                    <tr>
                      <td width="35%"><h5><b>Days</b></h5></td>
                      <td width="5%"><h5><b>:</b></h5></td>
                      <td><h5 id="days"></h5></td>
                    </tr>
                  </table> 
                  <input type="hidden" id="id">
                </div>

            </div>
            
            <div class="modal-footer">
                <button type="button" id="approve_now" class="btn btn-success">Approve</button>
                <div id="btnsementara" style="display: block;">
                <button type="button" id="approve_sementara" class="btn btn-warning">Approve Sementara</button>
                </div>

            </div>
            
        </div>
    </div>
</div>
