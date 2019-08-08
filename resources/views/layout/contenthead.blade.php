<!--

=========================================================
* Argon Dashboard - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme_color" content="#ffffff">   
  @if(Auth::user())
  <title>PAR | Prima Armada Raya</title>
  @else
  <title>PAR | Prima Armada Raya/title>
  @endif
  <!-- Favicon -->
  <link href="./assets/icons/72x72.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/content/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="./assets/content/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="./assets/content/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />

  <link href="./assets/content/css/coba.css" rel="stylesheet" />

  <link rel="manifest" href="./manifest.json">
</head>
<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <a href="login/logout"><button class="navbar-toggler" id="logout" type="button">
        <span class="ni ni-user-run"></span>
      </button></a>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="driver">
        <img src="./assets/login/images/par.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="ni ni-bell-55"></span>
      </button>
      {{ csrf_field() }}
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="./assets/login/images/par.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Navigation -->
        <h6 class="navbar-heading text-muted">Notifications</h6>
        <hr class="my-3">

        <table border="0" width="100%">
          <tr>
            <td width="30px">
              <i class="ni ni-tv-2 text-primary"></i>
            </td>
            <td>
              <h4><b>Approved Berhasil Dilakukan</b></h4>
            </td>
          </tr>
          <tr>
            <td width="30px">
              
            </td>
            <td>
              <h6 class="text-muted ls-1 mb-1" align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h6>
            </td>
          </tr>
        </table>
        <hr class="my-3">
        <table border="0" width="100%">
          <tr>
            <td width="30px">
              <i class="ni ni-planet text-blue"></i>
            </td>
            <td>
              <h4><b>Selamat Hari Raya Idul Fitri</b></h4>
            </td>
          </tr>
          <tr>
            <td width="30px">
              
            </td>
            <td>
              <h6 class="text-muted ls-1 mb-1" align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h6>
            </td>
          </tr>
        </table>
        <hr class="my-3">
        <table border="0" width="100%">
          <tr>
            <td width="30px">
              <i class="ni ni-key-25 text-info"></i>
            </td>
            <td>
              <h4><b>Berhasil Memberikan Nilai</b></h4>
            </td>
          </tr>
          <tr>
            <td width="30px">
              
            </td>
            <td>
              <h6 class="text-muted ls-1 mb-1" align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h6>
            </td>
          </tr>
        </table>
        <hr class="my-3">
        
      </div>
    </div>
  </nav>