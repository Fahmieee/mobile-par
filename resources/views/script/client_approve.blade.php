<script type="text/javascript">

	function Lihat(rnum){

		$('.btn_'+rnum).html('<button type="button" class="btn btn-sm btn-secondary" onclick="Tutup('+rnum+')">Tutup</button>');
		$.ajax({
            type: 'POST',
            url: "{{ route('GetApproveClientDetail') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'clocks_id': rnum
            },

            success: function (data) {

            	var content_data ="";
            	var timeclockin = "";
            	var timeclockout= "";

            	if (data.clockin_actual == null){
            		timeclockin = data.clockin_time;
            	} else {
            		timeclockin = data.clockin_actual;
            	}

            	if (data.clockout_actual == null){
            		timeclockout = data.clockout_time;
            	} else {
            		timeclockout = data.clockout_actual;
            	}


            	content_data += "<hr>";
                content_data += "<div class='alert alert-secondary' role='alert'>";
                content_data += "<table width='100%'>";
                content_data += "<tr>";
                content_data += "<td align='left'><h6>Mulai Bekerja :</h6></td>";
                content_data += "<td align='right' rowspan='2' class='button_"+data.id+"_0'><button type='button' class='btn btn-sm btn-success' onclick='Approve("+data.id+", 0)'>Approve</button></td>";
                content_data += "</tr>";
                content_data += "<tr>";
                content_data += "<td align='left'><strong><h3>"+timeclockin+"</h3></strong></td>";
                content_data += "</tr>";
                content_data += "</table>";
                content_data += "</div>";

                if (data.clockout_date == null){

                	content_data += "<div class='alert alert-secondary' role='alert'>";
	                content_data += "<table width='100%'>";
	                content_data += "<tr>";
	                content_data += "<td align='left'><h6>Selesai Bekerja :</h6></td>";
	                content_data += "<td align='right' rowspan='2'><button type='button' class='btn btn-sm btn-warning' disabled>Masih Bekerja</button></td>";
	                content_data += "</tr>";
	                content_data += "<tr>";
	                content_data += "<td align='left'><strong><h3>-</h3></strong></td>";
	                content_data += "</tr>";
	                content_data += "</table>";
	                content_data += "</div>";

                } else {

                	content_data += "<div class='alert alert-secondary' role='alert'>";
	                content_data += "<table width='100%'>";
	                content_data += "<tr>";
	                content_data += "<td align='left'><h6>Selesai Bekerja :</h6></td>";
	                content_data += "<td align='right' rowspan='2' class='button_"+data.id+"_1'><button type='button' class='btn btn-sm btn-success' onclick='Approve("+data.id+", 1)'>Approve</button></td>";
	                content_data += "</tr>";
	                content_data += "<tr>";
	                content_data += "<td align='left'><strong><h3>"+timeclockout+"</h3></strong></td>";
	                content_data += "</tr>";
	                content_data += "</table>";
	                content_data += "</div>";

                }
                
                $('#detail_'+rnum).html(content_data);

                if (data.clockin_status == 'APPROVED'){
            		$('.button_'+data.id+'_0').html("<button type='button' class='btn btn-sm btn-primary' disabled>Sudah Di Approve</button>");
            	} 

            	if (data.clockout_status == 'APPROVED'){
            		$('.button_'+data.id+'_1').html("<button type='button' class='btn btn-sm btn-primary' disabled>Sudah Di Approve</button>");
            	} 

            }

        });

	}

	function Tutup(rnum){

		$('#detail_'+rnum).html('');

        $('.loading').attr('style','display: block');

		$('.btn_'+rnum).html('<button type="button" class="btn btn-sm btn-success" onclick="Lihat('+rnum+')"">Lihat</button>');

        $('.loading').attr('style','display: none');

	}

	function Approve(id,type){

		$('#notif_approve').modal('show');

		$.ajax({
            type: 'POST',
            url: "{{ route('GetApproveClientDetail') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'clocks_id': id
            },

            success: function (data) {

            	if (type == '0'){

            		$('.waktu').html('<h1><b>'+data.clockin_time+'</b></h1>');
            		$('#times').val(data.clockin_time);

            	} else {

            		$('.waktu').html('<h1><b>'+data.clockout_time+'</b></h1>');
            		$('#times').val(data.clockout_time);
            	}

            }

        });
		
		$('#id').val(id);
		$('#type').val(type);

	}

	$('#yakin_approve').on('click', function () {

		$.ajax({
            type: 'POST',
            url: "{{ route('ClientApprove') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('#id').val(),
                'waktu': $('#times').val(),
                'type': $('#type').val(),
            },

            success: function (data) {

            	swal({
                    title: "Berhasil",
                    text: "Approve Anda Berhasil!",
                    icon: "success",
                    buttons: false,
                    timer: 2000,
                });

                setTimeout(function(){ window.location.href = 'client-approve'; }, 1500);

            }
        });
	});

	function ganti(){

		var waktu = $('#times').val();

		$('.ganti_button').html('<button type="button" onclick="oke()" class="btn btn-sm btn-primary">OK</button>');

		$('.waktu').html('<input type="text" value="'+waktu+'" style="font-size: 30px;text-align: center;" class="form-control actual">');
	}

	function oke(){

		var actual = $('.actual').val();

		$('.waktu').html('<h1><b>'+actual+'</b></h1>');
		$('#times').val(actual);

		$('.ganti_button').html('<button type="button" onclick="ganti()" class="btn btn-sm btn-success">Ganti</button>');

	}

	$('#back').on('click', function () {

		setTimeout(function(){ window.location.href = 'home'; }, 10);

	});

</script>