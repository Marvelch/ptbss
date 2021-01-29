<!DOCTYPE html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>PT BSS | INDONESIA</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="{{asset('/img/icon.png')}}">    
    <!-- ========================= CSS here ========================= -->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('/css/bootstrap-5.0.0-alpha-2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/LineIcons.2.0.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/LineIcons.2.0.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/lindy-uikit.css')}}"/>
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;1,200&family=Raleway:ital,wght@0,400;0,500;1,300&display=swap" rel="stylesheet"> --}}
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
  </head>
  <style>
    .shadow-btn{
      padding: 25px;
      box-shadow: 5px 10px #888888;
    }
    body{
      font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:1rem;
    }
      </style>
  <body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- ========================= preloader start ========================= -->
    <div class="preloader">
      <div class="loader">
        <div class="spinner">
          <div class="spinner-container">
            <div class="spinner-rotator">
              <div class="spinner-left">
                <div class="spinner-circle"></div>
              </div>
              <div class="spinner-right">
                <div class="spinner-circle"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ========================= preloader end ========================= -->

    <!-- ========================= hero-section-wrapper-2 start ========================= -->
    <section id="home" class="hero-section-wrapper-2">

      <!-- ========================= header-2 start ========================= -->
      <header class="header header-2">
        <div class="navbar-area">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                  {{-- <a class="navbar-brand" href="index.html">
                    <img src="{{asset('img/logo/Logobss.png')}}" alt="Logo" />
                  </a> --}}
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent2">
                  </div>
                  <!-- navbar collapse -->
                </nav>
                <!-- navbar -->
              </div>
            </div>
            <!-- row -->
          </div>
          <!-- container -->
        </div>
        <!-- navbar area -->
      </header>
      <!-- ========================= header-2 end ========================= -->

      <!-- ========================= hero-2 start ========================= -->
      <div class="hero-section hero-style-2">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-6">
              <div class="hero-content-wrapper">
                {{-- <h4 class="wow fadeInUp" data-wow-delay=".2s">You're Using</h4> --}}
                <h3 class="mb-30 wow fadeInUp" data-wow-delay=".4s">PT BERKAT SAHABAT SEJATI</h3>
                <p class="mb-30 wow fadeInUp" data-wow-delay=".6s"><small>Taman Tekno - Tangerang Selatan</small></p>
                <div class="buttons">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/admin/home') }}" rel="nofollow" class="shadow-btn button button-lg radius-5 wow fadeInUp" data-wow-delay=".7s"><span class="pt-1"><b>KEMBALI</b></span></i></a>
                        @else
                            <a href="{{ route('login') }}" rel="nofollow" class="shadow-btn button button-lg radius-5 wow fadeInUp" data-wow-delay=".7s"><span class="pt-1"><b>LOGIN</b></span></a>
                        @endauth
                    @endif
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="hero-image">
                <img src="{{asset('/img/hero/hero-2/hero-img.svg')}}" alt="" class="wow fadeInRight" data-wow-delay=".2s">
                <img src="{{asset('/img/hero/hero-2/paattern.svg')}}" alt="" class="shape shape-1">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ========================= hero-2 end ========================= -->

    </section>
    <!-- ========================= hero-section-wrapper-2 end ========================= -->
    <!-- ========================= footer style-1 start ========================= -->
    <footer class="footer footer-style-1">
      <div class="container">
        {{-- <div class="widget-wrapper">
          <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6">
              <div class="footer-widget wow fadeInUp" data-wow-delay=".2s">
                <div class="logo">
                  <a href="#0"> <img src="{{asset('/img/logo/logo.svg')}}" alt=""> </a>
                </div>
                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Facilisis nulla placerat amet amet congue.</p>
                <ul class="socials">
                  <li> <a href="#0"> <i class="lni lni-facebook-filled"></i> </a> </li>
                  <li> <a href="#0"> <i class="lni lni-twitter-filled"></i> </a> </li>
                  <li> <a href="#0"> <i class="lni lni-instagram-filled"></i> </a> </li>
                  <li> <a href="#0"> <i class="lni lni-linkedin-original"></i> </a> </li>
                </ul>
              </div>
            </div>
            <div class="col-xl-2 offset-xl-1 col-lg-2 col-md-6 col-sm-6">
              <div class="footer-widget wow fadeInUp" data-wow-delay=".3s">
                <h6>Quick Link</h6>
                <ul class="links">
                  <li> <a href="#0">Home</a> </li>
                  <li> <a href="#0">About</a> </li>
                  <li> <a href="#0">Service</a> </li>
                  <li> <a href="#0">Contact</a> </li>
                </ul>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
              <div class="footer-widget wow fadeInUp" data-wow-delay=".4s">
                <h6>Services</h6>
                <ul class="links">
                  <li> <a href="#0">Web Design</a> </li>
                  <li> <a href="#0">Web Development</a> </li>
                  <li> <a href="#0">Seo Optimization</a> </li>
                  <li> <a href="#0">Blog Writing</a> </li>
                </ul>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
              <div class="footer-widget wow fadeInUp" data-wow-delay=".5s">
                <h6>Help & Support</h6>
                <ul class="links">
                  <li> <a href="#0">Support Center</a> </li>
                  <li> <a href="#0">Live Chat</a> </li>
                  <li> <a href="#0">FAQ</a> </li>
                  <li> <a href="#0">Terms & Conditions</a> </li>
                </ul>
              </div>
            </div>
          </div>
        </div> --}}
        <div class="copyright-wrapper wow fadeInUp" data-wow-delay=".2s">
          <p style="color: black;">Design and Developed by <a href="https://uideck.com" rel="nofollow" target="_blank">PT BSS</a></p>
        </div>
      </div>
    </footer>
    <!-- ========================= footer style-1 end ========================= -->

    <!-- ========================= scroll-top start ========================= -->
    <a href="#" class="scroll-top"> <i class="lni lni-chevron-up"></i> </a>
    <!-- ========================= scroll-top end ========================= -->
		
    <!-- ========================= JS here ========================= -->
    <script src="{{asset('/js/bootstrap.5.0.0.alpha-2-min.js')}}"></script>
    <script src="{{asset('/js/count-up.min.js')}}"></script>
    <script src="{{asset('/js/wow.min.js')}}"></script>
    <script src="{{asset('/js/main.js')}}"></script>
  </body>
</html>
