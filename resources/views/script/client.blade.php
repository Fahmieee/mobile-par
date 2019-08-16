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
            	$('#nopol').html('<h6>'+data.no_polisi+'</h6>');
            	$('#model').html('<h6>'+data.model+' - '+data.varian+'</h6>');
            	$('#date').html('<h6>'+data.stnk+'</h6>');
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
</script>