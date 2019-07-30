@extends('layouts.master')

@section('body')
<nav class="navbar navbar-light shadow-sm p-3">
  <div class="container">
    <a class="navbar-brand" href="{{ route('login') }}">
      <i class="fa fa-arrow-left fa-lg" style="padding-right: 30px;"></i>Daftar
    </a>
  </div>
</nav>
<section class="login py-5 border-top-1">
    <div class="container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label class="has-float-label">
              <input class="form-control" type="text" name="name"/>
              <span style="font-size: 15px;">Nama Lengkap</span>
            </label>
            @if ($errors->has('name'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif

            <label class="has-float-label">
              <input class="form-control" type="email" name="email"/>
              <span style="font-size: 15px;">Email</span>
            </label>
            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif

            <input name="telephone" type="text" placeholder="+62" class="border form-control mt-4">
            @if ($errors->has('telephone'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('telephone') }}</strong>
                </div>
            @endif

            <input name="password" type="password" placeholder="Password" class="border form-control mt-4">
            @if ($errors->has('password'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
            <button type="submit" class="btn btn-block py-3 px-5 mt-4 font-weight-bold button-saraga">Daftar</button>
        </form>
      <div class="row mt-4">
        <div class="col-12">
          <h3 class="lead has-line muted-saraga"><span style="margin-left:5px;"> Atau daftar dengan </span></h3>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-6">
          <button type="submit" class="btn btn-block btn-outline-primary font-weight-bold" onclick="google_signIn()">Google</button>
        </div>
        <div class="col-6">
          <button type="submit" class="btn btn-block btn-outline-primary font-weight-bold" onclick="facebook_signIn()">Facebook</button>
        </div>
      </div>
        </div>
    </div>
</section>
@endsection

@section('master_script')

<script type="text/javascript">
    function check_login_status(){
        console.log(firebase.auth().currentUser);
    }

    function google_signIn(){
        var provider = new firebase.auth.GoogleAuthProvider();

        firebase.auth().signInWithPopup(provider).then(function(result) {
          // This gives you a Google Access Token. You can use it to access the Google API.
          var token = result.credential.accessToken;
          // The signed-in user info.
          var user = result.user;

          // if sign in success..?
          $.ajax(
          {
              url: "{{ url('oauth2/login') }}",
              type: 'get', // replaced from put
              dataType: "JSON",
              data: {
                  access_token: token,
                  name: user.displayName
              },
              success: function (response)
              {
                // console.log(response);
                window.location.replace("{{ route('home') }}");
              },
              error: function(xhr) {
                alert(xhr.responseText); // this line will save you tons of hours while debugging
                console.log(xhr.responseText); 
                // do something here because of error
             }
          });

        }).catch(function(error) {
          // Handle Errors here.
          var errorCode = error.code;
          var errorMessage = error.message;
          // The email of the user's account used.
          var email = error.email;
          // The firebase.auth.AuthCredential type that was used.
          var credential = error.credential;
          // ...
        });  
    }
    function facebook_signIn(){
        var provider = new firebase.auth.FacebookAuthProvider();
        provider.addScope('default');

        firebase.auth().signInWithPopup(provider).then(function(result) {
          // This gives you a Facebook Access Token. You can use it to access the Facebook API.
          var token = result.credential.accessToken;
          // The signed-in user info.
          var user = result.user;
          // ...
        }).catch(function(error) {
          // Handle Errors here.
          var errorCode = error.code;
          var errorMessage = error.message;
          // The email of the user's account used.
          var email = error.email;
          // The firebase.auth.AuthCredential type that was used.
          var credential = error.credential;
          // ...
        });
    }
    
    function sign_out(){
        firebase.auth().signOut().then(function() {
          // Sign-out successful.
          console.log("sign out successful.");
        }).catch(function(error) {
          // An error happened.
        });
    }
</script>
@endsection