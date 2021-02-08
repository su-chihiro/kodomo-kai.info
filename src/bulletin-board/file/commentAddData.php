<?php
  include($_SERVER['DOCUMENT_ROOT'].'/class/char2UnicodeClass.php');
  $charH = new CharChicanClass();
  ini_set( 'display_errors', 1 );
  ini_set( 'error_reporting', E_ALL );

  $sentence = $charH->char_replacement($_POST['sentence']);
  $filename = $_POST['filename'];
  $nickname = $_POST['nickname'];
  $date = $_POST['date'];
  $id = $_POST['id'];

  $json = file_get_contents("./topics-data/{$filename}.json");
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
  $arr = json_decode($json, true);

  $obj = [
    "id"=>$id,
    "date"=>$date,
    "name"=>$nickname,
    "sentence"=>$sentence
  ];
  array_push($arr['comment'], $obj);

  $out_json = json_encode($arr);
  file_put_contents("./topics-data/{$filename}.json", $out_json, LOCK_EX);
  //
  // // echo "{$date}";
  echo "0";
?>
