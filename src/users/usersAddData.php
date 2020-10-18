<?php
  $uid = $_POST['uid'];
  $nickname = $_POST['nickName'];
  $prefcode = $_POST['prefCode'];
  $citycode = $_POST['cityCode'];
  $prefname = $_POST['prefName'];
  $cityname = $_POST['cityName'];
  $hash = $_POST['hash'];
  $id = $_POST['ID'];

  if (!file_exists("users.json")) {
    fopen("users.json", "w");
    file_put_contents("users.json", "[{}]", LOCK_EX);
  }

  $json = file_get_contents('users.json');
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
  $arr = json_decode($json, true);

  $arr[0] += [
    $uid => [
      "nickName" => $nickname,
      "prefCode" => $prefcode,
      "cityCode" => $citycode,
      "prefName" => $prefname,
      "cityName" => $cityname,
      "hash" => $hash,
      "id" => $id
    ]
  ];

  $out_json = json_encode($arr);
  file_put_contents("users.json", $out_json, LOCK_EX);

  echo "0";

  /*
  *  正常終了時とエラー時の処理を追記する
  *  echo で エラーコードを返す処理を書く
  */
?>
