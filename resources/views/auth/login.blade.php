<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mata Pelajaran</title>
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
					<li><a href="/">Home</a></li>        
					<li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
					@endauth
					@endif 
				</ul>
			</nav><!-- .main-nav -->
		</div>
	</header><!-- #header -->  


	<div id="login">
		<div class="col-md-6" style="margin-left: auto; margin-right: auto;">
		<div class="card card-login mx-auto text-center bg-white">
			<div class="card-header">
				LOGIN
			</div>
			<div class="card-body">
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
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

								<label class="form-check-label" for="remember">
									{{ __('Remember Me') }}
								</label>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-12">
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
				</form>
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