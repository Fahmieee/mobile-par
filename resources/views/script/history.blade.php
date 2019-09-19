<script type="text/javascript">

	$(function() {

		$.ajax({
            type: 'POST',
            url: "{{ route('GetdataHistory') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
                },
            success: function(data) {

            	var content_data="";
	            var no = -1;

	            if (data.length == "0"){

	            	content_data += "<div class='row'>";
                	content_data += "<div class='col'>";
                  	content_data += "<div class='card shadow'>";
                    content_data += "<div class='card-header bg-white' align='center'>";
                    content_data += "<h6>Anda Belum Memiliki Riwayat Perjalanan</h6>";
                    content_data += "</div>";
                    content_data += "</div>";
                    content_data += "</div>";
                    content_data += "</div>";

	            } else {

		            $.each(data, function() {

		                no++;
		                var date = data[no]['clockin_date'];
		                var id = data[no]['id']; 

		                content_data += "<div class='row' onclick='DetailHistory("+id+")'>";
	                	content_data += "<div class='col'>";
	                  	content_data += "<div class='card shadow'>";
	                    content_data += "<div class='card-header bg-white'>";
		                content_data += "<table border='0' align='center' width='100%''>";
	                    content_data += "<tr>";
	                    content_data += "<td width='5%'>";
	                    content_data += "<i class='fa fa-address-book' style='color: #01497f'></i></td>";
	                    content_data += "<td width='30%' style='padding-top: 5px'><h6>"+date+"</h6></td>";
	                    content_data += "<td width='5%'>";
	                    content_data += "<i class='fa fa-car' style='color: #01497f'></i></td>";
	                    content_data += "<td width='30%' id='waktu_"+id+"' style='padding-top: 5px'><h6>6 Jam 5 Menit</h6></td>";
	                    content_data += "<td width='5%'>";
	                    content_data += "<i class='fa fa-road' style='color: #01497f'></i></td>";
	                    content_data += "<td width='20%' id='kilometer_"+id+"' style='padding-top: 5px'><h6>9011292</h6></td>";
	                    content_data += "</tr>";
	                    content_data += "</table>";
	                    content_data += "</div>";
	                    content_data += "<input type='hidden' value='0' id='val_"+id+"'>";
	                    content_data += "<div class='card-body bg-blue-par' style='display: none;' id='details_"+id+"'>";
	                    content_data += "</div>";
	                    content_data += "</div>";
	                    content_data += "</div>";
	                    content_data += "</div><hr>";

	                    $.ajax({
				            type: 'POST',
				            url: "{{ route('DetailRiwayatHistory') }}",
				            data: {
				                '_token': $('input[name=_token]').val(),
				                'user_id': $('#created_by').val(),
				                'id': id
				                },
				            success: function(data) {

				            	$('#waktu_'+id+'').html('<h6>'+data.total_waktu+'</h6>');
				            	$('#kilometer_'+id+'').html('<h6>'+data.total_jarak+' Km</h6>');

				            }
				        });


		            });
		        }

            $('.muncul_data').html(content_data);

            }
        });   	

	});

	function DetailHistory(id){

		var val = $('#val_'+id+'').val();

		if (val == 0){

			$('#details_'+id+'').attr('style','display: block;');

			$('#val_'+id+'').val(1);

			$.ajax({
	            type: 'POST',
	            url: "{{ route('DetailRiwayatHistory') }}",
	            data: {
	                '_token': $('input[name=_token]').val(),
	                'user_id': $('#created_by').val(),
	                'id': id
	                },
	            success: function(data) {

	            	var content_datas="";
	            	var clockins = "";
	            	var clockouts = "";

	            	if (data.clockin_actual == null){

	            		clockins = data.clockin_time;

	            	}else {

	            		clockins = data.clockin_actual;

	            	}

	            	if (data.clockout_actual == null){

	            		clockouts = data.clockout_time;

	            	}else {

	            		clockouts = data.clockout_actual;

	            	}

	            	content_datas += "<table border='0' align='center' width='100%'>";
		            content_datas += "<tr>";
		            content_datas += "<td><h6 class='text-white'>KM Awal</h6></td>";
		            content_datas += "<td><h6 class='text-white'> : </h6></td>";
		            content_datas += "<td><h6 class='text-white'>"+data.clockin_jarak+"</h6></td>";

		            content_datas += "<td width='10%'></td>";

		            content_datas += "<td><h6 class='text-white'>KM Akhir</h6></td>";
		            content_datas += "<td><h6 class='text-white'> : </h6></td>";
		            content_datas += "<td><h6 class='text-white'>"+data.clockout_jarak+"</h6></td>";
		            content_datas += "</tr>";

		            content_datas += "<tr>";
		            content_datas += "<td><h6 class='text-white'>In Date</h6></td>";
		            content_datas += "<td><h6 class='text-white'> : </h6></td>";
		            content_datas += "<td><h6 class='text-white'>"+data.clockin_date+"</h6></td>";

		            content_datas += "<td width='10%'></td>";

		            content_datas += "<td><h6 class='text-white'>Out Date</h6></td>";
		            content_datas += "<td><h6 class='text-white'> : </h6></td>";
		            content_datas += "<td><h6 class='text-white'>"+data.clockout_date+"</h6></td>";
		            content_datas += "</tr>";

		            content_datas += "<tr>";
		            content_datas += "<td><h6 class='text-white'>Clock-In</h6></td>";
		            content_datas += "<td><h6 class='text-white'> : </h6></td>";
		            content_datas += "<td><h6 class='text-white'>"+clockins+"</h6></td>";

		            content_datas += "<td width='10%'></td>";

		            content_datas += "<td><h6 class='text-white'>Clock-Out</h6></td>";
		            content_datas += "<td><h6 class='text-white'> : </h6></td>";
		            content_datas += "<td><h6 class='text-white'>"+clockouts+"</h6></td>";
		            content_datas += "</tr>";

		            content_datas += "<tr>";
		            content_datas += "<td><h6 class='text-white'>Trip Check</h6></td>";
		            content_datas += "<td><h6 class='text-white'> : </h6></td>";
		            content_datas += "<td><h6 class='text-white'>"+data.pretripcheck+"</h6></td>";

		            content_datas += "<td width='10%'></td>";

		            content_datas += "<td><h6 class='text-white'>DCU</h6></td>";
		            content_datas += "<td><h6 class='text-white'> : </h6></td>";
		            content_datas += "<td><h6 class='text-white'>"+data.dcu+"</h6></td>";
		            content_datas += "</tr>";
		            content_datas += "</table>";

		           $('#details_'+id+'').html(content_datas);

	            }

	        });

		} else {

			$('#details_'+id+'').attr('style','display: none;');
			$('#val_'+id+'').val(0);

		}
		
	}

	$('#back').on('click', function () {

		setTimeout(function(){ window.location.href = 'driver'; }, 10);

	});

</script>