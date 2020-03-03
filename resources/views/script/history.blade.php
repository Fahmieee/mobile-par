<script type="text/javascript">

	var table = "";
    $(function() {
        table = $('.datatables').DataTable({
        	dom: 't',
            pageLength: 30,
            processing: true,
            serverSide: true,
            columnDefs: [
                {
                    "targets": [ 0 ],
                    "visible": false
                }
            ],
            order: [[ 0, 'desc' ]],
            ajax:{
                 url: "{{ route('gethistory') }}",
                 dataType: "json",
                 type: "GET",
            },
            columns: [
                { data: 'clockin_date', name: 'clockin_date' },
                { 
                    render: function ( data, type, row ) {

                    	var jumlahkm = parseInt(row.clockout_km) - parseInt(row.clockin_km);

                    	const today = row.clockin_date+' '+row.clockin_time;
						const endDate = row.clockout_date+' '+row.clockout_time;
						var date1 = new Date(today);
						var date2 = new Date(endDate);

						var diffInSeconds = Math.abs(date2 - date1) / 1000;

						var hours = Math.floor(diffInSeconds / 60 / 60 % 24);
						var minutes = Math.floor(diffInSeconds / 60 % 60);

                        return "<div class='row' onclick='DetailHistory("+row.id+")'><div class='col'><div class='card shadow'><div class='card-header bg-white'><table border='1' align='center' bordercolor='#e9ecef' width='100%'><tr><td width='5%' align='left' rowspan='2'><i class='fa fa-calendar' style='color: #01497f'></i></td><td width='30%' style='padding-top: 8px; padding-left: 4px;' align='left' rowspan='2'><h6>"+row.date+"</h6></td><td width='5%' align='left'><i class='fa fa-car' style='color: #01497f'></i></td><td width='30%' style='padding-top: 8px; padding-left: 4px;' align='left'><h6>"+hours+" Jam "+minutes+" Menit</h6></td></tr><tr><td width='5%' align='left'><i class='fa fa-road' style='color: #01497f'></i></td><td width='30%' style='padding-top: 8px; padding-left: 4px;' align='left'><h6>"+jumlahkm+" Km</h6></td></tr></table></div><input type='hidden' value='0' id='val_"+row.id+"'><div class='card-body' style='display: none;' id='details_"+row.id+"'></div></div></div></div>";
                    }
                }
            ]
        });

        $('#cari').keyup(function(){
            table.search($(this).val()).draw() ;
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

	            	content_datas += "<table align='center' width='100%'>";
	            	content_datas += "<tr class='border-bottom'>";
	            	content_datas += "<td style='padding-left: 0px;' colspan='7'><b>Detail Perjalanan Anda</b></td>";
	            	content_datas += "</tr>";

		            content_datas += "<tr class='border-bottom'>";
		            content_datas += "<td style='padding-left: 0px;'><h6>KM In</h6></td>";
		            content_datas += "<td style='padding-left: 0px;'><h6>:</h6></td>";
		            content_datas += "<td style='padding-left: 0px;'><h6>"+data.clockin_jarak+"</h6></td>";

		            content_datas += "<td class='border_left' style='padding-left: 0px; padding-right: 2px;' width='2%'>&nbsp;</td>";

		            content_datas += "<td style='padding-left: 0px;'><h6>KM Out</h6></td>";
		            content_datas += "<td style='padding-left: 0px;'><h6> : </h6></td>";
		            content_datas += "<td style='padding-left: 0px;'><h6>"+data.clockout_jarak+"</h6></td>";
		            content_datas += "</tr>";

		            content_datas += "<tr class='border-bottom'>";
		            content_datas += "<td style='padding-left: 0px;'><h6>In Date</h6></td>";
		            content_datas += "<td style='padding-left: 0px;'><h6>:</h6></td>";
		            content_datas += "<td style='padding-left: 0px;'><h6>"+data.clockin_date+"</h6></td>";

		            content_datas += "<td class='border_left' style='padding-left: 0px; padding-right: 2px;' width='2%'>&nbsp;</td>";

		            content_datas += "<td style='padding-left: 0px;'><h6>Out Date</h6></td>";
		            content_datas += "<td style='padding-left: 0px;'><h6> : </h6></td>";
		            content_datas += "<td style='padding-left: 0px;'><h6>"+data.clockout_date+"</h6></td>";
		            content_datas += "</tr>";

		            content_datas += "<tr class='border-bottom'>";
		            content_datas += "<td style='padding-left: 0px;'><h6>In</h6></td>";
		            content_datas += "<td style='padding-left: 0px;'><h6>:</h6></td>";
		            content_datas += "<td style='padding-left: 0px;'><h6>"+clockins+"</h6></td>";

		            content_datas += "<td class='border_left' style='padding-left: 0px; padding-right: 2px;' width='2%'>&nbsp;</td>";

		            content_datas += "<td style='padding-left: 0px;'><h6>Out</h6></td>";
		            content_datas += "<td style='padding-left: 0px;'><h6>:</h6></td>";
		            content_datas += "<td style='padding-left: 0px;'><h6>"+clockouts+"</h6></td>";
		            content_datas += "</tr>";

		            content_datas += "<tr class='border-bottom'>";
		            content_datas += "<td style='padding-left: 0px;'><h6>PTC</h6></td>";
		            content_datas += "<td style='padding-left: 0px;'><h6>:</h6></td>";
		            content_datas += "<td style='padding-left: 0px;'><h6>"+data.pretripcheck+"</h6></td>";

		            content_datas += "<td class='border_left' style='padding-left: 0px; padding-right: 2px;' width='2%'>&nbsp;</td>";

		            content_datas += "<td style='padding-left: 0px;'><h6>DCU</h6></td>";
		            content_datas += "<td style='padding-left: 0px;'><h6>:</h6></td>";
		            content_datas += "<td style='padding-left: 0px;'><h6>"+data.dcu+"</h6></td>";
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

		setTimeout(function(){ window.location.href = 'home'; }, 10);

	});

</script>