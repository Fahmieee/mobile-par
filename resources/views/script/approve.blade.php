<script type="text/javascript">

	$(function() {

		$.ajax({
            type: 'POST',
            url: "{{ route('GetApprove') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
            },

            success: function (data) {

            	var content_data="";
	            var no = -1;

	            if (data.length == '0'){

	            	content_data += "<div class='alert alert-default' role='alert'>";
	                content_data += "<table border='0' width='100%'>";
	                content_data += "<tr>";
	                content_data += "<td align='center'>Tidak Ada Data yang di Approve";
	                content_data += "</td>";
	                content_data += "</tr>";
	                content_data += "</table>";
	                content_data += "</div>";

	                $('#muncul_approve').html(content_data);

	            } else {

	            $.each(data, function() {

	            	no++;
	            	var alert ='';
	                var name = data[no]['first_name'];
	                var last_name = data[no]['last_name'];
	                var date = data[no]['created_at']; 
	                var no_police = data[no]['no_police'];
	                var id = data[no]['id'];
	                var level = data[no]['level'];

	                if (level == 'HIGH'){
	                	alert = 'danger';
	                } else if (level == 'MEDIUM'){
	                	alert = 'warning';
	                } else {
	                	alert = 'primary';
	                }


	            	content_data += "<div class='alert alert-"+alert+"' role='alert'>";
	                content_data += "<table border='0' width='100%'>";
	                content_data += "<tr>";
	                content_data += "<td align='left'>";
	                content_data += "<span class='alert-inner--text'> <h5 class='text-muted-white'>"+name+" "+last_name+"</h5></span>";
	                content_data += "<span class='badge badge-default'>"+date+"</span> <span class='badge badge-default'>"+no_police+"</span></td>";
	                content_data += "<td width='10px'></td>";
	                content_data += "<td align='right' id='lihat_"+id+"'>";
	                content_data += "<button type='button' onclick='Detail("+id+")' class='btn btn-sm btn-success'>Lihat</button></td>";
	                content_data += "</tr>";
	                content_data += "</table>";
	                content_data += "<div id='munculdetail_"+id+"'></div>";
	                content_data += "</div>";

	            });

	            $('#muncul_approve').html(content_data);

	        	}

            }

        });
	});

	function Detail(rnum){

		$.ajax({
            type: 'POST',
            url: "{{ route('GetDetail') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': rnum
            },

            success: function (data) {

            	var content_data="";

            	var content_button="";

            	content_data += "<hr>";
                content_data += "<div class='alert alert-default' role='alert'>";
                content_data += "<table border='0' width='100%'>";
                content_data += "<tr>";
                content_data += "<td align='left'>";
                content_data += "<span class='alert-inner--text'> <h4 class='text-muted-white'>"+data.detail_name+" - "+data.parameter+"</h4></span>";
                content_data += "<h6 class='text-muted-white'>Bagian : "+data.type+"</h6>";
                content_data += "</td>";
                content_data += "<td width='10px'></td>";
                content_data += "<td align='right'>";
                content_data += "<button type='button' onclick='Approve("+data.id+")' class='btn btn-sm btn-success'>Approve</button>";
                content_data += "</td>";
                content_data += "</tr>";
                content_data += "</table>";
                content_data += "</div>";

               $('#munculdetail_'+rnum).html(content_data);


               content_button += "<button type='button' onclick='Tutup("+data.id+")' class='btn btn-sm btn-secondary'>Tutup</button>";

               $('#lihat_'+rnum).html(content_button);

            }

        });

	}

	function Tutup(rnum){

		$('#munculdetail_'+rnum).html('');

		var content_button="";

		content_button += "<button type='button' onclick='Detail("+rnum+")' class='btn btn-sm btn-success'>Lihat</button>";

        $('#lihat_'+rnum).html(content_button);

	}


	function Approve(rnum){

		$('#notif_approve').modal('show');
		
		$('#id').val(rnum);

	}

	$('#yakin_approve').on('click', function () {

		$.ajax({
            type: 'POST',
            url: "{{ route('Approved') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('#id').val(),
                'user_id': $('#created_by').val()
            },

            success: function (data) {

            	swal({
                    title: "Berhasil",
                    text: "Approve Anda Berhasil!",
                    icon: "success",
                    buttons: false,
                    timer: 2000,
                });

                setTimeout(function(){ window.location.href = 'approve'; }, 1500);

            }

        });


	});

	$('#back').on('click', function () {

		setTimeout(function(){ window.location.href = 'korlap'; }, 10);

	});
</script>