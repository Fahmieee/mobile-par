<script type="text/javascript">
	$(function() {

		$.ajax({
            type: 'POST',
            url: "{{ route('GetApproveClient') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
            },

            success: function (data) {

            	var content_data="";
	            var no = -1;

            	$.each(data, function() {

	                no++;
	                var date = data[no]['date'];
	                var first = data[no]['first_name']; 
	                var last = data[no]['last_name'];
	                var client_id = data[no]['client_id'];

	                var satu = date.replace('-','');
	                var ngetrim = satu.replace('-','');
	                

	                content_data += "<div class='alert alert-default' role='alert'>";
                  	content_data += "<table width='100%''>";
                    content_data += "<tr>";
                    content_data += "<td align='left'><h5 class='text-white'>Tanggal : "+date+"</h5>";
                    content_data += "<h6 class='text-white'>Driver : "+first+" "+last+"</h6></td>";
                    content_data += "<td align='right' class='btn_"+ngetrim+"'><button type='button' class='btn btn-sm btn-success' onclick='Lihat("+ngetrim+","+client_id+")'>Lihat</button></td>";
                    content_data += "</tr>";
                  	content_data += "</table>";
                  	content_data += "<div id='detail_"+ngetrim+"'></div>";
                  	content_data += "</div>";
                  	

	            });

	            $('.muncul_data').html(content_data);

            }

        });

	});

	function Lihat(rnum,client){

		$('.btn_'+rnum).html('<button type="button" class="btn btn-sm btn-secondary" onclick="Tutup('+rnum+','+client+')">Tutup</button>');

		$.ajax({
            type: 'POST',
            url: "{{ route('GetApproveClientDetail') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'date': rnum,
                'client_id': client
            },

            success: function (data) {

            	var satu = data.clockin_time.replace(':','');
	            var clockins = satu.replace(':','');

	            var dua = data.clockout_time.replace(':','');
	            var clockouts = dua.replace(':','');

            	var content_data ="";

            	content_data += "<hr>";
                content_data += "<div class='alert alert-secondary' role='alert'>";
                content_data += "<table width='100%'>";
                content_data += "<tr>";
                content_data += "<td align='left'><h6>Mulai Bekerja :</h6></td>";
                content_data += "<td align='right' rowspan='2' class='button_"+data.clockin_id+"'><button type='button' class='btn btn-sm btn-success' onclick='Approve("+data.clockin_id+", "+clockins+")'>Approve</button></td>";
                content_data += "</tr>";
                content_data += "<tr>";
                content_data += "<td align='left'><strong><h3>"+data.clockin_time+"</h3></strong></td>";
                content_data += "</tr>";
                content_data += "</table>";
                content_data += "</div>";

                if (data.clockout_id == ''){

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
	                content_data += "<td align='right' rowspan='2' class='button_"+data.clockout_id+"'><button type='button' class='btn btn-sm btn-success' onclick='Approve("+data.clockout_id+", "+clockouts+")'>Approve</button></td>";
	                content_data += "</tr>";
	                content_data += "<tr>";
	                content_data += "<td align='left'><strong><h3>"+data.clockout_time+"</h3></strong></td>";
	                content_data += "</tr>";
	                content_data += "</table>";
	                content_data += "</div>";

                }
                
                $('#detail_'+rnum).html(content_data);

                if (data.clockin_status == 'APPROVED'){
            		$('.button_'+data.clockin_id+'').html("<button type='button' class='btn btn-sm btn-primary' disabled>Sudah Di Approve</button>");
            	} 

            	if (data.clockout_status == 'APPROVED'){
            		$('.button_'+data.clockout_id+'').html("<button type='button' class='btn btn-sm btn-primary' disabled>Sudah Di Approve</button>");
            	} 

            }

        });

	}

	function Tutup(rnum,client){

		$('#detail_'+rnum).html('');

		$('.btn_'+rnum).html('<button type="button" class="btn btn-sm btn-success" onclick="Lihat('+rnum+','+client+')"">Lihat</button>');

	}

	function Approve(id,time){

		$('#notif_approve').modal('show');

		var waktu = time.toString();
		var panjang = waktu.length;

		var detik = waktu.substr(-2);
		var menit = waktu.substr(-4,2);

		if(panjang == 5){
			var jam = waktu.substr(-5,1);
		} else {
			var jam = waktu.substr(-6,2);
		}
		
		$('#id').val(id);
		$('.waktu').html('<h1><b>'+jam+':'+menit+':'+detik+'</b></h1>');
		$('#times').val(jam+':'+menit+':'+detik);

	}

	$('#yakin_approve').on('click', function () {

		$.ajax({
            type: 'POST',
            url: "{{ route('ClientApprove') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('#id').val(),
                'waktu': $('#times').val()
            },

            success: function (data) {

            	swal("Approve Anda Berhasil!", {
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

		setTimeout(function(){ window.location.href = 'client'; }, 10);

	});

</script>