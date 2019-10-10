<script type="text/javascript">

	$('#hide').on('click', function () {

		var hide = $('#hideval').val();


		if (hide == 0){

			$('.password').attr('type','text');
			$('#hideval').val(1);
			$('#hide').attr('class','fa fa-eye iconhide');
			$('#hide').attr('style','color: #2566AF;');

		} else {

			$('.password').attr('type','password');
			$('#hideval').val(0);
			$('#hide').attr('class','fa fa-eye-slash iconhide');
			$('#hide').attr('style','');

		}

	});


	$('#login-submit').on('click', function () {

		$("#loader2").attr("style","display: block;");
		$("#login-form").attr("style","display: none;");

        var data = {
            _token:$('input[name=_token]').val(),
            username: $('.username').val(),
            password: $('.password').val()
        };

        var empty = false;
        $('input.logins').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        if (empty) { 
            swal({
	            title: "Tidak bisa masuk!",
	            text: "Isi semua isian!",
	            icon: "error",
	            buttons: false,
	            timer: 2000,
	        });

	        $("#loader2").attr("style","display: none;");
	        $("#login-form").attr("style","display: block;");

	    } else {

	    	// Ajax Post 
            $.ajax({
                type: "post",
                url: "{{ route('login_submit') }}",
                data: data,
                cache: false,
                success: function (data)
                {
                	if (data.role == 2 && data.status == 'success'){

                        swal("Sign In Success!", {
                            icon: "success",
                            buttons: false,
                            timer: 2000,
                        });

                        if (data.flag_pass == '0' || data.flag_pass == null){

                        	setTimeout(function(){ window.location.href='ubahpassword'; }, 1500);

                        } else if (data.flag_prof == '0' || data.flag_prof == null){

                        	setTimeout(function(){ window.location.href='profile'; }, 1500);

                        } else {

                        	setTimeout(function(){ window.location.href='driver'; }, 1500);

                        }    

                    } else if (data.role == 3 && data.status == 'success'){

                        swal("Sign In Success!", {
                            icon: "success",
                            buttons: false,
                            timer: 2000,
                        });

                        if (data.flag_pass == '0' || data.flag_pass == null){

                        	setTimeout(function(){ window.location.href='ubahpassword'; }, 1500);

                        } else if (data.flag_prof == '0' || data.flag_prof == null){

                        	setTimeout(function(){ window.location.href='profile'; }, 1500);

                        } else {

                        	setTimeout(function(){ window.location.href='client'; }, 1500);

                        } 

                    } else if (data.role == 5 && data.status == 'success'){

	                    swal("Sign In Success!", {
	                        icon: "success",
	                        buttons: false,
	                        timer: 2000,
	                    });

	                    if (data.flag_pass == '0' || data.flag_pass == null){

                        	setTimeout(function(){ window.location.href='ubahpassword'; }, 1500);

                        } else if (data.flag_prof == '0' || data.flag_prof == null){

                        	setTimeout(function(){ window.location.href='profile'; }, 1500);

                        } else {

                        	setTimeout(function(){ window.location.href='korlap'; }, 1500);

                        }

                    } else {

                        swal("Username or Password Wrong!", {
	                        icon: "error",
	                        buttons: false,
	                        timer: 2000,
	                    });

	                    $("#loader2").attr("style","display: none;");
	                    $("#login-form").attr("style","display: block;");

                    }

                    if (data.role == '2'){

                    	$.ajax({
				            type: 'POST',
				            url: "{{ route('ActivityLogin') }}",
				            data: {
				                '_token': $('input[name=_token]').val(),
				                'id': data.id
				                },
				            success: function(data) {

				            	

				            }

				        });

                    }

                   	

                }
            });
	    }


	});

	function KeInfoDasar(){

		$("#loader2").attr("style","display: none;");
		$("#registerdasar-form").attr("style","display: block;");
	}

	function kelogin(){

		$("#loader2").attr("style","display: none;");
		$("#login-form").attr("style","display: block;");
	}

	function kedaftarlogin(){

		$("#loader2").attr("style","display: none;");
		$("#registerlogins-form").attr("style","display: block;");
	}

	function kedaftarlanjutan(){

		$("#loader2").attr("style","display: none;");
		$("#registerlanjutan-form").attr("style","display: block;");
	}


	$('#login-register').on('click', function () {

		$("#loader2").attr("style","display: block;");
		$("#login-form").attr("style","display: none;");
		setTimeout(KeInfoDasar, 1000);

	});

	$('#registerdasar-kembali').on('click', function () {

		$("#loader2").attr("style","display: block;");
		$("#registerdasar-form").attr("style","display: none;");
		setTimeout(kelogin, 1000);

	});

	$('#registerdasar-submit').on('click', function () {

		$("#loader2").attr("style","display: block;");
		$("#registerdasar-form").attr("style","display: none;");

		setTimeout(kedaftarlogin, 1000);
	});

	$('#registerlogins-kembali').on('click', function () {

		$("#loader2").attr("style","display: block;");
		$("#registerlogins-form").attr("style","display: none;");

		setTimeout(KeInfoDasar, 1000);

	});

	$('#registerlogins-submit').on('click', function () {

		$("#loader2").attr("style","display: block;");
		$("#registerlogins-form").attr("style","display: none;");

		var news = $('#password_new').val();
		var confirms = $('#password_confirm').val();
		var limit = confirms.length;

		if (limit <= 6){

			swal("Harus lebih Dari 7 Karakter", {
	                icon: "error",
	                buttons: false,
	                timer: 2000,
	            });

			$("#loader2").attr("style","display: none;");
			$("#registerlogins-form").attr("style","display: block;");

		} else {

			if (news == confirms){

				setTimeout(kedaftarlanjutan, 1000);

			} else {

				swal("Password Confirm Harus Sama!", {
	                icon: "error",
	                buttons: false,
	                timer: 2000,
	            });

	            $("#loader2").attr("style","display: none;");
				$("#registerlogins-form").attr("style","display: block;");

			}

		}

		
	});

	$('#registerlanjutan-kembali').on('click', function () {

		$("#loader2").attr("style","display: block;");
		$("#registerlanjutan-form").attr("style","display: none;");

		setTimeout(kedaftarlogin, 1000);

	});

	$('#registerlanjutan-submit').on('click', function () {

		$("#loader2").attr("style","display: block;");
		$("#registerlanjutan-form").attr("style","display: none;");

		var empty = false;
        $('input.userbaru, select.userbaru').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        if (empty) { 
            swal({
	            text: "Harap Isi Semua Isian!",
	            icon: "error",
	            buttons: false,
	            timer: 2000,
	        });

	        $("#loader2").attr("style","display: none;");
	        $("#registerlanjutan-form").attr("style","display: block;");

	    } else {


			$.ajax({
	            type: 'POST',
	            url: "{{ route('StoreUsers') }}",
	            data: {
	                '_token': $('input[name=_token]').val(),
	                'nama_depan': $('#nama_depan').val(),
	                'nama_belakang': $('#nama_belakang').val(),
	                'email': $('#email').val(),
	                'alamat': $('#alamat').val(),
	                'no_hp': $('#no_hp').val(),
	                'perusahaan': $('#perusahaan').val(),
	                'jabatan': $('#jabatan').val(),
	                'branch': $('#branch').val(),
	                'username': $('#username').val(),
	                'password_confirm': $('#password_confirm').val()
	                },

	            success: function(data) {

	            	swal({
	                    title: "Berhasil",
	                    text: "Registrasi Anda Berhasil!",
	                    icon: "success",
	                    buttons: false,
	                    timer: 2000,
	                });

	                $("#loader2").attr("style","display: none;");
	        		$("#login-form").attr("style","display: block;");

	            }

	        });

		}

		
	});


</script>