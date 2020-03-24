@extends('layouts.master')

@section('master_css')
  @yield('css')
  <style type="text/css">
    .active{
        color: var(--saraga-color);
    }
    .active img.off-icon{
        display: none;
    }
    .active img.on-icon{
        display: inline;
    }
    .body-wrapper{
        background-color: #f8f9fa!important;
        width: 100%;
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
                    <nav class="navbar fixed-bottom navbar-expand bg-light navigation">
                      <div class="container text-center">
<!--                         <div class="col-xs-5ths navbot"><a href="{{ url('home') }}"><i class="fa fa-home fa-lg"></i><br>Home</a></div>
                        <div class="col-xs-5ths navbot"><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-search fa-lg"></i><br>Search</a></div>
                        <div class="col-xs-5ths navbot"><a href="{{ route('booking-list') }}"><i class="fa fa-list fa-lg"></i><br>Booking</a></div>
                        <div class="col-xs-5ths navbot"><a href="{{ url('favorit') }}"><i class="fa fa-heart fa-lg"></i><br>Favorit</a></div>
                        <div class="col-xs-5ths navbot"><a href="{{ url('profile') }}"><i class="fa fa-user-circle fa-lg"></i><br>Akun</a></div> -->

                        <div class="col-xs-5ths navbot"><a class="ic_home" href="{{ url('home') }}">
                            <img class="off-icon" src="{{ asset('images/navbar/ic_home_off.svg') }}" alt="" width="20" height="20" title="Home" style="display: inline;">
                            <img class="on-icon" src="{{ asset('images/navbar/ic_home_on.svg') }}" alt="" width="20" height="20" title="Home" style="display: none;">
                            <br>Home</a>
                        </div>
                        <div class="col-xs-5ths navbot"><a href="#" data-toggle="modal" data-target="#myModal">
                            <img class="off-icon" src="{{ asset('images/navbar/ic_search_off.svg') }}" alt="" width="20" height="20" title="Search" style="display: inline;">
                            <img class="on-icon" src="{{ asset('images/navbar/ic_search_off.svg') }}" alt="" width="20" height="20" title="Search" style="display: none;">
                            <br>Search</a>
                        </div>
                        <div class="col-xs-5ths navbot"><a href="{{ route('booking-list') }}">
                            <img class="off-icon" src="{{ asset('images/navbar/ic_booking_off.svg') }}" alt="" width="20" height="20" title="Booking" style="display: inline;">
                            <img class="on-icon" src="{{ asset('images/navbar/ic_booking_on.svg') }}" alt="" width="20" height="20" title="Booking" style="display: none;">
                            <br>Booking</a>
                        </div>
                        <div class="col-xs-5ths navbot" style="color: rgb(216,216,216);"><a href="{{ url('favorit') }}">
                            <i class="fa fa-heart fa-lg off-icon" style="color: rgb(216,216,216); display: inline-block"></i>
                            <i class="fa fa-heart fa-lg on-icon" style="display: none"></i>
                            <!-- <img class="on-icon" src="{{ asset('images/navbar/ic_favorit_on.png') }}" alt="" width="20" height="20" title="Akun" style="display: none;"> -->
                            <br>Favorit</a>
                        </div>
                        <div class="col-xs-5ths navbot"><a href="{{ url('profile') }}">
                            <img class="off-icon" src="{{ asset('images/navbar/ic_akun_off.svg') }}" alt="" width="20" height="20" title="Akun" style="display: inline;">
                            <img class="on-icon" src="{{ asset('images/navbar/ic_akun_on.svg') }}" alt="" width="20" height="20" title="Akun" style="display: none;">
                            <br>Akun</a>
                        </div>

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

    </body>
@endsection


@section('master_script')
  @yield('script')
  <script type="text/javascript">
    $(function () {
        var flatpickr = $(".flatpickr").flatpickr({
            altFormat: "j F Y",
            dateFormat: "j F Y",
            minDate: "today",
            disableMobile: "true"
        });
        setNavigation();
    });

    function setNavigation() {
        var path = window.location;

        $(".navbot a").each(function () {
            var href = $(this).attr('href');
            if (path == href) {
                var a = $(this).closest('a');
                a.addClass('active');
                a.find('.off-icon').toggle();
                a.find('.on-icon').toggle();
            }
        });
    }
  </script>
@endsection
