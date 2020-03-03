<script type="text/javascript">

    var table = "";
    $(function() {
        table = $('.datatables').DataTable({
            dom: 't',
            pageLength: 30,
            processing: true,
            serverSide: true,
            columnDefs: [
                {
                    "targets": [ 0 ],
                    "visible": false
                }
            ],
            order: [[ 0, 'desc' ]],
            ajax:{
                 url: "{{ route('getdcu') }}",
                 dataType: "json",
                 type: "GET",
            },
            columns: [
                { data: 'date', name: 'date' },
                { data: 'dates', name: 'dates' },
                { 
                    render: function ( data, type, row ) {

                        if(row.suhu > 36){

                            var btn = "btn-danger";

                        } else {

                            var btn = "btn-success";

                        }

                        return "<button type='button' class='btn btn-sm "+btn+"'>"+row.suhu+" C</button";
                    }
                },
                { 
                    render: function ( data, type, row ) {

                        var res = row.darah.split("/");

                        var depandarah = res[0];
                        var belakangdarah = res[1];
                        var btndarah = "";

                      if (depandarah < 120 && belakangdarah < 80){

                          btndarah = "btn-success";

                      } else if (depandarah >= 120 && depandarah < 140 || belakangdarah >= 80 && belakangdarah < 90){

                          btndarah = "btn-yellow";

                      } else if (depandarah >= 140 && depandarah < 160 || belakangdarah >= 90 && belakangdarah < 100){

                          btndarah = "btn-warning";

                      } else if (depandarah >= 160 || belakangdarah >= 100){

                          btndarah = "btn-danger";
                      }

                        return "<button type='button' class='btn btn-sm "+btndarah+"'>"+row.darah+" mmHg</button";
                    }
                },
            ]
        });

        $('#cari').keyup(function(){
            table.search($(this).val()).draw() ;
        });
    });

	$('#dcu').on('click', function () {

        $.ajax({
            type: 'POST',
            url: "{{ route('MedicalValidasi') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
            },

            success: function (data) {

                if (data.length >= 1){
                    swal({
                        text: "Anda Sudah Melakukan Medical Checkup!",
                        icon: "error",
                        buttons: false,
                        timer: 2000,
                    });

                } else {

                    $('#medical_checkup').modal('show');

                }

            }
        });

    });

    // $('#upload_form').on('submit', function(event){
    $('#medical_submit').on('click', function(event){

        // event.preventDefault();
        $('.modal-form').attr("style", "display: none;");
        $('#loader').attr("style", "display: block;");

        var empty = false;
        $('.medical').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        if (empty) {

            swal({
                title: "Tidak Tersimpan!",
                text: "Isian harus terisi semua!",
                icon: "error",
                buttons: false,
                timer: 2000,
            });

            $('.modal-form').attr("style", "display: block;");
            $('#loader').attr("style", "display: none;");

        } else {

            // $.ajax({
            //     url: "{{ route('MedicalStore') }}",
            //     method:"POST",
            //     data:new FormData(this),
            //     dataType:'JSON',
            //     contentType: false,
            //     cache: false,
            //     processData: false,

            //     success:function(data) {

            $.ajax({
                type: 'POST',
                url: "{{ route('MedicalStore') }}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'user_id': $('#created_by').val(),
                    'suhu': $('#suhu').val(),
                    'darah1': $('#darah1').val(),
                    'darah2': $('#darah2').val(),
                    'hasil': $('#hasil').val(),
                    'suhuhasil': $('#suhuhasil').val(),
                    'tekananhasil': $('#tekananhasil').val(),
                },

                success: function (data) {


                    if(data.message == "success"){

                        
                        if(data.hasil == "3"){

                            $.ajax({        
                                type : 'POST',
                                url : "https://fcm.googleapis.com/fcm/send",
                                headers : {
                                    Authorization : 'key=' + 'AIzaSyBBlLqWxqmpbgg-8ZjhMiYMOgzUrJDgQRM'
                                },
                                contentType : 'application/json',
                                dataType: 'json',
                                data: JSON.stringify({
                                    "to": data.fcm, 
                                    "notification": {
                                        "title":"Hasil DCU "+data.name,
                                        "body":"Kondisi Driver Anda Sakit Hasil dari DCU Hari ini!, Driver tidak Layak untuk Mengendarai Hari ini!",
                                        "icon": "./assets/icons/96x96.png",
                                    }
                                }),
                                success : function(response) {
                                    console.log(response);
                                },
                                error : function(xhr, status, error) {
                                    console.log(xhr.error);                   
                                }
                            });

                        } else if (data.hasil == "2"){

                            $.ajax({        
                                type : 'POST',
                                url : "https://fcm.googleapis.com/fcm/send",
                                headers : {
                                    Authorization : 'key=' + 'AIzaSyBBlLqWxqmpbgg-8ZjhMiYMOgzUrJDgQRM'
                                },
                                contentType : 'application/json',
                                dataType: 'json',
                                data: JSON.stringify({
                                    "to": data.fcm, 
                                    "notification": {
                                        "title":"Hasil DCU "+data.name,
                                        "body":"Kondisi Driver Anda Hati-hati Hasil dari DCU Hari ini!, Awasi Driver Tersebut dalam Berkendara!",
                                        "icon": "./assets/icons/96x96.png",
                                    }
                                }),
                                success : function(response) {
                                    console.log(response);
                                },
                                error : function(xhr, status, error) {
                                    console.log(xhr.error);                   
                                }
                            });

                        } 

                    navigator.geolocation.getCurrentPosition(function (position) {

                        $.ajax({
                            type: 'POST',
                            url: "{{ route('KoordinatMedical') }}",
                            data: {
                                '_token': $('input[name=_token]').val(),
                                'dcu_id': data.dcu_id,
                                'type': 'dcu',
                                'long': position.coords.latitude,
                                'lat': position.coords.longitude
                                },
                            success: function(data) {

                                swal({
                                    title: "Berhasil",
                                    text: "Medical Check Up Anda Berhasil!",
                                    icon: "success",
                                    buttons: false,
                                    timer: 2000,
                                });

                                setTimeout(function(){ window.location.href = 'home'; }, 1500);

                            }

                        });

                    });


                    } else {


                        if (data.message == "The file1 must be an image.,The file1 must be a file of type: jpeg, png, jpg, gif."){

                            swal({
                                title: "File Ekstensi Salah!",
                                text: "Pastikan Foto yang Anda Upload Benar!",
                                icon: "error",
                                buttons: false,
                                timer: 2000,
                            });

                        } else {

                            swal({
                                title: "Ukuran Foto Besar!",
                                text: "Ukuran Foto jangan terlalu besar!",
                                icon: "error",
                                buttons: false,
                                timer: 2000,
                            });
                            
                        }
                        
                        $('.modal-form').attr("style", "display: block;");
                        $('#loader').attr("style", "display: none;");
                    }

                    // swal({
                    //     text: "Medical Check Up Anda Berhasil!",
                    //     icon: "success",
                    //     buttons: false,
                    //     timer: 2000,
                    // });

                    // setTimeout(function(){ window.location.href = 'driver'; }, 1500);

                }

            });

        }

    });


    $('#suhu').on('keyup', function () {

        var value = $(this).val();
        var hasilsuhu = $('#suhuhasil').val();
        var hasiltekanan = $('#tekananhasil').val();

        if (value == ''){
         
            $('.notif_suhu').html('');

        } else if (value > 36){

            $('.notif_suhu').html('<div class="alert alert-danger" role="alert"><strong>Hati-hati!</strong> Suhu Anda Demam!</div>');

            $('#suhuhasil').val(3);

        } else if (value <= 36){

            $('.notif_suhu').html('<div class="alert alert-success" role="alert"><strong>Sehat!</strong> Suhu Anda Normal!</div>');
            $('#suhuhasil').val(1);

        } 


    });

    $('#darah1').on('keyup', function () {

        var dar1 = $(this).val();
        var dar2 = $('#darah2').val();
        var hasilsuhu = $('#suhuhasil').val();
        var hasiltekanan = $('#tekananhasil').val();

        if (dar2 == ''){

            $('.notif_darah').html('');

        } else if (dar1 < 120 && dar2 < 80){

            $('.notif_darah').html('<div class="alert alert-success" role="alert"><strong>Sehat!</strong> Tekanan Darah Normal!</div>');
            $('#tekananhasil').val(1);
        } else if (dar1 >= 120 && dar1 < 140 || dar2 >= 80 && dar2 < 90){
            $('.notif_darah').html('<div class="alert alert-yellow" role="alert"><strong>Hati-Hati!</strong> Prehypertension!</div>');
            $('#tekananhasil').val(2);
        } else if (dar1 >= 140 && dar1 < 160 || dar2 >= 90 && dar2 < 100){
            $('.notif_darah').html('<div class="alert alert-warning" role="alert"><strong>Hati-hati!</strong> High Blood Presure!</div>');
            $('#tekananhasil').val(3);
        } else if (dar1 >= 160 || dar2 >= 100){
            $('.notif_darah').html('<div class="alert alert-danger" role="alert"><strong>Berbahaya!</strong> Hypertensive Crisis!</div>');
            $('#tekananhasil').val(4);
        }


    });

    $('#darah2').on('keyup', function () {

        var dar2 = $(this).val();
        var dar1 = $('#darah1').val();
        var hasilsuhu = $('#suhuhasil').val();
        var hasiltekanan = $('#tekananhasil').val();


        if (dar1 == ''){

            $('.notif_darah').html('');

        } else if (dar1 < 120 && dar2 < 80){

            $('.notif_darah').html('<div class="alert alert-success" role="alert"><strong>Sehat!</strong> Tekanan Darah Normal!</div>');
            $('#tekananhasil').val(1);
        } else if (dar1 >= 120 && dar1 < 140 || dar2 >= 80 && dar2 < 90){
            $('.notif_darah').html('<div class="alert alert-yellow" role="alert"><strong>Hati-Hati!</strong> Prehypertension!</div>');
            $('#tekananhasil').val(2);
        } else if (dar1 >= 140 && dar1 < 160 || dar2 >= 90 && dar2 < 100){
            $('.notif_darah').html('<div class="alert alert-warning" role="alert"><strong>Hati-hati!</strong> High Blood Presure!</div>');
            $('#tekananhasil').val(3);
        } else if (dar1 >= 160 || dar2 >= 100){
            $('.notif_darah').html('<div class="alert alert-danger" role="alert"><strong>Berbahaya!</strong> Hypertensive Crisis!</div>');
            $('#tekananhasil').val(4);
        }

    });

    $('#back').on('click', function () {

        setTimeout(function(){ window.location.href = 'home'; }, 10);

    });

    $('#tidak1').on('click', function () {
        $('#tidak1').attr("class","alert2 alert-danger");
        $('#ya1').attr("class","alert2 alert-default");
    });

    $('#ya1').on('click', function () {
        $('#tidak1').attr("class","alert2 alert-default");
        $('#ya1').attr("class","alert2 alert-success");
    });

    $('#tidak2').on('click', function () {
        $('#tidak2').attr("class","alert2 alert-danger");
        $('#ya2').attr("class","alert2 alert-default");
    });

    $('#ya2').on('click', function () {
        $('#tidak2').attr("class","alert2 alert-default");
        $('#ya2').attr("class","alert2 alert-success");
    });

    $('#tidak3').on('click', function () {
        $('#tidak3').attr("class","alert2 alert-danger");
        $('#ya3').attr("class","alert2 alert-default");
    });

    $('#ya3').on('click', function () {
        $('#tidak3').attr("class","alert2 alert-default");
        $('#ya3').attr("class","alert2 alert-success");
    });

    $('#tidak4').on('click', function () {
        $('#tidak4').attr("class","alert2 alert-danger");
        $('#ya4').attr("class","alert2 alert-default");
    });

    $('#ya4').on('click', function () {
        $('#tidak4').attr("class","alert2 alert-default");
        $('#ya4').attr("class","alert2 alert-success");
    });

    function LaodingBro(){

        var content_data = '';

        $('#dcuupload').attr('class', 'alert alert2 alert-success');

        content_data += "<table width='100%'>";
        content_data += "<tr>";
        content_data += "<td align='left'><i class='fa fa-check'></i></td>";
        content_data += "<td><h5 class='text-white'>Foto Anda Berhasil Di Upload</h5></td>";
        content_data += "</tr>";
        content_data += "<table>";

        $('#dcuupload').html(content_data);
        
    }

    $("#uploadpost").on("change", function() {

        $('#dcuupload').html('<div align="center"><img width="100%" src="/assets/content/img/theme/loadingnew.gif"></div>');

        $('#files').val('1');

        
        setTimeout(LaodingBro, 3000);
    });
</script>