<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <?php
    $content = "ジュニアリーダー向けのポータルサイトです．子ども会で使えるレクリエーションの共有や活動の報告ができます．ジュニアリーダー同士の交流にどうぞ使ってください！！今の子ども会をみんなで変えて行きましょう．";
    echo "<meta name=\"description\" content=\"子ども会, kodomo, ジュニアリーダー, jl, レク, レクリエーション, {$content}\">";
  ?>
  <link rel="icon" href="/img/favicon/favicon.ico">
  <title>子ども会 - 子ども会を変えたい</title>
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
        <a href="/kodomo-kai-top.php" class="text-dark">子ども会</a>
      </div>
      <!-- ./パンくずリスト -->

        <div class="col-md-12 order-md-1">
          <h2 class="mb-3"><i class="fas fa-map-marker-alt mr-2"></i>子ども会</h2><hr>
          <div class="text-center">
            <img src="/img/koji.svg" width="256" height="256">
            <h3 style="color:rgb(75,75,75)">ただいま工事中</h3>
          </div>
        </div>
      </div>
    </main>
    <!-- /.container -->
  </div>
  <!-- フッター部分 -->
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/footer.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/foot_script.php"); ?>

  </div>
</body>

</html>
