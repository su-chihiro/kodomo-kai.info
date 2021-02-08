<?php
include($_SERVER['DOCUMENT_ROOT'].'/class/char2UnicodeClass.php');
include($_SERVER['DOCUMENT_ROOT'].'/class/youtubeUrlClass.php');
$charH = new CharChicanClass();
$title = $_POST['recTitle'];
$targetNum =$_POST['targetNum'];
$targetAge = $_POST['targetAge'];
$timeRequired = $_POST['timeRequired'];
$sentence = $charH->char_replacement($_POST['sentence']);
$folderNum = $_POST['filenum'];
$fileName = $_POST['filename'];
$nickName = $_POST['nickName'];
$date = $_POST['date'];
$youtubeURL = $_POST['youtubeURL'];
$YUC = new YoutubeUrlClass();
$youtubeID = $YUC->abstract_youtube_id($youtubeURL);
$ID = $_POST['id'];

// $title = "タイトル";
// $targetNum = "2";
// $targetAge = "1";
// $timeRequired = "3";
// $youtubeURL = "https://www.youtube.com/watch?v=CtF6a3SYuRo";
// $sentence = $charH->char_replacement("dsamdsfbmoa,ksdofbkkzsd;bfo:v,:kp");
// $folderNum = "4";
// $fileName = "note";
// $nickName = "管理者";
// $date = "2019/2/19 17:15:24";

// var_dump($title);
// var_dump($targetNum);
// var_dump($targetAge);
// var_dump($timeRequired);
// var_dump($youtubeURL);
// var_dump($sentence);
// var_dump($folderNum);
// var_dump($fileName);
// var_dump($nickName);
// var_dump($date);

// フォルダが存在しないときは作成する
if (!file_exists($_SERVER['DOCUMENT_ROOT']."/recreation/file/{$folderNum}")) {
  mkdir($_SERVER['DOCUMENT_ROOT']."/recreation/file/{$folderNum}" , 0755);
}

// データを保存するjsonファイルを作成する
if (!file_exists($_SERVER['DOCUMENT_ROOT']."/recreation/file/{$folderNum}/{$fileName}.json")) {
  fopen($_SERVER['DOCUMENT_ROOT']."/recreation/file/{$folderNum}/{$fileName}.json", "w");
}

$json = file_get_contents($_SERVER['DOCUMENT_ROOT']."/recreation/file/{$folderNum}/{$fileName}.json");
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json, true);
$arr = [
    "date" => $date,
    "recTitle" => $title,
    "nickName" => $nickName,
    "targetNum" => $targetNum,
    "targetAge" => $targetAge,
    "timeRequired" => $timeRequired,
    "youtubeID" => $youtubeID,
    "Sentence" => $sentence,
    "ID" => $ID,
    "comment" => []
];
$out_json = json_encode($arr);
file_put_contents($_SERVER['DOCUMENT_ROOT']."/recreation/file/{$folderNum}/{$fileName}.json", $out_json, LOCK_EX);

echo "0";
/*
*  正常終了時とエラー時の処理を追記する
*  echo で エラーコードを返す処理を書く
*/
?>
