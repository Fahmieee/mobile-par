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

	                content_datax += "<div class='row'>";
			        content_datax += "<div class='col-lg-12'>";
			        content_datax += "<div class='form-group'>";
			        content_datax += "<label class='form-control-label' for='input-username'>"+name+"</label>";
			        content_datax += "<select class='form-control answered' id='answer_"+detail_id+"'>";
			        content_datax += "</select>";
			        content_datax += "</div>";
			        content_datax += "</div>"; 
			        content_datax += "</div>";

			        $.ajax({
				        url: "{{ route('GetPreTripCheckAnswer') }}",
				        type: "POST",
				        data: {
			                '_token': $('input[name=_token]').val(),
			                'checkdetail_id': detail_id
			            },
				        success:function(data) {

				        	var content_datas="";
							var no = -1;

				            $.each(data, function() {

				                no++;
				                var parameter = data[no]['parameter'];
				                var answer_id = data[no]['id'];

				                content_datas += "<option value='"+answer_id+"'>"+parameter+"</option>";

				            });

				            $('#answer_'+detail_id+'').html(content_datas); 

				        }
				    });



	            });

	           $('.details_'+id+'').html(content_datax); 

	        }
	    });

		$('#content-modals').modal('show');

	}


	function Submit(id) {

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

	

</script>