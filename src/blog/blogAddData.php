<?php
include($_SERVER['DOCUMENT_ROOT'].'/class/char2UnicodeClass.php');
$charH = new CharChicanClass();
ini_set( 'display_errors', 1 );
ini_set( 'error_reporting', E_ALL );
date_default_timezone_set('Asia/Tokyo');
$blogTitle = $_POST["blogTitle"];
$blogSentence  = $_POST["blogSentence"];
$blogTag   = $_POST["blogTag"];
$filename = $_POST['filename'];
$id = $_POST['id'];
$nickname = $_POST['nickname'];
$date = date("Y/m/d H:i:s");
$years  = date("Y");
$months = date("m");
$days   = date("d");

$fileIndexPath = $fileBlogPath = $_SERVER['DOCUMENT_ROOT']."/archive/{$years}/{$months}/{$days}";
$fileIndexPath .= "/index.json";

if (!file_exists($fileBlogPath)){
  $fileBlogPath = $_SERVER['DOCUMENT_ROOT']."/archive/{$years}/{$months}";
  if (!file_exists($fileBlogPath)){
    $fileBlogPath = $_SERVER['DOCUMENT_ROOT']."/archive/{$years}";
    if (!file_exists($fileBlogPath)){
      $fileBlogPath = $_SERVER['DOCUMENT_ROOT'].'/archive';
      if (!file_exists($fileBlogPath)){
        mkdir($fileBlogPath, 0777, true);
      }mkdir($_SERVER['DOCUMENT_ROOT']."/archive/{$years}", 0755, true);
    }mkdir($_SERVER['DOCUMENT_ROOT']."/archive/{$years}/{$months}", 0755, true);
  }mkdir($_SERVER['DOCUMENT_ROOT']."/archive/{$years}/{$months}/{$days}", 0755, true);
}$fileBlogPath = $_SERVER['DOCUMENT_ROOT']."/archive/{$years}/{$months}/{$days}";

$list = explode(',', $blogTag);
$tag_list = [];
$tag_arr  = array();
foreach ($list as $value) {
  $value = mb_ereg_replace('^[\s　]+|[\s　]+$', '', $value);
  if ($value !== "") {
    $tag_list[] = $value;
  }
}
$tag_num = count($tag_list);

// // index.jsonが存在しなときは作成する
// if (!file_exists("{$fileBlogPath}/index.json")) {
//   fopen("{$fileBlogPath}/index.json", "w");
// }

// $json = file_get_contents("{$fileBlogPath}/index.json");
// $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
// $arr = json_decode($json, true);

// $arr = [
//     "date" => $date,
//     "blogTitle" => $blogTitle,
//     "fileName" => $filename,
//     "blogTag" => []
// ];
// $out_json = json_encode($arr);
// file_put_contents("{$fileBlogPath}/index.json", $out_json, LOCK_EX);

// filename.jsonを作成する
if (!file_exists("{$fileBlogPath}/{$filename}.json")) {
  fopen("{$fileBlogPath}/{$filename}.json", "w");
}

$json = file_get_contents("{$fileBlogPath}/{$filename}.json");
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json, true);
$arr = [
    "date" => $date,
    "blogTitle" => $blogTitle,
    "nickName" => $nickname,
    "blogSentence" => $blogSentence,
    "ID" => $id,
    "comment" => [],
    "blogTag" => [[$blogTag]]
];
$out_json = json_encode($arr);
file_put_contents("{$fileBlogPath}/{$filename}.json", $out_json, LOCK_EX);

echo "0";

/*
*  正常終了時とエラー時の処理を追記する
*  echo で エラーコードを返す処理を書く
*/



?>
