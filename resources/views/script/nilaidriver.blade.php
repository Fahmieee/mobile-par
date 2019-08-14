<script type="text/javascript">

	$(function() {

		$.ajax({
	        url: "{{ route('GetTypeNilaiDriver') }}",
	        type: "GET",
	        dataType: "json",
	        success:function(data) {

	        	var content_data="";
	            var no = -1;
	            $.each(data, function() {

	            	no++;
	                var name = data[no]['type'];
	                var id = data[no]['id'];


	                content_data += "<div class='row'>";
                	content_data += "<div class='col'>";
                  	content_data += "<div class='card bg-secondary shadow'>";
                    content_data += "<div class='card-header bg-white border-0'>";
                    content_data += "<div class='row align-items-center'>";
                    content_data += "<h5 class='mb-0'>"+name+"</h5>";
                    content_data += "</div>";
                    content_data += "</div>";
                    content_data += "<div class='card-body' id='detail_"+id+"'>";
                    content_data += "</div>";
                    content_data += "</div>";
                    content_data += "</div>";
                    content_data += "</div><hr>";

                    $.ajax({
				        url: "{{ route('GetDetailNilaiDriver') }}",
				        type: "POST",
				        data: {
			                '_token': $('input[name=_token]').val(),
			                'nilaitype_id': id
			            },
				        success:function(data) {

				        	var content_datas="";
				            var no = -1;
				            $.each(data, function() {

				                no++;
				                var name = data[no]['name'];
				                var ids = data[no]['id'];
				                var value = data[no]['value'];

				                content_datas += "<div class='alert alert-default type_"+id+"' role='alert' id='pilih_"+ids+"' onclick='DetailNilai("+ids+","+id+");' align='center'>";
				                content_datas += "<input type='hidden' id='val_"+ids+"' class='notchoose1_"+id+"' value="+value+">";
				                content_datas += "<input type='hidden' id='id_"+ids+"' class='notchoose2_"+id+"' value="+ids+">";
                        		content_datas += "<h6 class='text-white'>"+name+"</h6>";
                      			content_datas += "</div>";

                      		});

                      			content_datas += "<hr>";
		                      	content_datas += "<div align='center'>";
		                      	content_datas += "<span class='fa fa-star' id='star_1_"+id+"' style='font-size:30px;'></span>";
		                        content_datas += "<span class='fa fa-star' id='star_2_"+id+"' style='font-size:30px;'></span>";
		                        content_datas += "<span class='fa fa-star' id='star_3_"+id+"' style='font-size:30px;'></span>";
		                        content_datas += "<span class='fa fa-star' id='star_4_"+id+"' style='font-size:30px;'></span>";
		                        content_datas += "<span class='fa fa-star' id='star_5_"+id+"' style='font-size:30px;'></span>";
		                      	content_datas += "</div>";

				            $('#detail_'+id+'').html(content_datas);
				        }

				    });

	            });

	            $('#tampilkan_content').html(content_data);

            }
        });
	});

	function DetailNilai(rnum,type) {

		$('.type_'+type).attr('class', 'alert alert-default type_'+type+'');
		$('.notchoose1_'+type).attr('class', 'notchoose1_'+type+'');
		$('.notchoose2_'+type).attr('class', 'notchoose2_'+type+'');
		$('#pilih_'+rnum).attr('class', 'alert alert-success type_'+type+'');
		$('#val_'+rnum).attr('class', 'notchoose1_'+type+' val');
		$('#id_'+rnum).attr('class', 'notchoose2_'+type+' id');

		var val = $('#val_'+rnum).val();

		if (val == 5){

			$('#star_1_'+type).attr('style', 'font-size:30px;color:orange;');
			$('#star_2_'+type).attr('style', 'font-size:30px;color:orange;');
			$('#star_3_'+type).attr('style', 'font-size:30px;color:orange;');
			$('#star_4_'+type).attr('style', 'font-size:30px;color:orange;');
			$('#star_5_'+type).attr('style', 'font-size:30px;color:orange;');

		} else if (val == 4){

			$('#star_1_'+type).attr('style', 'font-size:30px;color:orange;');
			$('#star_2_'+type).attr('style', 'font-size:30px;color:orange;');
			$('#star_3_'+type).attr('style', 'font-size:30px;color:orange;');
			$('#star_4_'+type).attr('style', 'font-size:30px;color:orange;');
			$('#star_5_'+type).attr('style', 'font-size:30px;');

		} else if (val == 3){

			$('#star_1_'+type).attr('style', 'font-size:30px;color:orange;');
			$('#star_2_'+type).attr('style', 'font-size:30px;color:orange;');
			$('#star_3_'+type).attr('style', 'font-size:30px;color:orange;');
			$('#star_4_'+type).attr('style', 'font-size:30px;');
			$('#star_5_'+type).attr('style', 'font-size:30px;');

		} else if (val == 2){

			$('#star_1_'+type).attr('style', 'font-size:30px;color:orange;');
			$('#star_2_'+type).attr('style', 'font-size:30px;color:orange;');
			$('#star_3_'+type).attr('style', 'font-size:30px;');
			$('#star_4_'+type).attr('style', 'font-size:30px;');
			$('#star_5_'+type).attr('style', 'font-size:30px;');

		} else if (val == 1){

			$('#star_1_'+type).attr('style', 'font-size:30px;color:orange;');
			$('#star_2_'+type).attr('style', 'font-size:30px;');
			$('#star_3_'+type).attr('style', 'font-size:30px;');
			$('#star_4_'+type).attr('style', 'font-size:30px;');
			$('#star_5_'+type).attr('style', 'font-size:30px;');

		} else {

			$('#star_1_'+type).attr('style', 'font-size:30px;');
			$('#star_2_'+type).attr('style', 'font-size:30px;');
			$('#star_3_'+type).attr('style', 'font-size:30px;');
			$('#star_4_'+type).attr('style', 'font-size:30px;');
			$('#star_5_'+type).attr('style', 'font-size:30px;');
		}
	}

	$('#submit_nilai').on('click', function () {

		$('#confirm_nilai').modal('show');

	});

	$('#batal_submit').on('click', function () {

		$('#confirm_batal').modal('show');

	});

	$('#yakin_batal').on('click', function () {

		setTimeout(function(){ window.location.href = 'client'; }, 10);

	});
</script>