@extends('layouts.master')

@section('master_css')
  @yield('css')
  <style type="text/css">
    .active{
        color: var(--saraga-color);
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
                        <div class="col-xs-5ths navbot"><a href="{{ url('home') }}"><i class="fa fa-home fa-lg"></i><br>Home</a></div>
                        <div class="col-xs-5ths navbot"><a data-toggle="modal" data-target="#myModal"><i class="fa fa-search fa-lg"></i><br>Search</a></div>
                        <div class="col-xs-5ths navbot"><a href="{{ route('booking-list') }}"><i class="fa fa-list fa-lg"></i><br>Booking</a></div>
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
                $(this).closest('a').addClass('active');
            }
        });
    }
  </script>
@endsection
