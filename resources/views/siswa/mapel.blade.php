<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    @foreach($mapel as $mapels)
    <title>{{ $mapels->mapel }} Kelas {{ $mapels->kelas }} Semester {{ $mapels->semester }}</title>
    @endforeach
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
                    <li><a href="/mapel">Mapel</a></li>              
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

    <div id="breadcrumbSec">
        <div class="row">
            <div class="col-sm-12">
                <div class="btn-group btn-breadcrumb">
                    <a href="/home" class="btn btn-success"><i class="ion-ios-home"></i></a>
                    <a href="/mapel" class="btn btn-success">Pelajaran</a>
                </div>
            </div>
        </div>
    </div>

    <div id="modul">

        <div class="row">
            @foreach($mapel as $mapels)      
            <div class="col-xs-12 col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            <a href="/mapel/{{ $mapels->mapel }}/{{ $mapels->kelas }}/{{ $mapels->semester }}/{{ $mapels->pertemuan_ke }}">
                                Pertemuan {{ $mapels->pertemuan_ke }}<br/>
                            </a>
                        </h5>
                    </div>
                    <div class="card-content">                    
                        {{ $mapels->nama }}<br/>
                        {{ $mapels->mapel }}<br/>
                        {{ $mapels->kelas }}<br/>
                        {{ $mapels->semester }}<br/>
                        {{ $mapels->modul }}<br/>
                    </div>
                    <div class="card-read-more">
                        <a class="btn btn-link btn-block" href="/mapel/{{ $mapels->mapel }}/{{ $mapels->kelas }}/{{ $mapels->semester }}/{{ $mapels->pertemuan_ke }}"><i class="ion-ios-eye-outline"></i> Lihat</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="{{ URL::asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('lib/jquery/jquery-migrate.min.js') }}"></script>
    <script src="{{ URL::asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ URL::asset('lib/mobile-nav/mobile-nav.js') }}"></script>
</body>