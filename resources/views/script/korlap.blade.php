<script type="text/javascript">


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

        $('#contohss').modal('show');

    });

    $('#ptc').on('click', function () {

        $('.menus').attr('class', 'btn btn-sm btn-secondary menus');

        $('#ptc').attr('class', 'btn btn-sm btn-success menus');
        $('#ptcbtn').attr('style', 'display: block;');
        $('.inidcu').attr('style', 'display: none;');
        $('.inidoc').attr('style', 'display: none;');
        $('.inilain').attr('style', 'display: none;');

        $('#ptchigh').attr('style', 'display: block;');

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

    $('#btnhigh').on('click', function () {

        $('.tombol').attr('class', 'btn btn-sm btn-secondary tombol');

        $('#btnhigh').attr('class', 'btn btn-sm btn-danger tombol');

        $('#ptchigh').attr('style', 'display: block;');
        $('#ptcmedium').attr('style', 'display: none;');
        $('#ptclow').attr('style', 'display: none;');

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

        $('#btnlow').attr('class', 'btn btn-sm btn-success tombol');

        $('#ptchigh').attr('style', 'display: none;');
        $('#ptcmedium').attr('style', 'display: none;');
        $('#ptclow').attr('style', 'display: block;');

    });

</script>