<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Siswa</title>
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
                    <li class="active"><a href="/admin/index/guru">Data Guru</a></li>
                    <li class="active"><a href="/admin/index">Admin Panel</a></li>
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
                    <a href="/mapel" class="btn btn-success">Index</a>
                </div>
            </div>
        </div>
    </div>

    <div id="admin">

        @if ($message = Session::get('error'))
        <div class="col-md-12 alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($message = Session::get('success'))
        <div class="col-md-12 alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
        </div>
        @endif        

        <div class="text-right" style="padding-bottom: 20px;">
            <button class="btn btn-success" data-toggle="modal" data-target="#addModal">Tambah</button>
        </div>

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/admin/index/siswa/add">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="no_induk" class="text-right">No Induk</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="no_induk" name="no_induk" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="nama" class="text-right">Nama</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="nama" name="nama" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="password" class="text-right">Password</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="password" name="password" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="status" class="text-right">Status</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="status" name="status" class="form-control" readonly value="Siswa">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="kelas" class="text-right">Kelas</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="kelas" name="kelas" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Tambah User</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                <strong>Data Siswa</strong>
            </div>
            <div class="card-body">
                <table class="table table-responsive table-stripped">
                    <tr>
                        <th width="10%" class="text-center">
                            No. Induk
                        </th>
                        <th width="60%">
                            Nama Lengkap
                        </th>
                        <th width="5%" class="text-center">
                            Status
                        </th>
                        <th width="5%" class="text-center">
                            Kelas
                        </th>
                        <th width="5%" class="text-center">
                            Edit
                        </th>
                        <th width="5%" class="text-center">
                            Delete
                        </th>
                    </tr>
                    @foreach($user as $users)
                    <tr>
                        <td class="text-center">
                            {{ $users->no_induk }}
                        </td>
                        <td>
                            {{ $users->nama }}
                        </td>
                        <td class="text-center">
                            {{ $users->status }}
                        </td>
                        <td class="text-center">
                            {{ $users->kelas }}
                        </td>
                        <td class="text-center">
                            <button class="btn btn-success" data-toggle="modal" data-target="#editModal">Edit</button>
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Data Siswa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="/admin/index/siswa/update">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label for="no_induk" class="text-right">No Induk</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" id="no_induk" name="no_induk" class="form-control" value="{{ $users->no_induk }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label for="nama" class="text-right">Nama</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" id="nama" name="nama" class="form-control" value="{{ $users->nama }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label for="kelas" class="text-right">Kelas</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" id="kelas" name="kelas" class="form-control" value="{{ $users->kelas }}">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-success">Simpan</button>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>  
                        </td>
                        <td>
                            <div class="text-center">
                                <button class="btn btn-success" data-toggle="modal" data-target="#deleteModal" type="button">Hapus</button>
                            </div>
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Penghapusan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            Apakah Anda Yakin Akan Menghapus?
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                            <a class="btn btn-success" type="button" href="/admin/index/siswa/delete/{{ $users->no_induk }}">Ya</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>                            

            </div>
        </div>        

    </div>

    <script src="{{ URL::asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('lib/jquery/jquery-migrate.min.js') }}"></script>
    <script src="{{ URL::asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ URL::asset('lib/mobile-nav/mobile-nav.js') }}"></script>
</body>