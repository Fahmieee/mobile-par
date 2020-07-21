
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme_color" content="#ffffff">   
  <meta name="csrf-token" content="{{ csrf_token() }}"/>
  <title>PAR | Prima Armada Raya</title>
  <!-- Favicon -->
  <link href="{{ asset('assets/icons/72x72.png') }}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('assets/content/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/content/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/content/css/loading.css') }}">
  <!-- CSS Files -->
  <link href="{{ asset('assets/content/css/argon-dashboard.css?v=1.1.0') }}" rel="stylesheet" />

  <link rel="manifest" href="{{ asset('manifest.json') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <!-- ios support -->
  <link rel="apple-touch-icon" href="{{ asset('assets/icons/96x96.png') }}">
  <meta name="apple-mobile-web-app-status-bar" content="#aa7700">

  <style type="text/css" media="screen">
    .swal-text {    
      text-align: center;
    }
    
    .swal-overlay {
      background-color: rgba(1, 73, 127, 0.7);
    }

    .eyehide {
      position: relative;
      width: 100%;
      max-width: 500px;
    }

    .eyehide img {
      width: 70%;
      height: auto;
      align-content: center;
    }

    .eyehide .btn1 {
      position: absolute;
      top: 38%;
      left: 73%;
      width: 16%;
    }

    .eyehide .btn2 {
      position: absolute;
      top: 38%;
      left: 11%;
      width: 16%;
    }

    .eyehide .btn3 {
      position: absolute;
      top: 60%;
      left: 71%;
      width: 16%;
    }

    .eyehide .btn4 {
      position: absolute;
      top: 60%;
      left: 13%;
      width: 16%;
    }

    .eyehide .btnspion1 {
      position: absolute;
      top: 30%;
      left: 80%;
      width: 16%;
    }

    .eyehide .btnspion2 {
      position: absolute;
      top: 30%;
      left: 4%;
      width: 16%;
    }

    .eyehide .btnwiper1 {
      position: absolute;
      top: 20%;
      left: 43%;
      width: 16%;
    }

    .eyehide .btnwiper2 {
      position: absolute;
      top: 80%;
      left: 43%;
      width: 16%;
    }

    .eyehide .btnban1 {
      position: absolute;
      top: 10%;
      left: 75%;
      width: 16%;
    }

    .eyehide .btnban2 {
      position: absolute;
      top: 10%;
      left: 9%;
      width: 16%;
    }

    .eyehide .btnban3 {
      position: absolute;
      top: 70%;
      left: 75%;
      width: 16%;
    }

    .eyehide .btnban4 {
      position: absolute;
      top: 70%;
      left: 9%;
      width: 16%;
    }

    .eyehide .btnban5 {
      position: absolute;
      top: 93%;
      left: 43%;
      width: 16%;
    }

    .eyehide .btnlamp1 {
      position: absolute;
      top: -3%;
      left: 58%;
      width: 16%;
    }

    .eyehide .btnlamp2 {
      position: absolute;
      top: -3%;
      left: 25%;
      width: 16%;
    }

    .eyehide .btnlamp3 {
      position: absolute;
      top: 93%;
      left: 58%;
      width: 16%;
    }

    .eyehide .btnlamp4 {
      position: absolute;
      top: 93%;
      left: 25%;
      width: 16%;
    }

    .eyehide .btnlamp5 {
      position: absolute;
      top: 7%;
      left: 70%;
      width: 16%;
    }

    .eyehide .btnlamp6 {
      position: absolute;
      top: 7%;
      left: 15%;
      width: 16%;
    }

    .eyehide .btnlamp7 {
      position: absolute;
      top: 81%;
      left: 70%;
      width: 16%;
    }

    .eyehide .btnlamp8 {
      position: absolute;
      top: 81%;
      left: 15%;
      width: 16%;
    }

    .eyehide .btnlamp9 {
      position: absolute;
      top: 30%;
      left: 82%;
      width: 16%;
    }

    .eyehide .btnlamp10 {
      position: absolute;
      top: 30%;
      left: 2%;
      width: 16%;
    }

    .eyehide .btnfender1 {
      position: absolute;
      top: 10%;
      left: 70%;
      width: 16%;
    }

    .eyehide .btnfender2{
      position: absolute;
      top: 10%;
      left: 12%;
      width: 16%;
    }

    .eyehide .btnfender3 {
      position: absolute;
      top: 85%;
      left: 70%;
      width: 16%;
    }

    .eyehide .btnfender4 {
      position: absolute;
      top: 85%;
      left: 12%;
      width: 16%;
    }

    .eyehide .btnfender5 {
      position: absolute;
      top: 50%;
      left: 70%;
      width: 16%;
    }

    .eyehide .btnfender6 {
      position: absolute;
      top: 50%;
      left: 12%;
      width: 16%;
    }

    .eyehide .btnbumper1 {
      position: absolute;
      top: -2%;
      left: 43%;
      width: 16%;
    }

    .eyehide .btnbumper2{
      position: absolute;
      top: 93%;
      left: 43%;
      width: 16%;
    }

    .eyehide .btnrem1 {
      position: absolute;
      top: 10%;
      left: 75%;
      width: 16%;
    }

    .eyehide .btnrem2 {
      position: absolute;
      top: 10%;
      left: 9%;
      width: 16%;
    }

    .eyehide .btnrem3 {
      position: absolute;
      top: 70%;
      left: 75%;
      width: 16%;
    }

    .eyehide .btnrem4 {
      position: absolute;
      top: 70%;
      left: 9%;
      width: 16%;
    }

    /*.eyehide{
      position: absolute;
      padding-top: 270px;
      top: 0;
      right: 0;
      width: 200px;
    }*/

  </style>
</head>
<body>
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <!-- <button class="navbar-toggler" id="darurat" type="button">
        <i class="fa fa-exclamation-triangle"></i>
      </button> -->
      <img src="{{ asset('assets/content/img/theme/callcenter.png') }}" width="13%" id="darurat">
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="#">
        <img src="{{ asset('assets/login/images/par2.png') }}" class="navbar-brand-img">
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
            <a href="profile" class="dropdown-item btnload">
              <i class="ni ni-single-02"></i>
              <span>Profil Saya</span>
            </a>
            <a href="ubahpassword" class="dropdown-item btnload">
              <i class="ni ni-settings-gear-65"></i>
              <span>Ubah Password</span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item btnload" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </li>
      </ul>
      <input type="hidden" class="form-control" id="created_by" value="{{Auth::user()->id}}">
      <input type="hidden" class="form-control" id="fcm_token" value="{{Auth::user()->fcm_token}}">
      <div class="loading" style="display: none;">Loading&#8230;</div>
    </div>
  </nav>