<?php
include($_SERVER['DOCUMENT_ROOT'].'/class/char2UnicodeClass.php');
$charH = new CharChicanClass();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0">
  <?php
    $content = "ジュニアリーダー向けのポータルサイトです．子ども会で使えるレクリエーションの共有や活動の報告ができます．ジュニアリーダー同士の交流にどうぞ使ってください！！今の子ども会をみんなで変えて行きましょう．";
    echo "<meta name=\"description\" content=\"子ども会, kodomo, ジュニアリーダー, jl, ブログ, {$content}\">";
  ?>
  <meta name="author" content="">
  <link rel="icon" href="/img/favicon/favicon.ico">
  <title>みんなのブログ - 子ども会を変えたい</title>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/css.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/head_script.php"); ?>

</head>

<body>

  <!-- ヘッダー部分コード -->
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/header.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/login.php"); ?>

  <div class="container pt-4">
    <main role="main" class="container">
      <div class="row">

      <!-- パンくずリスト -->
      <div class="col-md-12 text-left mb-4">
        <i class="fas fa-home"></i>
        <a href="/index.php" class="ml-2 text-dark">ホーム</a>
        <i class="fas fa-angle-right mx-2"></i>
        <a href="/blog/blog-top.php" class="text-dark">みんなのブログ</a>
      </div>
      <!-- ./パンくずリスト -->

        <div class="col-md-12 order-md-1">
          <div class="mb-3 h2"><i class="far fa-clipboard mr-2"></i>みんなのブログ</div>
          <hr>
          <div class="text-center">
            <div class="card-columns">
              <?php
                ini_set( 'display_errors', 1 );
                ini_set( 'error_reporting', E_ALL );
                date_default_timezone_set('Asia/Tokyo');
                $date = date("Y/m/d H:i:s");
                $years  = date("Y");
                $months = date("m");
                $days   = date("d");
                $filepath = $_SERVER['DOCUMENT_ROOT'].'/archive';

                $years_array = str_replace($_SERVER['DOCUMENT_ROOT'].'/archive/','',glob("{$filepath}/*"));

                $months_array = [];
                for($i=0; $i<count($years_array); $i++) {
                  $months_array[$i] = str_replace($_SERVER['DOCUMENT_ROOT']."/archive/{$years_array[$i]}/",'',glob("{$filepath}/{$years_array[$i]}/*"));
                }

                $days_array = [];
                for($i=0; $i<count($years_array); $i++) {
                  for($j=0; $j<count($months_array[$i]); $j++){
                    $days_array[$i][$j] = str_replace($_SERVER['DOCUMENT_ROOT']."/archive/{$years_array[$i]}/{$months_array[$i][$j]}/",'',glob("{$filepath}/{$years_array[$i]}/{$months_array[$i][$j]}/*"));
                  }
                }

                for($i=0; $i<count($days_array); $i++){
                  if(empty($days_array[$i])) continue;
                  for($j=0; $j<count($days_array[$i]); $j++){
                    if(empty($days_array[$i][$j])) continue;
                    for($k=0; $k<count($days_array[$i][$j]); $k++){
                      if(empty($days_array[$i][$j][$k])) continue;

                      $file_index_path = $_SERVER['DOCUMENT_ROOT']."/archive/{$years_array[$i]}/{$months_array[$i][$j]}/{$days_array[$i][$j][$k]}/index.json";
                      $file_blog_path  = $_SERVER['DOCUMENT_ROOT']."/archive/{$years_array[$i]}/{$months_array[$i][$j]}/{$days_array[$i][$j][$k]}";
                      if (file_exists($file_index_path)) {
                        $json = file_get_contents($file_index_path);

                        // 文字化けを防ぐコード
                        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                        $arr = json_decode($json, true);

                        for($loop=0; $loop<count($arr); $loop++) {
                        ?>
                        <div class="card border-1 border-secondary m-0 p-0 mb-2">
                          <div class="card-body">
                            <h4 class="card-title text-left text-dark"><?php echo "{$arr[$loop]["blogTitle"]}"; ?></h4><hr>
                            <p class="card-text text-dark text-left"><i class="far fa-calendar-alt mr-2"></i><?php echo "{$arr[$loop]["date"]}"; ?></p>
                            <sapn class="card-text text-dark">
                              <?php
                              $filename = $arr[$loop]["fileName"];
                              $path = $file_blog_path."/{$filename}.json";
                              $body_json = file_get_contents($path);
                              // 文字化けを防ぐコード
                              $body_json = mb_convert_encoding($body_json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                              $body_arr = json_decode($body_json, true);
                              $str = strip_tags($body_arr[0]["blogSentence"]);
                              $str = $charH->blog_body_replacement($str);
                              $str = substr($str,0,200);
                              echo"{$str}";
                              ?>
                            </span>


                            <hr>
                            <div class="float-left">タグ：
                      <?php for($tag_loop=0; $tag_loop<count($arr[$loop]["blogTag"][0]); $tag_loop++){ ?>
                              <a href="#" class="text-white bg-secondary rounded px-1"><?php echo "{$arr[$loop]["blogTag"][0][$tag_loop]}"; ?></a>
                      <?php } ?>
                            </div><br>
                            <p class="card-text text-right"><a href="/blog/blog-viwer.php?f=<?php echo"/{$years_array[$i]}/{$months_array[$i][$j]}/{$days_array[$i][$j][$k]}/{$arr[$loop]["fileName"]}"; ?>">続きを見る>></a></p>
                          </div>
                        </div>

              <?php
                        }
                      }
                    }
                  }
                }

              ?>
            </div>
            <div class="text-left"><button type="button" id="newBlogButton" class="btn btn-secondary col-md-4 mb-3">ブログを書く</button></div>
            </div>
          </div>
        </div>
    <!-- /.container -->
  </div>
</main>
  <!-- フッター部分 -->
    <?php include($_SERVER['DOCUMENT_ROOT']."/parts/footer.php"); ?>
    <?php include($_SERVER['DOCUMENT_ROOT']."/parts/foot_script.php"); ?>
    <script src="/js/summernote.js"></script>
    <script src="/js/lang/summernote-ja-JP.js"></script>
  </div>
</body>

</html>
