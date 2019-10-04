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
                        <input type="text" value="{{ $getunits->no_police }}" class="form-control" disabled>
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
                        <input type="text" value="{{ $getunits->no_police }}" class="form-control" disabled>
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
                        <input type="text" placeholder="Masukan Kilometer Akhir" class="form-control form_clockout" id="km_akhir" onkeyup="angka(this);">
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
                            <td colspan="2"><h5 class="text-muted">Masukan Suhu Tubuh Anda :</h5></td>
                        </tr>
                        <tr>
                            <td><input type="text" onkeyup="angka(this);" id="suhu" name="suhu" class="form-control medical" style="font-size: 20px"></td>
                            <td><h2 class="text-muted">&deg;C</h2></td>
                        </tr>
                    </table>
                    <br>
                    <table border="0" align="center" width="100%">
                        <tr>
                            <td colspan="4"><h5 class="text-muted">Masukan Tekanan Darah Anda :</h5></td>
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
                            <td colspan="4"><h5 class="text-muted">Masukan Foto DCU :</h5></td>
                        </tr>
                        <tr>
                            <td><input type="file" id="file1" name="file1" class="form-control medical"></td>
                        </tr>
                    </table>
                    
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

<div class="modal fade" id="notif_medical" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
            
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title-notification">Notifikasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i><br><br>
                    <h2 class="text-white"><b>Lakukan Daily Checkup Terlebih Dahulu!</b></h2>
                    <h5 class="text-white">Jika Tidak Melakukan nya Bisa Mengakibatkan Pemotongan Gaji Anda!, Boleh dilakukan setalah clockin jika darurat, namun tetap hari ini HARUS melakukan Daily Check Up!</h5>
                </div>
                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-white" id="ok_clockin">Ok, Baiklah</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button> 
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="terima_pair" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Konfirmasi Pairing</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body" align="center">
                <table border="0" align="center" width="100%">
                    <tr>
                        <td align="center"><img src="./assets/content/img/theme/info.png"></td>
                    </tr>
                    <tr><td><input type="hidden" id="id"></td></tr>
                    <tr>
                        <td align="center"><h5 class="text-muted">Anda Yakin Akan Menerima Pairing Ini?</h5></td>
                    </tr>
                </table>
                

            </div>
            
            <div class="modal-footer">
                <button type="button" id="yakin_terima" class="btn btn-primary">Yakin</button>
                <button type="button" class="btn btn-danger ml-auto"  data-dismiss="modal">Tidak</button> 
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="tolak_pair" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Konfirmasi Pairing</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body" align="center">
                <table border="0" align="center" width="100%">
                    <tr>
                        <td align="center"><img src="./assets/content/img/theme/info.png"></td>
                    </tr>
                    <tr><td><input type="hidden" id="id"></td></tr>
                    <tr>
                        <td align="center"><h5 class="text-muted">Anda Yakin Akan Menolak Pairing Ini?</h5></td>
                    </tr>
                </table>
                

            </div>
            
            <div class="modal-footer">
                <button type="button" id="yakin_tolak" class="btn btn-primary">Yakin</button>
                <button type="button" class="btn btn-danger ml-auto"  data-dismiss="modal">Tidak</button> 
            </div>
            
        </div>
    </div>
</div>