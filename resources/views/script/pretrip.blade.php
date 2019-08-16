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

		            content_data += "<div class='alert alert-success' id='kategori_"+id+"' role='alert'>";
		            content_data += "<input type='hidden' value='1' class='val_"+id+" pretrip_check_val'>";
	                content_data += "<table border='0' width='100%'>";
	                content_data += "<tr>";
	                content_data += "<td><h4 class='text-white'>"+name+"</h4></td>";
	                content_data += "<td align='right'>";
		            content_data += "<label class='custom-toggle'>";
		            content_data += "<input type='checkbox' id='checked_"+id+"' class='pretrip_check' onclick='AksiTripCheckfalse("+id+");' value="+id+" checked>";
		            content_data += "<span class='custom-toggle-slider rounded-circle'></span>";
		            content_data += "</label>";
		            content_data += "</td>";
	                content_data += "</tr>";
	                content_data += "</table><hr>";
	                content_data += "<div id='notoke_"+id+"'></div>";
	                content_data += "</div>";

	            });

	            $('#content_tripcheck').html(content_data);


	        }

	    });

		

	});

	function AksiTripCheckfalse(rnum) {


    	$('#kategori_'+rnum).attr("class","alert alert-danger");
    	$('#checked_'+rnum).attr("onclick","AksiTripChecktrue("+rnum+");");
    	$('.val_'+rnum).val(0);

    	$.ajax({
	        url: "{{ route('GetPreTripCheck') }}",
	        type: "POST",
	        data: {
                '_token': $('input[name=_token]').val(),
                'check_id': rnum
            },
	        success:function(data) {

	        	var content_data="";
	            var no = -1;
	            $.each(data, function() {

	                no++;
	                var name = data[no]['name'];
	                var type_name = data[no]['type_name'];
	                var level = data[no]['level'];
	                var kategori = data[no]['kategori'];
	                var id = data[no]['id'];

	                content_data += "<div class='alert alert-success' id='detail_"+id+"' role='alert'>";
	                content_data += "<table border='0' width='100%'>";
	                content_data += "<tr>";
	                content_data += "<td><h5 class='text-white'>"+name+"</h5></td>";
	                content_data += "<td align='right'>";
		            content_data += "<label class='custom-toggle'>";
		            content_data += "<input type='checkbox' id='checkeddetail_"+id+"' class='detail_check' onclick='AksiDetailCheckfalse("+id+");' value="+id+">";
		            content_data += "<span class='custom-toggle-slider rounded-circle'></span>";
		            content_data += "</label>";
		            content_data += "</td>";
	                content_data += "</tr>";
	                content_data += "</table>";
	                content_data += "</div><hr>";

	            });

	            $('#notoke_'+rnum).html(content_data);

	        }
	    });


	}

	function AksiTripChecktrue(rnum) {

		$('#kategori_'+rnum).attr("class","alert alert-success");	
		$('#checked_'+rnum).attr("onclick","AksiTripCheckfalse("+rnum+");");
		$('.val_'+rnum).val(1);

		$('#notoke_'+rnum).html('');
	}


	function AksiDetailCheckfalse(rnum) {

		$('#detail_'+rnum).attr("class","alert alert-default");	
		$('#checkeddetail_'+rnum).attr("onclick","AksiDetailChecktrue("+rnum+");");
		$('#checkeddetail_'+rnum).attr("class","checked");
	}

	function AksiDetailChecktrue(rnum) {

		$('#detail_'+rnum).attr("class","alert alert-success");	
		$('#checkeddetail_'+rnum).attr("onclick","AksiDetailCheckfalse("+rnum+");");
		$('#checkeddetail_'+rnum).attr("class","detail_check");

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

        $('.pretrip_check').each(function(){
            check_id.push($(this).val());
        });

        $('.pretrip_check_val').each(function(){
            value.push($(this).val());
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('SubmitPretripCheck') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'value' : value,
                'check_id' : check_id,
                'created_by': $('#created_by').val()
                },
            success: function(data) {

            	if (data.ada >= 1){

            		var checkdetail_id = [];

            		$('.checked').each(function(){
            			checkdetail_id.push($(this).val());
        			});

            		$.ajax({
			            type: 'POST',
			            url: "{{ route('SubmitPretripCheckNotoke') }}",
			            data: {
			                '_token': $('input[name=_token]').val(),
			                'checkdetail_id' : checkdetail_id,
			                'pretripcheck_id': data.pretripcheck_id,
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

            	} else {

            		swal("Pre Trip Check Berhasil Terkirim!", {
	                    icon: "success",
	                    buttons: false,
	                    timer: 2000,
	                });

	                setTimeout(function(){ window.location.href = 'driver'; }, 1500);

            	}

            }

        });

	});


	$('#yakin_submit_all').on('click', function () {

		var value = [];
		var check_id = [];

        $('.pretrip_check').each(function(){
            check_id.push($(this).val());
        });

        $('.pretrip_check_val').each(function(){
            value.push($(this).val());
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('SubmitPretripCheck') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'value' : value,
                'check_id' : check_id,
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