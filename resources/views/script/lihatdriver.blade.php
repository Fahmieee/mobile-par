<script type="text/javascript">

$(function() {

	$.ajax({
        type: 'POST',
        url: "{{ route('LihatNilaiDriver') }}",
        data: {
            '_token': $('input[name=_token]').val(),
            'user_id': $('#created_by').val()
        },

        success: function (data) {

        	var content_data="";
            var no = -1;
            $.each(data, function() {



            });
        }
    });
});
	
$('#back').on('click', function () {

	setTimeout(function(){ window.location.href = 'home'; }, 10);

});

</script>