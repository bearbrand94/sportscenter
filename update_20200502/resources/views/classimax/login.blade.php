@extends('layouts.master')

@section('body')

<section class="login py-2 border-top-1 pt-3">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('images/back-icon-black.svg') }}" alt="" class="back-icon" title="close">
      </a>
      <div class="text-center">
        <img class="card-img-top pb-3 login-logo" src="{{ asset('images/saraga.png') }}" alt="Card image cap">
      </div>
      <form method="POST" action="{{ route('email-login') }}">
        @csrf
        <br>
        <label class="has-float-label">
          <input class="form-control" type="email" name="email"/>
          <span>Email</span>
        </label>
        <label class="has-float-label">
          <input class="form-control" type="password" name="password">
          @if ($errors->has('credentials'))
            <div class="alert alert-danger mt-3">
                <strong>{{ $errors->first('credentials') }}</strong>
            </div>
          @endif
          @if ($errors->has('warning'))
            <div class="alert alert-warning mt-3">
                <strong>{{ $errors->first('warning') }}</strong>
            </div>
          @endif
          <span>Password</span>
        </label>
        <a class="d-block muted-saraga pull-right" href="password/reset">Lupa Password?</a>
        <button type="submit" class="btn btn-block mt-3 font-weight-bold button-saraga">Masuk</button>
      </form>

      <div class="row mt-4">
        <div class="col-12">
          <h3 class="lead has-line muted-saraga"><span style="margin-left:5px;"> Atau masuk dengan </span></h3>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-6">
          <button type="submit" class="btn btn-block btn-outline-primary font-weight-bold" onclick="google_signIn()"><i class="mr-2 fa fa-google-plus" aria-hidden="true"></i>Google</button>
        </div>
        <div class="col-6">
          <button type="submit" class="btn btn-block btn-outline-primary font-weight-bold" onclick="facebook_signIn()"><i class="mr-2 fa fa-facebook" aria-hidden="true"></i>Facebook</button>
        </div>
      </div>
      <div class="text-center mt-4">
        <h3 class="muted-saraga">Belum Punya Akun? <a class="mt-3 d-inline-block font-weight-strong text-saraga" href="register"><b>Daftar Sekarang</b></a></h3>
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
                console.log(response);
                window.location.replace(response);
              },
              error: function(xhr) {
                // alert(xhr.responseText); // this line will save you tons of hours while debugging
                // console.log(xhr.responseText); 
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