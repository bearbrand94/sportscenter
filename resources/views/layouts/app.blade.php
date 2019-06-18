<html lang="en">
    <head>
        <title>App Name - @yield('title')</title>
        <!-- SITE TITTLE -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- FAVICON -->
        <link href="{{ asset('img/favicon.png') }}" rel="shortcut icon">
        <!-- PLUGINS CSS STYLE -->
        <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap-slider.css') }}">
        <!-- Font Awesome -->
        <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- Owl Carousel -->
        <link href="{{ asset('plugins/slick-carousel/slick/slick.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/slick-carousel/slick/slick-theme.css') }}" rel="stylesheet">
        <!-- Fancy Box -->
        <link href="{{ asset('plugins/fancybox/jquery.fancybox.pack.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
        <!-- CUSTOM CSS -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <style type="text/css">
          .col-xs-5ths {
            width: 20%;
            float: left;
            padding-top: -15px;
            padding-bottom: -15px;           
          }
          a{
            color:rgba(17.6,45.9,74.1,1);
          }
          nav a{
            color:rgba(0,0,0,0.5);
            font-size: 13px;
          }
          nav i{
            padding-bottom: 4px;
          }
        </style>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        @yield('css')
    </head>
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
                                    @guest
                                    <li class="nav-item">
                                        <a class="nav-link login-button" href="{{ url('login') }}">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white add-button" href="{{ url('register') }}">Create Account</a>
                                    </li>
                                    @endguest
                                    @auth
                                        <li class="nav-item">
                                            <a class="nav-link login-button" href="{{ url('logout') }}">Log Out</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white add-button" href="{{ url('profile') }}">{{ Auth::user()->name }}</a>
                                        </li>
                                    @endauth
                                </ul>
                            </div>
                        </nav>
                        <nav class="navbar fixed-bottom navbar-expand bg-light navigation d-lg-none">
                          <div class="container-fluid text-center">
                            <div class="col-xs-5ths"><a href="#"><i class="fa fa-home fa-lg"></i><br>Home</a></div>
                            <div class="col-xs-5ths"><a href="#"><i class="fa fa-list fa-lg"></i><br>Booking</a></div>
                            <div class="col-xs-5ths"><a href="#"><i class="fa fa-envelope fa-lg"></i><br>Inbox</a></div>
                            <div class="col-xs-5ths"><a href="#"><i class="fa fa-heart fa-lg"></i><br>Favorit</a></div>
                            <div class="col-xs-5ths"><a href="#"><i class="fa fa-user-circle fa-lg"></i><br>Akun</a></div>
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


    <!-- JAVASCRIPTS -->
    <script src="{{ asset('plugins/jQuery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap-slider.js') }}"></script>
      <!-- tether js -->
    <script src="{{ asset('plugins/tether/js/tether.min.js') }}"></script>
    <script src="{{ asset('plugins/raty/jquery.raty-fa.js') }}"></script>
    <script src="{{ asset('plugins/slick-carousel/slick/slick.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('plugins/fancybox/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('plugins/smoothscroll/SmoothScroll.min.js') }}"></script>
    <!-- google map -->
    <script src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places') }}"></script>
    <script src="{{ asset('plugins/google-map/gmap.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Jquery UI -->
    <script src="https://code.jquery.com/ui/jquery-ui-git.js">
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $( ".selector" ).autocomplete({
          source: [ "c++", "java", "php", "coldfusion", "javascript", "asp", "ruby" ]
        });
      });
    </script>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase-firestore.js"></script>
    <script src="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.css" />

    <!-- Configure Firebase -->
    <script>
      // Your web app's Firebase configuration
      var firebaseConfig = {
        apiKey: "AIzaSyBzPBOTGEi2TuugITiHJu2QjYNnVQKYMlc",
        authDomain: "sportscenter-1557712279995.firebaseapp.com",
        databaseURL: "https://sportscenter-1557712279995.firebaseio.com",
        projectId: "sportscenter-1557712279995",
        storageBucket: "sportscenter-1557712279995.appspot.com",
        messagingSenderId: "818806083744",
        appId: "1:818806083744:web:46ef712094aba909"
      };
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);
    </script>


    @yield('script')
    </body>
</html>