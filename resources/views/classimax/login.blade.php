@extends('layouts.app')

@section('content')

<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Login Now</h3>
                    <form action="#">
                        <fieldset class="p-4">
                            <input type="text" placeholder="Username" class="border p-3 w-100 my-2">
                            <input type="password" placeholder="Password" class="border p-3 w-100 my-2">
                            <div class="loggedin-forgot">
                                    <input type="checkbox" id="keep-me-logged-in">
                                    <label for="keep-me-logged-in" class="pt-3 pb-2">Keep me logged in</label>
                            </div>
                            <button type="submit" class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Log in</button>
                            <a class="mt-3 d-block  text-primary" href="#">Forget Password?</a>
                            <a class="mt-3 d-inline-block text-primary" href="register">Register Now</a>
                            <button type="submit" class="btn btn-block py-3 px-5 btn-outline-primary mt-3 font-weight-bold" onclick="google_signIn()">Log in With Google</button>
                            <button type="submit" class="btn btn-block py-3 px-5 btn-outline-primary mt-3 font-weight-bold" onclick="facebook_signIn()">Log in With Facebook</button>

                        </fieldset>
                    </form>
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