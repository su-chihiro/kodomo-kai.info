<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/img/favicon/favicon.ico">
  <title>マイプロフィール</title>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/css.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/head_script.php"); ?>
</head>

<body>
  <!-- ヘッダー部分コード -->
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/header.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/login.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/afi.php"); ?>
  

    <main role="main" class="container pt-4" style="">
      <div class="row">
        <!-- パンくずリスト -->
        <!-- ./パンくずリスト -->

        <div class="col-md-12 order-md-1">
          <div class="mb-3 h3"><i class="fas fa-user-circle mr-2"></i>マイプロフィール</div><hr>
          <div class="needs-validation">
            <div class="row">
              <div class="col-md-4 mb-3 rounded">
                <div class="col-md-12 mb-3 ">
                  <!-- <img src="/img/users_img/default/profile_icon_400.png" class="icon mx-auto d-block"> -->
                  <form method="POST" id="form1" class="col-md-12" action="upimg.php" enctype="multipart/form-data">
                    <div class="col-md-12 text-center">
                      <input id="profileIcon" type="file" value="" name="upimg" class="none mb-3" accept="image/*" enctype="multipart/form-data">
                      <label for="profileIcon" class="mx-auto">
                        <img src="../img/users_img/default/profile_icon_400.png" class="icon">
                      </label>
                    </div>

                    <!-- <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block col-4 mx-auto my-4" id="newTest">
                        投稿
                      </button>
                    </div> -->
                  </form>

                  <div class="mt-4">
                    <label>ニックネーム</label>
                    <div class="h1 text-center">管理者</div>
                  </div>
                  <div class="mt-4">
                    <label>活動地域</label>
                    <div class="h3 text-center">福岡県福岡市</div>
                  </div>
                  <div class="mt-4">
                    <label>ひとこと</label>
                    <!-- <div class=" mt-2 text-center">ひとこと</div> -->
                  </div>
                </div>




              </div>

              <div class="col-md-8 mb-3 rounded">
                <div class="col-md-12 border-left-4 border-bottom-1 align-middle mb-1">
                  <div class="h3">ブログ</div>
                </div>
                <div class="col-md-12 border-left-1 border-bottom-1 mb-3">
                  <div class="">none<br><br><br><br><br></div>
                </div>
                <div class="col-md-12 border-left-4 border-bottom-1 align-middle mb-1">
                  <div class="h3">トピックス</div>
                </div>
                <div class="col-md-12 border-left-1 border-bottom-1 mb-3">
                  <div class="">none<br><br><br><br><br></div>
                </div>
                <div class="col-md-12 border-left-4 border-bottom-1 align-middle mb-1">
                  <div class="h3">レクリエーション</div>
                </div>
                <div class="col-md-12 border-left-1 border-bottom-1 mb-3">
                  <div class="">none<br><br><br><br><br></div>
                </div>
              </div>
              <!-- <button type="button" class="btn btn-lg btn-block col-4 mx-auto my-4" id="Btn">
                ユーザ情報取得
              </button> -->
            </div>
          </div>

          <div class="col-12" id="newLoginiew" style="display:none;">
            <div class="h1"><p class="text-center"><span id="userNickName">X</span>さん，こんにちは<br>登録ありがとうございます<br></p></div>
            <div class="h2"><p class="text-center"><a href="/index.php">トップページへ!!</p></a></div>
          </div>

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
