@include('layout.loginhead')
<body>
    <div class="limiter" id="img1" style="display: block;">
        <div class="intro-login100" style="background-image: url('assets/login/images/img-02.jpg');">
        </div>
    </div>
    <div class="limiter" id="img2" style="display: none;">
        <div class="intro-login100" style="background-image: url('assets/login/images/img-03.jpg');">
        </div>
    </div>
    <div class="limiter" id="img3" style="display: none;">
        <div class="intro-login100" style="background-image: url('assets/login/images/img-04.jpg');">
        </div>
    </div>

<div class="footer">
    <div class="container-login100-form-btn p-t-10" id="button1" style="display: block;">
        <button class="masuk100-form-btn" id="next1-submit">
            Lanjut
        </button>
    </div>

    <div class="container-login100-form-btn p-t-10" id="button2" style="display: none;">
        <button class="masuk100-form-btn" id="next2-submit">
            Lanjut
        </button>
    </div>

    <div class="container-login100-form-btn p-t-10" id="button3" style="display: none;">
        <button class="hijau100-form-btn" id="selesai-submit">
            Selesai
        </button>
    </div>
</div>
    
@include('layout.loginfooter')

<script type="text/javascript">

	$('#next1-submit').on('click', function () {

        $("#img1").attr("style","display: none;");
        $("#img2").attr("style","display: block;");
        $("#button1").attr("style","display: none;");
        $("#button2").attr("style","display: block;");
    });

    $('#next2-submit').on('click', function () {

        $("#img2").attr("style","display: none;");
        $("#img3").attr("style","display: block;");
        $("#button2").attr("style","display: none;");
        $("#button3").attr("style","display: block;");

    });

    $('#selesai-submit').on('click', function () {

         window.location.href = 'login';

    });

</script>
</body>
</html>