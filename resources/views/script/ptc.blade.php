<script type="text/javascript">
	
	$(function() {


		$.ajax({
	        url: "{{ route('GetKategori') }}",
	        type: "GET",
	        dataType: "json",
	        success:function(data) {

	        	var content_data="";
	            var no = -1;
	            $.each(data, function() {

	            	no++;
	                var name = data[no]['name'];
	                var id = data[no]['id'];

		            content_data += "<div class='card-header bg-blue-par2'>";
		            content_data += "<table width='100%'>";
                    content_data += "<tr><td style='padding-top: 10px'><h3 class='text-uppercase text-white'>"+name+"</h3></td></tr>";
                  	content_data += "</table>";
	                content_data += "</div>";	
	                content_data += "<div class='card-body bg-white' id=kategori_"+id+">";
	                content_data += "</div><hr>";

	                $.ajax({
				        url: "{{ route('GetPreTripCheck') }}",
				        type: "POST",
				        data: {
			                '_token': $('input[name=_token]').val(),
			                'check_id': id
			            },
				        success:function(data) {

				        	var content_datax="";
				            var no = -1;

				            $.each(data, function() {

				                no++;
				                var name = data[no]['name'];
				                var ids = data[no]['id'];
				                var type = data[no]['type_name'];	

				                content_datax += "<div class='alert alert-primary' role='alert'> <h4 class='text-white'><b>"+name+"</b></h4><h6 class='text-white'>"+type+"</h6><hr><br><input type='hidden' id='isian_"+ids+"' class='isian' value='0'>";
				                content_datax += "<div id='answer_"+ids+"'></div>";
				                content_datax += "</div>";

				                $.ajax({
							        url: "{{ route('GetPreTripCheckAnswer') }}",
							        type: "POST",
							        data: {
						                '_token': $('input[name=_token]').val(),
						                'checkdetail_id': ids
						            },
							        success:function(data) {

							        	var content_datas="";
							            var no = -1;

							            $.each(data, function() {

							            	no++;
							                var parameter = data[no]['parameter'];
							                var value = data[no]['value'];
							                var idx = data[no]['id'];

							                content_datas += "<div class='alert alert-default detail_"+ids+"' id='dipilih_"+idx+"' role='alert' align='center'>";
							                content_datas += "<table width='100%'>";
							                content_datas += "<tr><td align='left'><h5 class='text-white'>"+parameter+"</h5></td>";
							                content_datas += "<td align='right'><img onclick='Pilih("+idx+","+value+","+ids+")' id='btn_"+idx+"' class='button_"+ids+"' src='./assets/content/img/theme/uncheck.png' width='30'></td></tr>";
							                content_datas += "<input type='hidden' class='unchecked tanda_"+ids+"' id='vals_"+idx+"'></table>";
							                content_datas += "</div>";

							            });

							            $('#answer_'+ids+'').html(content_datas);

							        }

							    });
				                
				            });
				            
				            $('#kategori_'+id+'').html(content_datax);
				        }
				    });
	                

	            });

	            $('#content_tripcheck').html(content_data);


	        }

	    });

	});

	function Pilih(id,val,type) {

		$('.detail_'+type).attr("class","alert alert-default detail_"+type+"");
		$('.button_'+type).attr("src","./assets/content/img/theme/uncheck.png");
		$('.tanda_'+type).attr("class","unchecked tanda_"+type+"");
		$('.tanda_'+type).val(0);

		if (val == 0){
			$('#dipilih_'+id).attr("class","alert alert-danger detail_"+type+"");
			$('#btn_'+id).attr("src","./assets/content/img/theme/check_danger.png");
		} else if (val == 2){
			$('#dipilih_'+id).attr("class","alert alert-warning detail_"+type+"");
			$('#btn_'+id).attr("src","./assets/content/img/theme/check_warning.png");
		} else if (val == 3){
			$('#dipilih_'+id).attr("class","alert alert-primary detail_"+type+"");
			$('#btn_'+id).attr("src","./assets/content/img/theme/check_primary.png");
		} else {
			$('#dipilih_'+id).attr("class","alert alert-success detail_"+type+"");
			$('#btn_'+id).attr("src","./assets/content/img/theme/check_success.png");
		}

		$('#vals_'+id).val(id);
		$('#vals_'+id).attr("class","checked tanda_"+type+"");
		$('#isian_'+type).val(1);

	}

	// ==== SIMPAN HASIL PRETRIP CHECK ===

	$('#submit_pretrip_check').on('click', function () {

		var empty = false;
		$('.isian').each(function() {
        if ($(this).val() == '0') {
	            empty = true;
	        }
	    });

	    if (empty) { 

	    	swal("Ada beberapa Item yang Belum di Pilih!", {
                icon: "error",
                buttons: false,
                timer: 2000,
            });
	    	
	    } else {

	    	$('#text-keterangan').html('Anda Yakin Akan Menyimpan ini?');
	    	$('#modal_pretrip_check').modal('show');
	    }

	});

	$('#batal_submit').on('click', function () {

		$('#modal_batal_submit').modal('show');

	});

	$('#yakin_submit').on('click', function () {

		var checkanswer_id = [];

        $('.checked').each(function(){
            checkanswer_id.push($(this).val());
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('SubmitPretripCheck') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'checkanswer_id' : checkanswer_id,
                'created_by': $('#created_by').val()
                },
            success: function(data) {

            	navigator.geolocation.getCurrentPosition(function (position) {

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('KoordinatPTC') }}",
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'ptc_id': data.ptc_id,
                            'type': 'ptc',
                            'long': position.coords.latitude,
                            'lat': position.coords.longitude
                            },
                        success: function(data) {

                            swal("Pre Trip Check Berhasil Terkirim!", {
			                    icon: "success",
			                    buttons: false,
			                    timer: 2000,
			                });

                            setTimeout(function(){ window.location.href = 'driver'; }, 1500);

                        }

                    });

                });

        	}

        });

	});



</script>