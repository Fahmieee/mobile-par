<script type="text/javascript">

	$(function() {

		$.ajax({
            type: 'POST',
            url: "{{ route('GetProfile') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
            },

            success: function (data) {

            	$('#nama').html('<b>'+data.first_name+'</b>');
            	$('.email').html(data.email);
            	$('.seluler').html(data.phone);

            }
        });

	});

	$('#approve').on('click', function () {

		setTimeout(function(){ window.location.href = 'approve'; }, 10);

	});

</script>