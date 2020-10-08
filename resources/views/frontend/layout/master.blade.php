<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title')</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Beatnik Technology - Practical Test version-2
  * Author: Beatnik Technology Limited
  ======================================================== -->
</head>
<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-end fixed-top topbar-transparent">
    <div class="container d-flex justify-content-end">
      <div class="social-links">
        <a href="https://www.facebook.com/beatnik.technology/" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="https://www.linkedin.com/company/beatnik-technology/" class="linkedin"><i class="fa fa-linkedin"></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="{{ url('/') }}"><img src="{{ asset('assets/img/logo.png') }}"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="main-nav d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{ url('/') }}">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#footer">Contact Us</a></li>
        </ul>
      </nav><!-- .main-nav-->

    </div>
  </header><!-- End Header -->


  @yield('content')


  <!-- ======= Footer ======= -->
  <footer id="footer" class="section-bg">
    <div class="footer-top">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">

            <div class="row">

              <div class="col-sm-6">

                <div class="footer-info">
                  <h3>Beatnik</h3>
                  <p>Knowing and understanding a customer's unique needs and being able to fulfil them not just to their satisfaction but also often beyond expectation is the hallmark of a customer-centric organisation.</p>
                </div>

                <div class="footer-newsletter">
                  <h4>Our Newsletter</h4>
                  <form action="{{ route('subscriber.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="1">
                    <input type="email" name="email"><input type="submit" value="Subscribe">
                  </form>
                    @if(session('subscribe_success'))
                        <script>window.alert("You are subscribed.")</script>
                    @endif
                </div>

              </div>

              <div class="col-sm-6">
                <div class="footer-links">
                  <h4>Useful Links</h4>
                  <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="#about">About us</a></li>
                    <li><a href="#">Services</a></li>
                  </ul>
                </div>

                <div class="footer-links">
                  <h4>Contact Us</h4>
                  <p>
                    House 106, Park Road <br>
                    Mohakhali DOHS, Dhaka<br>
                    <strong>Phone:</strong> +88 01316 100 183<br>
                    <strong>Email:</strong> info@beatnik.technology<br>
                  </p>
                </div>

                <div class="social-links">
                  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                  <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                </div>

              </div>

            </div>

          </div>

          <div class="col-lg-6">

            <div class="form">

              <h4>Send us a message</h4>
              @if(session('success'))
                <script>window.alert("Your message Send Successfully.")</script>
              @endif
              <form action="{{ route('message.store') }}" method="post">
              @csrf
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="text-danger">{{ $errors->first('name') }}</div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="text-danger">{{ $errors->first('email') }}</div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="text-danger">{{ $errors->first('subject') }}</div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="text-danger">{{ $errors->first('message') }}</div>
                </div>
                <div class="text-center">
                  <button class="btn btn-primary" type="submit" title="Send Message">Send Message</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Beatnik Technology</strong>. All Rights Reserved
      </div>
      <div class="credits">
         Designed by <a href="https://beatnik.technology/">Beatnik Technology</a>
      </div>
    </div>
  </footer><!-- End  Footer -->
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>