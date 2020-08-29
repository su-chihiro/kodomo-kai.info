<?php
include($_SERVER['DOCUMENT_ROOT'].'/class/char2UnicodeClass.php');
$charH = new CharChicanClass();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>トピックの書き込み中(´・ω・｀)</title>
<!-- <meta http-equiv="refresh" content="1;URL=/blog/blog-top.php"> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<script type="text/javascript">
if (user != null) {
  user.providerData.forEach(function (profile) {
    console.log("Sign-in provider: " + profile.providerId);
    console.log("  Provider-specific UID: " + profile.uid);
    console.log("  Name: " + profile.displayName);
    console.log("  Email: " + profile.email);
    console.log("  Photo URL: " + profile.photoURL);
  });
}
</script>
<?php
  ini_set( 'display_errors', 1 );
  ini_set( 'error_reporting', E_ALL );
  date_default_timezone_set('Asia/Tokyo');
  $blog_title = $_POST["blog_title"];
  $blog_body  = $_POST["blog_body"];
  $blog_tag   = $_POST["blog_tag"];
  $filename = $_POST['filename'];
  $date = date("Y/m/d H:i:s");
  $years  = date("Y");
  $months = date("m");
  $days   = date("d");

  // var_dump($blog_title);
  // var_dump($blog_body);
  // var_dump($blog_tag);
  // var_dump($filename);

  $file_index_path = $file_blog_path  = $_SERVER['DOCUMENT_ROOT']."/archive/{$years}/{$months}/{$days}";
  $file_index_path .= "/index.json";

  if (!file_exists($file_blog_path)){
    $file_blog_path = $_SERVER['DOCUMENT_ROOT']."/archive/{$years}/{$months}";
    if (!file_exists($file_blog_path)){
      $file_blog_path = $_SERVER['DOCUMENT_ROOT']."/archive/.{$years}";
      if (!file_exists($file_blog_path)){
        $file_blog_path = $_SERVER['DOCUMENT_ROOT'].'/archive';
        if (!file_exists($file_blog_path)){
          mkdir($file_blog_path, 0777);
        }mkdir($_SERVER['DOCUMENT_ROOT']."/archive/.{$years}", 0755);
      }mkdir($_SERVER['DOCUMENT_ROOT']."/archive/{$years}/{$months}", 0755);
    }mkdir($_SERVER['DOCUMENT_ROOT']."/archive/{$years}/{$months}/{$days}", 0755);
  }$file_blog_path  = $_SERVER['DOCUMENT_ROOT']."/archive/{$years}/{$months}/{$days}";

  $list = explode(',', $blog_tag);
  $tag_list = [];
  $tag_arr  = array();
  foreach ($list as $value) {
    $value = mb_ereg_replace('^[\s　]+|[\s　]+$', '', $value);
    if ($value !== "") {
      $tag_list[] = $value;
    }
  }
  $tag_num = count($tag_list);

  if (file_exists($file_index_path)) {
    $json = file_get_contents($file_index_path);

    // 文字化けを防ぐコード
    $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $arr = json_decode($json, true);

    if ($arr === NULL) {
        // データがない時の処理
        return;
    } else {
        //〜存在しているときの処理〜
        $json_count = count($arr);
        $fp = fopen($file_index_path, 'w');
        fputs($fp, "[");
        for($i=0;$i<$json_count;$i++){
          // var_dump("var  -> ".$arr[$i]["blog_tag"]);
          $arr_tag_num = count($arr[$i]["blog_tag"]);
          // var_dump("arr_tag_num  -> ".$arr_tag_num);

          $tag_str = "";
          for($j=0; $j<$arr_tag_num; $j++){
            $tag_str .= "\"{$j}\":";
            $tag_str .= "\"{$arr[$i]["blog_tag"][$j]}\",";
          }
          $tag_str = rtrim($tag_str, ",");
          $tag_str = $charH->tag_replacement($tag_str);
          fputs($fp, "{\"index\":\"{$arr[$i]["index"]}\",\"date\":\"{$arr[$i]["date"]}\",\"title\":\"{$arr[$i]["title"]}\",\"filename\":\"{$arr[$i]["filename"]}\",\"blog_tag\":{{$tag_str}}},");
        }

        $num = $json_count + 1;
        $blog_title = $charH->char_replacement($blog_title);
        $dates = $years."/".$months."/".$days;
        $tag_str = "";
        for($j=0; $j<$tag_num; $j++){
          $tag_str .= "\"{$j}\":";
          $tag_str .= "\"{$tag_list[$j]}\",";
        }
        $tag_str = rtrim($tag_str, ",");
        // var_dump("tag_str -> ".$tag_str);
        $tag_str = $charH->tag_replacement($tag_str);
        fputs($fp, "{\"index\":\"{$num}\",\"date\":\"{$dates}\",\"title\":\"{$blog_title}\",\"filename\":\"{$filename}\",\"blog_tag\":{{$tag_str}}}]");
        fclose($fp);

        $fp = fopen($file_blog_path."/".$filename.'.json', 'w');
        chmod($file_blog_path."/".$filename.'.json', 0777);
        $blog_body = $charH->blog_body_replacement($blog_body);

        fputs($fp, "[{\"date\":\"{$date}\",\"title\":\"{$blog_title}\",\"blog_body\":\"{$blog_body}\",\"blog_tag\":{{$tag_str}}}]");
        fclose($fp);

        $list_json = file_get_contents("./new-blog-list.json");
        $fp = fopen($_SERVER['DOCUMENT_ROOT']."/blog/new-blog-list.json", 'w');
        chmod($_SERVER['DOCUMENT_ROOT']."/blog/new-blog-list.json", 0777);


        // 文字化けを防ぐコード
        $list_json = mb_convert_encoding($list_json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $list_arr = json_decode($list_json, true);
        fputs($fp, "[{\"index\":\"0\",\"path\":\"{$file_blog_path}\",\"filename\":\"{$filename}\"},");
        fputs($fp, "{\"index\":\"1\",\"path\":\"{$list_arr[0]["path"]}\",\"filename\":\"{$list_arr[0]["filename"]}\"}]");
        fclose($fp);
    }
  } else {
      $tag_str = "";
      for($i=0; $i < $tag_num; $i++){
        $tag_str .= "\"{$i}\":";
        $tag_str .= "\"{$tag_list[$i]}\",";
      }
      $tag_str = rtrim($tag_str, ",");
      $tag_str = $charH->tag_replacement($tag_str);
      $fp = fopen($file_index_path, 'w');
      chmod($file_index_path, 0777);
      $blog_title = $charH->char_replacement($blog_title);
      $blog_body = $charH->blog_body_replacement($blog_body);
      $dates = $years."/".$months."/".$days;
      fputs($fp, "[{\"index\":\"1\",\"date\":\"{$dates}\",\"title\":\"{$blog_title}\",\"filename\":\"{$filename}\",\"blog_tag\":{{$tag_str}}}]");
      fclose($fp);

      $fp = fopen($file_blog_path."/".$filename.'.json', 'w');
      chmod($file_blog_path."/".$filename.'.json', 0777);
      fputs($fp, "[{\"date\":\"{$date}\",\"title\":\"{$blog_title}\",\"blog_body\":\"{$blog_body}\",\"blog_tag\":{{$tag_str}}}]");
      fclose($fp);

      $fp = fopen($_SERVER['DOCUMENT_ROOT']."/blog/new-blog-list.json", 'w');
      chmod($_SERVER['DOCUMENT_ROOT']."/blog/new-blog-list.json", 0777);
      fputs($fp, "[{\"index\":\"0\",\"path\":\"{$file_blog_path}\",\"filename\":\"{$filename}\"}]");
      fclose($fp);
  }

?>
<p>
自動的にジャンプします。<br>
ジャンプしない場合は、下記のしょぼーんをクリックしてください。<br>
<a href="/blog/blog-top.php">(´・ω・｀)</a></p>

<script src="https://www.gstatic.com/firebasejs/5.5.3/firebase.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js"></script>
<script>
  Holder.addTheme('thumb', {
    bg: '#55595c',
    fg: '#eceeef',
    text: 'Thumbnail'
  });
</script>
<script src="/js/main.js"></script>
<script src="/js/summernote.js"></script>
<script src="/js/lang/summernote-ja-JP.js"></script>
</body>
</html>
