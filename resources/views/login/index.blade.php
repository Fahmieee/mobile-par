@include('layout.loginhead')
<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('assets/login/images/img-01.jpg');">
            <div class="wrap-login100 p-t-90 p-b-30">
                <div class="" align="center">
                    <img src="assets/login/images/par2.png" width="200px" alt="AVATAR" align="center">
                </div>

                    <div id="loader2" style="display: none;" align="center">
                    	<img src="assets/login/images/balls-white.gif" width="100px" align="center">
                    </div>

                    <!-- ========== LOGIN ========== -->
                    <div id="login-form" style="display: block;">
                    	<br>
                    		{{ csrf_field() }}
		                    <div class="wrap-input100 validate-input m-b-10">
		                        <input class="input100 logins username" placeholder="Username" type="text">
		                        <span class="focus-input100"></span>
		                        <span class="symbol-input100">
		                            <i class="fa fa-user"></i>
		                        </span>
		                    </div>

		                    <div class="wrap-input100 validate-input m-b-10">
		                        <input class="input100 logins password" placeholder="Password" type="password">
		                        <span class="focus-input100"></span>
		                        <span class="symbol-input100">
		                            <i class="fa fa-lock"></i>
		                        </span>
		                    </div>

		                    <div class="container-login100-form-btn p-t-10" id="buttonsx">
		                        <button class="masuk100-form-btn" id="login-submit">
		                            Masuk
		                        </button>
		                    </div>
		                    <div class="container-login100-form-btn p-t-10" id="buttonsx">
		                        <button class="kembali100-form-btn" id="login-register">
		                            Daftar
		                        </button>
		                    </div>
	                </div>

                    <!-- {{-- ========== REGISTER =========== --}} -->
                    <div id="register-form" style="display: none;">
                    	<br>
	                    <div class="wrap-input100 validate-input m-b-10">
	                        <input class="input100 no_token" placeholder="Masukan Token" type="text">
	                        <span class="focus-input100"></span>
	                        <span class="symbol-input100">
	                            <i class="fa fa-user-secret"></i>
	                        </span>
	                    </div>

	                    <div class="container-login100-form-btn p-t-10" id="buttonsx">
	                        <button class="masuk100-form-btn" id="register-submit">
	                            Daftar
	                        </button>
	                    </div>
	                    <div class="container-login100-form-btn p-t-10" id="buttonsx">
	                        <button class="kembali100-form-btn" id="register-kembali">
	                            Kembali
	                        </button>
	                    </div>
                    </div>

                    @include('login.register')
            </div>
        </div>
    </div>

@include('layout.loginfooter')
@include('script.login')


</body>
</html>