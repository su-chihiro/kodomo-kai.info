<?php
// $params = explode('/', $_GET['url']);
// $model = array_shift($params);
// echo "<script>console.log(\"{$model}\")</script>";
// echo "<script>console.log(\"{$params}\")</script>";

require $_SERVER['DOCUMENT_ROOT'] . "/userFunction.php";
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0">
  <?php
  $content = "ジュニアリーダー向けのポータルサイトです．子ども会で使えるレクリエーションの共有や活動の報告ができます．ジュニアリーダー同士の交流にどうぞ使ってください！！今の子ども会をみんなで変えて行きましょう．";
  echo "<meta name=\"description\" content=\"子ども会, kodomo, ジュニアリーダー, jl, {$content}\">";
  ?>
  <meta name="author" content="Suzurikawa Chihiro">
  <!-- <meta name="keywords" content="子ども会,ジュニアリーダー,シニアリーダー,JL,SL"> -->
  <link rel="icon" href='/img/favicon/favicon.ico'>
  <!-- <title>トップページ - 子ども会を変えたい</title> -->
  <title>あｄｊなｊｋｄじゃｓだｊｋｌｄじゃｋｌｄじゃｓｋｌｄじゃｓｋｄじゃｓｋｌｄじゃｋｌｄじゃｓｋｌｄじゃｋｌｄじゃｓｋｌｄｊｋｌｄｊｋｌｄじゃｋｌｄｊｓ</title>

  <!-- CSS -->
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/parts/css.php"); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">

  <!-- JavaScript -->
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/parts/head_script.php"); ?>
  <style>
    body {}

    .container {}
  </style>
</head>

<body>
  <!-- ヘッダー部分コード -->
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/parts/header.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/parts/login.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/parts/afi.php"); ?>
  <div class="container pt-3">
    <div class="col-12 border-1 mb-3  bg-light rounded">
      <div class="h2 pl-3">このサイトについて</div>
      <hr style="margin: 2px 0 2px 0;border:none;border-top:dashed 1px #c0c0c0;">
      <div class="col-12 pt-1">
        このサイトは全国で活動しているジュニアリーダーに交流の場を提供したいと言う思いで作成しています．<br>
        今年は新型コロナウイルスの影響で子ども会の活動，ジュニアリーダーどうしの交流機会が著しく少なくなると思われます．<br>
        

        <div class="text-right">2020/5/1</div>

        <!-- メールアドレスが<b>"ID"</b>になり，ログインする際に必要です．
          サーバの問題，サイトの作り方の問題，保守性の悪さなど素人が適当に作ったWebシステムなので使いにく所が多いですがご了承ください．

          今回は機能改善，システム周りの改良公開する -->
      </div>
    </div>

    <div class="col-12 border-1 mb-3  bg-light rounded">
      <div class="h2 pl-3">アカウントについて</div>
      <hr style="margin: 2px 0 2px 0;border:none;border-top:dashed 1px #c0c0c0;">
      <div class="col-12 pt-1">
        このサイトは<b>"閲覧のみ"</b>の場合アカウントを取得する必要はありません，「書き込み」「投稿」を行う場合にアカウントが必要になります．<br>
        アカウントの作成は<a href="https://kodomo-kai.info/signup.php">こちらから</a>お願いします．<br>
        アカウント登録の際にメールアドレスが必要ですが，適当なメールアドレスを入力しても登録できます．<br>
        何なら，「a@a.a」みないなのでもOK！<br>
        いずれはちゃんとしたシステムに作り直します．
        <div class="text-right">2020/5/1</div>

        <!-- 現在，アカウントの登録および書き込みなどは設定で出来ないようにしています．サーバの設定が完了しだい連絡を行います．<br>
        このサイトは開発段階であり，存在するコンテンツなどは動作確認のために追加した適当なデータです．<br>
        これからはLINEボットの開発も行い，新着のブログやレクリエーションの追加がされた時に通知を送る予定です．<br>
        なかなか開発を行う時間を作ることができないため機能として不十分な所があります. 2019/10/28 -->
      </div>
    </div>
    <!-- 画像スライダ始まり -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade mb-3 mx-auto w-100" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100 rounded" src="img/slide/slide7.png" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 rounded" src="img/slide/slide8.png" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 rounded" src="img/slide/slide9.png" alt="Third slide">
        </div>
        <!-- Prev と Next のボタン -->
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        <!-- ./Prev と Next のボタン -->
      </div>
    </div>
    <!-- 画像スライダ終わり -->


    <main role="main" class="container" class="">
      <div class="row">
        <?php
        ini_set('display_errors', 1);
        ini_set('error_reporting', E_ALL);
        date_default_timezone_set('Asia/Tokyo');

        $file_list_path = $_SERVER['DOCUMENT_ROOT'] . "/blog/new-blog-list.json";
        [$arr, $json_count] = json_read($file_list_path);

        // echo"<pre>";
        // var_dump($arr);
        // echo"</pre>";
        ?>
        <div class="col-md-8 blog-main mb-3 pl-3 pt-2 border-1 border-secondary rounded">
          <h3 class="pb-3 mb-4 font-italic border-bottom">最近の記事</h3>

          <div class="blog-post">
            <?php
            for ($i = 0; $i < count($arr); $i++) {
              $file_path = $_SERVER['DOCUMENT_ROOT'] . "{$arr[$i]["path"]}/{$arr[$i]["filename"]}" . ".json";
              [$_arr, $json_count] = json_read($file_path); ?>
              <div class="blog-post-title border-left-5 pl-2 h3"><?php echo "{$_arr["blogTitle"]}"; ?></div>
              <p class="blog-post-meta"><?php echo "{$_arr["date"]}"; ?>　by&nbsp;<a href="#"><?php echo "{$_arr["nickName"]}"; ?></a></p>
              <div class="row">
                <div class="col-md-12 order-md-1">
                  <div class="text-left you" style="">
                    <?php
                    echo "{$_arr["blogSentence"]}";
                    ?>
                    <!-- <div class="text-right pr-md-5 pr-sm-3"><a href="/blog/blog-top.php">もっと見る>></a></div> -->
                    <div class="text-right pr-md-5 pr-sm-3"><s>もっと見る>></s></div>
                  </div>
                </div>
              </div>
              <hr>
            <?php } ?>
          </div>
        </div>

        <!-- /.blog-post -->
        <!-- /.blog-main -->
        <aside class="col-md-4 blog-sidebar">

          <!-- A8 アフィ -->
          <!-- <div class="text-center mb-3">
            <div class="mb-3">
              <a href="https://px.a8.net/svt/ejp?a8mat=35B0XS+84XAEQ+50+5YDJSH" target="_blank" rel="nofollow">
              <img border="0" width="300" height="250" alt="" src="https://www20.a8.net/svt/bgt?aid=190311040492&wid=001&eno=01&mid=s00000000018036007000&mc=1"></a>
              <img border="0" width="1" height="1" src="https://www19.a8.net/0.gif?a8mat=35B0XS+84XAEQ+50+5YDJSH" alt="">
            </div>
          </div> -->
          <!-- /.A8 アフィ -->

          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic border-left-5">このサイトについて</h4>
            <p class="mb-0">単位子ども会関係者やシニア・ジュニアリーダー向けのウェブサイトです．
              <!-- <br> -->
              <!-- 子ども会とSL，JL用に書き込むことが出来る掲示板を用意しているので使ってください -->
              <!-- このサイトは公益社団法人 全国子ども会連合会とは関係ありません． -->
              　</p>
          </div>
          <div class="p-3">
            <h4 class="font-italic border-left-5">アーカイブ</h4>
            <ol class="list-unstyled mb-0">
              <li>
                <?php
                $archive_index_path = $_SERVER['DOCUMENT_ROOT'] . "/archive/files_index.json";
                [$str, $cnt] = json_read($archive_index_path);
                $yrs_cnt = count($str);
                foreach (range(0, $yrs_cnt - 1) as $i) {
                  $mth_cnt = count($str[$i]);
                  foreach (range(1, $mth_cnt - 1) as $j) {
                    echo "<a href=\"#\" class=\"pl-2 text-muted\">{$str[$i][0]}年 {$str[$i][$j]["month"]}月（{$str[$i][$j]["num"]}）</a><br>";
                  }
                }

                // echo"<pre>";
                // var_dump($str);
                // echo"</pre>";
                ?>
              </li>
            </ol>
          </div>

          <!-- <div class="p-3">
            <h4 class="font-italic border-left-5">プライバシー<span class="d-inline-block">ポリシー</span></h4>
            <ol class="list-unstyled mb-0">
              <li>
                <a href="privacyPolicy.php" class="pl-2 text-muted">詳細はこちら</a>
              </li>
            </ol>
          </div> -->

          <div class="p-3">
            <h4 class="font-italic border-left-5">外部リンク</h4>
            <ol class="list-unstyled">
              <?php
              $link_path = $_SERVER['DOCUMENT_ROOT'] . "/link/link_index.json";
              [$arr, $cnt] = json_read($link_path);
              foreach (range(0, $cnt - 1) as $num) {
              ?>
                <li class="mb-1">
                  <a href="<?php echo "{$arr[$num]["siteUrl"]}"; ?>" target="_blank" class="pl-2 text-muted"><?php echo "{$arr[$num]["siteName"]}"; ?></a>
                </li>
              <?php } ?>

            </ol>

            <div class="p-1">
              <h4 class="font-italic border-left-5">リリースノート</h4>
              <ol class="list-unstyled">
                  <li class="mb-1">
                    <a href="https://github.com/ChihiroS/kodomo-kai.info/releases" target="_blank" class="pl-2 text-muted">リリース情報<i class="fas fa-external-link-alt ml-2"></i></a>
                  </li>
              </ol>
            </div>
          </div>
        </aside>
        <!-- /.blog-sidebar -->
      </div>
      <!-- /.row -->

    </main>
  </div>

  <!-- /.container -->
  <!-- フッター部分 -->
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/parts/foot_script.php"); ?>
  </div>
</body>

</html>