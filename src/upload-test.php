<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/img/favicon/favicon.ico">
  <title>新規アカウントの登録</title>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/css.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/head_script.php"); ?>
  <!-- <script>alert('dadasdads');</script> -->
</head>

<body>
  <!-- ヘッダー部分コード -->
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/header.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/login.php"); ?>

    <main role="main" class="container pt-4" style="">
      <div class="row" id="tmp">
        <!-- パンくずリスト -->
        <!-- ./パンくずリスト -->

        <div class="col-md-12 order-md-1">
          <form method="POST" id="profileIconUpload" class="" action="upimg.php" enctype="multipart/form-data">

            <input id="profileIcon" type="file" value="" name="upimg" class="none mb-3" accept="image/*" enctype="multipart/form-data">
            <label for="profileIcon">
              <img src="../img/users_img/default/profile_icon_400.png" class="icon">
            </label>

            <div id="insertCropper"></div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block col-4 mx-auto my-4" id="newTest">
                投稿
              </button>
            </div>

          </form>
        </div>
      </div>
    </main>
    <!-- /.container -->
    <!-- フッター部分 -->
    <?php include($_SERVER['DOCUMENT_ROOT']."/parts/footer.php"); ?>
    <?php include($_SERVER['DOCUMENT_ROOT']."/parts/foot_script.php"); ?>

  </div>
</body>

</html>
