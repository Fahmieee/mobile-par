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



	function GetAnswer(id) {

		var content_data = "";

		content_data += "<div class='modal-header'>";
		content_data += "<h2 class='modal-title' id='modal-title-default'>Kondisi Saat ini</h2>";
		content_data += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
		content_data += "<span aria-hidden='true'>×</span>";
		content_data += "</button>";
		content_data += "</div>";
          
		content_data += "<div class='modal-body'>";
		content_data += "<h6 class='heading-small text-muted'>Pilih Jawaban Di Bawah ini</h6><br>";
        content_data += "<div class='details_"+id+"'></div>";  
              
		content_data += "</div>";            
		content_data += "<div class='modal-footer'>";
		content_data += "<button type='button' onclick='Submit("+id+")' class='btn btn-primary'>Submit</button>";
		content_data += "<button type='button' class='btn btn-danger ml-auto' data-dismiss='modal'>Close</button>"; 
		content_data += "</div>";

		$('.contentnya').html(content_data);

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

				var details = data[0]['detail_name'];
				$('.modal-title').html(details);

				content_dataw += "<input type='hidden' id='val' value='0'>";

	            $.each(data, function() {

	                no++;
	                var parameter = data[no]['parameter'];
	                var answer_id = data[no]['id'];
	                var value = data[no]['value'];
	                var color = '';
	                var check = '';


	                content_dataw += "<hr><div class='alert alerts_"+id+" alert-default' id='jawaban_"+answer_id+"' onclick='PilihAnswer("+answer_id+","+id+")' role='alert' align='center'>";
	                content_dataw += "<table width='100%'>";
	                content_dataw += "<tr>";
	                content_dataw += "<td align='left'><h5 class='text-white'>"+parameter+"</h5></td>";
	                content_dataw += "<td align='right'><img width='35px' class='icons_"+id+"' id='icon_"+answer_id+"' src='/assets/content/img/theme/uncheck.png'></td>";
	                content_dataw += "</tr>";
	                content_dataw += "</table>";
	                content_dataw += "</div>";

	            });

	            $('.details_'+id).html(content_dataw);

	        }

	    });


		// $.ajax({
	 //        url: "{{ route('GetPreTripCheck') }}",
	 //        type: "POST",
	 //        data: {
  //               '_token': $('input[name=_token]').val(),
  //               'checktype_id': id
  //           },
	 //        success:function(data) {

	 //        	var content_datax="";
		// 		var no = -1;

		// 		var type = data[0]['type_name'];

		// 		$('.modal-title').html(type);

	 //            $.each(data, function() {

	 //                no++;
	 //                var name = data[no]['name'];
	 //                var detail_id = data[no]['id'];
	 //                var type_name = data[no]['type_name'];


	 //                content_datax += "<div class='alert2 alertdetail_"+detail_id+" alert-primary' onclick='GetAnswer("+detail_id+")' role='alert'>";
  //                   content_datax += "<table width='100%'>";
  //                   content_datax += "<tr>";
  //                   content_datax += "<td width='10%'><i class='fa fa-car' style='color: #ffffff'></i></td>";
  //                   content_datax += "<td align='left'><h5 class='text-white'>"+name+"</h5></td>";
  //                   content_datax += "</tr></table>";
  //                   content_datax += "<input type='hidden' class='answered' id='value_"+detail_id+"' value='0'><div id=answered_"+detail_id+"></div>";
  //                   content_datax += "</div>";

	 //            });

	 //           $('.details_'+id+'').html(content_datax); 

	 //        }
	 //    });

		$('#content-modals').modal('show');

	}

	// function GetAnswer2(id) {

	// 	$.ajax({
	//         url: "{{ route('GetPreTripCheckAnswer') }}",
	//         type: "POST",
	//         data: {
 //                '_token': $('input[name=_token]').val(),
 //                'checkdetail_id': id
 //            },
	//         success:function(data) {

	//         	var content_dataw="";
	// 			var no = -1;

	//             $.each(data, function() {

	//                 no++;
	//                 var parameter = data[no]['parameter'];
	//                 var answer_id = data[no]['id'];

	//                 content_dataw += "<hr><div class='alert2 alerts_"+id+" alert-secondary' id='jawaban_"+answer_id+"' onclick='PilihAnswer("+answer_id+","+id+")' role='alert' align='center'>";
	//                 content_dataw += "<h5>"+parameter+"</h5>";
	//                 content_dataw += "</div>";

	//             });

	//             $('#answered_'+id).html(content_dataw);

	//         }

	//     });

	//     $('.alertdetail_'+id).attr('onclick','');

	// }

	function PilihAnswer(answer_id,id) {

		$('.alerts_'+id).attr('class', 'alert alerts_'+id+' alert-default');
		$('.icons_'+id).attr('src', '/assets/content/img/theme/uncheck.png');

		$('#jawaban_'+answer_id).attr('class', 'alert alerts_'+id+' alert-success');
		$('#icon_'+answer_id).attr('src', '/assets/content/img/theme/check_success.png');

		$('#val').val(answer_id);
	}


	function Submit(id) {

		var empty = false;
		$('#val').each(function() {
        if ($(this).val() == '0') {
	            empty = true;
	        }
	    });

	    if (empty) {

	    	swal("Isi Jawaban yang Tersedia!", {
                icon: "error",
                buttons: false,
                timer: 2000,
            });

	    } else {


	        $.ajax({
	            type: 'POST',
	            url: "{{ route('SubmitPretripCheck') }}",
	            data: {
	                '_token': $('input[name=_token]').val(),
	                'checkanswer_id' : $('#val').val(),
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

	                if(data != '1'){

	                	$('#detail_'+id).attr('class','card bg-danger shadow');
	                	$('#detilicon_'+id).attr('src','/assets/content/img/theme/check_danger2.png');

	                } else {

	                	$('#detail_'+id).attr('class','card shadow');
	                	$('#detilicon_'+id).attr('src','/assets/content/img/theme/check_success2.png');

	                }

	             //    $('#detail_'+id).attr('class','card-body bg-success');

		            // setTimeout(function(){ location.reload(); }, 1500);

	            }

	        });
	    }

	}

	$('#kirim_ptc').on('click', function () {

		$('#modal_pretrip_check').modal('show');

	});


	$('#yakin_submit').on('click', function () {

		$.ajax({
            type: 'POST',
            url: "{{ route('KirimPretripCheck') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val(),
            },
            success: function(data) {

        		swal({
                    title: "Berhasil",
                    text: "Pre Trip Check Anda Berhasil Terkirim!",
                    icon: "success",
                    buttons: false,
                    timer: 2000,
                });

            	setTimeout(function(){ window.location.href = 'driver'; }, 1500);

            }

        });
	});


	function Sudah(id){

		$('#id').val(id);

		$('#sudah_approve').modal('show');
	}

	$('#yakin_approve').on('click', function () {

		$('#sudah_approve').modal('hide');

		$.ajax({
            type: 'POST',
            url: "{{ route('ApprovePTCKemarin') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'ptc_id': $('#id').val(),
            },
            success: function(data) {

        		swal({
                    title: "Berhasil",
                    text: "PTC Tersebut SUDAH Berhasil Di Perbaiki",
                    icon: "success",
                    buttons: false,
                    timer: 2000,
                });

            	setTimeout(function(){ window.location.href = 'pretripcheck'; }, 1500);

            }

        });

	});

	function Belum(id){

		$('#id').val(id);

		$('#belum_approve').modal('show');
	}

	$('#yakin_belum').on('click', function () {

		$('#belum_approve').modal('hide');

		$.ajax({
            type: 'POST',
            url: "{{ route('TidakApprovePTCKemarin') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'ptc_id': $('#id').val(),
            },
            success: function(data) {

        		swal({
                    title: "Berhasil",
                    text: "PTC Tersebut BELUM Di Perbaiki",
                    icon: "success",
                    buttons: false,
                    timer: 2000,
                });

            	setTimeout(function(){ window.location.href = 'pretripcheck'; }, 1500);

            }

        });

	});

	$('.ptckemarin').on('click', function () {

		swal({
	        title: "Perhatikan!",
	        text: "Selesaikan PTC Kemarin Terlebih Dahulu!",
	        icon: "error",
	        buttons: false,
	        timer: 2000,
	    });
	});

</script>