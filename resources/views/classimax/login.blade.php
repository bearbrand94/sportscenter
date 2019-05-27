@extends('layouts.app')

@section('content')

<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Login Now</h3>
                        <fieldset class="p-4">
                            <form method="POST" action="{{ route('email-login') }}">
                              @csrf
                              <input type="text" placeholder="e-mail" name="email" class="border p-3 w-100 my-2">
                              <input type="password" placeholder="Password" name="password" class="border p-3 w-100 my-2">
                              @if ($errors->has('credentials'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('credentials') }}</strong>
                                </div>
                              @endif
                              <button type="submit" class="btn btn-block py-3 px-5 btn-outline-primary mt-3 font-weight-bold">Log in</button>
                            </form>
                            <a class="mt-3 d-block  text-primary" href="#">Forget Password?</a>
                            <a class="mt-3 d-inline-block text-primary" href="register">Register Now</a>
                            <button type="submit" class="btn btn-block py-3 px-5 btn-outline-primary mt-3 font-weight-bold" onclick="google_signIn()">Log in With Google</button>
                            <button type="submit" class="btn btn-block py-3 px-5 btn-outline-primary mt-3 font-weight-bold" onclick="facebook_signIn()">Log in With Facebook</button>

                        </fieldset>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')

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