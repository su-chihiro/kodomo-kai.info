<?php
include($_SERVER['DOCUMENT_ROOT'].'/class/char2UnicodeClass.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php
    $content = "ジュニアリーダー向けのポータルサイトです．子ども会で使えるレクリエーションの共有や活動の報告ができます．ジュニアリーダー同士の交流にどうぞ使ってください！！今の子ども会をみんなで変えて行きましょう．";
    echo "<meta name=\"description\" content=\"子ども会, kodomo, ジュニアリーダー, jl, レク, レクリエーション, {$content}\">";
  ?>
  <meta name="author" content="">
  <link rel="icon" href="/img/favicon/favicon.ico">
  <title>レクリエーション - 子ども会を変えたい</title>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/css.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/head_script.php"); ?>
</head>

<body>
  <!-- ヘッダー部分コード -->
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/header.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/login.php"); ?>

  <div class="container pt-4">
    <main role="main" class="container" style="">
      <div class="row rounded">
        <!-- パンくずリスト -->
        <div class="col-md-12 text-left mb-4">
          <i class="fas fa-home"></i>
          <a href="/index.php" class="ml-2 text-dark">ホーム</a>
          <i class="fas fa-angle-right mx-2"></i>
          <a href="/recreation/recreation-top.php" class="text-dark">レクリエーション</a>
        </div>
        <!-- ./パンくずリスト -->

        <?php
          // recreationフォルダの中にあるfileの0～7の中にあるファイルの数を数える
          $num = array();
          for($i=0; $i<8; $i++){
            $filepath = $_SERVER['DOCUMENT_ROOT']."/recreation/file/{$i}/";
            if(file_exists($filepath)){
              // glob でjsonの数を数える
              $files = glob($filepath.'{*.json}', GLOB_BRACE);
              $num[$i] = count($files);
            } else {
              $num[$i] = 0;
            }
          }
        ?>

        <div class="col-md-12 order-md-1">
          <div class="mb-3 h3"><i class="fas fa-praying-hands mr-2"></i>レクリエーション</div><hr>
          <!-- <div class="text-center">
            <img src="./img/koji.svg" width="256" height="256">
            <h3 style="color:rgb(75,75,75)">ただいま工事中</h3>
          </div> -->
          <div class="row">
            <!-- <div class="col-12 text-center"><iframe class="" src="https://www.youtube.com/embed/uTwrsO69Apw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div> -->
            <div class="col-md-4 text-center">
              <a class="h3" href="./soleRecList.php?p=0">
                <div class="">
                  <!-- <i class="fas fa-recycle" style="width:100px; height:100px;color:#505050"></i> -->
                  <i class="fas fa-sync-alt" style="width:100px; height:100px;color:#505050"></i>
                </div>
                <sapn>起承転結<span class="text-muted">（<?php echo "{$num[0]}"; ?>）</sapn></sapn>
                </a>
              <div class="col-12"><hr style="margin: 2px 0 2px 0;border:none;border-top:dashed 1px #c0c0c0;"></div>
            </div>

            <div class="col-md-4 text-center">
              <a class="h3" href="./soleRecList.php?p=1">
                <div class="">
                  <!-- <img src="/img/404/error.png" width="100" height="100"> -->
                  <i class="fas fa-user" style="width:100px; height:100px;color:#505050"></i>
                </div>
                <sapn>アイスブレイク<span class="text-muted">（<?php echo "{$num[1]}"; ?>）</span></sapn>
              </a>
              <div class="col-12"><hr style="margin: 2px 0 2px 0;border:none;border-top:dashed 1px #c0c0c0;"></div>
            </div>

            <div class="col-md-4 text-center">
              <a class="h3" href="./soleRecList.php?p=2">
                <div class="">
                  <!-- <img src="/img/404/error.png" width="100" height="100"> -->
                  <i class="fas fa-hands-helping" style="width:100px; height:100px;color:#505050"></i>
                </div>
                <sapn>手遊び レク<span class="text-muted">（<?php echo "{$num[2]}"; ?>）</span></sapn>
              </a>
              <div class="col-12"><hr style="margin: 2px 0 2px 0;border:none;border-top:dashed 1px #c0c0c0;"></div>
            </div>
            <div class="col-md-4 text-center">
              <a class="h3" href="./soleRecList.php?p=3">
                <div class="">
                  <!-- <img src="/img/404/error.png" width="100" height="100"> -->
                  <i class="fas fa-user-friends" style="width:100px; height:100px;color:#505050"></i>
                </div>
                <sapn>少人数 レク<span class="text-muted">（<?php echo "{$num[3]}"; ?>）</span></sapn>
              </a>
              <div class="col-12"><hr style="margin: 2px 0 2px 0;border:none;border-top:dashed 1px #c0c0c0;"></div>
            </div>
            <div class="col-md-4 text-center">
              <a class="h3" href="./soleRecList.php?p=4">
                <div class="">
                  <!-- <img src="/img/404/error.png" width="100" height="100"> -->
                  <i class="fas fa-users" style="width:100px; height:100px;color:#505050"></i>
                </div>
                <sapn>グループ レク<span class="text-muted">（<?php echo "{$num[4]}"; ?>）</span></sapn>
              </a>
              <div class="col-12"><hr style="margin: 2px 0 2px 0;border:none;border-top:dashed 1px #c0c0c0;"></div>
            </div>

            <div class="col-md-4 text-center">
              <a class="h3" href="./soleRecList.php?p=5">
                <div class="">
                  <i class="fas fa-volume-down" style="width:100px; height:100px;color:#505050"></i>
                </div>
                <sapn>静かにする レク<span class="text-muted">（<?php echo "{$num[5]}"; ?>）</span></sapn>
              </a>
              <div class="col-12"><hr style="margin: 2px 0 2px 0;border:none;border-top:dashed 1px #c0c0c0;"></div>
            </div>

            <div class="col-md-4 text-center">
              <a class="h3" href="./soleRecList.php?p=6">
                <div class="">
                  <img src="/img/404/error.png" width="100" height="100">
                  <!-- <i class="h1" style="width:100px; height:100px;color:#505050">💃</i> -->
                </div>
                <sapn>レクダン<span class="text-muted">（<?php echo "{$num[6]}"; ?>）</span></sapn>
              </a>
              <div class="col-12"><hr style="margin: 2px 0 2px 0;border:none;border-top:dashed 1px #c0c0c0;"></div>
            </div>

            <div class="col-md-4 text-center mb-3">
              <a class="h3" href="./soleRecList.php?p=7">
                <div class="">
                  <img src="/img/404/error.png" width="100" height="100">
                </div>
                <sapn>その他のレク<span class="text-muted">（<?php echo "{$num[7]}"; ?>）</span></sapn>
              </a>
              <div class="col-12"><hr style="margin: 2px 0 2px 0;border:none;border-top:dashed 1px #c0c0c0;"></div>
            </div>

          </div>
        </div>
      </div>
    </main>
  </div>
    <!-- /.container -->
    <!-- フッター部分 -->
    <?php include($_SERVER['DOCUMENT_ROOT']."/parts/footer.php"); ?>
    <?php include($_SERVER['DOCUMENT_ROOT']."/parts/foot_script.php"); ?>

  </div>
</body>

</html>
