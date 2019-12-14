<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
        name="viewport">
    <title>SITA.Industri</title>
    <link rel="icon" type="image/png" href="{{asset('img/favicon-32x32.png')}}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{asset('img/favicon-16x16.png')}}" sizes="16x16">
    
    <link rel="stylesheet" href="{{asset('modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('modules/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('modules/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('modules/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('modules/jquery-selectric/selectric.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/components.min.css')}}">
    
    <script src="{{asset('modules/jquery.min.js')}}"></script>
    <script src="{{asset('modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('modules/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
    <script src="{{asset('modules/popper.js')}}"></script>
    <script src="{{asset('modules/tooltip.js')}}"></script>
    <script src="{{asset('modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('modules/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('modules/moment.min.js')}}"></script>
    <script src="{{asset('js/lodash.js')}}"></script>
    <script src="{{asset('js/stisla.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script>
        $(document).ready(function() {
        $('#Data').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
            });
        });
    </script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <style>
        table.dataTable tbody td {
            vertical-align: middle;
        }
    </style>
</head>

{{-- {{ dd(Auth::user()->username) }} --}}

<body style="font-family:Nunito">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg" style="background-color:{{ Auth::user()->name=='Operator' ? '#333335' : '' }}"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown beep"><a href="#" data-toggle="dropdown"
                        class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{asset('img/avatar/avatar-1.png')}}" class="rounded-circle mr-2">
                        <div class="d-sm-none d-lg-inline-block" style="font-weight:normal">Hallo,
                            {{Auth::user()->name}}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow rounded">
                        <div class="dropdown-title">Logged in 4 years ago</div>
                        @if (Auth::user()->role == "mahasiswa")
                        <a href="{{route('mhs.settings')}}" class="dropdown-item has-icon"><i class="far fa-user"></i> Settings</a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a href="{{route('logout')}}" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <div class="main-sidebar sidebar-style-2 shadow">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="">SITA.TI</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="">TI</a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Administrasi</li>
                    @if (Auth::user()->role != "mahasiswa")
                    <li class="nav-item {{ (request()->is('admin/dashboard')) ? "active" : '' }}"><a href="{{route('admin.dashboard')}}"
                            class="nav-link"><i class="fas fa-columns"></i><span>Dashboard</span></a>
                    </li>
                    @elseif (Auth::user()->role == "mahasiswa")
                    <li class="nav-item {{ (request()->is('mahasiswa/review')) ? "active" : '' }}"><a href="{{route('mhs.review')}}"
                            class="nav-link"><i class="fas fa-columns"></i><span>Review</span></a>
                    </li>
                    @endif

                    @if (Auth::user()->role != "mahasiswa")
                    <li class="dropdown {{ (request()->is('admin/rekap*')) ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-server"></i><span>Akun Pengguna</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="{{ (request()->is('admin/rekap/mahasiswa*')) ? 'active' : '' }}"><a
                                    href="{{route('admin.rekap.mhs')}}" class="nav-link">Rekap
                                    Mahasiswa</a></li>
                            <li class="{{ (request()->is('admin/rekap/dosen*')) ? 'active' : '' }}"><a href="{{route('admin.rekap.dsn')}}"
                                    class="nav-link">Rekap
                                    Dosen</a></li>
                        </ul>
                    </li>                  
                    <li class="menu-header">Rekapitulasi</li>
                    <li class="nav-item {{ Request::is('admin/tugasakhir/permohonan*') ? "active" : NULL }}"><a
                            href="{{route('admin.permohonan.ta')}}" class="nav-link"><i class="fas fa-external-link-alt"></i><span>Rekap
                                Permohonan</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/tugasakhir/list') ? "active" : NULL }}"><a href="{{route('admin.list.ta')}}"
                            class="nav-link"><i class="fas fa-external-link-alt"></i><span>Rekap Tugas Akhir</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/tugasakhir/selesai') ? "active" : NULL }}"><a
                            href="{{route('admin.selesai.ta')}}" class="nav-link"><i class="fas fa-external-link-alt"></i><span>Rekap
                                Selesai</span></a>
                    </li>
                    @endif
                    @if (Auth::user()->role == "mahasiswa")
                    <li class="menu-header">Tugas Akhir</li>
                    <li class="nav-item {{ Request::is('mahasiswa/tugasakhir/permohonan') ? "active" : NULL }}"><a
                            href="{{route('mhs.daftar.ta')}}" class="nav-link"><i
                                class="fas fa-external-link-alt"></i><span>Daftar</span></a>
                    </li>
                    @endif
                </ul>
            </aside>
        </div>

        <div class="main-content">
            <section class="section">
                <div class="row">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="breadcrumb shadow mt-3">
                                <li class="breadcrumb-item"></li>
                                <li class="breadcrumb-item">@yield('pages')</li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </div>
                        </div>

                        <h1 class="text-center pt-auto pb-3" style="font-weight: 400">@yield('title')</h1>

                        @yield('content')

                    </div>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-right">
                Copyright &copy; 2019 <div class="bullet"></div> Design By <a href="">haritsf</a> Powered by Stisla
            </div>
        </footer>
        
        <script src="{{asset('modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
        
</body>

</html>