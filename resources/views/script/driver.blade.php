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

                        totalmenit += parseInt(menits);
                        totaljam += parseInt(jams);

                    });

                    var minutes = totalmenit / 60;
                    if (minutes >= 1){

                        var TotalSemua = (totaljam + minutes).toFixed(0);

                    } else {

                        var TotalSemua = totaljam.toFixed(0);
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
            url: "{{ route('ValidasiClock') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
            },

            success: function (data) {

            	if (data.status == 'belumclock_out' || data.status == 'hariinibelum_clockout'){

            		$('#foricons').attr('style', 'display: block;');

                    if(data.type_driver != 2){
                		var contents = '<div id="clockout" onclick="ClockOut()" class="icon icon-shape bg-white text-white rounded-circle shadow">'+
                                '<i class="fas fa-calendar" style="color: #0166b5"></i>'+
                                '<input type="hidden" value="0" id="selesai">' +
                            '</div>';
                    } else {
                        var contents = '<div onclick="ClockOutPool()" class="icon icon-shape bg-white text-white rounded-circle shadow">'+
                                '<i class="fas fa-calendar" style="color: #0166b5"></i>'+
                                '<input type="hidden" value="0" id="selesai">' +
                            '</div>';
                    }
                    
            		$('.clock_icon').html(contents);

                	$('#clock_desc').html('<h6 class="text-uppercase text-white ls-1 mb-1">Clock Out</h6>');

                	$('#icon_clock').html('<i class="fas fa-car" style="color: #ffffff"></i>');

                	$('#word_clock').html('<h6 class="text-white text-uppercase">'+data.time+'</h6>');

                    if(data.type_driver != 2){

                        $('#icon_km').html('<i class="fas fa-road" style="color: #ffffff"></i>');

                        $('#word_km').html('<h6 class="text-white text-uppercase">'+data.km+'</h6>');

                        $('#km_awal').val(data.km);

                    }

                } else if (data.status == 'sudahclock_in'){

                	var contents = '<div id="clockin" onclick="ClockIn()" class="icon icon-shape bg-white text-white rounded-circle shadow">'+
                            '<i class="fas fa-calendar" style="color: #0166b5"></i>'+
                            '<input type="hidden" value="1" id="selesai">' +
                        '</div>';
                    
            		$('.clock_icon').html(contents);

            		var contentc = '<h6 class="text-uppercase text-white ls-1 mb-1">Clock In</h6>';

                	$('#clock_desc').html(contentc);

                	$('#foricons').attr('style', 'display: none;');

                }

            }
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('ValidasiPretripCheck2') }}",
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

            	if (data == 1){
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

            	if (data == 0){
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

                                            $('#modal_clockin').modal('show');

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

        $('.loading').attr('style','display: block');
        $('#modal_clockin').modal('hide');

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

            $('.loading').attr('style','display: none');
            $('#modal_clockin').modal('show');

        } else {

			$.ajax({
	            type: 'POST',
	            url: "{{ route('ClokinSubmit') }}",
	            data: {
	                '_token': $('input[name=_token]').val(),
	                'user_id': $('#created_by').val(),
	                'km': $('#kilometer').val(),
	                'status': $('#perdin_stat').val()
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

                                setTimeout(function(){ window.location.href = 'home'; }, 1500);

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

    function ClockOutPool(){

        $('#clockoutpool').modal('show');

    }

    $('#yakin_clockout').on('click', function () {

        $('#clockoutpool').modal('hide');
        $('.loading').attr('style','display: block');

        $.ajax({
            type: 'POST',
            url: "{{ route('clockoutpools') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                },
            success: function(data) {

                if(data.notif == '0'){

                    swal({
                        title: "Error!",
                        text: "Lakukan Drive Out Terlebih Dahulu!",
                        icon: "error",
                        buttons: false,
                        timer: 2000,
                    });

                    $('.loading').attr('style','display: none');

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

                                setTimeout(function(){ window.location.href = 'home'; }, 1500);
                            }
                        });   
                    });
                }

            }

        });

    });

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

                                    setTimeout(function(){ window.location.href = 'home'; }, 1500);
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

                setTimeout(function(){ window.location.href = 'home'; }, 1500);

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

                setTimeout(function(){ window.location.href = 'home'; }, 1500);

            }

        });
    });

    $('#medical').on('click', function () {

        setTimeout(function(){ window.location.href = 'dcu'; }, 10);

    });

    $('#back').on('click', function () {

        setTimeout(function(){ window.location.href = 'home'; }, 10);

    });

    $('#ok_clockin').on('click', function () {

        $('#notif_medical').modal('hide');

        $('#modal_clockin').modal('show');

    });

    $('#perdin_tidak').on('click', function () {

        $('#perdin_tidak').attr("class","alert2 alert-success");
        $('#perdin_ya').attr("class","alert2 alert-default");
        $('#perdin_stat').val("No");
        $('#upload').attr("style","display: none;");

    });

    $('#perdin_ya').on('click', function () {

        $('#perdin_tidak').attr("class","alert2 alert-default");
        $('#perdin_ya').attr("class","alert2 alert-success");
        $('#perdin_stat').val("Yes");
        $('#upload').attr("style","display: block;");

    });

    function LaodingBro(){

        var content_data = '';

        $('#clockinupload').attr('class', 'alert alert2 alert-success');

        content_data += "<table width='100%'>";
        content_data += "<tr>";
        content_data += "<td align='left'><i class='fa fa-check'></i></td>";
        content_data += "<td><h5 class='text-white'>Foto Anda Berhasil Di Upload</h5></td>";
        content_data += "</tr>";
        content_data += "<table>";

        $('#clockinupload').html(content_data);
        
    }

    $("#uploadpost").on("change", function() {

        $('#clockinupload').html('<div align="center"><img width="100%" src="/assets/content/img/theme/loadingnew.gif"></div>');

        
        setTimeout(LaodingBro, 3000);
    });

    $('#ganti').on('click', function () {

        $('#ganti_mobil').modal('show');

    });
    
    $('#tambah_mobil').on('click', function () {

        $('#nambah_mobil').modal('show');

    });

    $('#simpan_mobil').on('click', function () {

        var empty = false;
        $('input.tambahmobs, select.tambahmobs').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        if (empty) {

            swal({
                title: "Warning!!",
                text: "Harap isi Isian yang Tersedia!",
                icon: "error",
                buttons: false,
                timer: 2000,
            });

        } else {

            $('#nambah_mobil').modal('hide');
            $('#ganti_mobil').modal('hide');

            $.ajax({
                type: 'POST',
                url: "{{ route('tambahmobil') }}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'merk': $('#merk').val(),
                    'model': $('#model').val(),
                    'nopol': $('#nopol').val(),
                    'tahun': $('#tahun').val(),
                    'transmisi': $('#transmisi').val(),
                   },
                success: function(data) {

                    if(data == '1'){

                        swal({
                            title: "Berhasil!",
                            text: "Mobil Berhasil Disimpan",
                            icon: "success",
                            buttons: false,
                            timer: 2000,
                        });

                        setTimeout(function(){ window.location.reload() }, 1500);

                    } else {

                        swal({
                            title: "Gagal!",
                            text: "Data Sudah Ada Didalam Sistem",
                            icon: "error",
                            buttons: false,
                            timer: 2000,
                        });

                    }

                    
                }

            });
        }

    });

    function PilihMobil(id){

        $('.mobilnya').attr("class","alert2 alert-secondary mobilnya");
        $('#mobil_'+id).attr("class","alert2 alert-success mobilnya");

        $('#unit_id').val(id);

    }

    $('#memilih').on('click', function () {

        $.ajax({
            type: 'POST',
            url: "{{ route('updatemobil') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'unit_id': $('#unit_id').val(),
               },
            success: function(data) {

                if(data == 'yes'){

                    swal({
                        title: "Berhasil!",
                        text: "Mobil Berhasil Diganti",
                        icon: "success",
                        buttons: false,
                        timer: 2000,
                    });

                    setTimeout(function(){ window.location.reload() }, 1500);
                
                } else {

                    swal({
                        title: "Gagal!",
                        text: "Ganti Sebelum PTC atau Clockin",
                        icon: "error",
                        buttons: false,
                        timer: 2000,
                    });

                }
 

            }

        });
    });

    $('#nopretripcheck').on('click', function () {

        swal({
            title: "Tidak Perlu PTC!",
            text: "Anda Menggunakan Mobil Users!",
            icon: "error",
            buttons: false,
            timer: 2000,
        });
    });

    function ClockinPool(){

        $('#clockinpool').modal('show');
    }


    $('#yakin_clockin').on('click', function () {

        $('#clockinpool').modal('hide');
        $('.loading').attr('style','display: block');

        $.ajax({
            type: 'POST',
            url: "{{ route('clockinpools') }}",
            data: {
                '_token': $('input[name=_token]').val(),
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

                            setTimeout(function(){ window.location.href = 'home'; }, 1500);

                        }

                    });
                });

            }

        });

    });

    var table = "";
    $(function() {
        table = $('.datatables').DataTable({
            pageLength: 5,
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
                 url: "{{ route('getunits') }}",
                 dataType: "json",
                 type: "GET",
            },
            columns: [
                { data: 'no_police', name: 'no_police' },
                { 
                    render: function ( data, type, row ) {
                        return '<div class="card shadow mobil" id="aksi_'+row.id+'" onclick="Pilih('+row.id+')"><div class="card-body"><table width="100%"><tr style="background-color: transparent;"><td width="20%" rowspan="3"><div class="icon icon-shape bg-blue-par2 text-white rounded-circle shadow"><i class="fas fa-car" style="color: #ffffff;font-size= 10px"></i></div></td><td><b><div style="font-size: 15px">'+row.no_police+'</div></b><div style="font-size: 10px">'+row.merk+' '+row.model+' | '+row.years+'</div></td></tr></table></div></div></div>';
                    }
                }
            ]
        });
    });

    $('#pilihmobil').on('click', function () {

        $('#pilih_mobil').modal('show');
    });

    $('#nopilihmobil').on('click', function () {

        swal({
            title: "Tidak Bisa Pilih!",
            text: "Anda Sudah Drive in",
            icon: "error",
            buttons: false,
            timer: 2000,
        });
    });

    function Pilih(id){

        $('.mobil').attr("class","card shadow mobil bg-white");
        $('#aksi_'+id).attr("class","card shadow bg-success mobil");
        $('#unit').val(id);

    }

    function Memilih(){

        $('#yakinpilih').modal('show');

    }

    $('#yakin_memilih').on('click', function () {

        $('#yakinpilih').modal('hide');
        $('#pilih_mobil').modal('hide');
        $('.loading').attr('style','display: block');

        $.ajax({
            type: 'POST',
            url: "{{ route('pilihmobil') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'unit_id': $('#unit').val(),
                
            },
            success: function(data) {

                swal({
                    title: "Berhasil!",
                    text: "Anda Telah Memilih Mobil",
                    icon: "success",
                    buttons: false,
                    timer: 2000,
                });

                setTimeout(function(){ window.location.reload() }, 1500);

            }

        });


    });

    $('#drivein').on('click', function () {

        $.ajax({
            type: 'POST',
            url: "{{ route('validasidrivein') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                
            },
            success: function(data) {

                if(data.notif == '0'){

                    swal({
                        title: "Error!",
                        text: "Lakukan PTC Terlebih Dahulu!",
                        icon: "error",
                        buttons: false,
                        timer: 2000,
                    });

                } else {

                    $('#unitdrivein').val(data.unit);

                    $('#drivein_modal').modal('show');

                }


            }
        });

    });

    $('#drivein_submit').on('click', function () {

        $('.loading').attr('style','display: block');
        $('#drivein_modal').modal('hide');
        var empty = false;
        $('input.drivein').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        if (empty) {

          swal({
                title: "Warning!!",
                text: "Harap isi Isian yang Tersedia!",
                icon: "error",
                buttons: false,
                timer: 2000,
            });

        } else {

            $.ajax({
                type: 'POST',
                url: "{{ route('submitdrivein') }}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'km_awal': $('#kilometer').val(),
                    
                },
                success: function(data) {

                    swal({
                        title: "Berhasil!",
                        text: "Anda Berhasil Drive in",
                        icon: "success",
                        buttons: false,
                        timer: 2000,
                    });

                    setTimeout(function(){ window.location.reload() }, 1500);

                }

            });

        }

    });

    $('#driveout').on('click', function () {

        $('#driveout_modal').modal('show');

    });

    $('#driveout_submit').on('click', function () {

        $('.loading').attr('style','display: block');
        $('#driveout_modal').modal('hide');

        $.ajax({
            type: 'POST',
            url: "{{ route('submitdriveout') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'km_akhir': $('#km_akhir').val(),
                
            },
            success: function(data) {

                swal({
                    title: "Berhasil!",
                    text: "Anda Berhasil Drive Out",
                    icon: "success",
                    buttons: false,
                    timer: 2000,
                });

                setTimeout(function(){ window.location.reload() }, 1500);

            }
        });

    });

</script>