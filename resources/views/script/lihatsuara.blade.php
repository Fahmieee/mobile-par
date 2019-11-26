<script type="text/javascript">

	$(function() {

		$.ajax({
            type: 'POST',
            url: "{{ route('GetLihatSuara') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
            },

            success: function (data) {

                var content_data="";
                var no = -1;

                if(data.length == 0){

                    content_data += "<div class='alert alert-default' role='alert'>";
                    content_data += "<h6 class='text-white'>Tidak Ada Keluhan untuk Saat ini!</h6></div>";

                    $('.muncul_suara').html(content_data);

                } else {

                	
    	            $.each(data, function() {

    	            	no++;
    	                var type = data[no]['type'];
    	                var first = data[no]['first_name'];
                        var last = data[no]['last_name'];
    	                var id = data[no]['id'];
    	                var date = data[no]['created_at'];

    	                content_data += "<div class='alert alert-default' role='alert'>";
                    	content_data += "<table width='100%'>"; 
                      	content_data += "<tr>";
                      	content_data += "<td><strong>"+first+"</strong></td>";
                      	content_data += "<td align='right' rowspan='2' id='button_"+id+"'><button onclick='Lihat("+id+");' class='btn btn-sm btn-primary' type='button'>Lihat</button></td>";
                      	content_data += "</tr>";
                      	content_data += "<tr>";
                        content_data += "<td><h6 class='text-white'>"+date+" ("+type+")</h6></td>";
                      	content_data += "</tr>";
                    	content_data += "</table>";
                    	content_data += "<div id='detail_"+id+"'></div>";
                    	content_data += "</div>";

                    });

                    $('.muncul_suara').html(content_data);

                }

            }
        });

	});

	function Lihat(rnum) {

		$('#button_'+rnum).html('<button onclick="Tutup('+rnum+');" class="btn btn-sm btn-secondary" type="button">Tutup</button>');

		$.ajax({
            type: 'POST',
            url: "{{ route('LihatSuaraDetail') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'suara_id': rnum,
            },

            success: function (data) {

            	var content_data="";

            	content_data += "<hr>";
                content_data += "<div class='alert alert-secondary' role='alert'>";
                content_data += "<strong>"+data.ket+"</strong>";
                content_data += "<h6>Kategori : "+data.jenis+"</h6>";
                content_data += "</div>";

                $('#detail_'+rnum).html(content_data);

            }
        });

	}

	function Tutup(rnum) {

		$('#button_'+rnum).html('<button onclick="Lihat('+rnum+');" class="btn btn-sm btn-primary" type="button">Lihat</button>');
		$('#detail_'+rnum).html('');


	}

	$('#back').on('click', function () {

		setTimeout(function(){ window.location.href = 'korlap'; }, 10);

	});

</script>