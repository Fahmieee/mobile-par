<script type="text/javascript">

	$(function() {

		$.ajax({
            type: 'POST',
            url: "{{ route('GetDataProfile') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
            },

            success: function (data) {

                var last = '';

                if (data.last_name == null){
                    last = '';
                } else {
                    last = data.last_name;
                }

            	$('#namalengkap').html('<h2>'+data.first_name+' '+last+'</h2>');
            	$('#username').val(data.username);
            	$('#email').val(data.email);
            	$('#first-name').val(data.first_name);
            	$('#last-name').val(data.last_name);
            	$('#alamat').val(data.address);
            	$('#no_hp').val(data.phone);

            	var role = data.role_id;
            	var photo = data.photo;

            	if (role == 2 || role == 5){

            	} else {
            		$('#tombol_ganti').html('');
            	}

            	if (photo == null){

            		$('#photo_profile').attr('src','./assets/content/img/theme/team-1-800x800.jpg');

            	} else {

            		$('#photo_profile').attr('src','./assets/profile_photo/'+photo+'');

            	}
				
				if(data.flag_prof == 0 || data.flag_prof == null ){
					$('#button-simpan').html('');
				}  	

            }
        });

	});

	$('#edited').on('click', function () {

		$('.edited').prop('disabled', false);
		$('#button-simpan').html('<button class="btn btn-success" onclick="Simpan()" id="simpan">Simpan Perubahan</button>');

	});

	function Simpan(){

		$('#confirm-profile').modal('show');

	}

	$('#yakin_edit').on('click', function () {

		var empty = false;
		$('.harus').each(function() {
        if ($(this).val() == '') {
	            empty = true;
	        }
	    });

	    if (empty) { 

	    	swal("Isian Harus Diisi!", {
                icon: "error",
                buttons: false,
                timer: 2000,
            });
	    	
	    } else {

			$.ajax({
	            type: 'POST',
	            url: "{{ route('UpdateProfile') }}",
	            data: {
	                '_token': $('input[name=_token]').val(),
	                'username': $('#username').val(),
	                'email': $('#email').val(),
	                'first_name': $('#first-name').val(),
	                'last_name': $('#last-name').val(),
	                'alamat': $('#alamat').val(),
	                'no_hp': $('#no_hp').val(),
	                'user_id': $('#created_by').val()
	            },

	            success: function (data) {

	            	swal("Profile Anda Sudah TerUpdate!", {
		                icon: "success",
		                buttons: false,
		                timer: 2000,
		            });

		            var role = '';
                    if(data.sebagai == 2){
                    	role = 'driver';
                    } else if(data.sebagai == 5){
                    	role = 'korlap';
                    } else {
                    	role = 'client';
                    }

		            setTimeout(function(){ window.location.href = role; }, 1500);

	            }

	        });
		}
	});

	$('#kembali').on('click', function () {

		$.ajax({
            type: 'POST',
            url: "{{ route('RoleProfile') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
            },

            success: function (data) {

            	var role = '';
                if(data.sebagai == 2){
                	role = 'driver';
                } else if(data.sebagai == 5){
                	role = 'korlap';
                } else {
                	role = 'client';
                }

	            setTimeout(function(){ window.location.href = role; }, 10);

            }

        });

	});

	$('#ganti').on('click', function () {

		$('#ganti-photo').modal('show');

	});

	$('#upload_form').on('submit', function(event){

        event.preventDefault();

        var empty = false;
        $('.photo').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        if (empty) {

            swal({
                title: "Error!",
                text: "Pilih Foto Anda Terlebih Dahulu!",
                icon: "error",
                buttons: false,
                timer: 2000,
            });

        } else {

            $.ajax({
                url: "{{ route('GantiPhoto') }}",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,

                success:function(data) {

                	if(data.message == "success"){

                		swal({
                            title: "Berhasil",
                            text: "Anda Berhasil Mengganti Photo",
                            icon: "success",
                            buttons: false,
                            timer: 2000,
                        });

                        setTimeout(function(){ window.location.href = 'profile'; }, 1500);

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
                	}

                }

            });
        }

    });

</script>