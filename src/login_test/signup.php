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
  <title>新規アカウントの登録 - 子ども会を変えたい</title>
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
          <div class="needs-validation p-0 mb-3 topic-form">
            <div class="row">
              <!-- LINE 登録ボタン -->
              <div class="col-12 px-4">


                <!-- https://access.line.me/oauth2/v2.1/authorize
                ?response_type=code
                &client_id=1234567890
                &redirect_uri=https%3A%2F%2Fexample.com%2Fauth
                &state=12345abcde
                &scope=openid profile
                &nonce=09876xyz

                https://access.line.me/oauth2/v2.1/authorize
                ?response_type=code
                &client_id=1571501288
                &redirect_uri=https%3A%2F%2Fkodomo-kai.info
                &state=2c1ca5
                &scope=profile -->


                <form action="/login_test/line.php" method="post">
                  <button type="submit" class="btn btn-success btn-lg btn-block col-md-6 col-xs-12 mx-auto mb-2" id="">
                    <i class="fab fa-line"></i>
                    LINEで登録する
                  </button>
                </form>
              </div>
              <!-- ./LINE 登録ボタン -->

              <!-- Twitter 登録ボタン -->
              <div class="col-12 px-4">
                <!-- <form action="/login_test/twitter.php" method="post"> -->
                  <button type="button" class="btn btn-info btn-lg btn-block col-md-6 col-xs-12 mx-auto my-2 tw_login" id="">
                    <i class="fab fa-twitter"></i>
                    Twitterで登録する
                  </button>
                <!-- </form> -->
              </div>
              <!-- ./Twitter 登録ボタン -->

              <div id="firebaseui-auth-container"></div>
              <script>
                //----------------------------------------------
                // Firebase UIの設定
                //----------------------------------------------
                var uiConfig = {
                    // ログイン完了時のリダイレクト先
                    signInSuccessUrl: '/auth/twitter/done.html',

                    // 利用する認証機能
                    signInOptions: [
                      firebase.auth.TwitterAuthProvider.PROVIDER_ID
                    ],

                    // 利用規約のURL(任意で設定)
                    tosUrl: 'http://example.com/kiyaku/',
                    // プライバシーポリシーのURL(任意で設定)
                    privacyPolicyUrl: 'http://example.com/privacy'
                  };

                  var ui = new firebaseui.auth.AuthUI(firebase.auth());
                  ui.start('#firebaseui-auth-container', uiConfig);
              </script>

              <!-- Facebook 登録ボタン -->
              <div class="col-12 px-4">
                <form action="/login_test/facebook.php" method="post">
                  <button type="submit" class="btn btn-primary btn-lg btn-block col-md-6 col-xs-12 mx-auto my-2" id="">
                    <i class="fab fa-facebook"></i>
                    Facebookで登録する
                  </button>
                </form>
              </div>
              <!-- ./Facebook 登録ボタン -->

              <!-- ID 登録ボタン -->
              <div class="col-12 px-4">
                <form action="/login_test/line.php" method="post">
                  <button type="submit" class="btn btn-secondary btn-lg btn-block col-md-6 col-xs-12 mx-auto my-2" id="">
                    IDで登録する
                  </button>
                </form>
              </div>
              <!-- ./ID 登録ボタン -->
            </div>
          </div>

          <div class="col-12" id="newLoginiew" style="display:none;">
            <div class="h1"><p class="text-center"><span id="userNickName">X</span>さん，こんにちは<br>登録ありがとうございます<br></p></div>
            <div class="h2"><p class="text-center"><a href="/index.php">トップページへ!!</p></a></div>
          </div>


          <!-- <div class="container pt-3">
            <div class="col-8 border-1 mb-3  bg-light rounded">
              <div class="h4 pl-3">ログインしてください</div>
              <hr style="margin: 2px 0 2px 0;border:none;border-top:dashed 1px #c0c0c0;">
              <div class="col-12 pt-1">
                LINEアカウントを利用してログインを行います．
                本Webサービスでは，ログイン時の認証画面にて許可を頂いた場合のみ，あなたのLINEアカウントに登録されているメールアドレスを取得します．
                取得したメールアドレスは，以下の目的以外では使用したしません．また，法令に定められた場合に除き，第三者への提供はいたしません．
                <ul>
                  <li>ユーザーIDとしてアカウントの管理に利用</li>
                  <li>パスワード再発時の本人確認に利用</li>
                </ul>
              </div>
              <hr>
              <button type="submit" class="btn btn-success btn-lg btn-block col-8 mx-auto my-4" id="">
                <a class="text-light" href="<?php echo "{$link}"?>">LINEでログインする</a>
              </button>
            </div>
          </div> -->


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
