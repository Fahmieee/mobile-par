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

		            content_data += "<div class='card-header bg-blue-par'>";
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
				            $.each(data, function() {

				                no++;
				                var name = data[no]['name'];
				                var ids = data[no]['id'];
				                var type_name = data[no]['type_name'];
				                var level = data[no]['level'];	

				                
				               	content_datax += "<div class='alert alert-success tanda_"+ids+"' role='alert'>";
					            content_datax += "<table border='0' width='100%'>";
					            content_datax += "<tr>";
					            content_datax += "<td align='justify'>";
					            content_datax += "<input type='hidden' value='1' class='val_"+ids+" pretrip_check_val'>";
					            content_datax += "<span class='alert-inner--text'> <h5 class='text-muted-white'>"+name+"</h5></span>";
					            content_datax += " <span class='badge badge-default'>Level : "+level+"</span>";
					            content_datax += "</td>";
					            content_datax += "<td width='10px'></td>";
					            content_datax += "<td align='right'>";
					            content_datax += "<label class='custom-toggle'>";
					            content_datax += "<input type='checkbox' id='checked_"+ids+"' class='pretrip_check' onclick='AksiTripCheckfalse("+ids+");' value="+ids+" checked>";
					            content_datax += "<span class='custom-toggle-slider rounded-circle'></span>";
					            content_datax += "</label>";
					            content_datax += "</td>";
					            content_datax += "</tr>";
					            content_datax += "</table>";
					            content_datax += "<div class='alasan_"+ids+"'><input type='hidden' value='-' class='alasan'></div>";
					            content_datax += "</div>";

				            });

				            
				            $('#kategori_'+id+'').html(content_datax);
				        }
				    });

	            });

	            $('#content_tripcheck').html(content_data);


	        }

	    });

		

	});

	function AksiTripChecktrue(rnum) {


	    	$('.tanda_'+rnum).attr("class","alert alert-success tanda_"+rnum+"");
	    	$('#checked_'+rnum).attr("onclick","AksiTripCheckfalse("+rnum+");");
	    	$('.val_'+rnum).val(1);

	    	var content_alasan = "";

	    	content_alasan += "<input type='hidden' value='' class='alasan'>";

	    	$('.alasan_'+rnum).html(content_alasan);


	}

	function AksiTripCheckfalse(rnum) {


	    	$('.tanda_'+rnum).attr("class","alert alert-danger tanda_"+rnum+"");
	    	$('#checked_'+rnum).attr("onclick","AksiTripChecktrue("+rnum+");");
	    	$('.val_'+rnum).val(0);    

	    	var content_alasan = "";

	    	content_alasan += "<hr><table border='0' width='100%'>";
            content_alasan += "<tr>";
            content_alasan += "<td align='justify'>";
            content_alasan += "<input type='text' class='form-control alasan' placeholder='Masukan Alasan Kondisi Tidak OKE'>";
            content_alasan += "</td>";
            content_alasan += "</tr>";
            content_alasan += "</table>";

            $('.alasan_'+rnum).html(content_alasan);

	}


	// ==== SIMPAN HASIL PRETRIP CHECK ===

	$('#submit_pretrip_check').on('click', function () {

		var empty = false;
		$('.pretrip_check_val').each(function() {
        if ($(this).val() == '0') {
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

		var value = [];
		var check_id = [];
		var alasan = [];

        $('.pretrip_check').each(function(){
            check_id.push($(this).val());
        });

        $('.pretrip_check_val').each(function(){
            value.push($(this).val());
        });

        $('.alasan').each(function(){
            alasan.push($(this).val());
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('SubmitPretripCheck') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'value' : value,
                'check_id' : check_id,
                'alasan' : alasan,
                'created_by': $('#created_by').val()
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

	$('#yakin_submit_all').on('click', function () {

		var value = [];
		var check_id = [];
		var alasan = [];

        $('.pretrip_check').each(function(){
            check_id.push($(this).val());
        });

        $('.pretrip_check_val').each(function(){
            value.push($(this).val());
        });

        $('.alasan').each(function(){
            alasan.push($(this).val());
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('SubmitPretripCheck') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'value' : value,
                'check_id' : check_id,
                'alasan' : alasan,
                'created_by': $('#created_by').val()
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