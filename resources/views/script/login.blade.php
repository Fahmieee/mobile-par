<script type="text/javascript">


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
                        setTimeout(function(){ window.location.href='driver'; }, 1500);

                    } else if (data.role == 3 && data.status == 'success'){

                        swal("Sign In Success!", {
                            icon: "success",
                            buttons: false,
                            timer: 2000,
                        });
                        setTimeout(function(){ window.location.href='client'; }, 1500);

                    } else if (data.role == 5 && data.status == 'success'){

                    swal("Sign In Success!", {
                        icon: "success",
                        buttons: false,
                        timer: 2000,
                    });
                    setTimeout(function(){ window.location.href='korlap'; }, 1500);

                    } else if (data.status == 'error'){

                        swal("Username or Password Wrong!", {
                        icon: "error",
                        buttons: false,
                        timer: 2000,
                    });

                    $("#loader2").attr("style","display: none;");
                    $("#login-form").attr("style","display: block;");

                    }

                }
            });

	    }
	});

	function kedaftar(){

		$("#loader2").attr("style","display: none;");
		$("#register-form").attr("style","display: block;");
	}

	function kelogin(){

		$("#loader2").attr("style","display: none;");
		$("#login-form").attr("style","display: block;");

	}

	function kedaftar2(){

		$("#loader2").attr("style","display: none;");
		$("#register2-form").attr("style","display: block;");

	}

	function kedaftarDriver(){

		$("#loader2").attr("style","display: none;");
		$("#register4-form").attr("style","display: block;");

	}

	function kedaftarKorlap(){

		$("#loader2").attr("style","display: none;");
		$("#register5-form").attr("style","display: block;");

	}

	function kembali2(){

		$("#loader2").attr("style","display: none;");
		$("#register-form").attr("style","display: block;");

	}

	function kedaftarUsers(){

		$("#loader2").attr("style","display: none;");
		$("#register3-form").attr("style","display: block;");

	}

	function kembali3(){

		$("#loader2").attr("style","display: none;");
		$("#register2-form").attr("style","display: block;");

	}

	$('#login-register').on('click', function () {

		$("#loader2").attr("style","display: block;");
		$("#login-form").attr("style","display: none;");
		setTimeout(kedaftar, 2000);

	});

	$('#register-kembali').on('click', function () {

		$("#loader2").attr("style","display: block;");
		$("#register-form").attr("style","display: none;");
		setTimeout(kelogin, 2000);

	});

	$('#register-submit').on('click', function () {
		var empty = false;
		$('input.no_token').each(function() {
                if ($(this).val() == '') {
                    empty = true;
                }
            });
            if (empty) { 
                swal({
                    title: "Error!",
                    text: "Isian harus terisi semua!",
                    icon: "error",
                    buttons: false,
                    timer: 2000,
                });
            
            } else {

            	$("#loader2").attr("style","display: block;");
				$("#register-form").attr("style","display: none;");
				$('userx').val($(this).val());
            	setTimeout(kedaftar2, 2000);
            }
	});

	$('#register2-kembali').on('click', function () {

		$("#loader2").attr("style","display: block;");
		$("#register2-form").attr("style","display: none;");
		setTimeout(kembali2, 2000);

	});

	$('#register2-submit').on('click', function () {

		$("#loader2").attr("style","display: block;");
		$("#register2-form").attr("style","display: none;");

		setTimeout(kedaftarUsers, 2000);
	});

	$('#register3-kembali').on('click', function () {

		$("#loader2").attr("style","display: block;");
		$("#register3-form").attr("style","display: none;");

		setTimeout(kembali3, 2000);

	});


	$('#register3-submit').on('click', function () {

		swal({
            title: "Sukses!",
            text: "Pendaftaran Berhasil!",
            icon: "success",
            buttons: false,
            timer: 2000,
        });

        $("#loader2").attr("style","display: block;");
		$("#register3-form").attr("style","display: none;");

		setTimeout(function(){ window.location.href = 'login'; }, 2000);
	});


</script>