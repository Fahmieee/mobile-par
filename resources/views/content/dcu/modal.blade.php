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
                <!-- <form method="post" id="upload_form" enctype="multipart/form-data">
                {{ csrf_field() }} -->
                <div class="modal-body">
                    <table border="0" align="center" width="100%">
                        <tr>
                            <td align="center"><img src="./assets/content/img/theme/doctor.svg" width="65%">
                            <input type="hidden" name="created_add" id="created_add" value="{{Auth::user()->id}}">
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
                            <td align="center" width="25%">
                               <!--  <div onclick="$('#uploadpost').click();" class="icon icon-shape bg-white text-white rounded-circle shadow">
                                    <i class="fas fa-camera" style="color: #0166b5"></i>
                                </div> -->
                                <div onclick="$('#uploadpost').click();" id="dcuupload" class="alert2 alert-primary" role="alert">
                                    <i class="fas fa-camera"></i>
                                </div>
                                 <input id="uploadpost" name="file" type="file" style="display:none;"/>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                              <h5 style="padding-bottom: 12px;">Apakah Anda Sudah Cukup Tidur?</h5>
                              <input type="hidden" id="hasil" name="hasil">
                              <input type="hidden" id="suhuhasil" name="suhuhasil">
                              <input type="hidden" id="tekananhasil" name="tekananhasil">
                              <table width="100%">
                                <tr>
                                    <td width="50%">
                                        <div class="alert2 alert-default" id="tidak1" role="alert">
                                            <h5 class="text-white">Tidak</h5>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td width="50%">
                                        <div class="alert2 alert-success" id="ya1" role="alert">
                                            <h5 class="text-white">Ya</h5>
                                        </div>
                                    </td>
                                </tr>
                              </table>
                              <hr>

                              <h5 style="padding-bottom: 12px;">Apakah Anda Tidak Mengkonsumi Minuman?</h5>
                              <table width="100%">
                                <tr>
                                    <td width="50%">
                                        <div class="alert2 alert-default" id="tidak2" role="alert">
                                            <h5 class="text-white">Tidak</h5>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td width="50%">
                                        <div class="alert2 alert-success" id="ya2" role="alert">
                                            <h5 class="text-white">Ya</h5>
                                        </div>
                                    </td>
                                </tr>
                              </table>
                              <hr>

                              <h5 style="padding-bottom: 12px;">Apakah Anda Tidak Mengkonsumi Obat-Obat Terlarang?</h5>
                              <table width="100%">
                                <tr>
                                    <td width="50%">
                                        <div class="alert2 alert-default" id="tidak3" role="alert">
                                            <h5 class="text-white">Tidak</h5>
                                            
                                        </div>
                                    </td>
                                    <td></td>
                                    <td width="50%">
                                        <div class="alert2 alert-success" id="ya3" role="alert">
                                            <h5 class="text-white">Ya</h5>
                                        </div>
                                    </td>
                                </tr>
                              </table>
                              <hr>

                              <h5 style="padding-bottom: 12px;">Apakah Anda Tidak Mengkonsumi Obat yang Menyebabkan Ngantuk?</h5>
                              <table width="100%">
                                <tr>
                                    <td width="50%">
                                        <div class="alert2 alert-default" id="tidak4" role="alert">
                                            <h5 class="text-white">Tidak</h5>
                                            
                                        </div>
                                    </td>
                                    <td></td>
                                    <td width="50%">
                                        <div class="alert2 alert-success" id="ya4" role="alert">
                                            <h5 class="text-white">Ya</h5>
                                        </div>
                                    </td>
                                </tr>
                              </table>
                              <hr>
                        </div>
                    </div>

                    <h6><i>Pilih Ya atau Tidak untuk mengisi, Pernyataan Diatas Menyatakan Kondisi Anda!</i></h6>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" id="medical_submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger ml-auto"  data-dismiss="modal">Batal</button> 
                </div>

                <!-- </form>  -->
            </div>  
        </div>
    </div>
</div>