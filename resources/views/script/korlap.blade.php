<script type="text/javascript">

    $(function() {

        $.ajax({
            type: 'POST',
            url: "{{ route('GetPTCHigh') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
                },
            success: function(data) {

                var no = -1;
                var content_data="";
                var names="";

                if (data.length == 0){

                    content_data += "<div class='alert2 alert-secondary' role='alert'>";
                    content_data += "<h6>Tidak Ada PTC Bermasalah Pada Tab ini!</h6>";
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
                        var detail = data[no]['detail_name'];
                        var parameter = data[no]['parameter'];
                        var level = data[no]['level'];
                        var type_name = data[no]['type_name'];
                        var approve_sementara = data[no]['approve_sementara'];
                        var id = data[no]['id'];
                        var days = data[no]['days'];
                        var created_date = new Date(data[no]['date']);
                        var day = created_date.getDate();
                        var monthIndex = created_date.getMonth();
                        var year = created_date.getFullYear();
                        
                        var date = day + ' ' + monthNames[monthIndex] + ' ' + year;
                        var no_plat = data[no]['no_police'];

                        content_data += "<div class='alert2 alert-secondary' onclick='Approve("+id+")' role='alert'>";
                        content_data += "<table width='100%'' border='0'>";
                        content_data += "<tr>";
                        content_data += "<td align='center' width='20%' rowspan='2'>";
                        content_data += "<div class='icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow'>";
                        content_data += "<i class='fas fa-car' style='color: #ffffff'></i>";
                        content_data += "</div>";
                        content_data += "</td>";
                        content_data += "<td colspan='3'><h5><b>"+nama_depan+" "+names+"</b></h5></td>";
                        content_data += "</tr>";
                        content_data += "<tr>";
                        content_data += "<td colspan='3'><h6>"+detail+" - "+parameter+" ("+type_name+") </h6></td>";
                        content_data += "</tr>";
                        content_data += "<tr>";
                        content_data += "<td align='center'><span class='badge badge-pill badge-success' style='font-size: 9px;'>"+no_plat+"</span></td>";
                        content_data += "<td width='20%'><span class='badge badge-pill badge-primary' style='font-size: 9px;'><i class='fas fa-calendar'></i> "+date+"</span></td>";
                        content_data += "<td width='20%'><span class='badge badge-pill badge-danger' style='font-size: 9px;'><i class='fas fa-exclamation-triangle'></i> "+level+"</span></td>";
                        content_data += "<td><span class='badge badge-pill badge-primary' style='font-size: 9px;'>"+days+" Day</span></td>";
                        content_data += "</tr>";
                        content_data += "</table>"; 

                        if(approve_sementara == 'Yes'){
                            content_data += "<hr>";
                            content_data += "<table width='100%'' border='0'>";
                            content_data += "<tr>";
                            content_data += "<td align='center'><h6><b>Anda Sudah Melakukan Approve Sementara pada PTC ini</b></h6></td>";
                            content_data += "</tr>";
                            content_data += "</table>";
                        }

                        content_data += "</div>";

                    });
                }

                $('#ptccontent').html(content_data);
            }

        });


    });

    function Approve(id){

        $.ajax({
            type: 'POST',
            url: "{{ route('GetPTCforApprove') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': id
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
                $('#id').val(data.id);


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
                'id': $('#id').val(),
                'user_id': $('#created_by').val()
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

        $.ajax({
            type: 'POST',
            url: "{{ route('GetPTCMedium') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
                },
            success: function(data) {

                $('.tombol').attr('class', 'btn btn-sm btn-secondary tombol');
                $('#btnmedium').attr('class', 'btn btn-sm btn-warning tombol');

                var no = -1;
                var content_data="";

                if (data.length == 0){

                    content_data += "<div class='alert2 alert-secondary' role='alert'>";
                    content_data += "<h6>Tidak Ada PTC Bermasalah Pada Tab ini!</h6>";
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
                        var detail = data[no]['detail_name'];
                        var parameter = data[no]['parameter'];
                        var level = data[no]['level'];
                        var type_name = data[no]['type_name'];
                        var approve_sementara = data[no]['approve_sementara'];
                        var id = data[no]['id'];
                        var days = data[no]['days'];
                        var created_date = new Date(data[no]['date']);
                        var day = created_date.getDate();
                        var monthIndex = created_date.getMonth();
                        var year = created_date.getFullYear();
                        
                        var date = day + ' ' + monthNames[monthIndex] + ' ' + year;
                        var no_plat = data[no]['no_police'];

                        content_data += "<div class='alert2 alert-secondary' onclick='Approve("+id+")' role='alert'>";
                        content_data += "<table width='100%'' border='0'>";
                        content_data += "<tr>";
                        content_data += "<td align='center' width='20%' rowspan='2'>";
                        content_data += "<div class='icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow'>";
                        content_data += "<i class='fas fa-car' style='color: #ffffff'></i>";
                        content_data += "</div>";
                        content_data += "</td>";
                        content_data += "<td colspan='3'><h5><b>"+nama_depan+" "+names+"</b></h5></td>";
                        content_data += "</tr>";
                        content_data += "<tr>";
                        content_data += "<td colspan='3'><h6>"+detail+" - "+parameter+" ("+type_name+") </h6></td>";
                        content_data += "</tr>";
                        content_data += "<tr>";
                        content_data += "<td align='center'><span class='badge badge-pill badge-success' style='font-size: 9px;'>"+no_plat+"</span></td>";
                        content_data += "<td width='20%'><span class='badge badge-pill badge-primary' style='font-size: 9px;'><i class='fas fa-calendar'></i> "+date+"</span></td>";
                        content_data += "<td width='20%'><span class='badge badge-pill badge-warning' style='font-size: 9px;'><i class='fas fa-exclamation-triangle'></i> "+level+"</span></td>";
                        content_data += "<td><span class='badge badge-pill badge-primary' style='font-size: 9px;'>"+days+" Day</span></td>";
                        content_data += "</tr>";
                        content_data += "</table>"; 

                        content_data += "</div>";

                    });
                }

                $('#ptccontent').html(content_data);


            }

        });

    });

    $('#btnlow').on('click', function () {

        $.ajax({
            type: 'POST',
            url: "{{ route('GetPTCLow') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
                },
            success: function(data) {

                $('.tombol').attr('class', 'btn btn-sm btn-secondary tombol');
                $('#btnlow').attr('class', 'btn btn-sm btn-success tombol');

                var no = -1;
                var content_data="";

                if (data.length == 0){

                    content_data += "<div class='alert2 alert-secondary' role='alert'>";
                    content_data += "<h6>Tidak Ada PTC Bermasalah Pada Tab ini!</h6>";
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
                        var detail = data[no]['detail_name'];
                        var parameter = data[no]['parameter'];
                        var level = data[no]['level'];
                        var type_name = data[no]['type_name'];
                        var approve_sementara = data[no]['approve_sementara'];
                        var id = data[no]['id'];
                        var days = data[no]['days'];
                        var created_date = new Date(data[no]['date']);
                        var day = created_date.getDate();
                        var monthIndex = created_date.getMonth();
                        var year = created_date.getFullYear();
                        
                        var date = day + ' ' + monthNames[monthIndex] + ' ' + year;
                        var no_plat = data[no]['no_police'];

                        content_data += "<div class='alert2 alert-secondary' onclick='Approve("+id+")' role='alert'>";
                        content_data += "<table width='100%'' border='0'>";
                        content_data += "<tr>";
                        content_data += "<td align='center' width='20%' rowspan='2'>";
                        content_data += "<div class='icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow'>";
                        content_data += "<i class='fas fa-car' style='color: #ffffff'></i>";
                        content_data += "</div>";
                        content_data += "</td>";
                        content_data += "<td colspan='3'><h5><b>"+nama_depan+" "+names+"</b></h5></td>";
                        content_data += "</tr>";
                        content_data += "<tr>";
                        content_data += "<td colspan='3'><h6>"+detail+" - "+parameter+" ("+type_name+") </h6></td>";
                        content_data += "</tr>";
                        content_data += "<tr>";
                        content_data += "<td align='center'><span class='badge badge-pill badge-success' style='font-size: 9px;'>"+no_plat+"</span></td>";
                        content_data += "<td  width='20%'><span class='badge badge-pill badge-primary' style='font-size: 9px;'><i class='fas fa-calendar'></i> "+date+"</span></td>";
                        content_data += "<td width='20%'><span class='badge badge-pill badge-primary' style='font-size: 9px;'><i class='fas fa-exclamation-triangle'></i> "+level+"</span></td>";
                        content_data += "<td><span class='badge badge-pill badge-primary' style='font-size: 9px;'>"+days+" Day</span></td>";
                        content_data += "</tr>";
                        content_data += "</table>"; 

                        content_data += "</div>";

                    });
                }

                $('#ptccontent').html(content_data);


            }

        });

    });

    $('#btnhigh').on('click', function () {

        $.ajax({
            type: 'POST',
            url: "{{ route('GetPTCHigh') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
                },
            success: function(data) {

                $('.tombol').attr('class', 'btn btn-sm btn-secondary tombol');
                $('#btnhigh').attr('class', 'btn btn-sm btn-danger tombol');

                var no = -1;
                var content_data="";

                if (data.length == 0){

                    content_data += "<div class='alert2 alert-secondary' role='alert'>";
                    content_data += "<h6>Tidak Ada PTC Bermasalah Pada Tab ini!</h6>";
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
                        var detail = data[no]['detail_name'];
                        var parameter = data[no]['parameter'];
                        var level = data[no]['level'];
                        var type_name = data[no]['type_name'];
                        var approve_sementara = data[no]['approve_sementara'];
                        var id = data[no]['id'];
                        var days = data[no]['days'];
                        var created_date = new Date(data[no]['date']);
                        var day = created_date.getDate();
                        var monthIndex = created_date.getMonth();
                        var year = created_date.getFullYear();
                        
                        var date = day + ' ' + monthNames[monthIndex] + ' ' + year;
                        var no_plat = data[no]['no_police'];

                        content_data += "<div class='alert2 alert-secondary' onclick='Approve("+id+")' role='alert'>";
                        content_data += "<table width='100%'' border='0'>";
                        content_data += "<tr>";
                        content_data += "<td align='center' width='20%' rowspan='2'>";
                        content_data += "<div class='icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow'>";
                        content_data += "<i class='fas fa-car' style='color: #ffffff'></i>";
                        content_data += "</div>";
                        content_data += "</td>";
                        content_data += "<td colspan='3'><h5><b>"+nama_depan+" "+names+"</b></h5></td>";
                        content_data += "</tr>";
                        content_data += "<tr>";
                        content_data += "<td colspan='3'><h6>"+detail+" - "+parameter+" ("+type_name+") </h6></td>";
                        content_data += "</tr>";
                        content_data += "<tr>";
                        content_data += "<td align='center'><span class='badge badge-pill badge-success' style='font-size: 9px;'>"+no_plat+"</span></td>";
                        content_data += "<td  width='20%'><span class='badge badge-pill badge-primary' style='font-size: 9px;'><i class='fas fa-calendar'></i> "+date+"</span></td>";
                        content_data += "<td width='20%'><span class='badge badge-pill badge-danger' style='font-size: 9px;'><i class='fas fa-exclamation-triangle'></i> "+level+"</span></td>";
                        content_data += "<td><span class='badge badge-pill badge-primary' style='font-size: 9px;'>"+days+" Day</span></td>";
                        content_data += "</tr>";
                        content_data += "</table>"; 

                        if(approve_sementara == 'Yes'){
                            content_data += "<hr>";
                            content_data += "<table width='100%'' border='0'>";
                            content_data += "<tr>";
                            content_data += "<td align='center'><h6><b>Anda Sudah Melakukan Approve Sementara pada PTC ini</b></h6></td>";
                            content_data += "</tr>";
                            content_data += "</table>";
                        }

                        content_data += "</div>";

                    });
                }

                $('#ptccontent').html(content_data);


            }

        });

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
        $('#ptcbtn').attr('style', 'display: block;');
        $('.inidcu').attr('style', 'display: none;');
        $('.inidoc').attr('style', 'display: none;');
        $('.inilain').attr('style', 'display: none;');

        $('#ptccontent').attr('style', 'display: block;');

        $.ajax({
            type: 'POST',
            url: "{{ route('GetPTCHigh') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('#created_by').val()
                },
            success: function(data) {

                var no = -1;
                var content_data="";
                var names="";

                if (data.length == 0){

                    content_data += "<div class='alert2 alert-secondary' role='alert'>";
                    content_data += "<h6>Tidak Ada PTC Bermasalah Pada Tab ini!</h6>";
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
                        var detail = data[no]['detail_name'];
                        var parameter = data[no]['parameter'];
                        var level = data[no]['level'];
                        var type_name = data[no]['type_name'];
                        var approve_sementara = data[no]['approve_sementara'];
                        var id = data[no]['id'];
                        var days = data[no]['days'];
                        var created_date = new Date(data[no]['date']);
                        var day = created_date.getDate();
                        var monthIndex = created_date.getMonth();
                        var year = created_date.getFullYear();
                        
                        var date = day + ' ' + monthNames[monthIndex] + ' ' + year;
                        var no_plat = data[no]['no_police'];

                        content_data += "<div class='alert2 alert-secondary' onclick='Approve("+id+")' role='alert'>";
                        content_data += "<table width='100%'' border='0'>";
                        content_data += "<tr>";
                        content_data += "<td align='center' width='20%' rowspan='2'>";
                        content_data += "<div class='icon2 icon-shape bg-blue-par2 text-white rounded-circle shadow'>";
                        content_data += "<i class='fas fa-car' style='color: #ffffff'></i>";
                        content_data += "</div>";
                        content_data += "</td>";
                        content_data += "<td colspan='3'><h5><b>"+nama_depan+" "+names+"</b></h5></td>";
                        content_data += "</tr>";
                        content_data += "<tr>";
                        content_data += "<td colspan='3'><h6>"+detail+" - "+parameter+" ("+type_name+") </h6></td>";
                        content_data += "</tr>";
                        content_data += "<tr>";
                        content_data += "<td align='center'><span class='badge badge-pill badge-success' style='font-size: 9px;'>"+no_plat+"</span></td>";
                        content_data += "<td width='20%'><span class='badge badge-pill badge-primary' style='font-size: 9px;'><i class='fas fa-calendar'></i> "+date+"</span></td>";
                        content_data += "<td width='20%'><span class='badge badge-pill badge-danger' style='font-size: 9px;'><i class='fas fa-exclamation-triangle'></i> "+level+"</span></td>";
                        content_data += "<td><span class='badge badge-pill badge-primary' style='font-size: 9px;'>"+days+" Day</span></td>";
                        content_data += "</tr>";
                        content_data += "</table>"; 

                        if(approve_sementara == 'Yes'){
                            content_data += "<hr>";
                            content_data += "<table width='100%'' border='0'>";
                            content_data += "<tr>";
                            content_data += "<td align='center'><h6><b>Anda Sudah Melakukan Approve Sementara pada PTC ini</b></h6></td>";
                            content_data += "</tr>";
                            content_data += "</table>";
                        }

                        content_data += "</div>";

                    });
                }

                $('#ptccontent').html(content_data);
            }

        });

        $('.tombol').attr('class', 'btn btn-sm btn-secondary tombol');
        $('#btnhigh').attr('class', 'btn btn-sm btn-danger tombol');

    });

    $('#dcu').on('click', function () {

        $('.menus').attr('class', 'btn btn-sm btn-secondary menus');

        $('#dcu').attr('class', 'btn btn-sm btn-success menus');
        $('#ptcbtn').attr('style', 'display: none;');
        $('.iniptc').attr('style', 'display: none;');
        $('.inidoc').attr('style', 'display: none;');
        $('.inilain').attr('style', 'display: none;');

        $('#contentdcu').attr('style', 'display: block;');

    });

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