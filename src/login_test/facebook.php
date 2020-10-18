<?php
  $client_id     = "810277636024211";
  $response_type = "code";
  $redirect_uri  = "https://kodomo-kai.info/";
  // $redirect_uri  = "https%3A%2F%2Fkodomo-kai.info%2F";
  // $state         = dechex(rand(10000, 99999)).dechex(rand(10000, 99999));
  $scope         = "email";

  // <a href="//www.facebook.com/dialog/oauth?client_id=[Facebook APP ID]&redirect_uri=[Redirect URI]&auth_type=rerequest&scope=email">Facebookでログイン</a>
  $link = "https://www.facebook.com/dialog/oauth?client_id=".$client_id."&redirect_uri=".$redirect_uri."&auth_type=rerequest&scope=".$scope;


  header('location:'.$link);
  exit();
?>
