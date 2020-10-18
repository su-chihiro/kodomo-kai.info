<?php
  date_default_timezone_set('Asia/Tokyo');
  header("Content-type: text/json; charset=UTF-8");
  //直接のページ遷移を阻止
  $request = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) : '';
  if($request !== 'xmlhttprequest') exit;
  //画像の拡張子を取得
  $file_ext = pathinfo($_FILES['file']['name']);
  $time = date("YmdHis");
  //ファイル名を日付に変更
  $file_name = $time.".".$file_ext[extension];
  //保存先のパス
　//index.php file_api.phpと同層にupload_fileディレクトリが存在
  $file_path = "upload_file/".$file_name;

  $tmp_file = $_FILES['file']['tmp_name'];
  $result = move_uploaded_file($tmp_file, $file_path);
  //保存出来たらファイル名をjsonで返す
  if($result){
    echo json_encode($file_name);
  }
?>
