<?php
// $id = $_POST['userID'];
// $img_name = $_FILES['upimg']['name'];
$profile_img = "profile_icon.png";
move_uploaded_file($_FILES['upimg']['tmp_name'], "./img/users_img/" . $profile_img);

echo "0";

/*
*  正常終了時とエラー時の処理を追記する
*  echo で エラーコードを返す処理を書く
*/

?>
