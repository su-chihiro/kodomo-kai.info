<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0">
  <?php
    ini_set('display_errors', 0);
    $pw = $_POST['password'];
    if(!strcmp($pw, "admin_auth")) {
      header("Location: /auth/auth-rec-top.php");
      exit;
    }

  ?>
  <meta name="author" content="Suzurikawa Chihiro">
  <link rel="icon" href='/img/favicon/favicon.ico'>
  <title>管理者ログインフォーム - 子ども会を変えたい</title>

  <!-- CSS -->
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/css.php"); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">

  <!-- JavaScript -->
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/head_script.php"); ?>

</head>

<body>
  <!-- ヘッダー部分コード -->
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/afi.php"); ?>
  <div class="container pt-3">
    <main role="main" class="container" class="">
      <div class="row">
        <div class="mx-auto">
          <div class="d-block mb-2">管理者用 ログインフォーム</div>
          <form class="form-inline" action="./index.php" method="POST">
            <div class="form-group mx-sm-3 mb-2">
              <label for="inputPassword2" class="sr-only">Password</label>
              <input type="password" class="form-control" id="inputPassword2" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
          </form>
        </div>
      </div>
    </main>
  </div>


    <!-- /.container -->
    <!-- フッター部分 -->
    <?php include($_SERVER['DOCUMENT_ROOT']."/parts/foot_script.php"); ?>

  </div>
</body>

</html>
