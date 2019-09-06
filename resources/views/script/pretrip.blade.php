<script type="text/javascript">

	$(function() {

		$.ajax({
	        url: "{{ route('GetKategoriSubmited') }}",
	        type: "POST",
	        data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val(),
            },
	        success:function(data) {

	        	var no = -1;

	        	var terisi = data.length;
	        	$('#count_terisi').val(terisi);

	        	$.each(data, function() {

	                no++;
	                var id = data[no]['id'];

	                $('.alert_'+id+'').attr('class','alert2 alert_'+id+' alert-success');
	                $('#sudah_'+id+'').html("<img src='./assets/content/img/theme/check_success.png' width='21'>");
	                $('.alert_'+id+'').attr('onclick','');
	            });
	        }

	    });
	});

	function GetModal(id) {

		var content_data = "";

		content_data += "<div class='modal-header'>";
		content_data += "<h4 class='modal-title' id='modal-title-default'>Konfirmasi Pre Trip Check</h4>";
		content_data += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
		content_data += "<span aria-hidden='true'>×</span>";
		content_data += "</button>";
		content_data += "</div>";
          
		content_data += "<div class='modal-body'>";
		content_data += "<h6 class='heading-small text-muted'>Pilih Kategori yang akan di Cek</h6><br>";
        content_data += "<div class='details_"+id+"'></div>";  
              
		content_data += "</div>";            
		content_data += "<div class='modal-footer'>";
		content_data += "<button type='button' onclick='Submit("+id+")' class='btn btn-primary'>Submit</button>";
		content_data += "<button type='button' class='btn btn-danger ml-auto' data-dismiss='modal'>Close</button>"; 
		content_data += "</div>";

		$('.contentnya').html(content_data);


		$.ajax({
	        url: "{{ route('GetPreTripCheck') }}",
	        type: "POST",
	        data: {
                '_token': $('input[name=_token]').val(),
                'checktype_id': id
            },
	        success:function(data) {

	        	var content_datax="";
				var no = -1;

				var type = data[0]['type_name'];

				$('.modal-title').html(type);

	            $.each(data, function() {

	                no++;
	                var name = data[no]['name'];
	                var detail_id = data[no]['id'];
	                var type_name = data[no]['type_name'];


	                content_datax += "<div class='alert2 alertdetail_"+detail_id+" alert-primary' onclick='GetAnswer("+detail_id+")' role='alert'>";
                    content_datax += "<table width='100%'>";
                    content_datax += "<tr>";
                    content_datax += "<td width='10%'><i class='fa fa-car' style='color: #ffffff'></i></td>";
                    content_datax += "<td align='left'><h5 class='text-white'>"+name+"</h5></td>";
                    content_datax += "</tr></table>";
                    content_datax += "<input type='hidden' class='answered' id='value_"+detail_id+"' value='0'><div id=answered_"+detail_id+"></div>";
                    content_datax += "</div>";

	            });

	           $('.details_'+id+'').html(content_datax); 

	        }
	    });

		$('#content-modals').modal('show');

	}

	function GetAnswer(id) {

		$.ajax({
	        url: "{{ route('GetPreTripCheckAnswer') }}",
	        type: "POST",
	        data: {
                '_token': $('input[name=_token]').val(),
                'checkdetail_id': id
            },
	        success:function(data) {

	        	var content_dataw="";
				var no = -1;

	            $.each(data, function() {

	                no++;
	                var parameter = data[no]['parameter'];
	                var answer_id = data[no]['id'];

	                content_dataw += "<hr><div class='alert2 alerts_"+id+" alert-secondary' id='jawaban_"+answer_id+"' onclick='PilihAnswer("+answer_id+","+id+")' role='alert' align='center'>";
	                content_dataw += "<h5>"+parameter+"</h5>";
	                content_dataw += "</div>";

	            });

	            $('#answered_'+id).html(content_dataw);

	        }

	    });

	    $('.alertdetail_'+id).attr('onclick','');

	}

	function PilihAnswer(answer_id,id) {

		$('.alerts_'+id).attr('class', 'alert2 alerts_'+id+' alert-secondary');

		$('#jawaban_'+answer_id).attr('class', 'alert2 alerts_'+id+' alert-success');

		$('#value_'+id).val(answer_id);
	}


	function Submit(id) {

		var empty = false;
		$('.answered').each(function() {
        if ($(this).val() == '0') {
	            empty = true;
	        }
	    });

	    if (empty) {

	    	swal("Isi Semua Kategori yang Tersedia!", {
                icon: "error",
                buttons: false,
                timer: 2000,
            });

	    } else {

			var checkanswer_id = [];

	        $('.answered').each(function(){
	            checkanswer_id.push($(this).val());
	        });

	        $.ajax({
	            type: 'POST',
	            url: "{{ route('SubmitPretripCheck') }}",
	            data: {
	                '_token': $('input[name=_token]').val(),
	                'checkanswer_id' : checkanswer_id,
	                'created_by': $('#created_by').val(),
	                'type_id': id
	                },
	            success: function(data) {

	            	swal("Berhasil Terkirim!", {
	                    icon: "success",
	                    buttons: false,
	                    timer: 2000,
	                });

	                $('#content-modals').modal('hide');

	                $('.alert_'+id).attr('class','alert2 alert_'+id+' alert-success');
		            $('#sudah_'+id).html("<img src='./assets/content/img/theme/check_success.png' width='21'>");

		            setTimeout(function(){ location.reload(); }, 1500);

	            }

	        });
	    }

	}

	$('#kirim_ptc').on('click', function () {

		$.ajax({
            type: 'POST',
            url: "{{ route('KirimPretripCheck') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val(),
                'terisi': $('#count_terisi').val(),
            },
            success: function(data) {

            	if (data.hasil == 0){

            		swal({
	                    title: "Error",
	                    text: "Ada Data yang Belum dipilih!",
	                    icon: "error",
	                    buttons: false,
	                    timer: 2000,
	                });

            	} else {

            		swal({
	                    title: "Berhasil",
	                    text: "Pre Trip Check Anda Berhasil Terkirim!",
	                    icon: "success",
	                    buttons: false,
	                    timer: 2000,
	                });

                	setTimeout(function(){ window.location.href = 'driver'; }, 1500);

            	}

            }

        });
	});

	$('#back').on('click', function () {

		setTimeout(function(){ window.location.href = 'driver'; }, 10);

	});

</script>