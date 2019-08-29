@include('layout.loginhead')

<body>
    <div class="limiter">
        <div class="splash-login100" >
            <div class="wrap-login100 p-t-90 p-b-30">
                <div class="logo" align="center" style="display: block;">
                    <img src="assets/login/images/par2.png" width="220px" alt="AVATAR" align="center">
                </div>
                <div id="loader" style="display: none;" align="center">
                    <img src="assets/login/images/balls.gif" width="100px" align="center">
                </div>
                    <span class="login100-form-title p-t-20 p-b-45">                 
                    </span>
            </div>
        </div>
    </div>

@include('layout.loginfooter')

<script type="text/javascript">

	$(function() {

		setTimeout(Loading, 4000);

        setTimeout(function(){ window.location.href = 'logins'; }, 8000);

	});

    function Loading(){

        $("#loader").attr("style","display: block;");
        $(".logo").attr("style","display: none;");
    }

</script>
</body>
</html>