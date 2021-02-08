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
  <title>新規アカウントの登録</title>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/css.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/head_script.php"); ?>
</head>

<body>
  <!-- ヘッダー部分コード -->
  <?php // include($_SERVER['DOCUMENT_ROOT']."/parts/header.php"); ?>
  <?php // include($_SERVER['DOCUMENT_ROOT']."/parts/login.php"); ?>

    <main role="main" class="container pt-4" style="">
      <div class="row">
        <!-- パンくずリスト -->
        <!-- ./パンくずリスト -->

        <div class="col-md-12 order-md-1">
          <div class="mb-3 h3 border-left-5 pl-2"><a href="/index.php">福岡市ジュニアリーダー</a></div><hr>
          <div class="needs-validation rounded p-3 mb-3 topic-form">
            <div class="row">

              <table class="col-md-12">
                <div class="h2 border-left-5">7月：九州大会</div>
                <tbody>
                  <tr>
                    <td class="col-md-3 col-sm-12"><img src="./7/kyusyu_taikai/H25/IMGP2846.JPG"></td>
                    <!-- <td><img src="./dummy.png" alt="" width="800" height="600" style="z-index: 2"/></td> -->

                    <td class="col-md-3 col-sm-12"><img src="./7/kyusyu_taikai/H25/IMG_1723.JPG"></td>
                    <!-- <td><img src="./dummy.png" alt="" width="800" height="600" style="z-index: 2"/></td> -->

                    <td class="col-md-3 col-sm-12"><img src="./7/kyusyu_taikai/H25/IMG_1724.JPG"></td>
                    <!-- <td><img src="./dummy.png" alt="" width="800" height="600" style="z-index: 2"/></td> -->
                  </tr>
                  <tr>
                    <td><img src=""></td>

                  </tr>
                  <tr>
                    <td><img src=""></td>

                  </tr>
                </tbody>
              </table>

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
