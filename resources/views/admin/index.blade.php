<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{ asset('assets/logo.jpg') }}" rel="icon">
    <link href="{{ URL::asset('assets/logo.jpg') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ URL::asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ URL::asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">

    <!-- DatePicker Stylesheet File -->
    <script src="{{ URL::asset('lib/jquery/jquery.min.js') }}"></script>
</head>
<body>
    <header id="header" class="fixed-top">
        <div class="container">

            <div class="logo float-left">
                <a href="/" class="scrollto"><img src="{{ asset('assets/logo.jpg') }}" alt="" class="img-fluid"></a>
                <a href="/" style="font-style: italic;"><strong>E-Learning</strong></a>
            </div>

            <nav class="main-nav float-right d-none d-lg-block">
                <ul>
                    @if (Route::has('login'))
                    @auth
                    <li class="active"><a href="/home">Home</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @else
                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>                    
                    @endauth
                    @endif 
                </ul>
            </nav><!-- .main-nav -->
        </div>
    </header><!-- #header -->   

    <div id="adminIndex">
        <div class="col-md-6" style="margin-right: auto; margin-left: auto;">
        <div class="card">
            <div class="card-header">
                <strong>Menu</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6" style="padding-bottom: 10px;">
                        <a href="/admin/index/siswa">
                            <div class="card mx-auto text-center">
                                <div class="icon text-center">
                                    <i class="dashboard-icon ion-android-apps" style="font-size: 72px;"></i>
                                </div>
                                <div class="text-center">
                                    <p><strong>Data Siswa</strong></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6" style="padding-bottom: 10px;">
                        <a href="/admin/index/guru">
                            <div class="card mx-auto text-center">
                                <div class="icon text-center">
                                    <i class="dashboard-icon ion-android-apps" style="font-size: 72px;"></i>
                                </div>
                                <div class="text-center">
                                    <p><strong>Data Guru</strong></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <script src="{{ URL::asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('lib/jquery/jquery-migrate.min.js') }}"></script>
    <script src="{{ URL::asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ URL::asset('lib/mobile-nav/mobile-nav.js') }}"></script>
</body>