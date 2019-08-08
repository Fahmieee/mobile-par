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
                        <input type="text" id="kilometer" class="form-control form_clockin" placeholder="Masukan Kilometer Awal">
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