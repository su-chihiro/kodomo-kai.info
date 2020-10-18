<?php
  $client_id     = "1571501288";
  $response_type = "code";
  $redirect_uri  = "https://kodomo-kai.info/";
  // $redirect_uri  = "https%3A%2F%2Fkodomo-kai.info%2F";
  $state         = dechex(rand(10000, 99999)).dechex(rand(10000, 99999));
  $scope         = "profile";
  $link = "https://access.line.me/oauth2/v2.1/authorize?response_type=".$response_type."&client_id=".$client_id."&redirect_uri=".$redirect_uri."&state=".$state."&scope=".$scope;

  header('location:'.$link);
  exit();
?>
