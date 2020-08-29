<?php
$params = explode('/', $_GET['url']);
$model = array_shift($params);
echo "<script>console.log(\"{$model}\")</script>";
echo "<script>console.log(\"{$params}\")</script>";
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
  <title>トップページ - 子ども会を変えたい</title>

  <!-- CSS -->
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/css.php"); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">

  <!-- JavaScript -->
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/head_script.php"); ?>

  <style>body {}.container {}</style>
</head>

<body>
  <!-- ヘッダー部分コード -->
  <!-- <div id="header"></div> -->
  <!-- <div id="login"></div> -->
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/header.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/login.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/afi.php"); ?>
  <div class="container pt-3">
    <div class="col-12 border-1 mb-3  bg-light rounded">
      <div class="h2 pl-3">お知らせ</div>
      <hr style="margin: 2px 0 2px 0;border:none;border-top:dashed 1px #c0c0c0;">
      <div class="col-12 pt-1">
        <!-- 現在，アカウントの登録および書き込みなどは設定で出来ないようにしています．サーバの設定が完了しだい連絡を行います．<br> -->
        このサイトは開発段階であり，存在するコンテンツなどは動作確認のために追加した適当なデータです．<br>
        これからはLINEボットの開発も行い，新着のブログやレクリエーションの追加がされた時に通知を送る予定です．<br>
        なかなか開発を行う時間を作ることができないため機能として不十分な所があります.  2019/10/28
      </div>

    </div>


<!--
<div class="part image image0 image-Fake Browser0">
  <div class="frame-title-left">
    <div class="frame-title-right">
      <div class="frame-title">
        <h2 class="title">メインビジュアル</h2>
      </div>
    </div>
  </div>
  <div class="frame-top-left">
    <div class="frame-top-right">
      <div class="frame-top">
      </div>
    </div>
  </div>
  <div class="frame-middle-left">
    <div class="frame-middle-right">
      <div id="bxslider0" class="bxslider">
        <div class="slide">
          <a href="#" target="_self">
          <img class="SwapImgSrc img0" src="http://hitachishikoren.nexsimo.co.jp/manage/top/upload/00000_20150417_0002.jpg" alt="" title=""
          data-img-src-off="http://hitachishikoren.nexsimo.co.jp/manage/top/upload/00000_20150417_0002.jpg" data-img-src-on=""></a>
          <div class="image-comment"></div>
        </div>
        <div class="slide">
          <a href="#" target="_self">
          <img class="SwapImgSrc img1" src="http://hitachishikoren.nexsimo.co.jp/manage/top/upload/00000_20150417_0003.jpg" alt="" title=""
          data-img-src-off="http://hitachishikoren.nexsimo.co.jp/manage/top/upload/00000_20150417_0003.jpg" data-img-src-on=""></a>
          <div class="image-comment"></div>
        </div>
        <div class="slide">
          <a href="#" target="_self">
          <img class="SwapImgSrc img2" src="http://hitachishikoren.nexsimo.co.jp/manage/top/upload/00000_20150430_0008.jpg" alt="" title=""
          data-img-src-off="http://hitachishikoren.nexsimo.co.jp/manage/top/upload/00000_20150430_0008.jpg" data-img-src-on=""></a>
          <div class="image-comment"></div>
        </div>
        <div class="slide">
        <a href="#" target="_self">
          <img class="SwapImgSrc img3" src="http://hitachishikoren.nexsimo.co.jp/manage/top/upload/00000_20150430_0007.jpg" alt="" title=""
          data-img-src-off="http://hitachishikoren.nexsimo.co.jp/manage/top/upload/00000_20150430_0007.jpg" data-img-src-on=""></a>
          <div class="image-comment"></div>
        </div>
        <div class="slide">
          <a href="#" target="_self">
          <img class="SwapImgSrc img4" src="http://hitachishikoren.nexsimo.co.jp/manage/top/upload/00000_20150417_0001.jpg" alt="" title=""
          data-img-src-off="http://hitachishikoren.nexsimo.co.jp/manage/top/upload/00000_20150417_0001.jpg" data-img-src-on=""></a>
          <div class="image-comment"></div>
        </div>
      </div>

      <div class="wrapper-opacity">
        <div class="opacity leftOpacity"></div>
        <div class="opacity rightOpacity"></div>
      </div>

      <div class="image-box image-box-Fake Browser0"></div>
    </div>
  </div>
  <div class="frame-bottom-left">
    <div class="frame-bottom-right">
      <div class="frame-bottom"></div>
    </div>
  </div>
</div> -->

    <!-- 画像スライダ始まり -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade mb-3 mx-auto w-100" data-ride="carousel">
      <div class="carousel-inner">
        <!-- <div class="carousel-item active">
          <img class="d-block w-100 rounded" src="img/slide/slide1.png" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 rounded" src="img/slide/slide2.png" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 rounded" src="img/slide/slide3.png" alt="Third slide">
        </div> -->
        <!-- <div class="carousel-item active">
          <img class="d-block w-100 rounded" src="img/slide/slide4.png" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 rounded" src="img/slide/slide5.png" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 rounded" src="img/slide/slide6.png" alt="Third slide">
        </div> -->
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

        ini_set( 'display_errors', 1 );
        ini_set( 'error_reporting', E_ALL );
        date_default_timezone_set('Asia/Tokyo');
        // $file_index_path = $_SERVER['DOCUMENT_ROOT']."/archive/{$y_max}/{$m_max}/{$d_max}/index.json";

        $file_list_path = $_SERVER['DOCUMENT_ROOT']."/blog/new-blog-list.json";
        if( ($fp = fopen($file_list_path,"r"))=== false ){
          die("jsonファイル読み込みエラー");
        }
        $json = file_get_contents($file_list_path);

        // 文字化けを防ぐコード
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $arr = json_decode($json, true);
        $json_count = count($arr);
        // echo"<pre>";
        // var_dump($arr);
        // echo"</pre>";
        ?>
        <div class="col-md-8 blog-main mb-3 pl-3 pt-2 border-1 border-secondary rounded">
          <h3 class="pb-3 mb-4 font-italic border-bottom">最近の記事</h3>

          <div class="blog-post">
            <?php
            // echo"<pre>";
            // var_dump($arr);
            // echo"</pre>";
            for($i=0; $i<count($arr); $i++){
              $file_path = "{$arr[$i]["path"]}/{$arr[$i]["filename"]}".".json";
              $_json = file_get_contents($_SERVER['DOCUMENT_ROOT'].$file_path);

              // 文字化けを防ぐコード
              $_json = mb_convert_encoding($_json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
              $_arr = json_decode($_json, true);
              $_json_count = count($_arr);

              ?>
            <div class="blog-post-title border-left-5 pl-2 h3"><?php echo"{$_arr[0]["blogTitle"]}"; ?></div>
            <p class="blog-post-meta"><?php echo"{$_arr[0]["date"]}"; ?>　by&nbsp;<a href="#"><?php echo"{$_arr[0]["nickName"]}"; ?></a></p>
            <div class="row">
              <div class="col-md-12 order-md-1">
                <div class="text-left you" style="">
                  <?php
                    echo"{$_arr[0]["blogSentence"]}";
                  ?>
                  <div class="text-right pr-md-5 pr-sm-3"><a href="/blog/blog-top.php">もっと見る>></a></div>
                </div>
              </div>
            </div>
            <hr>
            <?php
            }
            ?>
          </div>
        </div>


          <!-- <div class="blog-post">
            <div class="blog-post-title border-left-5 pl-2 h2">記事のタイトル</div>
            <p class="blog-post-meta">2018年9月19日　by&nbsp;<a href="#">Teru</a></p>
            <div class="row">
              <div class="col-md-12 order-md-1">
                <div class="text-center">
                  <img src="./img/koji.svg" width="256" height="256">
                  <h3 style="color:rgb(75,75,75)">ただいま工事中</h3>
                </div>
                <div class="text-right pr-md-5 pr-sm-3"><a href="#">続きを見る>></a></div>
              </div>
            </div>
          </div> -->



        <!-- /.blog-post -->
        <!-- /.blog-main -->
        <aside class="col-md-4 blog-sidebar">
          <!-- <div class="text-center mb-3"> -->
          <!-- <div class="mb-3">
            <a href="https://px.a8.net/svt/ejp?a8mat=35B0XS+84XAEQ+50+5YDJSH" target="_blank" rel="nofollow">
            <img border="0" width="300" height="250" alt="" src="https://www20.a8.net/svt/bgt?aid=190311040492&wid=001&eno=01&mid=s00000000018036007000&mc=1"></a>
            <img border="0" width="1" height="1" src="https://www19.a8.net/0.gif?a8mat=35B0XS+84XAEQ+50+5YDJSH" alt="">
          </div> -->

          <div class="p-3 mb-3 bg-light rounded">
              <h4 class="font-italic border-left-5">このサイトについて</h4>
            <p class="mb-0">単位子ども会関係者やシニア・ジュニアリーダー向けのウェブサイトです．<!-- <br> -->
                            <!-- 子ども会とSL，JL用に書き込むことが出来る掲示板を用意しているので使ってください -->
                            <!-- このサイトは公益社団法人 全国子ども会連合会とは関係ありません． -->
                          　</p>
          </div>
          <div class="p-3">
            <h4 class="font-italic border-left-5">アーカイブ</h4>
            <ol class="list-unstyled mb-0">
              <li>
                <!-- <a href="#" class="pl-2 text-muted">2018年 9月（1）</a> -->
                <?php
                  $arr_cnt = 0;
                  for($i=0; $i<count($days_array); $i++){
                    if(empty($days_array[$i])) continue;
                    for($j=0; $j<count($days_array[$i]); $j++){
                      if(empty($days_array[$i][$j])) continue;
                      for($k=0; $k<count($days_array[$i][$j]); $k++){
                        if(empty($days_array[$i][$j][$k])) continue;
                        $file_index_path = $_SERVER['DOCUMENT_ROOT']."/archive/{$years_array[$i]}/{$months_array[$i][$j]}/{$days_array[$i][$j][$k]}/index.json";
                        if (file_exists($file_index_path)) {
                          $json = file_get_contents($file_index_path);
                          $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                          $arr = json_decode($json, true);
                          $arr_cnt += count($arr);
                          $arr_cnt -= 1;
                        }
                      }
                      if($arr_cnt){
                        echo"<a href=\"#\" class=\"pl-2 text-muted\">{$years_array[$i]}年 {$months_array[$i][$j]}月（{$arr_cnt}）</a><br>";
                        $arr_cnt = 0;
                      }
                    }
                  }
                ?>
              </li>
            </ol>
          </div>

          <!-- <div class="p-3">
            <h4 class="font-italic border-left-5">プライバシー<span class="d-inline-block">ポリシー</span></h4>
            <ol class="list-unstyled mb-0">
              <li>
                <a href="#" class="pl-2 text-muted">詳細はこちら</a>
              </li>
            </ol>
          </div> -->
          <div class="p-3">
            <h4 class="font-italic border-left-5">外部リンク</h4>
            <ol class="list-unstyled">
              <li class="mb-1">
                <a href="http://www.kodomo-kai.or.jp/" target="_blank" class="pl-2 text-muted">公益社団法人 全国子ども会連合会</a>
              </li>
              <li class="mb-1">
                <a href="http://www.kodomo-kai.or.jp/fukuokashi" target="_blank" class="pl-2 text-muted">福岡市子ども会連合会</a>
              </li>
              <li class="mb-1">
                <a href="http://www.juniorleader.com" target="_blank" class="pl-2 text-muted">子ども会コミュニティセンター</a>
              </li>
            </ol>
          </div>
        </aside>
        <!-- /.blog-sidebar -->
      </div>
      <!-- /.row -->

    </main>
  </div>


    <!-- /.container -->
    <!-- フッター部分 -->
    <?php include($_SERVER['DOCUMENT_ROOT']."/parts/footer.php"); ?>
    <?php include($_SERVER['DOCUMENT_ROOT']."/parts/foot_script.php"); ?>

  </div>
</body>

</html>