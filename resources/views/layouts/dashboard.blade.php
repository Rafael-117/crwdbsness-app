<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>CRWDBSNESS - Admin</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../dashboard/assets/img/icon.ico" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts and icons -->
    <script src="../dashboard/assets/js/plugin/webfont/webfont.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('/js/ckeditor.js') }}"></script>

    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['../dashboard/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../dashboard/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dashboard/assets/css/atlantis.css">
    <link rel="stylesheet" href="../dashboard/assets/css/calendar.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    {{-- <link rel="stylesheet" href="../dashboard/assets/css/demo.css"> --}}


</head>

<body data-editor="ClassicEditor" data-collaboration="false" data-revision-history="false">


    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">

                <a href="{{ route('welcome') }}" class="logo">
                    <img src="../dashboard/assets/img/logo.svg" width="150px" alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

                <div class="container-fluid">
                    <div class="collapse" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control">
                            </div>
                        </form>
                    </div>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
                                aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                        
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="notification">0</span>
                            </a>
                            <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                <li>
                                    <div class="dropdown-title">Ninguna nueva notificación</div>
                                </li>
                                <li>
                                    <div class="notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            {{-- <a href="#">
                                                <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i>
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        New user registered
                                                    </span>
                                                    <span class="time">5 minutes ago</span>
                                                </div>
                                            </a> --}}
                                            {{-- <a href="#">
                                                <div class="notif-icon notif-success"> <i class="fa fa-comment"></i>
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Rahmad commented on Admin
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="../dashboard/assets/img/profile2.jpg" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Reza send messages to you
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-icon notif-danger"> <i class="fa fa-heart"></i>
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Farrah liked Admin
                                                    </span>
                                                    <span class="time">17 minutes ago</span>
                                                </div>
                                            </a> --}}
                                        </div>
                                    </div>
                                </li>
                                {{-- <li>
                                    <a class="see-all" href="javascript:void(0);">See all notifications<i
                                            class="fa fa-angle-right"></i> </a>
                                </li> --}}
                            </ul>
                        </li>

                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{ Auth::user()->picture ?? '/dashboard/assets/img/avatar.jpg' }}"
                                        alt="..." class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img
                                                    src="{{ Auth::user()->picture ?? '/dashboard/assets/img/avatar.jpg' }}"
                                                    alt="image profile" class="avatar-img rounded"></div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p class="text-muted">{{ Auth::user()->email }}</p><a href="/perfil"
                                                    class="btn btn-xs btn-secondary btn-sm">Ver Perfil</a>
                                            </div>
                                        </div>
                                    </li>
                                    {{-- <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/perfil">Mi Perfil</a>
                                        <a class="dropdown-item" href="#">My Balance</a>
                                        <a class="dropdown-item" href="#">Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Account Setting</a> --}}
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            {{ __(' Cerrar sesión') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>

                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">

                            <img src="{{ Auth::user()->picture ?? '/dashboard/assets/img/avatar.jpg' }}"
                                alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    {{ Auth::user()->name }}
                                    <span class="user-level">{{ Auth::user()->type }}</span>
                                    <span class="caret"></span>
                                </span>
                            </a>
                            <div class="clearfix"></div>

                            <div class="collapse in" id="collapseExample">
                                <ul class="nav">
                                    <li>
                                        <a href="/perfil">
                                            <span class="link-collapse">Mi Perfil</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        <li class="nav-item active">
                            <a href="{{ route('home') }}" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Inicio</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Componentes</h4>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('companies') }}">
                                <i class="fas fa-building"></i>
                                <p>Empresas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('proyectos') }}">
                                <i class="fas fa-file-invoice-dollar"></i>
                                <p>Proyectos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home') }}">
                                <i class="fas fa-exchange-alt"></i>
                                <p>Transacciones</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div class="col-md-8">
                                <h2 class="text-white pb-2 fw-bold">{{ $info->title ?? 'Dashboard' }}</h2>
                                <h5 class="text-white op-7 mb-2">{{ $info->description ?? 'Dashboard' }}</h5>
                            </div>
                            @if ($info->buton)
                                <div class="ml-md-auto py-2 py-md-0">
                                    <a href="{{ $info->action ?? '#' }}" class="btn btn-white btn-round mr-2"> <i
                                            class="fa fa-plus"></i>{{ $info->btn_text }}</a>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>

                @yield('content')
            </div>
        </div>

    </div>
    <!--   Core JS Files   -->
    <script src="../dashboard/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="../dashboard/assets/js/core/popper.min.js"></script>
    <script src="../dashboard/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="../dashboard/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="../dashboard/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="../dashboard/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


    <!-- Chart JS -->
    <script src="../dashboard/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="../dashboard/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="../dashboard/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="../dashboard/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="../dashboard/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="../dashboard/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="../dashboard/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Sweet Alert -->
    <script src="../dashboard/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Atlantis JS -->
    <script src="../dashboard/assets/js/atlantis.js"></script>
    <script src="../dashboard/assets/js/charts.js"></script>

     <!-- Calendar JS -->
     <script src='../dashboard/assets/js/fullCalendar.js'></script>
     <script src='../dashboard/assets/js/locales-all.fullCalendar.js'></script>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    {{-- <script src="../dashboard/assets/js/setting-demo.js"></script> --}}

    @yield('scripts')
</body>

</html>

