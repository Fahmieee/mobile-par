<script type="text/javascript">

	$(function() {

        $.ajax({
            type: 'POST',
            url: "{{ route('GetLembur') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
                },
            success: function(data) {

                var no = -1;
                var totalmenit = 0;
                var totaljam = 0;

                if (data.length == 0){

                    $('.text-lembur').html('0 Jam / 40 Jam (0%)');

                } else {

                    $.each(data, function() {

                        no++;
                        var time = data[no]['time'];
                        var jams = "";
                        var menits = "";

                        var jam= time.substring(2,3);

                        if (jam == ':'){
                            jams = time.substring(0,2);
                        } else {
                            jams = time.substring(0,1);
                        }

                        var menit= time.substring(5,6);

                        if (menit == ':'){
                            menits = time.substring(3,5);
                        } else if(jams != ':'){
                            menits = time.substring(2,4);
                        } else {
                            menits = time.substring(2,3);
                        }

                        totalmenit += menits;
                        totaljam += jams;

                    });

                    var minutes = totalmenit / 60;
                    if (minutes >= 1){

                        var TotalSemua = totaljam + minutes;

                    } else {

                        var TotalSemua = totaljam;
                    }

                    var percent = Math.floor((TotalSemua / 40) * 100);
                    $('.lembur').attr("style", "width: "+percent+"%;");

                    if (percent <= 50){

                        $('.lembur').attr("class", "progress-bar bg-success lembur");

                    } else if (TotalSemua > 50 && TotalSemua <= 70){

                        $('.lembur').attr("class", "progress-bar bg-kuning lembur");

                    } else {

                        $('.lembur').attr("class", "progress-bar bg-danger lembur");

                    }

                    $('.text-lembur').html(TotalSemua+' Jam / 40 Jam ('+percent+'%)');
                }
            }

        });

        $.ajax({
            type: 'POST',
            url: "{{ route('GetUnitKilometers') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
                },
            success: function(data) {

                var no = -1;
                var total = 0;

                if (data.length == 0){

                    $('.text-km').html('0 Km / 10000 km (0%)');

                } else {

                    $.each(data, function() {

                        no++;
                        var km_awal = data[no]['km_awal'];
                        var km_akhir = data[no]['km_akhir'];

                        var pengurangan = km_akhir - km_awal;

                        total += pengurangan;

                    });

                    var percent = Math.floor((total / 10000) * 100);
                    $('.percent').attr("style", "width: "+percent+"%;");

                    if (percent <= 70){

                        $('.percent').attr("class", "progress-bar bg-success percent");

                    } else if (percent > 70 && percent <= 90){

                        $('.percent').attr("class", "progress-bar bg-kuning percent");

                    } else {

                        $('.percent').attr("class", "progress-bar bg-danger percent");

                    }

                    $('.text-km').html(total+' Km / 10000 Km ('+percent+'%)');
                }
                
            }
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('GetDataDriver') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
                },
            success: function(data) {

                $('#nama_users').html('<b>'+data.nama_depan+' '+data.nama_belakang+'</b>');
                $('#nama_drivers').html('<b>'+data.driver_depan+' '+data.driver_belakang+'</b>');
                $('#nopol').html('<b>'+data.no_polisi+'</b>');
                $('#model').html('<h6>'+data.model+' - '+data.varian+'</h6>');
                $('#date').html('<h6>'+data.stnk+'</h6>');
                $('#tahun').html('<h6>'+data.years+'</h6>');
                $('#nopols').val(data.no_polisi);

                if(data.nama_depan == '-'){

                    $('#client').attr("style", "display: none;");
                    $('#approve_driver').attr("style", "display: block;");
                    $('#menudrivers').attr("style", "display: none;");

                } else {

                    $('#client').attr("style", "display: block;");
                    $('#approve_driver').attr("style", "display: none;");
                    $('#menudrivers').attr("style", "display: block;");

                }

                if (data.pair == 'tidakada'){
                    $('#pair_driver').html('<h5 align="center" class="text-white">Anda Belum Memiliki Client Saat ini, Tunggu Saat Client Pairing dengan Anda!</h5>');
                    $('#terima').html('');
                    $('#tolak').html('');
                } else {

                    $('#pair_driver').html('<h5 align="center" class="text-white"><b>Client '+data.pair_depan+' '+data.pair_belakang+'</b> Melakukan Pairing Dengan Anda. Apakah Anda akan Menerimanya?</h5>');
                    $('#terima').html('<button class="btn btn-success" onclick="Terima('+data.pair_id+')" type="button">Terima</button>');
                    $('#tolak').html('<button class="btn btn-danger" onclick="Tolak('+data.pair_id+')" type="button">Tolak</button>');

                }
            }
        });

		$.ajax({
            type: 'POST',
            url: "{{ route('ValidasiClock') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
            },

            success: function (data) {

            	if (data.status == 'belumclock_out' || data.status == 'hariinibelum_clockout'){

            		$('#foricons').attr('style', 'display: block;');

            		var contents = '<div id="clockout" onclick="ClockOut()" class="icon icon-shape bg-white text-white rounded-circle shadow">'+
                            '<i class="fas fa-lock" style="color: #0166b5"></i>'+
                            '<input type="hidden" value="0" id="selesai">' +
                        '</div>';
                    
            		$('#clock_icon').html(contents);

                	$('#clock_desc').html('<h6 class="text-uppercase text-white ls-1 mb-1">Clock Out</h6>');

                	$('#icon_clock').html('<i class="fas fa-car" style="color: #ffffff"></i>');

                	$('#word_clock').html('<h6 class="text-white text-uppercase">'+data.time+'</h6>');

                	$('#icon_km').html('<i class="fas fa-road" style="color: #ffffff"></i>');

                	$('#word_km').html('<h6 class="text-white text-uppercase">'+data.km+'</h6>');

                	$('#km_awal').val(data.km);

                } else if (data.status == 'sudahclock_in'){

                	var contents = '<div id="clockin" onclick="ClockIn()" class="icon icon-shape bg-white text-white rounded-circle shadow">'+
                            '<i class="fas fa-car" style="color: #0166b5"></i>'+
                            '<input type="hidden" value="1" id="selesai">' +
                        '</div>';
                    
            		$('#clock_icon').html(contents);

            		var contentc = '<h6 class="text-uppercase text-white ls-1 mb-1">Clock In</h6>';

                	$('#clock_desc').html(contentc);

                	$('#foricons').attr('style', 'display: none;');

                }

            }
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('ValidasiPretripCheck') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
            },

            success: function (data) {

            	var selesai = $('#selesai').val();

            	var waktu_check = data[0]['time'];

            	if (data.length >= 1 && selesai == '0'){

            		var icon_checks= '<i class="fa fa-check-circle" style="color: #ffffff"></i>';
                	$('#icon_check').html(icon_checks);

                	var word_checks = '<h6 class="text-white text-uppercase">'+waktu_check+'</h6>';
                	$('#word_check').html(word_checks);

                	$('#foricons').attr('style', 'display: block;');

            	} else if (selesai == '1'){

            		$('#foricons').attr('style', 'display: none;');

            	}


            }

        });

        $.ajax({
            type: 'POST',
            url: "{{ route('MedicalValidasi') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
            },

            success: function (data) {

                var selesai = $('#selesai').val();

                var waktu_mcu = data[0]['time'];

                if (data.length >= 1 && selesai == '0'){

                    $('#icon_medic').html('<i class="fa fa-medkit" style="color: #ffffff"></i>');

                    $('#word_medic').html('<h6 class="text-white text-uppercase">'+waktu_mcu+'</h6>');

                    $('#foricons').attr('style', 'display: block;');

                } else if (selesai == '1'){

                    $('#foricons').attr('style', 'display: none;');

                }

            }

        });

	});

	$('#pretripcheck').on('click', function () {

		$.ajax({
            type: 'POST',
            url: "{{ route('ValidasiPretripCheck') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
            },

            success: function (data) {

            	if (data.length >= 1){
                    swal({
                        text: "Anda Sudah Melakukan Pre-Trip Check!",
                        icon: "error",
                        buttons: false,
                        timer: 2000,
                    });

                } else {

                	setTimeout(function(){ window.location.href='pretripcheck'; }, 10);

                }

            }
        });

	});

	
	$('#clockin').on('click', function () {

		$.ajax({
            type: 'POST',
            url: "{{ route('ValidasiPretripCheck') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
            },

            success: function (data) {

            	if (data.length == 0){
                    swal({
                        text: "Lakukan Pre-Trip Check Terlebih Dahulu!",
                        icon: "error",
                        buttons: false,
                        timer: 2000,
                    });

                } else {

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('ValidasiNotOke') }}",
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'user_id': $('#created_by').val()
                        },

                        success: function (datas) {

                            if (datas.length == 0){

                                $.ajax({
                                    type: 'POST',
                                    url: "{{ route('MedicalValidasi') }}",
                                    data: {
                                        '_token': $('input[name=_token]').val(),
                                        'user_id': $('#created_by').val()
                                    },

                                    success: function (datax) {

                                        if (datax.length == 0){

                                            $('#notif_medical').modal('show');

                                        } else {

                                            var nopols = $('#nopols').val();

                                            $('#modal_clockin').modal('show');

                                            $('#nopol_modal').val(nopols);
                                        }

                                    }

                                });

                            } else {

                                $('#notif_notoke').modal('show');

                            }

                        }

                    });

                    

                }

            }
        });

	});

	$('#customCheck6').on('click', function () {

		if(this.checked){

			var muncul = '<div class="row">'+
			                    '<div class="col-md-12">'+
			                      '<div class="form-group">'+
			                        '<label class="form-control-label">Unit GS</label>'+
			                        '<input type="text" id="unitgs" class="form-control form_clockin" placeholder="Masukan Nomor Polisi">'+
			                      '</div>'+
			                    '</div>'+
			                '</div>';

    		$('#mobil').html(muncul);

		} else {

			var muncul = '';

			$('#mobil').html(muncul);

		}

	});

	$('#clockin_submit').on('click', function () {

		var empty = false;
        $('.form_clockin').each(function() {
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

        } else {

			$.ajax({
	            type: 'POST',
	            url: "{{ route('ClokinSubmit') }}",
	            data: {
	                '_token': $('input[name=_token]').val(),
	                'user_id': $('#created_by').val(),
	                'km': $('#kilometer').val(),
	                'unitgs': $('#unitgs').val()
	                },
	            success: function(data) {

                    navigator.geolocation.getCurrentPosition(function (position) {

                        $.ajax({
                            type: 'POST',
                            url: "{{ route('KoordinatClockin') }}",
                            data: {
                                '_token': $('input[name=_token]').val(),
                                'clockin_id': data.clockin_id,
                                'type': 'clockin',
                                'long': position.coords.latitude,
                                'lat': position.coords.longitude
                                },
                            success: function(data) {

                                swal({
                                    title: "Berhasil",
                                    text: "Clock In Anda Berhasil!",
                                    icon: "success",
                                    buttons: false,
                                    timer: 2000,
                                });

                                $('#modal_clockin').modal('hide');

                                setTimeout(function(){ window.location.href = 'driver'; }, 1500);

                            }

                        });
                    });
	            }
	        });
		}

	});

	
	function ClockOut(){

        var nopols = $('#nopols').val();
		$('#modal_clockout').modal('show');
        $('#nopol_clockout').val(nopols);

	}

	function ClockIn(){

		swal({
            text: "Anda Sudah melakukan ClockIn Hari ini!",
            icon: "error",
            buttons: false,
            timer: 2000,
        });

	}

	$('#clockout_submit').on('click', function () {

		var empty = false;
        $('.form_clockout').each(function() {
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

        } else {

        	$('#modal_clockout').modal('hide');

        	$.ajax({
	            type: 'POST',
	            url: "{{ route('ClokoutSubmit') }}",
	            data: {
	                '_token': $('input[name=_token]').val(),
	                'user_id': $('#created_by').val(),
	                'km': $('#km_akhir').val()
	                },
	            success: function(data) {

                    if (data.notif == '0'){

                        swal({
                            title: "Gagal",
                            text: "Kilometer Lebih Besar Dari Sebelumnya",
                            icon: "error",
                            buttons: false,
                            timer: 2000,
                        });

                    } else {

                        navigator.geolocation.getCurrentPosition(function (position) {  

                            $.ajax({
                                type: 'POST',
                                url: "{{ route('KoordinatClockin') }}",
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'clockin_id': data.clockout_id,
                                    'type': 'clockout',
                                    'long': position.coords.latitude,
                                    'lat': position.coords.longitude
                                    },
                                success: function(data) {

                                    swal({
                                        title: "Berhasil",
                                        text: "Clock Out Anda Berhasil!",
                                        icon: "success",
                                        buttons: false,
                                        timer: 2000,
                                    });

                                    setTimeout(function(){ window.location.href = 'driver'; }, 1500);
                                }
                            });   
                       });
                   }
	            }
	        });

        }	

	});

	$('#history').on('click', function () {

		setTimeout(function(){ window.location.href = 'history'; }, 10);

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

    $('#ok_clockin').on('click', function () {

        $('#notif_medical').modal('hide');

        $('#modal_clockin').modal('show');

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

    function Terima(id){

        $('#id').val(id);

        $('#terima_pair').modal('show');

    }

    function Tolak(id){

        $('#id').val(id);

        $('#tolak_pair').modal('show');

    }

    $('#yakin_terima').on('click', function () {

        $.ajax({
            type: 'POST',
            url: "{{ route('TerimaPair') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val(),
                'pair_id': $('#id').val()
            },

            success: function (data) {

                swal({
                    title: "Berhasil",
                    text: "Penerimaan Anda Berhasil!",
                    icon: "success",
                    buttons: false,
                    timer: 2000,
                });

                setTimeout(function(){ window.location.href = 'driver'; }, 1500);

            }

        });
    });

    $('#yakin_tolak').on('click', function () {

        $.ajax({
            type: 'POST',
            url: "{{ route('TolakPair') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val(),
                'pair_id': $('#id').val()
            },

            success: function (data) {

                swal({
                    title: "Berhasil",
                    text: "Penolakan Anda Berhasil!",
                    icon: "success",
                    buttons: false,
                    timer: 2000,
                });

                setTimeout(function(){ window.location.href = 'driver'; }, 1500);

            }

        });
    });

    $('#medical').on('click', function () {

        setTimeout(function(){ window.location.href = 'dcu'; }, 10);

    });

    $('#back').on('click', function () {

        setTimeout(function(){ window.location.href = 'driver'; }, 10);

    });
    

</script>