<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('fonts/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-js.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">


</head>
<body>

<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="
            @if(is_admin())
        {{ route('admin-dashboard') }}
        @elseif(is_accountant())
        {{ route('accountant-dashboard') }}
        @elseif(is_worker())
        {{ route('worker-dashboard') }}
        @else
        {{ route('technician-dashboard') }}
        @endif
                ">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Eko-Service <sup>beta</sup></div>
        </a>

        <hr class="sidebar-divider my-0">

        @if(!is_technician())
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('seal-new-item') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Sprzedaż</span>
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('buy-new') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Zakup</span>
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('warehouse-list') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Magazyn</span>
            </a>
        </li>
        @endif

        <hr class="sidebar-divider">

        @if(is_admin())
        <div class="sidebar-heading">
            Pracownicy
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user-list') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Lista</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user-new') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Dodaj</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-invoice') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Dane faktury</span>
            </a>
        </li>

        <hr class="sidebar-divider">
        @endif


        <div class="sidebar-heading">
            Zamówienia
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('order-new') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Dodaj nowe</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('order-list') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Zamówione</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Zlecenia
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('repair-new') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Dodaj nowe</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('repair-current') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Aktualne</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('repair-ended') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Zakończone</span>
            </a>
        </li>

        @if(is_admin() || is_accountant())
        <div class="sidebar-heading">
            Kalendarz
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('calendar') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Kalendarz</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Archiwum
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('sale-list') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Sprzedane</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('buy-list') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Kupione</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('repair-list') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Naprawy</span>
            </a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">
        @endif

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
                            <img class="img-profile rounded-circle" src="{{ asset('image/pic04.jpg') }}">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            {{--<a class="dropdown-item" href="#">--}}
                                {{--<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>--}}
                                {{--Settings--}}
                            {{--</a>--}}
                            {{--<div class="dropdown-divider"></div>--}}
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
{{--<script src="{{ asset('js/custom.js') }}"></script>--}}
{{--@yield('script')--}}
</body>
</html>
