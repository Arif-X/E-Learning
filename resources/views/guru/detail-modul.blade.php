<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modul & Penugasan</title>
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
    <link href="{{ URL::asset('assets/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">
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
            <div class="col-sm-9">
                <div class="btn-group btn-breadcrumb">
                    <a href="/home" class="btn btn-success"><i class="ion-ios-home"></i></a>
                    <a href="#" class="btn btn-success">Pelajaran</a>
                </div>
            </div>            
        </div>
    </div>    

    <div id="detailModul">  
        @if ($message = Session::get('success'))
        <div class="col-md-12 alert alert-success alert-block margin-tengah">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
        </div>
        @endif        
        <div class="card">
            <div class="card-header">
                Detail Modul & Penugasan
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        @foreach($mapel as $moduls)
                        <strong>File Modul : </strong> {{ $moduls->file }}<br>
                        <strong>Keterangan : </strong> {{ $moduls->keterangan }}<br>
                        @endforeach  
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-success" data-toggle="modal" data-target="#addModal">Tambah atau Edit Modul</button>
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addModalLabel">Tambah atau Edit Modul</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach($mapel as $moduls)
                                        <form method="POST" action="/mapel/modul/tambah-atau-edit" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label for="nama" class="text-right">Nama</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" id="nama" name="nama" class="form-control" value="{{ $moduls->nama }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label for="kelas" class="text-right">Kelas</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" id="kelas" name="kelas" class="form-control" value="{{ $moduls->kelas }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label for="mapel" class="text-right">Mapel</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" id="mapel" name="mapel" class="form-control" value="{{ $moduls->mapel }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label for="semester" class="text-right">Semester</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" id="semester" name="semester" class="form-control" value="{{ $moduls->semester }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label for="pertemuan_ke" class="text-right">Pertemuan Ke</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" id="pertemuan_ke" name="pertemuan_ke" class="form-control" value="{{ $moduls->pertemuan_ke }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label for="modul" class="text-right">Modul</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" id="modul" name="modul" class="form-control" value="{{ $moduls->nama }}">
                                                </div>
                                            </div>   

                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label for="upload" class="text-right">File</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="file" id="upload" name="upload" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label for="keterangan" class="text-right">Keterangan</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" id="keterangan" name="keterangan" class="form-control">
                                                </div>
                                            </div>                                    

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-success">Tambah/Edit</button>
                                        </form>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 20px; padding-top: 20px;">
                    <div class="col-md-9">
                        @foreach($penugasan as $tugas)
                        <strong>Detail Tugas :</strong> {{ $tugas->detail }}<br>
                        <strong>Pengumpulan Terakhir : </strong> {{ $tugas->pengumpulan_terakhir }}
                        @endforeach
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-success" data-toggle="modal" data-target="#addTugasModal">Tambah atau Edit Tugas</button> 
                        <div class="modal fade" id="addTugasModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addModalLabel">Tambah atau Edit Tugas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach($mapel as $moduls)
                                        <form method="POST" action="/mapel/penugasan/tambah-atau-edit" enctype="multipart/form-data" class="form-horizontal"  role="form">
                                            @csrf

                                            <fieldset>
                                                <input type="hidden" name="kelas" value="{{ $moduls->kelas }}">
                                                <input type="hidden" name="mapel" value="{{ $moduls->mapel }}">
                                                <input type="hidden" name="semester" value="{{ $moduls->semester }}">
                                                <input type="hidden" name="pertemuan" value="{{ $moduls->pertemuan_ke }}">
                                                <div class="form-group">
                                                    <label for="dtp_input3" class="col-md-12 control-label">Deskripsi</label>
                                                    <div class="input-group col-md-12">
                                                        <input class="form-control" size="16" type="text" name="deskripsi">
                                                    </div>
                                                    <input type="hidden" id="dtp_input3" value="" /><br/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="dtp_input2" class="col-md-12 control-label">Tanggal Pengumpulan Terakhir</label>
                                                    <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                                        <input class="form-control" size="16" type="text" value="" readonly name="tanggal">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>
                                                    <input type="hidden" id="dtp_input2" value="" /><br/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="dtp_input3" class="col-md-12 control-label">Jam Pengumpulan Terakhir</label>
                                                    <div class="input-group date form_time col-md-12" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                                                        <input class="form-control" size="16" type="text" value="" readonly name="waktu">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                    </div>
                                                    <input type="hidden" id="dtp_input3" value="" /><br/>
                                                </div>
                                            </fieldset>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-success">Tambah/Edit</button>
                                            </form>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>                    

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
    <script type="text/javascript" src="{{ URL::asset('assets/datetimepicker/jquery/jquery-1.8.3.min.js') }}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/datetimepicker/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/datetimepicker/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/datetimepicker/js/bootstrap-datetimepicker.fr.js') }}" charset="UTF-8"></script>
    <script type="text/javascript">
        $('.form_datetime').datetimepicker({
            language:  'id',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });
        $('.form_date').datetimepicker({
            language:  'id',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });
        $('.form_time').datetimepicker({
            language:  'id',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 1,
            minView: 0,
            maxView: 1,
            forceParse: 0
        });
    </script>
</body>