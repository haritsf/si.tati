<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
        name="viewport">
    <title>SITA.Industri</title>
    <link rel="icon" type="image/png" href="{{asset('img/favicon-32x32.png')}}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{asset('img/favicon-16x16.png')}}" sizes="16x16">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->

    <style>
        table.dataTable tbody td {
            vertical-align: middle;
        }
    </style>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/components.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/landing.css')}}">
    <link rel="stylesheet" href="{{asset('modules/datatables/datatables.min.css')}}">
    <script src="{{asset('modules/jquery.min.js')}}"></script>
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
</head>

<body>
    <nav class="navbar navbar-reverse navbar-expand-lg" style="position: absolute;">
        <div class="container">
            <div class="collapse navbar-collapse">
                <a class="navbar-brand smooth" href="">sita.ti</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto align-items-lg-center d-none d-lg-block">
                    <li class="ml-lg-3 nav-item">
                        <a href="{{ route('login') }}" class="btn btn-md btn-round btn-icon icon-left"
                            style="display:{{ Request::is('login') ? 'none' : ''}}">
                            <i class="fab fa-stumbleupon"></i> Login</a>
                        {{-- <a href="{{ route('logout') }}" class="btn btn-md btn-round btn-icon icon-left">
                        <i class="fab fa-stumbleupon"></i> Logout</a> --}}
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="mt-5">
        <div class="container">
            <div class="row" style="color:#FAFAFA">
                <div class="col-md-5">
                    <h3 class="text-capitalize" style="font-weight:500">sistem informasi tugas akhir</h3>
                    <div class="pr-lg-5">
                        <p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore
                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea
                            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est
                            laborum.</p>
                        <p>&copy; Stisla. With <i class="fas fa-heart text-danger"></i> from Indonesia</p>
                        <div class="mt-4 social-links">
                            <a href="https://github.com/stisla"><i class="fab fa-github"></i></a>
                            <a href="https://twitter.com/getstisla"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Core</h4>
                            <ul>
                                <li><a href="http://demo.getstisla.com/index.html">Dashboard</a></li>
                                <li><a href="http://demo.getstisla.com/layout-transparent.html">Layouts</a></li>
                                <li><a href="http://demo.getstisla.com/bootstrap-alert.html">Bootstrap</a></li>
                                <li><a href="http://demo.getstisla.com/components-article.html">Components</a></li>
                                <li><a href="http://demo.getstisla.com/modules-calendar.html">Third-party Libraries</a>
                                </li>
                                <li><a href="http://demo.getstisla.com/features-activities.html">Pre-built Pages</a>
                                </li>
                                <li><a href="javascript:;">Skeleton (Progress)</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- General JS Scripts -->
    <script src="{{asset('modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/stisla.js')}}"></script>
    <script src="{{asset('js/landing.js')}}"></script>
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('modules/datatables/datatables.min.js')}}"></script>

</body>

</html>