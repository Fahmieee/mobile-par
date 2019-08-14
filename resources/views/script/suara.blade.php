<script type="text/javascript">

	$('#back').on('click', function () {

		setTimeout(function(){ window.location.href = 'client'; }, 10);

	});

	$('#batal_submit').on('click', function () {

		$('#batal_suara').modal('show');

	});

	$('#batal_yakin').on('click', function () {

		setTimeout(function(){ window.location.href = 'client'; }, 10);

	});

	$('#simpan_suara').on('click', function () {

		$('#submit_suara').modal('show');

	});

	$('#submit_yakin').on('click', function () {



		var empty = false;
        $('textarea.keluhan').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        if (empty) {

        	swal("Isian Harus Diisi Semua!", {
                icon: "warning",
                buttons: false,
                timer: 2000,
            });

        } else {

			$.ajax({
	            type: 'POST',
	            url: "{{ route('SubmitSuara') }}",
	            data: {
	                '_token': $('input[name=_token]').val(),
	                'user_id': $('#created_by').val(),
	                'type': $('#types').val(),
	                'jenis_id': $('#jenis').val(),
	                'suara': $('textarea#suara').val()
	                },
	            success: function(data) {

	            	swal("Keluhan/Saran Anda Sudah Terkirim!", {
	                    icon: "success",
	                    buttons: false,
	                    timer: 2000,
	                });
	                setTimeout(function(){ window.location.href='client'; }, 1500);
	            }

	        });

		}

	});

</script>
</script>