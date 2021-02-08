<?php
include($_SERVER['DOCUMENT_ROOT'].'/class/char2UnicodeClass.php');
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

  <!-- include codemirror (codemirror.css, codemirror.js, xml.js, formatting.js) -->
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css">
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.css">
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
  <link href="/css/blog.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <link href="/css/summernote-lite-flatly-libre.min.css" rel="stylesheet" type="text/css">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
  <script type="text/javascript">
      function check(){
      var flg = 0;
      if(document.newtopicform.blog_body.value == ""){
        flg = 1;
        $.notify("本文が入力されていません", "warn");
      }
      if(document.newtopicform.blog_title.value == ""){
        flg = 1;
        $.notify("タイトルが入力されていません", "warn");
      }
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
  <!-- <div id="header"></div>
  <div id="login"></div> -->
<!-- <span onSelectStart="return false;" style="user-select:none; -moz-user-select: none; -webkit-user-select: none; -ms-user-select: none; pointer-events: none;" unselectable="on"> -->
<span claa="">
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/header.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/login.php"); ?>
</span>
    <main role="main" class="container pt-4" style="">
      <div class="row">
        <!-- パンくずリスト -->
        <!-- ./パンくずリスト -->

        <div class="col-md-12 order-md-1">
          <!-- <p style="color:red;">このページでは上のナビ機能をオフにしています<br>戻る場合はブラウザの機能を使って戻ってください</p> -->
          <div class="mb-3 h2"><i class="far fa-clipboard mr-2"></i>記事を書く</div>
          <hr>
          <form class="needs-validation border-1 rounded p-3" name="newtopicform" action="./blog-write-save.php" method="POST" onSubmit="return check()">
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="blogTitle">タイトル<sup style="color:red;">*必須</sup></label>
                <input type="text" class="form-control" id="blogTitle" name="blog_title" placeholder="" value="" style="outline:none;">
              </div>

              <div class="col-md-12 mb-3">
                <label for="blogBody">本文<sup style="color:red;">*必須</sup></label>
                <textarea class="form-control summernote" id="blogBody" name="blog_body" placeholder="" row="10" value=""></textarea>
              </div>

              <div class="col-md-12 mb-2">
                <label for="blofTag">タグ<sup style="color:red;"></sup><span class="text-muted small"> (タグを複数つける場合は半角カンマでタグを区切ってください)</span></label>
                <div class="form-inline">
                  <input type="text" class="form-control col-md-12" id="blogTag" name="blog_tag" placeholder="" value="">
                </div>
              </div>
              <input type="hidden" name="filename" id="fileName" value="">
              <script>
                var elm = document.getElementById("fileName");
                elm.value = getUniqueStr();
              </script>
              <button type="submit" class="btn btn-primary btn-lg btn-block col-4 mx-auto my-4" id="createAccount" onSubmit="return check()">
                <!-- プレビュー -->投稿
              </button>
            </div>
          </form>






        </div>
      </div>
    </main>
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
