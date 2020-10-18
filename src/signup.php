<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0">
  <?php
    $content = "ジュニアリーダー向けのポータルサイトです．子ども会で使えるレクリエーションの共有や活動の報告ができます．ジュニアリーダー同士の交流にどうぞ使ってください！！今の子ども会をみんなで変えて行きましょう．";
    echo "<meta name=\"description\" content=\"子ども会 kodomo ジュニアリーダー jl {$content}\">";
  ?>
  <meta name="author" content="">
  <link rel="icon" href="/img/favicon/favicon.ico">
  <title>新規アカウントの登録 - </title>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/css.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/head_script.php"); ?>

</head>

<body>
  <!-- ヘッダー部分コード -->
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/header.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/login.php"); ?>

    <main role="main" class="container pt-4" style="">
      <div class="row">
        <!-- パンくずリスト -->
        <!-- ./パンくずリスト -->

        <div class="col-md-12 order-md-1">
          <div class="mb-3 h3">新規アカウントの登録</div><hr>
          <div class="needs-validation border-1 rounded p-3 mb-3 topic-form">
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="Name">ニックネーム<sup style="color:red;">*必須</sup></label>
                <input type="text" class="form-control" id="nickName" value="">
              </div>

              <div class="col-md-6 mb-3">
                <label for="Region">活動地域（県）<sup style="color:red;">*必須</sup></label>
                <select class="form-control" id="Pref">
                  <option value="0">--- 都道府県を選択してください ---</option>
                </select>
              </div>

              <div class="col-md-6 mb-3">
                <label for="Region">市区<sup style="color:red;">*必須</sup></label>
                <select class="form-control" id="City" disabled>
                  <option value="0">--- 市区を選択してください ---</option>
                </select>
              </div>

              <div class="col-md-12 mb-3">
                <label for="emailAddress">メールアドレス<sup style="color:red;">*必須</sup><span class="text-muted">（公開されません）</span></label>
                <input type="email" class="form-control" id="emailAddress" placeholder="sample@sample.com" value="">
              </div>

              <div class="col-md-12 mb-3">
                <label for="Title">パスワード<sup style="color:red;">*必須</sup></label>
                <input type="password" class="form-control" id="passwd" value="">
              </div>

              <!-- <div class="col-md-12 mb-3">
                <label for="Title">パスワードの再確認<sup style="color:red;">*必須</sup></label>
                <input type="password" class="form-control" id="repasswd" value="">
              </div> -->

              <button type="button" class="btn btn-primary btn-lg btn-block col-4 mx-auto my-4" id="signupSubmitBtn">
                送信
              </button>
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
    <script type="text/javascript" src='/js/signup.js'></script>

  </div>
</body>

</html>
