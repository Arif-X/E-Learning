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
					<a href="#" class="btn btn-success">Tugas</a>
				</div>
			</div>
		</div>
	</div>

	<div id="tugas">
		@if ($message = Session::get('info'))
		<div class="col-md-12 alert alert-info alert-block margin-tengah">
			<button type="button" class="close" data-dismiss="alert">×</button>    
			<strong>{{ $message }}</strong>
		</div>
		@endif
		@if ($message = Session::get('error'))
		<div class="col-md-12 alert alert-info alert-block margin-tengah">
			<button type="button" class="close" data-dismiss="alert">×</button>    
			<strong>{{ $message }}</strong>
		</div>
		@endif
		@if ($message = Session::get('success'))
		<div class="col-md-12 alert alert-info alert-block margin-tengah">
			<button type="button" class="close" data-dismiss="alert">×</button>    
			<strong>{{ $message }}</strong>
		</div>
		@endif
		<div class="card">
			<div class="card-header">
				Tugas
			</div>
			<div class="card-body">
				<h5>Detail Tugas</h5>
				@foreach($tugas as $tugass)
				{{ $tugass->detail }}
				@endforeach
			</div>
			<div class="card-footer">
				<form method="POST" action="/tugas/upload" enctype="multipart/form-data">
					@csrf
					@foreach($tugas as $tugass)
					<input type="hidden" name="id_penugasan" value="{{ $tugass->id }}">
					<input type="hidden" name="kelas" value="{{ $tugass->kelas }}">
					<input type="hidden" name="mapel" value="{{ $tugass->mapel }}">
					<input type="hidden" name="pertemuan" value="{{ $tugass->pertemuan_ke }}">
					@endforeach
					<div class="form-group">
						<div class="col-md-12 text-center">
							<label for="upload">Edit/Upload File Tugas</label>
						</div>
						<div class="col-md-12">
							<input class="form-control" id="upload" type="file" name="upload">
						</div>						
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-success" style="width: 100%;">UPLOAD</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="{{ URL::asset('lib/jquery/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('lib/jquery/jquery-migrate.min.js') }}"></script>
	<script src="{{ URL::asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ URL::asset('lib/easing/easing.min.js') }}"></script>
	<script src="{{ URL::asset('lib/mobile-nav/mobile-nav.js') }}"></script>
</body>