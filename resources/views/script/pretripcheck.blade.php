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
	                content_data += "<h5 class='text-uppercase text-white ls-1 mb-1'>"+name+"</h5>";
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

				            content_datax = "<h4 class='text-muted' align='center'>Apa Kondisi Kendaraan Anda ?</h4><br>";
				            content_datax += "<div class='alert alert-default' role='alert'>";
							content_datax += "<table width='100%'>";
							content_datax += "<tr>";
							content_datax += "<td width='70%'><h5 class='text-muted-white'>Kondisi</h5></td>";
							content_datax += "<td width='15%'><h5 class='text-muted-white'>Ya</h5></td>";
							content_datax += "<td width='15%'><h5 class='text-muted-white'>Tidak</h5></td>";
							content_datax += "</tr>";
							content_datax += "</table>";
							content_datax += "</div>";

				            $.each(data, function() {

				                no++;
				                var name = data[no]['name'];
				                var ids = data[no]['id'];
				                var type_name = data[no]['type_name'];
				                var level = data[no]['level'];	

				                content_datax += "<div class='alert alert-primary tanda_"+ids+"' role='alert'>";
				                content_datax += "<table width='100%'>";
								content_datax += "<tr>";
								content_datax += "<td width='60%'><h5 class='text-muted-white'>"+name+"</h5></td>";
								content_datax += "<td width='5%'><input type='hidden' id='vals_"+ids+"' class='valuechecked'></td>";
								content_datax += "<td width='10%'>";
								content_datax += "<img onclick='Yes("+ids+","+id+")' class='yes_"+ids+"' src='./assets/content/img/theme/uncheck.png' width='30'></td>";
								content_datax += "<td width='5%'><input type='hidden' class='notchecked' id='value_"+ids+"' value='"+ids+"'></td>";
								content_datax += "<td width='10%'>";
								content_datax += "<img  onclick='Tidak("+ids+","+id+")' class='tidak_"+ids+"' src='./assets/content/img/theme/uncheck.png' width='30'></td>";
								content_datax += "</tr>";
								content_datax += "</table>";
								content_datax += "</div>";

				            });

				            content_datax += "</tbody>";
				            content_datax += "</table>";
				            
				            $('#kategori_'+id+'').html(content_datax);
				        }
				    });

	            });

	            $('#content_tripcheck').html(content_data);


	        }

	    });

	});

	function Yes(rnum,id) {

    	$('.tanda_'+rnum).attr("class","alert alert-danger tanda_"+rnum+"");
    	$('.yes_'+rnum).attr("src","./assets/content/img/theme/check2.png");
    	$('.tidak_'+rnum).attr("src","./assets/content/img/theme/uncheck.png");
    	$('#value_'+rnum).attr("class","notchecked");
    	$('#vals_'+rnum).val(0);

	}

	function Tidak(rnum,id) {

		$('.tanda_'+rnum).attr("class","alert alert-success tanda_"+rnum+"");
    	$('.yes_'+rnum).attr("src","./assets/content/img/theme/uncheck.png");
    	$('.tidak_'+rnum).attr("src","./assets/content/img/theme/check.png");
    	$('#value_'+rnum).attr("class","checked");
    	$('#vals_'+rnum).val(1);
	    	
	}


	// ==== SIMPAN HASIL PRETRIP CHECK ===

	$('#submit_pretrip_check').on('click', function () {

		var empty = false;
		$('.valuechecked').each(function() {
        if ($(this).val() == '0' || $(this).val() == '') {
	            empty = true;
	        }
	    });

	    if (empty) { 

	    	$('#modal_pretrip_check').modal('show');
	    	
	    } else {
	    	
	    	$('#modal_pretrip_check_all').modal('show');
	    }

	});

	$('#batal_submit').on('click', function () {

		$('#modal_batal_submit').modal('show');

	});

	$('#batal_yakin').on('click', function () {

		$('#modal_batal_submit').modal('hide');

		setTimeout(function(){ window.location.href='driver'; }, 10);

	});

	$('#yakin_submit').on('click', function () {

		var empty = false;
		$('.valuechecked').each(function() {
        if ($(this).val() == '') {
	            empty = true;
	        }
	    });

	    if (empty) { 

	    	swal("Pastikan Anda Mengisi Semua!", {
                icon: "error",
                buttons: false,
                timer: 2000,
            });

	    } else {

			var check_id = [];

	        $('.notchecked').each(function(){
	            check_id.push($(this).val());
	        });

	        $.ajax({
	            type: 'POST',
	            url: "{{ route('SubmitPretripCheckNotoke') }}",
	            data: {
	                '_token': $('input[name=_token]').val(),
	                'check_id' : check_id,
	                'user_id': $('#created_by').val()
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
	    }
	});

	$('#yakin_submit_all').on('click', function () {

		$.ajax({
	            type: 'POST',
	            url: "{{ route('SubmitPretripCheckNotoke') }}",
	            data: {
	                '_token': $('input[name=_token]').val(),
	                'check_id' : '0',
	                'user_id': $('#created_by').val()
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


</script>