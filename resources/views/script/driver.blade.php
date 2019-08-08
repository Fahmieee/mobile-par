<script type="text/javascript">

	$(function() {

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

            		var contents = '<div id="clockout" onclick="ClockOut()"class="icon icon-shape bg-white text-white rounded-circle shadow">'+
                            '<i class="fas fa-lock" style="color: #0166b5"></i>'+
                            '<input type="hidden" value="0" id="selesai">' +
                        '</div>';
                    
            		$('#clock_icon').html(contents);

            		var contentc = '<h6 class="text-uppercase text-white ls-1 mb-1">Clock Out</h6>';

                	$('#clock_desc').html(contentc);

                	var icon_clocks = '<i class="fas fa-car" style="color: #ffffff"></i>';
                	$('#icon_clock').html(icon_clocks);

                	var word_clock = '<h6 class="text-white text-uppercase">'+waktu+'</h6>';
                	$('#word_clock').html(word_clock);

                	var icon_kms = '<i class="fas fa-road" style="color: #ffffff"></i>';
                	$('#icon_km').html(icon_kms);

                	var word_kms = '<h6 class="text-white text-uppercase">'+jarak+'</h6>';
                	$('#word_km').html(word_kms);

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

                	$('#modal_clockin').modal('show');

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

</script>