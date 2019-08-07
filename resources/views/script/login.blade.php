<script type="text/javascript">

	function LoginUser()
    {

		var username = $("input[name=username]").val();
        var password = $("input[name=password]").val();
        var token    = $("input[name=_token]").val();


        var data = {
            _token:token,
            username: username,
            password: password
        };

        var empty = false;
        $('input.input100').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        if (empty) { 
            swal({
	            text: "Isi Username dan Password Anda!",
	            icon: "error",
	            buttons: false,
	            timer: 2000,
	        });

	    } else {

	    	// Ajax Post 
            $.ajax({
                type: "post",
                url: "{{ route('login_submit') }}",
                data: data,
                cache: false,
                success: function (data)
                {


                }
            });


	    }
	}



</script>