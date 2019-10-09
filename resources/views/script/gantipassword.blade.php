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
				
				if(data.flag_pass == 0 || data.flag_pass == null ){
					$('#buttonback').html('');
				}  	

            }
        });

	});

	$('#ubah').on('click', function () {

		var empty = false;
	    $('.ubah').each(function() {
	        if ($(this).val() == '') {
	            empty = true;
	        }
	    });
	    if (empty) { 
	        swal({
		        title: "Tidak Tersimpan!",
		        text: "Anda Harus Mengisi Inputan Tersedia",
		        icon: "error",
		        buttons: false,
		        timer: 2000,
	        });

	    }  else {

	    	var new_pass = $('#password_new').val();
        	var confirm_pass = $('#password_confirm').val();

	        if (new_pass == confirm_pass){

	        	var limit = confirm_pass.length;

	        	if (limit <= 6 ){

	        		swal({
		                text: "Minimal 7 Karakter",
		                icon: "error",
		                buttons: false,
		                timer: 2000,
		            });

	        	} else {

	        		$.ajax({
		                type: 'POST',
		                url: "{{ route('UpdatePassword') }}",
		                data: {
		                    '_token': $('input[name=_token]').val(),
		                    'user_id': $('#created_by').val(),
		                    'password' : confirm_pass,
		                },
		                success: function(data) {

		                    swal({
		                        title: "Berhasil",
		                        text: "Password Anda sudah Berubah!",
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

	                    	if(data.flag_prof == 0 || data.flag_prof == null){

	                    		setTimeout(function(){ window.location.href = 'profile'; }, 1500);

	                    	} else {

	                    		setTimeout(function(){ window.location.href = role; }, 1500);

	                    	}


		                }
		            });

	        	}

	        	


		    } else {

		    	swal({
	                title: "Tidak Tersimpan!",
	                text: "Password Konfirmasi Harus Sama",
	                icon: "error",
	                buttons: false,
	                timer: 2000,
	            });

		    }
		}

	});

	$('#back').on('click', function () {

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

</script>