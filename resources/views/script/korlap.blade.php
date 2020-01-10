<script type="text/javascript">

    function Approve2(user,answer){

        swal({
            text: "Anda tidak Berhak Melakukan Approve!",
            icon: "error",
            buttons: false,
            timer: 2000,
        });

    }

    function Approve(user,answer){

        $.ajax({
            type: 'POST',
            url: "{{ route('GetPTCforApprove') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': user,
                'checkanswer_id': answer,
                },
            success: function(data) {

                var span = '';

                if (data.last_name == null){
                    names = '';
                } else {
                    names = data.last_name;
                }

                $('#nama').html(data.first_name+' '+names);
                $('#wilayah').html(data.unitkerja_name+' - '+data.wilayah_name);
                $('#plat').html(data.no_police);
                $('#detail').html(data.detail_name+' - '+data.parameter);
                $('#type').html(data.type_name);
                $('#days').html(data.days+ ' Days');

                if(data.level == 'HIGH'){
                    span = 'danger';
                    $('#btnsementara').attr('style','display: block;');   
                } else if (data.level == 'MEDIUM'){
                    span = 'warning';
                    $('#btnsementara').attr('style','display: none;');
                } else {
                    span = 'primary';
                    $('#btnsementara').attr('style','display: none;');
                }

                $('#level').html('<span class="badge badge-pill badge-'+span+'"><i class="fas fa-exclamation-triangle"></i> '+data.level+'</span>');

                if (data.approve_sementara == 'Yes'){

                    $('#approve_sementara').attr('disabled','disabled');

                }

                var monthNames = [
                    "Jan", "Feb", "Mar",
                    "Apr", "May", "Jun", "Jul",
                    "Aug", "Sep", "Oct",
                    "Nov", "Dec"
                  ];

                var created_date = new Date(data.date);
                var day = created_date.getDate();
                var monthIndex = created_date.getMonth();
                var year = created_date.getFullYear();
                
                var date = day + ' ' + monthNames[monthIndex] + ' ' + year;

                $('#tanggal').html(date);
                $('#user_id').val(data.user_id);
                $('#checkanswer_id').val(data.checkanswer_id);


                $('#approveptc').modal('show');

            }
        });
    }

    $('#approve_now').on('click', function () {

        $.ajax({
            type: 'POST',
            url: "{{ route('ApprovePTCNow') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'driver_id': $('#user_id').val(),
                'checkanswer_id': $('#checkanswer_id').val()
                },
            success: function(data) {

                swal({
                    text: "Approve Berhasil!",
                    icon: "success",
                    buttons: false,
                    timer: 2000,
                });

                setTimeout(function(){ window.location.href='korlap'; }, 1500);

            }

        });

    });

    $('#approve_sementara').on('click', function () {

        $.ajax({
            type: 'POST',
            url: "{{ route('ApprovePTCSementara') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('#id').val(),
                'user_id': $('#created_by').val()
                },
            success: function(data) {

                swal({
                    text: "Approve Sementara Berhasil!",
                    icon: "success",
                    buttons: false,
                    timer: 2000,
                });

                setTimeout(function(){ window.location.href='korlap'; }, 1500);

            }

        });

    });

    $('#btnmedium').on('click', function () {

        $('.tombol').attr('class', 'btn btn-sm btn-secondary tombol');
        $('#btnmedium').attr('class', 'btn btn-sm btn-warning tombol');

        $('#ptchigh').attr('style', 'display: none;');
        $('#ptcmedium').attr('style', 'display: block;');
        $('#ptclow').attr('style', 'display: none;');

    });

    $('#btnlow').on('click', function () {

        $('.tombol').attr('class', 'btn btn-sm btn-secondary tombol');
        $('#btnlow').attr('class', 'btn btn-sm btn-info tombol');

        $('#ptchigh').attr('style', 'display: none;');
        $('#ptcmedium').attr('style', 'display: none;');
        $('#ptclow').attr('style', 'display: block;');

    });

    $('#btnhigh').on('click', function () {

        $('.tombol').attr('class', 'btn btn-sm btn-secondary tombol');
        $('#btnhigh').attr('class', 'btn btn-sm btn-danger tombol');

        $('#ptchigh').attr('style', 'display: block;');
        $('#ptcmedium').attr('style', 'display: none;');
        $('#ptclow').attr('style', 'display: none;');

    });


	$('#approve').on('click', function () {

		setTimeout(function(){ window.location.href = 'approve'; }, 10);

	});

    $('#keluhan').on('click', function () {

        setTimeout(function(){ window.location.href = 'lihatsuara'; }, 10);

    });

    $('#pengemudi').on('click', function () {

        setTimeout(function(){ window.location.href = 'lihatdriver'; }, 10);

    });

    $('#kendaraan').on('click', function () {

        setTimeout(function(){ window.location.href = 'lihatkendaraan'; }, 10);

    });

    $('#monitoring').on('click', function () {

        setTimeout(function(){ window.location.href = 'monitoring'; }, 10);

    });

    $('.contoh').on('click', function () {

        $('#approve').modal('show');

    });



    $('#ptc').on('click', function () {

        $('.menus').attr('class', 'btn btn-sm btn-secondary menus');
        $('#ptc').attr('class', 'btn btn-sm btn-success menus');

        $('.inidoc').attr('style', 'display: none;');
        $('.inidcu').attr('style', 'display: none;');
        $('.inilain').attr('style', 'display: none;');

        $('#ptcbtn').attr('style', 'display: block;');
        $('.tombol').attr('class', 'btn btn-sm btn-secondary tombol');
        $('#btnhigh').attr('class', 'btn btn-sm btn-danger tombol');

        $('#ptchigh').attr('style', 'display: block;');
        $('#ptcmedium').attr('style', 'display: none;');
        $('#ptclow').attr('style', 'display: none;');

    });

    $('#dcu').on('click', function () {

        $('.menus').attr('class', 'btn btn-sm btn-secondary menus');

        $('#dcu').attr('class', 'btn btn-sm btn-success menus');
        $('#ptcbtn').attr('style', 'display: none;');
        $('.iniptc').attr('style', 'display: none;');
        $('.inidoc').attr('style', 'display: none;');
        $('.inilain').attr('style', 'display: none;');

        $('#contentdcu').attr('style', 'display: block;');

        $.ajax({
            type: 'POST',
            url: "{{ route('GetDCUSakit') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
                },
            success: function(data) {

                var no = -1;
                var content_data="";

                if (data.length == 0){

                    content_data += "<div class='alert2 alert-secondary' role='alert'>";
                    content_data += "<h6>Tidak Ada DCU Bermasalah Pada Tab ini!</h6>";
                    content_data += "</div>";

                } else {

                    $.each(data, function() {

                        var monthNames = [
                            "Jan", "Feb", "Mar",
                            "Apr", "May", "Jun", "Jul",
                            "Aug", "Sep", "Oct",
                            "Nov", "Dec"
                          ];

                        no++;
                        var nama_depan = data[no]['first_name'];
                        var nama_belakang = data[no]['last_name'];
                        if (nama_belakang == null){
                            names = '';
                        } else {
                            names = nama_belakang;
                        }
                        var suhu = data[no]['suhu'];
                        var darah = data[no]['darah'];
                        var id = data[no]['id'];
                        var darah1 = darah.substring(0,3);
                        var darah2 = darah.substring(4,7);

                        if (darah1 >= 140 && darah1 < 160 || darah2 >= 90 && darah2 < 100){

                            var hasildarah = 'High Blood Preasure!';
                            var bedge = 'danger2';
                           
                        } else if (darah1 >= 160 || darah2 >= 100){

                            var hasildarah = 'Hypertensive Crisis!';
                            var bedge = 'danger3';

                        }

                        var wilayah = data[no]['wilayah_name'];
                        var unitkerja = data[no]['unitkerja_name'];
                        var id = data[no]['id'];
                        

                        content_data += "<div class='alert2 alert-secondary' onclick='DCUView("+id+")' role='alert'>";
                        content_data += "<table width='100%' border='0'>"; 
                        content_data += "<tr>";
                        content_data += "<td width='23%' rowspan='4'>";
                        content_data += "<div class='icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow'>";
                        content_data += "<i class='fas fa-medkit' style='color: #ffffff'></i>";
                        content_data += "</div>";
                        content_data += "</td>";
                        content_data += "<td><h5><b>"+nama_depan+" "+names+"</b></h5></td>";
                        content_data += "</tr>";
                        content_data += "<tr>";
                        content_data += "<td><h6>Kondisi Driver Tidak memungkinkan untuk Melakukan Perjalanan</h6></td>";
                        content_data += "</tr>";
                        content_data += "<tr>";
                        content_data += "<td><span class='badge badge-pill badge-primary' style='font-size: 9px;'><i class='fas fa-map-marker'></i> "+unitkerja+" - "+wilayah+"</span></td>";
                        content_data += "</tr>";
                        content_data += "</table>";
                        content_data += "<hr>";
                        content_data += "<div class='alert2 alert-primary' role='alert'>";
                        content_data += "<table width='100%' border='0'>";
                        content_data += "<tr>";
                        content_data += "<td align='center'><h6 class='text-white'>Suhu Badan</h6></td>";
                        content_data += "<td align='center'><h6 class='text-white'>Tekanan Darah</h6></td>";
                        content_data += "</tr>";
                        content_data += "<tr>";
                        content_data += "<td align='center'><h2 class='text-white'>"+suhu+" C</h2><span class='badge badge-pill badge-danger3' style='font-size: 9px;'><i class='fas fa-heart'></i>  Sakit</span></td>";
                        content_data += "<td align='center'><h2 class='text-white'>"+darah+"</h2><span class='badge badge-pill badge-"+bedge+"' style='font-size: 9px;'><i class='fas fa-tint'></i>  "+hasildarah+"</span></td>";
                        content_data += "</tr>";
                        content_data += "</table>";
                        content_data += "</div>";
                        content_data += "</div>";

                    });
                }

                $('#contentdcu').html(content_data);

            }
        });

    });

    function DCUView(id){

        $.ajax({
            type: 'POST',
            url: "{{ route('GetDCUDetail') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': id
                },
            success: function(data) {
                
                $('#imgdcu').attr("src",'./assets/img_dcu/'+data.img+'');

                $('#viewdcudetail').modal('show');

            }

        });

    }

    $('#doc').on('click', function () {

        $('.menus').attr('class', 'btn btn-sm btn-secondary menus');

        $('#doc').attr('class', 'btn btn-sm btn-success menus');

        $('#ptcbtn').attr('style', 'display: none;');
        $('.iniptc').attr('style', 'display: none;');
        $('.inidcu').attr('style', 'display: none;');
        $('.inilain').attr('style', 'display: none;');

        $('#contentdoc').attr('style', 'display: block;');

    });

    $('#lainnya').on('click', function () {

        $('.menus').attr('class', 'btn btn-sm btn-secondary menus');

        $('#lainnya').attr('class', 'btn btn-sm btn-success menus');

        $('#ptcbtn').attr('style', 'display: none;');
        $('.iniptc').attr('style', 'display: none;');
        $('.inidcu').attr('style', 'display: none;');
        $('.inidoc').attr('style', 'display: none;');

        $('#contentlain').attr('style', 'display: block;');

    });

    // $('#btnhigh').on('click', function () {

    //     $('.tombol').attr('class', 'btn btn-sm btn-secondary tombol');

    //     $('#btnhigh').attr('class', 'btn btn-sm btn-danger tombol');

    //     $('#ptchigh').attr('style', 'display: block;');
    //     $('#ptcmedium').attr('style', 'display: none;');
    //     $('#ptclow').attr('style', 'display: none;');

    // });

    // $('#btnmedium').on('click', function () {

    //     $('.tombol').attr('class', 'btn btn-sm btn-secondary tombol');

    //     $('#btnmedium').attr('class', 'btn btn-sm btn-warning tombol');

    //     $('#ptchigh').attr('style', 'display: none;');
    //     $('#ptcmedium').attr('style', 'display: block;');
    //     $('#ptclow').attr('style', 'display: none;');

    // });

    // $('#btnlow').on('click', function () {

    //     $('.tombol').attr('class', 'btn btn-sm btn-secondary tombol');

    //     $('#btnlow').attr('class', 'btn btn-sm btn-success tombol');

    //     $('#ptchigh').attr('style', 'display: none;');
    //     $('#ptcmedium').attr('style', 'display: none;');
    //     $('#ptclow').attr('style', 'display: block;');

    // });

</script>