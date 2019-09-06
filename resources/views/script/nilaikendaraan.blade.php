<script type="text/javascript">

	$(function() {

        $.ajax({
            type: 'POST',
            url: "{{ route('GetKendaraan') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
                },
            success: function(data) {

                $('#nama').text(data.first+' '+data.last+' ('+data.nopol+')');

            }

        });

		$.ajax({
            type: 'POST',
            url: "{{ route('ValidasiNilaiKendaraan') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
                },
            success: function(data) {

                var no = -1;
                var jumlah = 0;
                var count = data.length;
                var contents = "";

                if (count == 0){

                    contents += "<span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span>";

                    $('#ratings_bintang').html(contents);

                } else {

                    $.each(data, function() {

                        no++;
                        var nilai_kendaraan = data[no]['nilai_kendaraan'];
                        var value = data[no]['value'];

                        var persen = value / 100;

                        jumlah += nilai_kendaraan * persen;

                    });

                    var rate = jumlah / 100;
                    var totals = rate.toFixed(1);

                    $('#rating').text(totals);

                    if (totals < 0.5){

                        contents += "<span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span>";

                    } else if (totals >= 0.5 && totals < 1){

                        contents += "<span class='fa fa-star-half' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span>";

                    } else if (totals >= 1 && totals < 1.5){

                        contents += "<span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span>";

                    } else if (totals >= 1.5 && totals < 2 ){

                        contents += "<span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star-half' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span>";

                    } else if (totals >= 2 && totals < 2.5){

                        contents += "<span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span>";

                    } else if (totals >= 2.5 && totals < 3){

                        contents += "<span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star-half' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span>";

                    } else if (totals >= 3 && totals < 3.5 ){

                        contents += "<span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;'></span><span class='fa fa-star' style='font-size:30px;'></span>";

                    } else if (totals >= 3.5 && totals < 4){

                        contents += "<span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star-half' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;'></span>";

                    } else if (totals >= 4 && totals < 4.5){

                        contents += "<span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;'></span>";

                    } else if (totals >= 4.5 && totals < 5){

                        contents += "<span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star-half' style='font-size:30px;color:orange;'></span>";

                    } else {

                        contents += "<span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;color:orange;'></span><span class='fa fa-star' style='font-size:30px;color:orange;'></span>";

                    }

                    $('#ratings_bintang').html(contents);

                }


            }

        });

        $.ajax({
            url: "{{ route('GetNilaiKendaraan') }}",
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
                    $('.alert_'+id+'').attr('onclick','');
                    $('#sudah_'+id+'').html("<img src='./assets/content/img/theme/check_success.png' width='21'>");



                    $.ajax({
                        url: "{{ route('GetRatingKategoriKendaraan') }}",
                        type: "POST",
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'user_id': $('#created_by').val(),
                            'id': id
                        },
                        success:function(data) {

                            var content_data = '';
                            var no = -1;
                            var jumlah = 0;

                            $.each(data, function() {

                                no++;
                                var nilai = data[no]['nilai'];
                                var value = data[no]['value'];
                                var persen = value / 100;

                                jumlah += nilai * persen;

                            });

                            var total = (jumlah * 5) / 100;
                            var totals = total.toFixed(1);

                            var contents = "";

                            if (totals < 0.5){

                                contents += "<span class='fa fa-star' style='font-size:18px;'></span><span class='fa fa-star' style='font-size:18px;'></span><span class='fa fa-star' style='font-size:18px;'></span><span class='fa fa-star' style='font-size:18px;'></span><span class='fa fa-star' style='font-size:18px;'></span>";

                            } else if (totals >= 0.5 && totals < 1){

                                contents += "<span class='fa fa-star-half' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;'></span><span class='fa fa-star' style='font-size:18px;'></span><span class='fa fa-star' style='font-size:18px;'></span><span class='fa fa-star' style='font-size:18px;'></span>";

                            } else if (totals >= 1 && totals < 1.5){

                                contents += "<span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;'></span><span class='fa fa-star' style='font-size:18px;'></span><span class='fa fa-star' style='font-size:18px;'></span><span class='fa fa-star' style='font-size:18px;'></span>";

                            } else if (totals >= 1.5 && totals < 2 ){

                                contents += "<span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star-half' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;'></span><span class='fa fa-star' style='font-size:18px;'></span><span class='fa fa-star' style='font-size:18px;'></span>";

                            } else if (totals >= 2 && totals < 2.5){

                                contents += "<span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;'></span><span class='fa fa-star' style='font-size:18px;'></span><span class='fa fa-star' style='font-size:18px;'></span>";

                            } else if (totals >= 2.5 && totals < 3){

                                contents += "<span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star-half' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;'></span><span class='fa fa-star' style='font-size:18px;'></span>";

                            } else if (totals >= 3 && totals < 3.5 ){

                                contents += "<span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;'></span><span class='fa fa-star' style='font-size:18px;'></span>";

                            } else if (totals >= 3.5 && totals < 4){

                                contents += "<span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star-half' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;'></span>";

                            } else if (totals >= 4 && totals < 4.5){

                                contents += "<span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;'></span>";

                            } else if (totals >= 4.5 && totals < 5){

                                contents += "<span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star-half' style='font-size:18px;color:orange;'></span>";

                            } else {

                                contents += "<span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;color:orange;'></span><span class='fa fa-star' style='font-size:18px;color:orange;'></span>";

                            }

                            content_data += "<hr><div class='alert2 alert-secondary' role='alert'>";
                            content_data += "<table width='100%'><tr>";
                            content_data += "<td>"+contents+"</td>";
                            content_data += "<td align='right'><h3>"+totals+"</h3></td>";
                            content_data += "</tr></table>";
                            content_data += "</div>";

                            $('#rating_'+id).html(content_data);

                        }

                    });

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
            url: "{{ route('GetDetailNilaiKendaraan') }}",
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'nilaitype_id': id
            },
            success:function(data) {

                var content_datax="";
                var no = -1;

                var type = data[0]['type'];

                $('.modal-title').html(type);

                content_datax += "<div class='alert alert-secondary' role='alert'>";
                content_datax += "<table width='100%'><tr>";
                content_datax += "<td><h5><b>Item Penilaian</b></h5></td>";
                content_datax += "<td>&nbsp;</td>";
                content_datax += "<td><h5><b>Not Ok</b></h5></td>";
                content_datax += "<td>&nbsp;</td>";
                content_datax += "<td><h5><b>Ok</b></h5></td></tr>";
                content_datax += "<tr><td colspan='5'><hr></td></tr>";
                

                $.each(data, function() {

                    no++;
                    var name = data[no]['name'];
                    var detail_id = data[no]['id'];

                    content_datax += "<tr>";
                    content_datax += "<td><h5>"+name+"</h5></td>";
                    content_datax += "<td>&nbsp;<input type='hidden' value='' id=vals_"+detail_id+" class='value'><input type='hidden' class='detailid' value='"+detail_id+"'></td>";
                    content_datax += "<td align='center'><img src='./assets/content/img/theme/emot/1_uncheck.png' id='emot1_"+detail_id+"' onclick='PilihEmot1("+detail_id+")' width='40'></td>";
                    content_datax += "<td>&nbsp;</td>";
                    content_datax += "<td align='center'><img src='./assets/content/img/theme/emot/5_uncheck.png' id='emot5_"+detail_id+"' onclick='PilihEmot5("+detail_id+")' width='40'></td>";
                    content_datax += "</tr>";
                    content_datax += "<tr><td colspan='5'><hr></td></tr>";

                });
                
                content_datax += "</table>";
                content_datax += "</div>";

               $('.details_'+id+'').html(content_datax); 

            }
        });

        $('#content-modals').modal('show');

    }

    function PilihEmot1(id){

        $('#emot1_'+id).attr('src','./assets/content/img/theme/emot/1_uncheck.png');
        $('#emot5_'+id).attr('src','./assets/content/img/theme/emot/5_uncheck.png');

        $('#vals_'+id).val(0);
        $('#emot1_'+id).attr('src','./assets/content/img/theme/emot/1_check.png');

    }

    function PilihEmot5(id){

        $('#emot1_'+id).attr('src','./assets/content/img/theme/emot/1_uncheck.png');
        $('#emot5_'+id).attr('src','./assets/content/img/theme/emot/5_uncheck.png');

        $('#vals_'+id).val(100); 
        $('#emot5_'+id).attr('src','./assets/content/img/theme/emot/5_check.png');

    }

    function Submit(id){

        var empty = false;
        $('.value').each(function() {
        if ($(this).val() == '') {
                empty = true;
            }
        });

        if (empty) { 

            swal("Nilai Semua Kategori!", {
                icon: "error",
                buttons: false,
                timer: 2000,
            });
            
        } else {

            var value = [];
            var detailid = [];

            $('.value').each(function(){
                value.push($(this).val());
            });

            $('.detailid').each(function(){
                detailid.push($(this).val());
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('SubmitNilaiKendaraan') }}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'detail_id' : detailid,
                    'value' : value,
                    'user_id': $('#created_by').val()
                    },
                success: function(data) {

                    swal("Berhasil Terkirim!", {
                        icon: "success",
                        buttons: false,
                        timer: 2000,
                    });

                    $('#content-modals').modal('hide');

                    setTimeout(function(){ location.reload(); }, 1500);

                }

            });

            
        }


    }

	$('#kembali').on('click', function () {

		setTimeout(function(){ window.location.href = 'client'; }, 10);

	});

</script>