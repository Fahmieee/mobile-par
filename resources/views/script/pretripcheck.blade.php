<script type="text/javascript">

	$(function() {

		$.ajax({
	        url: "{{ route('GetPreTripCheck') }}",
	        type: "GET",
	        dataType: "json",
	        success:function(data) {

	        	var content_data="";
	            var no = -1;
	            $.each(data, function() {

	                no++;
	                var name = data[no]['name'];
	                var id = data[no]['id'];
	                var type_name = data[no]['type_name'];
	                var level = data[no]['level'];	

	                
	               	content_data += "<div class='alert alert-danger tanda_"+id+"' role='alert'>";
		            content_data += "<table border='0' width='100%'>";
		            content_data += "<tr>";
		            content_data += "<td align='justify'>";
		            content_data += "<input type='hidden' value='0' class='val_"+id+" pretrip_check_val'>";
		            content_data += "<span class='alert-inner--text'> <h5 class='text-muted-white'>"+name+"</h5></span>";
		            content_data += "<span class='badge badge-default'>"+type_name+"</span> <span class='badge badge-default'>"+level+"</span>";
		            content_data += "</td>";
		            content_data += "<td width='10px'></td>";
		            content_data += "<td align='right'>";
		            content_data += "<label class='custom-toggle'>";
		            content_data += "<input type='checkbox' id='checked_"+id+"' class='pretrip_check' onclick='AksiTripChecktrue("+id+");' value="+id+">";
		            
		            content_data += "<span class='custom-toggle-slider rounded-circle'></span>";
		            content_data += "</label>";
		            content_data += "</td>";
		            content_data += "</tr>";
		            content_data += "</table>";
		            content_data += "</div>";

		            $('#checked_'+id+'').on('click', function () {

		            	var ada =  this.checked;

						alert(ada);

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


	}

	function AksiTripCheckfalse(rnum) {


	    	$('.tanda_'+rnum).attr("class","alert alert-danger tanda_"+rnum+"");
	    	$('#checked_'+rnum).attr("onclick","AksiTripChecktrue("+rnum+");");
	    	$('.val_'+rnum).val(0);    

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