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

	$('#types').on('change', function () {

		var type = $(this).val();

		$.ajax({
            type: 'POST',
            url: "{{ route('ChangeTypes') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'type': type
                },
            success: function(data) {

            	var content_datax="";
	            var no = -1;

	            if(data == '-'){

	            	content_datax += "<option>-</option>";

	            } else {

	            	$.each(data, function() {

		                no++;
		                var type = data[no]['type'];
		                var id = data[no]['id'];

		                content_datax += "<option value='"+id+"'>"+type+"</option>";

		            });

	            }

	            $('#jenis').html(content_datax);


            }

        });

	});

</script>
</script>