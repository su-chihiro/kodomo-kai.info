<?php
  $data = json_decode($_POST['Ary'], true);
  $file = $data[0]["linkParamPageID"];
  $filepath = $_SERVER['DOCUMENT_ROOT']."/recreation/file/{$file}/index.json";
  if (file_exists($filepath)) {

    if( ($fp = fopen($filepath,"r"))=== false ){
      die("jsonファイル読み込みエラー");
    }
    $json = file_get_contents($filepath);

    // 文字化けを防ぐコード
    $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $arr = json_decode($json, true);
    fclose($fp);

    if ($arr === NULL) {
      // データがない時の処理
      return;
    } else {
      if( ($fp = fopen($filepath,"w")) === false ){
        die("jsonファイル読み込みエラー");
      }
      // 存在しているときの処理
      $json_count   = count($arr);
      $targetNum    = ["1～5人", "5～10人", "10～20人", "20～40人", "人数に関係なし"];
      $targetAge    = ["幼児（1～6才）", "児童（7～12才）", "児童（7～9才）", "児童（10～12才）", "生徒（13～18歳）", "年齢に関係なし"];
      $timeRequired = ["5分未満", "5～10分", "10～20分", "20～40分", "40分以上"];

      foreach ($data as $dt) {
        $fileID = $dt["linkParamFileID"];
        for ($i=0;$i<count($arr);$i++) {
          if($arr[$i]["fileName"] == $fileID) {
            unset($arr[$i]);
          }
          $arr = array_values($arr);
        }
      }

      if (count($arr) == 1) {
        $out_json[] = [
          "date" => $arr[0]["date"],
          "recTitle" => $arr[0]["recTitle"],
          "targetNum" => $arr[0]["targetNum"],
          "targetAge" => $arr[0]["targetAge"],
          "timeRequired" => $arr[0]["timeRequired"],
          "fileName" => $arr[0]["fileName"]
        ];
        $out_json = json_encode($out_json, true);
      } else $out_json = json_encode($arr, true);
      fwrite($fp, $out_json);
      fclose($fp);
    }
    echo "0";
  }
?>
