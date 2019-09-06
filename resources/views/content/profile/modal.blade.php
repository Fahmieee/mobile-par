<div class="modal fade" id="confirm-profile" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Konfirmasi Perubahan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body" align="center">
                <table border="0" align="center" width="100%">
                    <tr>
                        <td align="center"><img src="./assets/content/img/theme/info.png"></td>
                    </tr>
                    <tr><td height="20px"><input type="hidden" id="id" ></td></tr>
                    <tr>
                        <td align="center"><h5 class="text-muted">Anda Yakin Akan Melakukan Perubahan Profile?</h5></td>
                    </tr>
                </table>
                

            </div>
            
            <div class="modal-footer">
                <button type="button" id="yakin_edit" class="btn btn-primary">Yakin</button>
                <button type="button" class="btn btn-danger ml-auto"  data-dismiss="modal">Tidak</button> 
            </div>
            
        </div>
    </div>
</div>


<div class="modal fade" id="ganti-photo" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <form method="post" id="upload_form" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="modal-header">
                    <h3 class="modal-title" id="modal-title-default">Upload Foto Anda</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <div class="modal-body" align="center">
                    <input type="file" id="file1" name="file1" class="form-control photo">
                    <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{Auth::guard('user')->user()->id}}">
                </div>
                
                <div class="modal-footer">
                    <button type="submit" id="yakin_ganti" class="btn btn-primary">Ganti</button>
                    <button type="button" class="btn btn-danger ml-auto"  data-dismiss="modal">Tutup</button> 
                </div>

            </form>  
        </div>
    </div>
</div>