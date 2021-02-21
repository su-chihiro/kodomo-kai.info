<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php
    $content = "ジュニアリーダー向けのポータルサイトです．子ども会で使えるレクリエーションの共有や活動の報告ができます．ジュニアリーダー同士の交流にどうぞ使ってください！！今の子ども会をみんなで変えて行きましょう．";
    echo "<meta name=\"description\" content=\"子ども会, kodomo, ジュニアリーダー, jl, {$content}\">";
  ?>
  <meta name="author" content="">
  <link rel="icon" href="/img/favicon/favicon.ico">
  <title>お問合せ - ジュニアのたまりば</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
  <link href="/css/blog.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function check(){
      var flg = 0;
      if(document.newtopicform.sentence.value == ""){ // 「本文」の入力をチェック
        flg = 1;
        $.notify("本文が入力されていません", "warn");
      }
      if(document.newtopicform.title.value == ""){ // 「タイトル」の入力をチェック
        flg = 1;
        $.notify("タイトルが入力されていません", "warn");
      }
      if(document.newtopicform.email.value == ""){ // 「メールアドレス」の入力をチェック
        flg = 1;
        $.notify("メールアドレスが入力されていません", "warn");
      }
      if(document.newtopicform._name.value == ""){ // 「ニックネーム」の入力をチェック
        flg = 1;
        $.notify("ニックネームが入力されていません", "warn");
      }
      // 設定終了
      if(flg){
        return false;
      }
      else{
        return true;
      }
    }
  </script>
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
          <a href="/contact/contact-top.php" class="text-dark">お問合せ</a>
        </div>
        <!-- ./パンくずリスト -->

        <div class="col-md-12 order-md-1">
          <div class="mb-3 h2"><i class="fas fa-info-circle mr-2"></i>お問合せ</div><hr>
          <form class="needs-validation" name="newtopicform" action="#" method="POST" onSubmit="return check()" novalidate>
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="Name">ニックネーム<sup style="color:red;">*必須</sup></label>
                <input type="text" class="form-control" class="name" id="Name" name="_name" placeholder="" value="">
                <div class="invalid-feedback">
                  お名前は必須項目です．
                </div>


              <div class="mb-3 mt-3">
                <label for="emailAddress">メールアドレス<sup style="color:red;">*必須</sup></label>
                <input type="email" class="form-control" id="emailAddress" name="email" placeholder="sample@sample.com">
                <div class="invalid-feedback">
                  メールアドレスは必須項目です．
                </div>
              </div>

            <div class="mb-3">
              <label for="Title">タイトル<sup style="color:red;">*必須</sup></label>
              <input type="text" name="title" class="form-control" id="Title" placeholder="子ども会について" required>
            </div>

            <div class="mb-3">
              <label for="Sentence">本文<sup style="color:red;">*必須</sup></label>
              <textarea name="sentence" id="Sentence" class="form-control" rows="5" placeholder="ここに文章を書きます"></textarea>
            </div>

            <!-- <button class="btn btn-primary btn-lg btn-block col-4 mx-auto my-4" type="submit">送信</button> -->
            <!-- <button class="btn btn-primary btn-lg btn-block col-4 mx-auto my-4" type="button" id="done">送信</button> -->
            <!-- 切り替えボタンの設定 -->
            <button type="button" class="btn btn-primary btn-lg btn-block col-4 mx-auto my-4" data-toggle="modal" data-target="#myModal">
              送信
            </button>
          </form>


          <!-- モーダルの設定 -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">おしらせ</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>まだ，お問い合わせは機能をつけてません(m´・ω・｀)m ｺﾞﾒﾝ…<br>連絡はTwitter（@com_index）にお願いします．</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                  <!-- <button type="button" class="btn btn-primary">変更を保存</button> -->
                </div><!-- /.modal-footer -->
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->


        </div>
      </div>
        </div>
      </div>
    </main>
  </div>
  <!-- /.container -->
  <!-- フッター部分 -->
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/footer.php"); ?>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js"></script>
  <script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>

  <script>
    Holder.addTheme('thumb', {
      bg: '#55595c',
      fg: '#eceeef',
      text: 'Thumbnail'
    });
  </script>
  <script src="/js/main.js"></script>
  <script src="/js/summernote.js"></script>
  <script src="/js/lang/summernote-ja-JP.js"></script>
</div>
</body>

</html>
