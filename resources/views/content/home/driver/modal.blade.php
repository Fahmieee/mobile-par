<div class="modal fade" id="modal_clockin" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Clock IN</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">UNIT :</label>
                        <input type="text" value="AVANZA | B 8902 HTY" class="form-control" disabled>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="custom-control custom-control-alternative custom-checkbox mb-3">
                          <input class="custom-control-input" id="customCheck6" type="checkbox">
                          <label class="custom-control-label" for="customCheck6">Pakai Mobil GS?</label>
                        </div>
                      </div>
                    </div>
                </div>
                <div id="mobil">
                    <input class="custom-control-input form_clockin" value="0" id="unitgs" type="checkbox">
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Kilometer Unit</label>
                        <input type="text" id="kilometer" class="form-control form_clockin" placeholder="Masukan Kilometer Awal" onkeyup="angka(this);">
                      </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" id="clockin_submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger ml-auto" data-dismiss="modal">Batal</button> 
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="modal_clockout" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Konfirmasi Clockout</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">UNIT :</label>
                        <input type="text" value="AVANZA | B 8902 HTY" class="form-control" disabled>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Kilometer Awal</label>
                        <input type="text" id="km_awal" class="form-control" disabled>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Kilometer Akhir</label>
                        <input type="text" placeholder="Masukan Kilometer Akhir" class="form-control form_clockout" id="km_akhir">
                      </div>
                    </div>
                </div>
                

            </div>
            
            <div class="modal-footer">
                <button type="button" id="clockout_submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-danger ml-auto" data-dismiss="modal">Cancel</button> 
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="notif_notoke" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
            
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Notifikasi</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Perhatian!</h4>
                    <p>Pada Data Pre-Trip Check Anda Terakhir, Mobil Anda tidak Layak untuk melakukan Perjalanan.<b> Segara Hubungi Korlap Anda untuk Informasi lebih lanjut!</b></p>
                </div>
                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-white"  data-dismiss="modal">Ok, Baiklah</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button> 
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="medical_checkup" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Medical Checkup</h3>
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
                <div class="modal-body">
                    <table border="0" align="center" width="100%">
                        <tr>
                            <td align="center"><img src="./assets/content/img/theme/mc.jpg" width="80%"></td>
                        </tr>
                    </table>
                    <br>
                    <table border="0" align="center" width="100%">
                        <tr>
                            <td colspan="2"><h5 class="text-muted">Masukan Suhu Tubuh Anda :</h5></td>
                        </tr>
                        <tr>
                            <td><input type="text" onkeyup="angka(this);" id="suhu" class="form-control medical" style="font-size: 20px"></td>
                            <td><h2 class="text-muted">&deg;C</h2></td>
                        </tr>
                    </table>
                    <br>
                    <table border="0" align="center" width="100%">
                        <tr>
                            <td colspan="4"><h5 class="text-muted">Masukan Tekanan Darah Anda :</h5></td>
                        </tr>
                        <tr>
                            <td><input type="text" id="darah1" onkeyup="angka(this);" class="form-control medical" style="font-size: 20px"></td>
                            <td><h2 class="text-muted"> / </h2></td>
                            <td><input type="text" id="darah2" onkeyup="angka(this);" class="form-control medical" style="font-size: 20px"></td>
                            <td><h2 class="text-muted">mmHg</h2></td>
                        </tr>
                    </table>
                </div>
                
                <div class="modal-footer">
                    <button type="button" id="approve_medical" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger ml-auto"  data-dismiss="modal">Batal</button> 
                </div>
            </div>
            
        </div>
    </div>
</div>