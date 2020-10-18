<?php
include($_SERVER['DOCUMENT_ROOT'].'/class/char2UnicodeClass.php');
$charH = new CharChicanClass();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/img/favicon/favicon.ico">
  <title>みんなのブログ</title>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/css.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/head_script.php"); ?>

</head>

<body>

  <!-- ヘッダー部分コード -->
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/header.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/login.php"); ?>

  <div class="container pt-4">
    <main role="main" class="container" style="">
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
            <div class="circle-picker" style="width: 252px; display: flex; flex-wrap: wrap; margin-right: -14px; margin-bottom: -14px;"></div>

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
