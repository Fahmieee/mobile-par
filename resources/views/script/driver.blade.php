<script type="text/javascript">

	$(function() {


        $.ajax({
            type: 'POST',
            url: "{{ route('GetDataDriver') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
                },
            success: function(data) {

                $('#nama_users').html('<b>'+data.nama_user+'</b>');
                $('#nama_drivers').html('<b>'+data.nama_driver+'</b>');
                $('#nopol').html('<b>'+data.no_polisi+'</b>');
                $('#model').html('<h6>'+data.model+' - '+data.varian+'</h6>');
                $('#date').html('<h6>'+data.stnk+'</h6>');
                $('#tahun').html('<h6>'+data.tahun+'</h6>');
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

            	var waktu = data[0]['time'];
            	var jarak = data[0]['kilometer'];

            	if (data.length == 1){

            		$('#foricons').attr('style', 'display: block;');

            		var contents = '<div id="clockout" onclick="ClockOut()" class="icon icon-shape bg-white text-white rounded-circle shadow">'+
                            '<i class="fas fa-lock" style="color: #0166b5"></i>'+
                            '<input type="hidden" value="0" id="selesai">' +
                        '</div>';
                    
            		$('#clock_icon').html(contents);

                	$('#clock_desc').html('<h6 class="text-uppercase text-white ls-1 mb-1">Clock Out</h6>');

                	$('#icon_clock').html('<i class="fas fa-car" style="color: #ffffff"></i>');

                	$('#word_clock').html('<h6 class="text-white text-uppercase">'+waktu+'</h6>');

                	$('#icon_km').html('<i class="fas fa-road" style="color: #ffffff"></i>');

                	$('#word_km').html('<h6 class="text-white text-uppercase">'+jarak+'</h6>');

                	$('#km_awal').val(jarak);

                } else if (data.length == 2){

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
                        url: "{{ route('MedicalValidasi') }}",
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'user_id': $('#created_by').val()
                        },

                        success: function (datax) {

                            if (datax.length == 0){
                                swal({
                                    text: "Lakukan Medical Checkup Terlebih Dahulu!",
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

                                            $('#modal_clockin').modal('show');

                                        } else {

                                            $('#notif_notoke').modal('show');

                                        }

                                    }

                                });
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

	            	swal({
	                    text: "Clock In Anda Berhasil!",
	                    icon: "success",
	                    buttons: false,
	                    timer: 2000,
	                });

	                $('#modal_clockin').modal('hide');

	                setTimeout(function(){ window.location.href = 'driver'; }, 1500);

	            }
	        });
		}

	});

	
	function ClockOut(){

		$('#modal_clockout').modal('show');

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

	            	swal({
	                    text: "Clock Out Anda Berhasil!",
	                    icon: "success",
	                    buttons: false,
	                    timer: 2000,
	                });

	                setTimeout(function(){ window.location.href = 'driver'; }, 1500);

	            }
	        });

        }	

	});

	$('#history').on('click', function () {

		setTimeout(function(){ window.location.href = 'history'; }, 10);

	});

    $('#medical').on('click', function () {

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

    $('#approve_medical').on('click', function () {

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
                type: 'POST',
                url: "{{ route('MedicalStore') }}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'user_id': $('#created_by').val(),
                    'darah1': $('#darah1').val(),
                    'darah2': $('#darah2').val(),
                    'suhu': $('#suhu').val()
                    },
                success: function(data) {

                    swal({
                        text: "Medical Check Up Anda Berhasil!",
                        icon: "success",
                        buttons: false,
                        timer: 2000,
                    });

                    setTimeout(function(){ window.location.href = 'driver'; }, 1500);

                }

            });

        }

    });
    

</script>