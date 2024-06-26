<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ $title }}</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/dist/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('fonts/SansPro/SansPro.min.css') }}">
    @if(session()->has("locale") && session()->get("locale") == "ar")
    <link rel="stylesheet" href="{{ asset('css/bootstrap_rtl-v4.2.1/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap_rtl-v4.2.1/custom_rtl.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('css/mycustomstyle.css') }}">
    @stack('styles')

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">{{ __('dashboard/general.home') }}</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <form action="{{ route('admin.logout') }}" method="post">
                        @csrf
                        <button type="submit" class="nav-link btn ">{{ __('dashboard/general.logout') }}</button>
                    </form>
                    {{-- <a href="{{  }}" class="nav-link"> </a> --}}
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                {{-- <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle"> --}}
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                {{-- <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3"> --}}
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                {{-- <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3"> --}}
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                {{-- language convert --}}
                <li class="nav-item dropdown">
                    
                    <a class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" href="#">
                        {{-- <i class="far fa-bell"></i> --}}
                        <span class="badge badge-success navbar-badge">{{ __('dashboard/general.lang') }}
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">{{ __('dashboard/general.lang') }}</span>
                        <div class="dropdown-divider"></div>
                        {{-- <a href="{{ route('langConvert' , 'ar') }}" class="dropdown-item"> --}}
                        <a href="{{ route('lang' , 'ar') }}" class="dropdown-item">
                            {{-- <i class="fas fa-envelope mr-2"></i> --}}
                            {{-- Arabic --}}
                            {{ __('dashboard/general.arabic') }}

                            <span class="float-right text-muted text-sm">
                                <img src="{{ URL::asset('images/flags/EG.png') }}" alt="">

                            </span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('lang' , 'en') }}" class="dropdown-item">
                        {{-- <a href="{{ route('langConvert' , 'en') }}" class="dropdown-item"> --}}
                            {{-- <i class="fas fa-users mr-2"></i> --}}
                            {{ __('dashboard/general.english') }}
                            {{-- English --}}
                            <span class="float-right text-muted text-sm">
                            <img src="{{ URL::asset('images/flags/US.png') }}" alt=""> 

                            </span>
                        </a>
                        {{-- <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> --}}
                    </div>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                            class="fas fa-th-large"></i></a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">lang</span>
                    </a>
                    {{-- <div class="btn-group mb-1"> --}}
                    {{-- <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"> --}}
                        {{-- @if ('ar') --}}
                        {{-- {{ LaravelLocalization::getCurrentLocaleName() }}
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                            {{-- <div class="dropdown-divider"></div> 
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> Arabic
                                <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="">
                            </a>
                            {{-- <div class="dropdown-divider"></div> 
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> Arabic
                                <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="">
                            </a>
                        </div>

                            {{-- <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt=""> --}}
                            {{-- @else --}}
                            {{-- {{ LaravelLocalization::getCurrentLocaleName() }} --}}
                            {{-- <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt=""> --}}
                            {{-- @endif --}}
                    {{-- </button> --}}
                    {{-- <div class="dropdown-menu"> --}}
                    {{-- @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) --}}
                    {{-- <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a> --}}
                    {{-- @endforeach --
    </div>
    </li> --}}
    </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8"> --}}
            <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('images/teacher.png') }}" class="img-circle elevation-2"
                    {{-- <img src="{{ asset('storage/' . Auth::guard('admin')->user()) }}" class="img-circle elevation-2" --}}
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->

            <x-back-office.nav />
            {{-- <x-dashboard.nav /> --}}
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ $breadcrumb ?? '' }}
        <!-- /.content-header -->

        <!-- Main content -->

        <!-- End Breadcrumbs -->

        {{ $slot }}
        <!-- /.content -->
    </div>
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            {{ __('dashboard/general.anything_you_want') }}
        </div>
        <!-- Default to the left -->
        <strong>{{ __('dashboard/general.Copyright') }} &copy; 2023-<?php $mytime = Carbon\Carbon::now();
        echo $mytime->format('Y'); ?> <a
                href="https://adminlte.io">{{ config('app.developer_name') }}</a>.</strong> {{ __('dashboard/general.all_rights_reserved') }}
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/dist/adminlte.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
