<?php
$id = $_POST['userID'];
$profile_img = "profile_icon.png";
$path = $_SERVER['DOCUMENT_ROOT']."/img/users_img/";

rename($path."{$profile_img}", $path."{$id}/{$profile_img}");


echo "0";

/*
*  正常終了時とエラー時の処理を追記する
*  echo で エラーコードを返す処理を書く
*/

?>
