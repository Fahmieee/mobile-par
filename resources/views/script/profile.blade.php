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

            	$('#namalengkap').html('<h2>'+data.first_name+' '+data.last_name+'</h2>');
            	$('#username').val(data.username);
            	$('#email').val(data.email);
            	$('#first-name').val(data.first_name);
            	$('#last-name').val(data.last_name);
            	$('#alamat').val(data.address);
            	$('#no_hp').val(data.phone);
				
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
		$('.edited').each(function() {
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

</script>