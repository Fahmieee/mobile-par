<div class="modal fade" id="edit_kilometer" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">  
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Edit Kilometer ()</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td>KM Awal :</td>
                        </tr>
                        <tr>
                            <td><input type="text" id="awal" onkeyup="angka(this);" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>KM Akhir :</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="akhir" onkeyup="angka(this);" class="form-control">
                                <input type="hidden" id="ids" class="form-control">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="Update()">Update</button> 
                <button type="button" class="btn btn-danger ml-auto" data-dismiss="modal">Close</button> 
            </div>
            
        </div>
    </div>
</div>