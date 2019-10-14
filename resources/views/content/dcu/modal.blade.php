<div class="modal fade" id="medical_checkup" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Daily Checkup</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div id="loader" style="display: none;" align="center">
                <br><br><br><br>
                <img src="assets/login/images/balls.gif" width="100px" align="center">
                <br><br><br><br>
            </div>

            <div class="modal-form">
                <form method="post" id="upload_form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <table border="0" align="center" width="100%">
                        <tr>
                            <td align="center"><img src="./assets/content/img/theme/mc.jpg" width="80%">
                            <input type="hidden" name="created_add" id="created_add" value="{{Auth::guard('user')->user()->id}}">
                            </td>
                        </tr>
                    </table>
                    <br>
                    <div class="notif_suhu"></div>
                    <div class="notif_darah"></div>
                    <table border="0" align="center" width="100%">
                        <tr>
                            <td colspan="2"><h5>Masukan Suhu Tubuh Anda :</h5></td>
                        </tr>
                        <tr>
                            <td><input type="text" onkeyup="angka(this);" id="suhu" name="suhu" class="form-control medical" style="font-size: 20px"></td>
                            <td><h2 class="text-muted">&deg;C</h2></td>
                        </tr>
                    </table>
                    <br>
                    <table border="0" align="center" width="100%">
                        <tr>
                            <td colspan="4"><h5>Masukan Tekanan Darah Anda :</h5></td>
                        </tr>
                        <tr>
                            <td><input type="text" id="darah1" name="darah1" onkeyup="angka(this);" class="form-control medical" style="font-size: 20px"></td>
                            <td><h2 class="text-muted"> / </h2></td>
                            <td><input type="text" id="darah2" name="darah2" onkeyup="angka(this);" class="form-control medical" style="font-size: 20px"></td>
                            <td><h2 class="text-muted">mmHg</h2></td>
                        </tr>
                    </table>
                    <br>
                    <table border="0" align="center" width="100%">
                        <tr>
                            <td colspan="4"><h5>Masukan Foto DCU :</h5></td>
                        </tr>
                        <tr>
                            <td><input type="file" id="file1" name="file1" class="form-control medical"></td>
                        </tr>
                    </table>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="custom-control custom-control-alternative custom-checkbox mb-3">
                              <input class="custom-control-input" id="customCheck9" type="checkbox">
                              <label class="custom-control-label" for="customCheck9"><h5>Apakah Anda Sudah Cukup Tidur?</h5></label>
                              <input type="hidden" id="hasil" name="hasil">
                              <input type="hidden" id="suhuhasil">
                              <input type="hidden" id="tekananhasil">
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="custom-control custom-control-alternative custom-checkbox mb-3">
                              <input class="custom-control-input" id="customCheck11" type="checkbox">
                              <label class="custom-control-label" for="customCheck11"><h5>Apakah Anda Tidak Mengkonsumi Minuman Beralkohol?</h5></label>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="custom-control custom-control-alternative custom-checkbox mb-3">
                              <input class="custom-control-input" id="customCheck7" type="checkbox">
                              <label class="custom-control-label" for="customCheck7"><h5>Apakah Anda Tidak Mengkonsumi Obat-Obat Terlarang?</h5></label>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="custom-control custom-control-alternative custom-checkbox mb-3">
                              <input class="custom-control-input" id="customCheck8" type="checkbox">
                              <label class="custom-control-label" for="customCheck8"><h5>Apakah Anda Tidak Mengkonsumi Obat yang Menyebabkan Ngantuk?</h5></label>
                            </div>
                          </div>
                        </div>
                    </div>

                    <h6><i>Ceklis Jika Pernyataan Diatas Menyatakan Kondisi Anda!</i></h6>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" id="medical_submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger ml-auto"  data-dismiss="modal">Batal</button> 
                </div>

                </form> 
            </div>  
        </div>
    </div>
</div>