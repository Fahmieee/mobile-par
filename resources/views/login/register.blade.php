<!-- {{-- ========== REGISTER 2 =========== --}} -->
<div id="registerdasar-form" style="display: none;">
	<span class="login100-form-title p-t-20 p-b-45">
    	INFORMASI DASAR
	</span>
    <div class="wrap-input100 validate-input m-b-10">
        <input class="input100 userbaru" id="nama_depan" placeholder="Nama Depan" type="text">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-male"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input m-b-10">
        <input class="input100 userbaru" id="nama_belakang" placeholder="Nama Belakang" type="text">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-female"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input m-b-10">
        <input class="input100 userbaru" id="alamat" placeholder="Alamat Rumah" type="text">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-home"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input m-b-10">
        <input class="input100 userbaru" id="email" placeholder="Alamat E-Mail" type="text">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input m-b-10">
        <input class="input100 userbaru" id="no_hp" placeholder="No Handphone" type="text">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-mobile"></i>
        </span>
    </div>

    <div class="container-login100-form-btn p-t-10" id="buttonsx">
        <button class="masuk100-form-btn" id="registerdasar-submit">
            Lanjut
        </button>
    </div>
    <div class="container-login100-form-btn p-t-10" id="buttonsx">
        <button class="kembali100-form-btn" id="registerdasar-kembali">
            Kembali
        </button>
    </div>
</div>
<!-- 
{{-- ========== REGISTER 3 =========== --}} -->
<div id="registerlanjutan-form" style="display: none;">
	<span class="login100-form-title p-t-20 p-b-45">
    	INFORMASI LANJUTAN
	</span>
    <div class="wrap-input100 validate-input m-b-10">
        <select class="input100 userbaru" id="perusahaan">
            <option>Pilih Perusahaan</option>
            <option>PT Pertamina</option>
        </select>
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-institution"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input m-b-10">
        <input class="input100 userbaru" id="jabatan" placeholder="Jabatan" type="text">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-car"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input m-b-10">
        <select class="input100 userbaru" id="branch">
            <option>Pilih Unit Area</option>
            @foreach($branch as $branches)
            <option value="{{ $branches->id }}">{{ $branches->name }}</option>
            @endforeach
        </select>
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-map-marker"></i>
        </span>
    </div>

    <div class="container-login100-form-btn p-t-10" id="buttonsx">
        <button class="masuk100-form-btn" id="registerlanjutan-submit">
            Daftar
        </button>
    </div>
    <div class="container-login100-form-btn p-t-10" id="buttonsx">
        <button class="kembali100-form-btn" id="registerlanjutan-kembali">
            Kembali
        </button>
    </div>
</div>

<!-- {{-- ========== REGISTER 4 =========== --}} -->
<div id="registerlogins-form" style="display: none;">
	<span class="login100-form-title p-t-20 p-b-45">
    	INFORMASI LOGIN
	</span>
    <div class="wrap-input100 validate-input m-b-10">
        <input class="input100 userbaru" id="username" placeholder="Username" type="text">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-user"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input m-b-10">
        <input class="input100 userbaru" id="password_new" placeholder="Kata Sandi" type="password">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-key"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input m-b-10">
        <input class="input100 userbaru" id="password_confirm" placeholder="Ulang Kata Sandi" type="password">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-check-square"></i>
        </span>
    </div>

    <div class="container-login100-form-btn p-t-10" id="buttonsx">
        <button class="masuk100-form-btn" id="registerlogins-submit">
            Lanjut
        </button>
    </div>
    <div class="container-login100-form-btn p-t-10" id="buttonsx">
        <button class="kembali100-form-btn" id="registerlogins-kembali">
            Kembali
        </button>
    </div>
</div>

<!-- {{-- ========== REGISTER 5 =========== --}} -->
<div id="register5-form" style="display: none;">
	<span class="login100-form-title p-t-20 p-b-45">
    	INFORMASI SUPERVISOR
	</span>
    <div class="wrap-input100 validate-input m-b-10">
        <input class="input100" placeholder="Alamat Rumah" type="text">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-home"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input m-b-10">
        <input class="input100" placeholder="Nomor NIK" type="text">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-id-card"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input m-b-10">
        <input class="input100" placeholder="Nomor NIP" type="text">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-credit-card"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input m-b-10">
        <input class="input100" placeholder="Unit Area" type="text">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-map-marker"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input m-b-10">
        <input class="input100" placeholder="Departemen" type="text">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-bank"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input m-b-10">
        <input class="input100" placeholder="Jabatan" type="text">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-desktop"></i>
        </span>
    </div>

    <div class="container-login100-form-btn p-t-10" id="buttonsx">
        <button class="masuk100-form-btn" id="register5-submit">
            Daftar
        </button>
    </div>
    <div class="container-login100-form-btn p-t-10" id="buttonsx">
        <button class="kembali100-form-btn" id="register5-kembali">
            Kembali
        </button>
    </div>
</div>
