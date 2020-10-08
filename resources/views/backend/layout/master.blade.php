<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- FONTAWESOME 5 CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/all.min.css') }}">
        <!-- DATA TABLE CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/jquery.dataTables.min.css') }}">
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
        <!-- CUSTOM CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/dashboard.css') }}">
        <title>@yield('title')</title>
        <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    </head>
        <body>
        <!-- SIDE NAVBAR -->
        <nav class="navbar navbar-expand-md p-0 mb-4">
            <h3>&nbsp;</h3>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="container-fluid p-0">
                    <div class="row w-100 m-0">
                        <!-- SIDEBAR -->
                        <div class="col-md-2 fixed-top sidebar px-0">
                            <ul class="navbar-nav flex-column">
                                <li class="nav-item d-none d-md-block text-center mb-4">
                                    <a href="{{ url('/') }}" class="text-uppercase text-white logo">
                                        <span class="mt-5">Beatnik</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="nav-link">
                                        <i class="fas fa-qrcode fa-lg mr-2"></i>Dashboard
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="{{ route('portfolio.index') }}" class="nav-link">
                                        <i class="fas fa-stream fa-lg mr-2"></i> Portfolio
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('faq.index') }}" class="nav-link">
                                        <i class="fas fa-flag fa-lg mr-2"></i> FAQs
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('subscriber.index') }}" class="nav-link">
                                        <i class="fas fa-male fa-lg mr-2"></i> Subscriber
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('message.index') }}" class="nav-link">
                                        <i class="fas fa-envelope fa-lg"></i> Message
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white mb-2 sidebar-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt fa-lg mr-2"></i>Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!-- ./END SIDEBAR -->
                    </div>
                </div>
            </div>
        </nav>
        <!-- ./END SIDE NAVBAR -->

        @yield('content')

        <!-- FOOTER -->
        <footer class="footer mt-5">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto p-0">
                <footer class="py-3">
                    <div>
                        <p class="lead text-center mt-3">&copy; 2020 Beatnik Technology</p>
                    </div>
                </footer>
            </div>
        </footer>
        <!-- ./END FOOTER -->

        <!-- JQUERY -->
        <script src="{{ asset('backend/js/jquery-3.4.1.min.js') }}"></script>
        <!-- POPPER JS -->
        <script src="{{ asset('backend/js/popper.min.js') }}"></script>
        <!-- BOOTSTRAP JS -->
        <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
        <!-- DATA TABLE JS -->
        <script src="{{ asset('backend/js/jquery.dataTables.min.js') }}"></script>
        <!-- CUSTOM SCRIPT -->
        <script src="{{ asset('backend/js/main.js') }}"></script>
    </body>
</html>