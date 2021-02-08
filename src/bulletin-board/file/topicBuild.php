<?php
  include($_SERVER['DOCUMENT_ROOT'].'/class/char2UnicodeClass.php');
  $charH = new CharChicanClass();
  ini_set( 'display_errors', 1 );
  ini_set( 'error_reporting', E_ALL );

  $nickname = $_POST['nickname'];
  $sentence = $charH->char_replacement($_POST['sentence']);
  $filename = $_POST['filename'];
  $date = $_POST['date'];
  $title = $_POST['title'];
  $id = $_POST['id'];

  // $uid = "IzchqGFEQ8gHZ7e2UEOg1m8ZPCi1";
  // $sentence = $charH->char_replacement("gnoinfiasmdo;samd;smdngnsaaopnda<button>");
  // $filename = "kljhgfd";

  fopen("./topics-data/{$filename}.json", "w");
  chmod("./topics-data/{$filename}.json", 0755);

  $json = file_get_contents("./topics-data/{$filename}.json");
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
  $arr = json_decode($json, true);

  $arr = [
    "date" => $date,
    "title" => $title,
    "comment" => [[
      "id" => $id,
      "date" => $date,
      "name" => $nickname,
      "sentence" => $sentence
    ]]
  ];

  $out_json = json_encode($arr);
  file_put_contents("./topics-data/{$filename}.json", $out_json, LOCK_EX);
  // file_put_contents("./topics-data/{$filename}.json", $arr, LOCK_EX);

  echo "0";

  // echo $filename;
  /*
  *  正常終了時とエラー時の処理を追記する
  *  echo で エラーコードを返す処理を書く
  */
?>
