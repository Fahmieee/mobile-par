
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme_color" content="#ffffff">   
  <title>PAR | Prima Armada Raya</title>
  <!-- Favicon -->
  <link href="./assets/icons/72x72.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/content/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="./assets/content/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="./assets/content/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />

  <link rel="manifest" href="./manifest.json">
  <!-- ios support -->
  <link rel="apple-touch-icon" href="./assets/icons/96x96.png">
  <meta name="apple-mobile-web-app-status-bar" content="#aa7700">

  <style type="text/css" media="screen">
    .swal-text {    
      text-align: center;
    }
    
    .swal-overlay {
      background-color: rgba(1, 73, 127, 0.7);
    }

  </style>
</head>
<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" id="darurat" type="button">
        <i class="fa fa-exclamation-triangle"></i>
        <!-- <span class="ni ni-notification-70"></span> -->
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="#">
        <img src="./assets/login/images/par2.png" class="navbar-brand-img">
        {{ csrf_field() }}
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" id="photo_users" src="#" width="60" height="35">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome! <b id="namaatas"></b></h6>
            </div>
            <a href="profile" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>Profil Saya</span>
            </a>
            <a href="ubahpassword" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Ubah Password</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="login/logout" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Keluar</span>
            </a>
          </div>
        </li>
      </ul>
      <input type="hidden" class="form-control" id="created_by" value="{{Auth::guard('user')->user()->id}}">

    </div>
  </nav>