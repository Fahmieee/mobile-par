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
                    <input type="hidden" id="userx" value="{{ Auth::user() ? Auth::user()->id : '0' }}">
                </div>
                    <div class="textcredit">
                                    
                        Developed By : Business and Development Support

                    </div>
            </div>
        </div>
    </div>

@include('layout.loginfooter')

<script type="text/javascript">

	$(function() {

		setTimeout(Loading, 4000);

        var userid = $('#userx').val();

        if(userid == 0){

            setTimeout(function(){ window.location.href = 'login'; }, 8000);

        } else {

            setTimeout(function(){ window.location.href = 'home'; }, 8000);

        }

        

	});

    function Loading(){

        $("#loader").attr("style","display: block;");
        $(".logo").attr("style","display: none;");
    }

</script>
</body>
</html>