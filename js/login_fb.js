$(document).ready(function() {

  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '810277636024211',
        cookie     : true,
        xfbml      : true,
        version    : '3.3'
      });

      FB.AppEvents.logPageView();

    };

    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "https://connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
  </script>
});



<a href="//www.facebook.com/dialog/oauth?client_id=[Facebook APP ID]&redirect_uri=[Redirect URI]&auth_type=rerequest&scope=email">Facebookでログイン</a>
