<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('./css/landing.css') }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    {{-- Google FOnts --}}
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"> --}}

    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/open-sauce-one" type="text/css"/>
    <meta name="google-site-verification" content="-RhVV1IO1AaFEP3re5c9kauZV4n8TYjKPGI59_yhVpQ" />
    <meta name="google-site-verification" content="LUWmFovgzu5u3Odn8J0vGr6mU2ub6OXACarDT35-pyQ" />

    <meta name="description" content="{{ $metaContent }}">

    @stack('addons-css')

    <title>@yield('title')</title>
  </head>
  <body>
    <nav
      class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark clean-navbar"
      style="background-color: #42855B !important"
    >
      <div class="container">
        <a class="navbar-brand logo" href="/">
          <b> Karya Manunggal Bambu </span></b>
        {{-- <img
          class="img-fluid"
          src="{{ asset('./assets/img/Logo Biru.png') }}"
          style="width: 252px"
        /> --}}
        </a
        ><button
          data-toggle="collapse"
          class="navbar-toggler"
          data-target="#navcol-1"
        >
          <span class="sr-only">Toggle navigation</span
          ><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="navbar-nav ml-auto">
            <?php 
              $lastSegment = request()->segment(count(request()->segments()));
              $secondSegment = Request::segment(1)
            ?>
            <li class="nav-item mt-2">
                <a class="nav-link" href="{{ $lastSegment == "product" || $secondSegment == "detail" ? route('/') : "#home" }}"><b>Home </b></a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link" href="{{ $lastSegment == "product" || $secondSegment == "detail" ? '/#sejarah' : "#sejarah" }}"><b>Sejarah</b></a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link" href="{{ route('product') }}"><b>Produk</b></a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link" href="{{ $lastSegment == "product" || $secondSegment == "detail" ? '/#struktur-organisasi' : "#struktur-organisasi" }}"><b>Struktur Organisasi</b></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    @yield('content')

    <footer>
      <div class="container text-light">
        <div class="row pt-5 pb-5">
          <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center">
            <h5><b>Kelompok Usaha Bersama</b></h5>
            <p>Karya Manunggal Bambu</p>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="row">
              <div class="col-2">
                <span class="fa fa-map-marker-alt footer-contacts-icon"> </span>
              </div>
              <div class="col-10">
                <a target="_blank" href="https://www.google.com/maps/place/Mas+klendor/@-7.8843904,110.7404474,17z/data=!3m1!4b1!4m5!3m4!1s0x2e7a35e3b059de5f:0xfc1eb69f080cba35!8m2!3d-7.8843983!4d110.7426508?hl=id" class="text-decoration-none text-white">
                  <p>Dusun Mandesan, Desa Semin, Kecamatan Semin, Kabupaten Gunungkidul.</p>
                </a>
              </div>
            </div>
          </div>
          {{-- <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="row">
              <b>Media Sosial</b>
            </div>
            <div class="row">
              <div class="social-links">
                <a href="#">
                  <i class="fab fa-instagram"></i>
                </a>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

    
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-7FVJEBZWCJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-7FVJEBZWCJ');
</script>

    <script>
      //add smooth scrolling when clicking any anchor link
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
          anchor.addEventListener('click', function (e) {
              e.preventDefault();
              document.querySelector(this.getAttribute('href')).scrollIntoView({
                  behavior: 'smooth'
              });
          });
      });
    </script>

    @stack('addons-js')

  </body>
</html>