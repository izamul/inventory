<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Kios Sahabat Tani</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="zoufarm/public/assets/img/favicons/zou-favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="zoufarm/public/assets/img/favicons/zou-favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="zoufarm/public/assets/img/favicons/zou-favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="zoufarm/public/assets/img/favicons/zou-favicon.png">
    <link rel="manifest" href="zoufarm/public/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="zoufarm/public/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="zoufarm/public/assets/css/theme.css" rel="stylesheet" />

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-light opacity-85" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="{{ route('home') }}"><img class="d-inline-block align-top img-fluid" src="zoufarm/public/assets/img/gallery/logo-icon.png" alt="" width="40" /><span class="text-theme font-monospace fs-4 ps-2">Sahabat Tani</span></a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              {{-- <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="#header">Home</a></li> --}}
            </ul>
            @guest
            @if (Route::has('login'))
            <a href="{{ route('home') }}" class="btn btn-lg btn-dark bg-gradient order-0 mr-10" style="margin-right: 10px;">Login</a>
            <a href="{{ route('register') }}" class="btn btn-lg btn-dark bg-gradient order-0">Register</a>
            @endif
            @else
            <a class="nav-link" href="{{ route('home') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre> {{ Auth::user()->namaPegawai }} </a>
            @endguest

        </div>
      </nav>
      <section class="py-0" id="header">
        <div class="bg-holder d-none d-md-block" style="background-image:url(zoufarm/public/assets/img/illustrations/hero-header.png);background-position:right top;background-size:contain;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder d-md-none" style="background-image:url(zoufarm/public/assets/img/illustrations/hero-bg.png);background-position:right top;background-size:contain;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row align-items-center min-vh-75 min-vh-lg-100">
            <div class="col-md-7 col-lg-6 col-xxl-5 py-6 text-sm-start text-center">
              <h1 class="mt-6 mb-sm-4 fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6">Selamat Datang Di<br class="d-block d-lg-block" />Kios Sahabat Tani</h1>
              <p class="mb-4 fs-1">"Bersama Sahabat Tani, Tanam Harapan, Panen Sukses"</p>
            </div>
          </div>
        </div>
      </section>
      <section class="py-5" id="Opportuanities">
        <div class="bg-holder d-none d-sm-block" style="background-image:url(zoufarm/public/assets/img/illustrations/bg.png);background-position:top left;background-size:225px 755px;margin-top:-17.5rem;">
        </div>

    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Chivo:wght@300;400;700;900&amp;display=swap" rel="stylesheet">
  </body>

</html>