<script type="text/javascript">

	$(function() {

		$.ajax({
            type: 'POST',
            url: "{{ route('GetDataClient') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
                },
            success: function(data) {

                if(data.driver_depan == '-'){
                    $('#infodriver').attr("style", "display: none;");
                    $('#infokendaraan').attr("style", "display: none;");
                    $('#menu_icons').attr("style", "display: none;");
                    $('#menu_pairing').attr("style", "display: block;");
                } else{
                    $('#infodriver').attr("style", "display: block;");
                    $('#infokendaraan').attr("style", "display: block;");
                    $('#menu_icons').attr("style", "display: block;");
                    $('#menu_pairing').attr("style", "display: none;");
                }

                if(data.pair == 'tidakada'){
                    $('#pairs').html("<button class='btn btn-success' onclick='ListPairing();' id='pairing' type='button'>Pairing Sekarang</button>");
                } else {
                    $('#pairs').html("<button class='btn btn-warning' type='button' disabled>Menunggu Konfirmasi Driver</button>");
                }

            }
        });
	});

	$('#suara').on('click', function () {

		setTimeout(function(){ window.location.href = 'suara'; }, 10);

	});

	$('#pengemudi').on('click', function () {

		setTimeout(function(){ window.location.href = 'nilaidriver'; }, 10);

	});

	$('#kendaraan').on('click', function () {

		setTimeout(function(){ window.location.href = 'nilaikendaraan'; }, 10);

	});

    $('#approve').on('click', function () {

        setTimeout(function(){ window.location.href = 'client-approve'; }, 10);

    });

    function ListPairing(){

        $('#modal_pairing').modal('show');

        $.ajax({
            type: 'POST',
            url: "{{ route('DriverListPairing') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
            },

            success: function (data) {

                var content_data="";
                var no = -1;

                $.each(data, function() {

                    no++;
                    var nama_depan = data[no]['first_name'];
                    var nama_belakang = data[no]['last_name'];
                    var id = data[no]['id'];
                    var nopol = data[no]['no_police'];
                    var model = data[no]['model'];

                    content_data += "<div class='alert alert-primary alerts' id='alert_"+id+"' role='alert'>";
                    content_data += "<table width='100%'>";
                    content_data += "<tr><td width='25%' rowspan='3'><img src='./assets/content/img/theme/team-1-800x800.jpg' width='100%' class='rounded-circle'></td>";
                    content_data += "<td width='5%' rowspan='3'></td>";
                    content_data += "<td><h5 class='text-white'>"+nama_depan+" "+nama_belakang+"</h5></td>";
                    content_data += "<td rowspan='3' class='btns' id='btn_"+id+"'>";
                    content_data += "<button type='button' onclick='Pilih("+id+")' class='btn btn-sm btn-secondary'>Pilih</button>";
                    content_data += "</td></tr>";
                    content_data += "<tr><td><h6 class='text-white'>"+model+" - "+nopol+"</h6></td></tr>";
                    content_data += "</table></div>";

                });

                content_data += "<input type='hidden' id='value'>";

                $('#pairing-content').html(content_data);
            }
        });

    }

    function Pilih(id){

        $('.alerts').attr('class','alert alert-primary alerts');
        $('.btns').html("<button type='button' onclick='Pilih("+id+")' class='btn btn-sm btn-secondary'>Pilih</button>");

        $('#alert_'+id).attr('class','alert alert-success alerts');
        $('#btn_'+id).html("<button type='button' onclick='Pairing("+id+")' class='btn btn-sm btn-primary'>Pairing</button>");
        $('#value').val(id);

    }

    function Pairing(id){

        $.ajax({
            type: 'POST',
            url: "{{ route('ProsesPairing') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val(),
                'driver_id': $('#value').val()
            },

            success: function (data) {

                swal({
                    title: "Berhasil",
                    text: "Tunggu Konfirmasi dari Drivers!",
                    icon: "success",
                    buttons: false,
                    timer: 2000,
                });

                setTimeout(function(){ window.location.href = 'client'; }, 1500);

            }

        });



    }
</script>