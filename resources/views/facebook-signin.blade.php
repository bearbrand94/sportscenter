<button type="submit" class="btn btn-block font-weight-bold btn-outline-secondary" onclick="facebook_signIn()" style="color: black;">
  <img src="{{ asset('images/facebook-blue.svg') }}" alt="facebook-login" width="20" height="20">
  Facebook
</button>
<script type="text/javascript">
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
</script>