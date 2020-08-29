<?php
$id = $_POST['ID'];
$folder = $_POST['filenum'];
$filename = $_POST['filename'];

$json = file_get_contents('users_tag.json');
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json, true);

$obj = [
  "folder" => $folder,
  "filename" => $filename,
];

array_push($arr[0][$id]['recreation'], $obj);

$out_json = json_encode($arr);
file_put_contents("users_tag.json", $out_json, LOCK_EX);

echo "0";

/*
*  正常終了時とエラー時の処理を追記する
*  echo で エラーコードを返す処理を書く
*/
?>
