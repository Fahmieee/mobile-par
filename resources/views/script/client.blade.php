<script type="text/javascript">

	$(function() {

		$.ajax({
            type: 'POST',
            url: "{{ route('GetDataClient') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
                },
            success: function(data) {

            	$('#nama_users').html('<b>'+data.nama_user+'</b>');
            	$('#nama_drivers').html('<b>'+data.nama_driver+'</b>');
            	$('#nopol').html('<b>'+data.no_polisi+'</b>');
            	$('#model').html('<h6>'+data.model+' - '+data.varian+'</h6>');
            	$('#date').html('<h6>'+data.stnk+'</h6>');
                $('#tahun').html('<h6>'+data.tahun+'</h6>');
            }
        });
	});

	$('#suara').on('click', function () {

		setTimeout(function(){ window.location.href = 'suara'; }, 10);

	});

	$('#pengemudi').on('click', function () {

		setTimeout(function(){ window.location.href = 'nilaidriver'; }, 10);

	});

	$('#kendaraan').on('click', function () {

		setTimeout(function(){ window.location.href = 'nilaikendaraan'; }, 10);

	});

    $('#approve').on('click', function () {

        setTimeout(function(){ window.location.href = 'client-approve'; }, 10);

    });
</script>