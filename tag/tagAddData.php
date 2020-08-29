<?php
  $id = $_POST['ID'];

  if (!file_exists("users_tag.json")) {
    fopen("users_tag.json", "w");
    file_put_contents("users_tag.json", "[{}]", LOCK_EX);
  }

  $json = file_get_contents('users_tag.json');
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
  $arr = json_decode($json, true);

  $arr[0] += [
    $id => [
      "blog" => [],
      "junior-laeder" => [],
      "recreation" => []
    ]
  ];

  $out_json = json_encode($arr);
  file_put_contents("users_tag.json", $out_json, LOCK_EX);

  echo "0";

  /*
  *  正常終了時とエラー時の処理を追記する
  *  echo で エラーコードを返す処理を書く
  */
?>
