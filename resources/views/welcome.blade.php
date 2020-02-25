<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>E-Learning - Home</title>
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
                <a href="/" class="scrollto"><img src="assets/logo.jpg" alt="" class="img-fluid"></a>
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
                    <li class="active"><a href="/admin/index">Admin Panel</a></li>   
                    <li><a href="login">Login</a></li>
                    @endauth
                    @endif 
                </ul>
            </nav><!-- .main-nav -->
        </div>
    </header><!-- #header -->   

    <div id="intro">
        <div id="carouselIndicators" class="carousel slide bg-white" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('assets/img/carousel/1.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4">E-Learning</h2>
                        <!-- Add Slide Description -->
                        <p class="lead">This is a description for the first slide.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    @if (Route::has('login'))
    @auth
    @else
    <div id="loginHome" class="shadow-none p-3 bg-light">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    Belum Login? Login Terlebih Dahulu Untuk Mengakses. <a class="text-success" data-toggle="modal" data-target="#loginModal">( Login )</a>
                </div>
            </div>
        </div>    

        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="no_induk" class="col-md-4 col-form-label text-md-right">Nomor Induk</label>

                                <div class="col-md-6">
                                    <input id="no_induk" type="text" class="form-control" name="no_induk" required autocomplete="no_induk" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div> 
    </div>
    @endauth
    @endif 

    <div id="desc">
        <div class="col-md-12">
            <div class="text-center">
                <h1>Fungsi E-Learning</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="card">
                    <a class="img-card" href="/mapel">
                        <img src="{{ asset('assets/img/home/gambar-1.jpg') }}" />
                    </a>
                    <br />
                    <div class="card-content">
                        <h4 class="card-title">
                            <a href="/mapel">
                                Mata Pelajaran
                            </a>
                        </h4>
                        <div class="">
                            Lihat Mata Pelajaran
                        </div>
                    </div>
                    <div class="card-read-more">
                        <a class="btn btn-link btn-block" href="/mapel"><i class="ion-android-arrow-dropright-circle"></i> Masuk</a>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4">
                <div class="card">
                    <a class="img-card" href="/mapel">
                        <img src="{{ asset('assets/img/home/gambar-2.jpg') }}" />
                    </a>
                    <br />
                    <div class="card-content">
                        <h4 class="card-title">
                            <a href="/mapel">
                                Untuk Siswa
                            </a>
                        </h4>
                        <div class="">
                            Materi, Penugasan, Daftar Nilai
                        </div>
                    </div>
                    <div class="card-read-more">
                        <a class="btn btn-link btn-block" href="/mapel"><i class="ion-android-arrow-dropright-circle"></i> Masuk</a>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4">
                <div class="card">
                    <a class="img-card" href="/mapel">
                        <img src="{{ asset('assets/img/home/gambar-3.jpg') }}" />
                    </a>
                    <br />
                    <div class="card-content">
                        <h4 class="card-title">
                            <a href="/mapel">
                                Untuk Guru
                            </a>
                        </h4>
                        <div class="">
                            RPP, Materi, Penugasan & Penilaian
                        </div>
                    </div>
                    <div class="card-read-more">
                        <a class="btn btn-link btn-block" href="/mapel"><i class="ion-android-arrow-dropright-circle"></i> Masuk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="footer">
        <div class="text-center">
            Copyright &copy; Created by <nobr><a href="https://github.com/Arif-X">Arif-X</a></nobr><br>
        </div>
    </div>

    <script src="{{ URL::asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('lib/jquery/jquery-migrate.min.js') }}"></script>
    <script src="{{ URL::asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ URL::asset('lib/mobile-nav/mobile-nav.js') }}"></script>
</body>