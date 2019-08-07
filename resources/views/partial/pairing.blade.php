<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
        	
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Pilih Pengemudi</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
            	
                <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Unit Area</label>
                        <div class="alert alert-success" role="alert">
                            <span class="alert-inner--text"> <h6 class="text-uppercase text-muted-white ls-1 mb-1">MOR 1</h6></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Pilih Pengemudi</label>
                        <div style="display: none;" id="pengemudi">
                            <div class="alert alert-default" role="alert" id="pengemudi-1">
                                <span class="alert-inner--text"> <h6 class="text-uppercase text-muted-white ls-1 mb-1">AHMAD BAIHAQI - B 7689 OLK</h6></span>
                            </div>

                            <div class="alert alert-default" role="alert" id="pengemudi-2">
                                <span class="alert-inner--text"> <h6 class="text-uppercase text-muted-white ls-1 mb-1">AZZAM MAHBUB - B 1123 OLK</h6></span>
                            </div>

                            <div class="alert alert-default" role="alert" id="pengemudi-3">
                                <span class="alert-inner--text"> <h6 class="text-uppercase text-muted-white ls-1 mb-1">MUHAMMAD HAIKAL HASAN - B 4521 OLK</h6></span>
                            </div>

                            <div class="alert alert-default" role="alert" id="pengemudi-4">
                                <span class="alert-inner--text"> <h6 class="text-uppercase text-muted-white ls-1 mb-1">IDRIS KHOIRANSYAH - B 1412 OLK</h6></span>
                            </div>
                        </div>
                        <div id="loader" style="display: none;" align="center">
                            <img src="assets/login/images/balls.gif" width="100px" align="center">
                        </div>
                      </div>
                    </div>
                </div>   
            </div>
            
            <div class="modal-footer">
                <button type="button" id="pair" class="btn btn-primary">Pair</button>
                <button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Close</button> 
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="modal-driver-pairing" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Proses Pairing</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                
                <div class="alert alert-primary" role="alert" id="pengemudi-1">

                    <table border="0">
                        <tr>
                            <td colspan="3">
                                <span class="alert-inner--text"> <h4 class="text-uppercase text-muted-white ls-1 mb-1">Muhammad Khoirudin</h4></span>
                            </td>
                        </tr>
                        <tr><td height="10px"></td></tr>
                        <tr>
                            <td width="60px">
                                <span class="alert-inner--text"> <h6 class="text-uppercase text-muted-white ls-1 mb-1">Jabatan</h6></span>
                            </td>
                            <td width="20px">
                                <span class="alert-inner--text"> <h6 class="text-uppercase text-muted-white ls-1 mb-1">:</h5></span>
                            </td>
                            <td>
                                <span class="alert-inner--text"> <h6 class="text-uppercase text-muted-white ls-1 mb-1">Manager Keuangan</h6></span>
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <span class="alert-inner--text"> <h6 class="text-uppercase text-muted-white ls-1 mb-1">Perusahaan</h6></span>
                            </td>
                            <td width="20px">
                                <span class="alert-inner--text"> <h6 class="text-uppercase text-muted-white ls-1 mb-1">:</h5></span>
                            </td>
                            <td>
                                <span class="alert-inner--text"> <h6 class="text-uppercase text-muted-white ls-1 mb-1">Nusantara Digital</h6></span>
                            </td>
                        </tr>

                    </table>
                </div>

            </div>
            
            <div class="modal-footer">
                <button type="button" id="pairing-driver" class="btn btn-primary">Pair</button>
                <button type="button" id="tolak-pairing" class="btn btn-danger ml-auto">Tolak</button> 
            </div>
            
        </div>
    </div>
</div>


<div class="modal fade" id="modal-confirm-checkin" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Konfirmasi Clock In</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body" align="center">
                <table border="0" align="center" width="100%">
                    <tr>
                        <td align="center"><img src="./assets/content/img/theme/info.png"></td>
                    </tr>
                    <tr><td height="20px"></td></tr>
                    <tr>
                        <td align="center"><h5 class="text-uppercase text-muted ls-1 mb-1">Anda Yakin Akan Melakukan Clock In Saat Ini ?</h5></td>
                    </tr>
                </table>
                

            </div>
            
            <div class="modal-footer">
                <button type="button" id="pairing-driver" class="btn btn-primary">Yakin</button>
                <button type="button" id="tolak-pairing" class="btn btn-danger ml-auto">Tidak</button> 
            </div>
            
        </div>
    </div>
</div>