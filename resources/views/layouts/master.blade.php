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
        <!-- <link href="{{ asset('plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet"> -->
        <!-- CUSTOM CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css"/>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">


<!-- <link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.0/dist/bootstrap-float-label.min.css"/> -->

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

          .form-control{
            border-radius: 0.5rem;
            border-color: rgb(9, 58, 102) !important;
          }

          .has-float-label{
            margin-bottom: 25px;
          }

          .has-float-label span{
            font-size: 15px;
            font-weight: bold;
            color: rgb(9, 58, 102);
          }

          .text-saraga{
            color: rgb(9, 58, 102);
          }

          .background-saraga{
            background-color: rgb(9, 58, 102);
            color: white;
          }

          .button-saraga{
            /*background-color: rgb(189, 158, 95);*/
            border-radius: 5rem;
            color: white;
            background-image: linear-gradient(to right, rgb(184, 149, 90) , rgb(202, 187, 113));
            border-style: none;
          }

          .muted-saraga{
            color: rgb(176, 176, 176);
            font-size: 16px;
          }

          .has-line {
            overflow: hidden;
            text-align: center;
          }

          .has-line:before,
          .has-line:after {
            background-color: rgb(176, 176, 176);
            content: "";
            display: inline-block;
            height: 1px;
            position: relative;
            vertical-align: middle;
            width: 50%;
          }

          .has-line:before {
            right: 0.5em;
            margin-left: -50%;
          }

          .has-line:after {
            left: 0.5em;
            margin-right: -50%;
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

    @yield('body')


    <!-- JAVASCRIPTS -->
    <script src="{{ asset('plugins/jQuery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap-slider.js') }}"></script>
      <!-- tether js -->
    <script src="{{ asset('plugins/tether/js/tether.min.js') }}"></script>
    <script src="{{ asset('plugins/raty/jquery.raty-fa.js') }}"></script>
    <script src="{{ asset('plugins/slick-carousel/slick/slick.min.js') }}"></script>
    <!-- <script src="{{ asset('plugins/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script> -->
    <script src="{{ asset('plugins/fancybox/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('plugins/smoothscroll/SmoothScroll.min.js') }}"></script>
    <!-- google map -->
    <script src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places') }}"></script>
    <script src="{{ asset('plugins/google-map/gmap.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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

    <!-- MASTER SCRIPT -->
    @yield('script')
    </body>
</html>