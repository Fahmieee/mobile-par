<script type="text/javascript">

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

    $('#upload_form').on('submit', function(event){

        event.preventDefault();
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

            $.ajax({
                url: "{{ route('MedicalStore') }}",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,

                success:function(data) {

                    if(data.message == "success"){

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

                                    setTimeout(function(){ window.location.href = 'driver'; }, 1500);

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

        if (value == ''){
         
            $('.notif_suhu').html('');

        } else if (value > 36){

            $('.notif_suhu').html('<div class="alert alert-danger" role="alert"><strong>Hati-hati!</strong> Suhu Anda Demam!</div>');

        } else if (value <= 36){

            $('.notif_suhu').html('<div class="alert alert-success" role="alert"><strong>Sehat!</strong> Suhu Anda Normal!</div>');

        } 

    });

    $('#darah1').on('keyup', function () {

        var dar1 = $(this).val();
        var dar2 = $('#darah2').val();

        if (dar2 == ''){

            $('.notif_darah').html('');

        } else if (dar1 < 120 && dar2 < 80){

            $('.notif_darah').html('<div class="alert alert-success" role="alert"><strong>Sehat!</strong> Tekanan Darah Normal!</div>');
        } else if (dar1 >= 120 && dar1 < 140 || dar2 >= 80 && dar2 < 90){
            $('.notif_darah').html('<div class="alert alert-yellow" role="alert"><strong>Hati-Hati!</strong> Prehypertension!</div>');
        } else if (dar1 >= 140 && dar1 < 160 || dar2 >= 90 && dar2 < 100){
            $('.notif_darah').html('<div class="alert alert-warning" role="alert"><strong>Hati-hati!</strong> High Blood Presure!</div>');
        } else if (dar1 >= 160 || dar2 >= 100){
            $('.notif_darah').html('<div class="alert alert-danger" role="alert"><strong>Berbahaya!</strong> Hypertensive Crisis!</div>');
        }

    });

    $('#darah2').on('keyup', function () {

        var dar2 = $(this).val();
        var dar1 = $('#darah1').val();

        if (dar1 == ''){

            $('.notif_darah').html('');

        } else if (dar1 < 120 && dar2 < 80){
            $('.notif_darah').html('<div class="alert alert-success" role="alert"><strong>Sehat!</strong> Tekanan Darah Normal!</div>');
        } else if (dar1 >= 120 && dar1 < 140 || dar2 >= 80 && dar2 < 90){
            $('.notif_darah').html('<div class="alert alert-yellow" role="alert"><strong>Hati-Hati!</strong> Prehypertension!</div>');
        } else if (dar1 >= 140 && dar1 < 160 || dar2 >= 90 && dar2 < 100){
            $('.notif_darah').html('<div class="alert alert-warning" role="alert"><strong>Hati-hati!</strong> High Blood Presure!</div>');
        } else if (dar1 >= 160 || dar2 >= 100){
            $('.notif_darah').html('<div class="alert alert-danger" role="alert"><strong>Berbahaya!</strong> Hypertensive Crisis!</div>');
        }

    });

    $('#back').on('click', function () {

        setTimeout(function(){ window.location.href = 'driver'; }, 10);

    });

</script>