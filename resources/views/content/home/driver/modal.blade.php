@if($getdrivers->driver_type == '1'))
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
                        <label class="form-control-label">Kilometer Unit</label>
                        <input type="text" id="kilometer" class="form-control form_clockin" placeholder="Masukan Kilometer Awal" onkeyup="angka(this);">
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Apakah Anda Sedang Perjalanan Dinas?</label>

                        <table width="100%">
                            <tr>
                                <td width="50%">
                                    <div class="alert2 alert-success" id="perdin_tidak" role="alert">
                                        <h5 class="text-white">Tidak</h5>
                                        <input type="hidden" id="perdin_stat" value="No">
                                    </div>
                                </td>
                                <td></td>
                                <td width="50%">
                                    <div class="alert2 alert-default" id="perdin_ya" role="alert">
                                        <h5 class="text-white">Ya</h5>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        
                      </div>
                    </div>
                </div>
                <div class="row" id="upload" style="display: none;">
                    <div class="col-md-12">
                        <table border="0" align="center" width="100%">
                            <tr>
                                <td colspan="4"><h5>Upload Persetujuan Perjalanan Dinas User</h5></td>
                            </tr>
                            <tr>
                                <td align="center" width="25%">
                                   <!--  <div onclick="$('#uploadpost').click();" class="icon icon-shape bg-white text-white rounded-circle shadow">
                                        <i class="fas fa-camera" style="color: #0166b5"></i>
                                    </div> -->
                                    <div onclick="$('#uploadpost').click();" id="clockinupload" class="alert2 alert-primary" role="alert">
                                        <i class="fas fa-camera"></i>
                                    </div>
                                     <input id="uploadpost" name="file" type="file" style="display:none;"/>
                                </td>
                            </tr>
                        </table>
                      
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
@endif
<div class="modal fade" id="notif_notoke" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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

<div class="modal fade" id="cutiizinsakit" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Cuti Izin atau Sakit</h3>
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
                            <td colspan="2"><h5 class="text-muted">Status Absensi :</h5></td>
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control izin" id="status_id">
                                    <option value="">Pilih Status</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td height="2%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><h5 class="text-muted">Tanggal :</h5></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" value="{{ date('d F Y') }}" class="form-control" disabled>
                                <input type="hidden" value="{{ date('Y-m-d') }}" id="tanggal" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td height="2%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><h5 class="text-muted">Keterangan :</h5></td>
                        </tr>
                        <tr>
                            <td>
                                <textarea class="form-control" rows="6" id="ket" style="font-size: 11px;"></textarea>
                            </td>
                        </tr>
                    </table>
                    
                </div>
                
                <div class="modal-footer">
                    <button type="submit" id="submitabsen" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger ml-auto"  data-dismiss="modal">Batal</button> 
                </div>
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
                    <h2 class="text-white"><b>Lakukan Daily Checkup Terlebih Dahulu!</b></h2><br>
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

<div class="modal fade" id="ganti_mobil" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-blue-par2">
            
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default" style="color: #ffffff;">Pilih Mobil Anda</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body" align="center">
                <table width="100%"> 
                      <tr>
                        <td align="left">
                            <button id="tambah_mobil" class="btn btn-sm btn-secondary"><i class="fa fa-plus"></i>  Tambah Mobil</button>
                        </td>
                    </tr>
                </table>
                <hr>
                @foreach($getunitdrives as $getunitdrive)

                @php
                if($get->unit_id == $getunitdrive->id){
                    $label = 'success';
                }else{
                    $label = 'secondary';
                }

                @endphp
                <div class="alert2 alert-{{ $label }} mobilnya" id="mobil_{{ $getunitdrive->id }}" role="alert" onclick="PilihMobil({{ $getunitdrive->id }});">
                    <table width="100%"> 
                      <tr>
                        <td width="20%" rowspan="3" align="center">
                          <div class="icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow">
                            <i class="fas fa-car" style="color: #ffffff"></i>
                          </div>
                        </td>
                        <td width="4%" rowspan="3"> </td>
                        <td colspan="3"><h5><b>{{ $getunitdrive->no_police }}</b></h5></td>
                      </tr>
                      <tr>
                        <td colspan="3"><h6>{{ $getunitdrive->merk }} {{ $getunitdrive->model }} </h6></td>
                      </tr>
                      <tr>
                        <td><span class="badge badge-pill badge-success" style="font-size: 8.5px;"> <i class="fas fa-clock"></i>  {{ $getunitdrive->years }}</span></td>
                        <td><span class="badge badge-pill badge-primary" style="font-size: 8.5px;"><i class="fas fa-calendar"></i>  {{ $getunitdrive->transmition }}</span></td>
                        <td><span class="badge badge-pill badge-warning" style="font-size: 8.5px;"><i class="fas fa-car"></i> Mobil {{ $getunitdrive->pemilik }}</span></td>
                      </tr> 
                    </table>
                </div>
                @endforeach

                <input type="hidden" id="unit_id" value="{{ $get->unit_id }}">
            </div>
            
            <div class="modal-footer">
                <button type="button" id="memilih" class="btn btn-success">Pilih Mobil</button>
                <button type="button" class="btn btn-danger ml-auto"  data-dismiss="modal">Close</button> 
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="nambah_mobil" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Tambah Mobil</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Jenis Mobil</label>
                        <input type="text" value="Mobil Pribadi User" class="form-control" disabled>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Nomor Polisi (No Plat)</label>
                        <input type="text" id="nopol" class="form-control tambahmobs" placeholder="Contoh : B 0000 BBB">
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Merk Mobil</label>
                        <select class="form-control tambahmobs" id="merk">
                            <option value="">Pilih Merk</option>
                            <option>Honda</option>
                            <option>Toyota</option>
                            <option>Suzuki</option>
                            <option>Daihatsu</option>
                            <option>Mitsubishi</option>
                            <option>Nissan</option>
                            <option>KIA</option>
                            <option>BMW</option>
                            <option>Datsun</option>
                            <option>Isuzu</option>
                            <option>Mazda</option>
                        </select>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Model Mobil</label>
                        <input type="text" id="model" class="form-control tambahmobs" placeholder="Contoh : Kijang Innova">
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Tahun</label>
                        <input type="text" id="tahun" class="form-control" placeholder="Contoh : 2019">
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Transmisi</label>
                        <select class="form-control tambahmobs" id="transmisi">
                            <option value="">Pilih Transmisi</option>
                            <option>AT</option>
                            <option>MT</option>
                        </select>
                      </div>
                    </div>
                </div>

            </div>
            
            <div class="modal-footer">
                <button type="button" id="simpan_mobil" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger ml-auto" data-dismiss="modal">Cancel</button> 
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="clockinpool" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Konfirmasi Clockin</h3>
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
                        <td align="center"><h5 class="text-muted">Anda Yakin akan melakukan Clockin Pada Saat ini?</h5></td>
                    </tr>
                </table>
                

            </div>
            
            <div class="modal-footer">
                <button type="button" id="yakin_clockin" class="btn btn-primary">Yakin</button>
                <button type="button" class="btn btn-danger ml-auto"  data-dismiss="modal">Tidak</button> 
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="clockoutpool" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Konfirmasi Clock Out</h3>
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
                        <td align="center"><h5 class="text-muted">Anda Yakin akan melakukan Clock Out Pada Saat ini?</h5></td>
                    </tr>
                </table>
                

            </div>
            
            <div class="modal-footer">
                <button type="button" id="yakin_clockout" class="btn btn-primary">Yakin</button>
                <button type="button" class="btn btn-danger ml-auto"  data-dismiss="modal">Tidak</button> 
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="pilih_mobil" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Pilih Mobil Anda</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
                <table class="datatables" width="90%">
                    <tr>
                        <th style="display: none;">
                            Nama
                        </th>
                        <th>
                            Nama
                        </th>
                    </tr>
                  <tbody>
                    
                  </tbody>
                </table>
                <hr>
                <input type="hidden" id="unit">
            <div class="modal-footer">
                <button type="button" onclick="Memilih();" class="btn btn-success">Pilih Mobil</button>
                <button type="button" class="btn btn-danger ml-auto"  data-dismiss="modal">Close</button> 
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="yakinpilih" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Konfirmasi Pilih Mobil</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body" align="center">
                <table border="0" align="center" width="100%">
                    <tr>
                        <td align="center"><img src="./assets/content/img/theme/info.png"></td>
                    </tr>
                    <tr>
                        <td align="center"><h5 class="text-muted">Anda Yakin akan Memilih Mobil Ini?</h5></td>
                    </tr>
                </table>
                

            </div>
            
            <div class="modal-footer">
                <button type="button" id="yakin_memilih" class="btn btn-primary">Yakin</button>
                <button type="button" class="btn btn-danger ml-auto"  data-dismiss="modal">Tidak</button> 
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="drivein_modal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">DRIVE IN</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">UNIT :</label>
                        <input type="text" id="unitdrivein" class="form-control" disabled>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Kilometer Unit</label>
                        <input type="text" id="kilometer" class="form-control drivein" placeholder="Masukan Kilometer Awal" onkeyup="angka(this);">
                      </div>
                    </div>
                </div>

               
            </div>
            
            <div class="modal-footer">
                <button type="button" id="drivein_submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger ml-auto" data-dismiss="modal">Batal</button> 
            </div>
            
        </div>
    </div>
</div>
@if($getdriving)
<div class="modal fade" id="driveout_modal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Konfirmasi Driveout</h3>
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
                        <input type="text" value="{{ $getdriving->km_awal }}" id="km_awal" class="form-control" disabled>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Kilometer Akhir</label>
                        <input type="text" placeholder="Masukan Kilometer Akhir" class="form-control driveout" id="km_akhir" onkeyup="angka(this);">
                      </div>
                    </div>
                </div>
                

            </div>
            
            <div class="modal-footer">
                <button type="button" id="driveout_submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-danger ml-auto" data-dismiss="modal">Cancel</button> 
            </div>
            
        </div>
    </div>
</div>
@endif