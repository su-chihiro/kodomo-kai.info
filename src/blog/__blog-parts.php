<?php
  include($_SERVER['DOCUMENT_ROOT'].'/class/char2UnicodeClass.php');
  $charH = new CharChicanClass();
  $path = $_GET['filepath'];
  $filepath = "{$path}.json";
  if( ($fp = fopen($filepath,"r"))=== false ){
    die("jsonファイル読み込みエラー");
  }
  $json = file_get_contents($filepath);

  // 文字化けを防ぐコード
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
  $arr = json_decode($json, true);
  $json_count = count($arr);
  $title = $arr[0]["title"];
  // Todo:$pathのルートを調べて，ファイル名だけを格納する処理を書く
  // $filepath = str_replace();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php
    $content = "ジュニアリーダー向けのポータルサイトです．子ども会で使えるレクリエーションの共有や活動の報告ができます．ジュニアリーダー同士の交流にどうぞ使ってください！！今の子ども会をみんなで変えて行きましょう．";
    echo "<meta name=\"description\" content=\"子ども会 kodomo ジュニアリーダー jl ブログ {$arr[$i]["blog_body"]}\">";
  ?>
  <meta name="author" content="">
  <link rel="icon" href="/img/favicon/favicon.ico">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <title class="topicTitle"><?php echo "$title" ?>｜子ども会を変えたい</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
  <link href="/css/blog.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <link href="/css/youtube_frame.css" rel="stylesheet">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
  <script>
    function getUniqueStr(myStrong){
     var strong = 1000;
     if (myStrong) strong = myStrong;
     return new Date().getTime().toString(16)  + Math.floor(strong*Math.random()).toString(16)
    }
  </script>
  <script type="text/javascript">
    function check(){
      var flg = 0;
      if(document.newtopicform.sentence.value == ""){ // 「本文」の入力をチェック
        flg = 1;
        $.notify("本文が入力されていません", "warn");
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
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/header.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/login.php"); ?>

    <main role="main" class="container pt-4" style="">
      <div class="row">
        <!-- パンくずリスト -->
        <div class="col-md-12 text-left mb-4">
          <i class="fas fa-home"></i>
          <a href="/index.php" class="ml-2 text-dark">ホーム</a>
          <i class="fas fa-angle-right mx-2"></i>
          <a href="/blog/blog-top.php" class="text-dark">みんなのブログ</a>
          <i class="fas fa-angle-right mx-2"></i>
          <a href="/junior-leader/file/jl-parts.php?filepath=<?php echo"" ; ?>&title=<?php echo $title; ?>" class="text-dark"><?php echo $title; ?></a>
        </div>
        <!-- ./パンくずリスト -->

        <div class="col-md-12 col-sm-12 order-md-1 mx-auto">
          <div class="mb-3 topictitle border-left-4 pl-2 h3"><?php echo "$title" ?></div>
          <?php



            for($i=0; $i<$json_count; $i++){ ?>
              <div class="row">
                <div class="col d-inline ">
                  <?php
                    $no = $i + 1;
                    $date = $arr[$i]["date"];
                    echo "<i class=\"far fa-calendar-alt mr-2\"></i><span class=\"d-inline-block\">{$date}　</span>";
                    echo "<span class=\"d-inline-block\">This blog is written by <a href=\"#\">Teru</a></span>";
                      // $auth = $arr[$i]["auth"];
                      // if($name == "") $name .= "名無しのジュニアリーダー";

                      // echo "<span class=\"d-inline-block\">No.{$no}　</span>";
                  ?>
                  <hr style="margin: 2px 0 2px 0;border:none;border-top:dashed 1px #c0c0c0;">
                  <?php echo"{$arr[$i]["blog_body"]}"; ?>
                </div>
              </div>
      <?php }
       // echo "<pre>";
       //            var_dump($arr);
       //            echo "</pre>";
                  ?>
          <!-- <form class="needs-validation px-3 border-1 mt-4 border-secondary rounded" novalidate id="newTopicForm" name="newtopicform" action="./writing.php" method="POST" onSubmit="return check()">
            <div class="row">
              <div class="col-md-12 border-bottom mb-3 h3">書き込む</div>
              <div class="col-md-6 mb-3">
                <label for="Name">ニックネーム</label>
                <input type="text" class="form-control" id="Name" name="name" placeholder="" value="">
                <div class="invalid-feedback">お名前は必須項目です．</div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="emailAddress">メールアドレス</label>
                <input type="email" class="form-control" id="emailAddress" name="emailaddress" placeholder="" value="">
                <div class="invalid-feedback">メールアドレスは必須項目です．</div>
              </div>
              <div class="col-md-12 mb-3">
                <label id="tx" for="Sentence">本文<sup style="color:red;">*必須</sup></label>
                <textarea id="Sentence" name="sentence" class="form-control" rows="5" placeholder="ここに文章を書きます" value=""></textarea> -->
                <!-- <input type="hidden" name="filename" id="fileName" value="<?php echo "$filename"; ?>"> -->
                <!-- <input type="hidden" name="title" id="Title" value="<?php echo "$title"; ?>"> -->
              <!-- </div>
              <button class="btn btn-primary btn-lg btn-block col-4 mx-auto my-4" type="submit" id="">完了</button>
            </div>
          </form> -->
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
