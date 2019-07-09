@extends('layouts.master')

@section('master_css')
  @yield('css')
  <style type="text/css">
    .active{
            color: var(--saraga-color);;
    }
  </style>
@endsection

@section('title')
  @yield('title')
@endsection

@section('body')

<body class="body-wrapper">
    <!--============================
    =            Navigation        =
    =============================-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand navbar-light navigation d-none d-lg-block">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto main-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('home') }}">Home</a>
                                </li>
                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link" href="{{ url('field/list') }}">Today's Deals</a>
                                </li>
                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Categories <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <!-- Dropdown list -->
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ url('field/list') }}">Batminton</a>
                                        <a class="dropdown-item" href="{{ url('field/list') }}">Futsal</a>
                                        <a class="dropdown-item" href="{{ url('field/list') }}">Basket</a>
                                        <a class="dropdown-item" href="{{ url('field/list') }}">Tenis Meja</a>
                                    </div>
                                </li>
                            </ul>
                            
                            <ul class="navbar-nav ml-auto mt-10">
                                @if (is_null(session('auth_data')))
                                <li class="nav-item">
                                    <a class="nav-link login-button" href="{{ url('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white add-button" href="{{ url('register') }}">Create Account</a>
                                </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link login-button" href="{{ url('logout') }}">Log Out</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white add-button" href="{{ url('profile') }}">{{ session('auth_data')->name }}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </nav>
                    <nav class="navbar fixed-bottom navbar-expand bg-light navigation d-lg-none">
                      <div class="container-fluid text-center">
                        <div class="col-xs-5ths navbot"><a href="{{ url('home') }}"><i class="fa fa-home fa-lg"></i><br>Home</a></div>
                        <div class="col-xs-5ths navbot"><a href="#"><i class="fa fa-list fa-lg"></i><br>Booking</a></div>
                        <div class="col-xs-5ths navbot"><a href="#"><i class="fa fa-envelope fa-lg"></i><br>Inbox</a></div>
                        <div class="col-xs-5ths navbot"><a href="{{ url('favorit') }}"><i class="fa fa-heart fa-lg"></i><br>Favorit</a></div>
                        <div class="col-xs-5ths navbot"><a href="{{ url('profile') }}"><i class="fa fa-user-circle fa-lg"></i><br>Akun</a></div>
                      </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!--============================
    =            Content            =
    =============================-->
    @yield('content')
@endsection

@section('master_script')
  @yield('script')
  <script type="text/javascript">
    $(function () {
        setNavigation();
    });

    function setNavigation() {
        var path = window.location;

        $(".navbot a").each(function () {
            var href = $(this).attr('href');
            if (path == href) {
                $(this).closest('a').addClass('active');
            }
        });
    }
  </script>
@endsection
