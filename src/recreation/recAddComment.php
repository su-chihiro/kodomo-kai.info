<?php
require $_SERVER['DOCUMENT_ROOT']."/userFunction.php";
include($_SERVER['DOCUMENT_ROOT'].'/class/char2UnicodeClass.php');
$charH = new CharChicanClass();
ini_set( 'display_errors', 1 );
ini_set( 'error_reporting', E_ALL );

$sentence = $charH->char_replacement($_POST['sentence']);
$filename = $_POST['filename'];
$folder = $_POST['foldernum'];
$date = $_POST['date'];
$nickname = $_POST['nickname'];
$id = $_POST['id'];

// var_dump($sentence);
// echo "<br>";
// var_dump($filename);
// echo "<br>";
// var_dump($folder);
// echo "<br>";
// var_dump($date);
// echo "<br>";
// var_dump($nickname);
// echo "<br>";
// var_dump($id);
// echo "<br>";

$path = $_SERVER['DOCUMENT_ROOT']."/recreation/file/{$folder}/{$filename}.json";
// echo "{$path}";
$json = file_get_contents($path);
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json, true);

// var_dump($arr);
$obj = [
  "id"=>$id,
  "date"=>$date,
  "name"=>$nickname,
  "sentence"=>$sentence
];

array_push($arr['comment'], $obj);

$out_json = json_encode($arr);
file_put_contents($_SERVER['DOCUMENT_ROOT']."/recreation/file/{$folder}/{$filename}.json", $out_json, LOCK_EX);

echo "0";
?>
