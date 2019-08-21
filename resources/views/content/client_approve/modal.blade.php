<div class="modal fade" id="notif_approve" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Konfirmasi Approve</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body" align="center">
                <table border="0" align="center" width="100%">
                    <tr>
                        <td align="center"><img src="./assets/content/img/theme/info.png"></td>
                    </tr>
                    <tr><td height="20px"><input type="hidden" id="id"><input type="hidden" id="times" ></td></tr>
                    <tr>
                        <td align="center"><h5 class="text-muted">Anda Yakin Akan Approve Absen ini? </h5></td>
                    </tr>
                    <tr>
                        <td align="center"><h5 class="text-muted"><b>Waktu Yang Akan di Approve </b></h5></td>
                    </tr>
                    <tr>
                        <td align="center" class="waktu"><h1><b></b></h1></td>
                    </tr>
                    <tr>
                        <td align="center"></td>
                    </tr>
                    <tr>
                        <td align="center" class="ganti_button"><button type="button" onclick="ganti()" class="btn btn-sm btn-success">Ganti</button></td>
                    </tr>
                </table>
            </div>
            
            <div class="modal-footer">
                <button type="button" id="yakin_approve" class="btn btn-primary">Yakin</button>
                <button type="button" class="btn btn-danger ml-auto"  data-dismiss="modal">Tidak</button> 
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="notif_reject" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Konfirmasi Reject</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body" align="center">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Masukkan Aktual Waktu nya</label>
                        <input type="time" id="" class="form-control">
                      </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" id="yakin_approve" class="btn btn-primary">Yakin</button>
                <button type="button" class="btn btn-danger ml-auto"  data-dismiss="modal">Tidak</button> 
            </div>
            
        </div>
    </div>
</div>