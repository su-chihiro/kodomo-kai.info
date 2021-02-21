<?php
  include($_SERVER['DOCUMENT_ROOT'].'/class/char2UnicodeClass.php');
  $charH = new CharChicanClass();
  // $path = $_GET['filepath'];
  $path = $_GET['f'];
  $filepath = $_SERVER['DOCUMENT_ROOT'].'/archive/'.$path.'.json';
  // $filepath = $_SERVER['DOCUMENT_ROOT']."/archive\/{$path}.json";
  if( ($fp = fopen($filepath,"r"))=== false ){
    die("jsonファイル読み込みエラー");
  }
  $json = file_get_contents($filepath);

  // 文字化けを防ぐコード
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
  $arr = json_decode($json, true);
  $json_count = count($arr);
  $title = $arr["blogTitle"];
  // var_dump($arr);
  // Todo:$pathのルートを調べて，ファイル名だけを格納する処理を書く
  // $filepath = str_replace();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php
    echo "<meta name=\"description\" content=\"子ども会, kodomo, ジュニアリーダー, jl, ".strip_tags($arr["blogSentence"], '').">";
  ?>
  <meta name="author" content="">
  <link rel="icon" href="/img/favicon/favicon.ico">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <title class="topicTitle"><?php echo "$title" ?> - ジュニアのたまりば</title>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/css.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/head_script.php"); ?>
  <link href="/css/youtube_frame.css" rel="stylesheet">
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
          <a href="/junior-leader/file/jl-parts.php?filepath=<?php echo ""; ?>&title=<?php echo $title; ?>" class="text-dark"><?php echo $title; ?></a>
        </div>
        <!-- ./パンくずリスト -->

        <div class="col-md-12 col-sm-12 order-md-1 mx-auto">
          <div class="mb-3 topictitle border-left-4 pl-2 h3"><?php echo $title; ?></div>

          <div class="row">
            <div class="col d-inline mb-3">
              <?php
                $date = $arr["date"];
                echo "<i class=\"far fa-calendar-alt mr-2\"></i><span class=\"d-inline-block\">{$date}　</span>";
                echo "<span class=\"d-inline-block\">This blog is written by <a href=\"#\">{$arr['nickName']}</a></span>";
                  // $auth = $arr[$i]["auth"];
                  // if($name == "") $name .= "名無しのジュニアリーダー";

                  // echo "<span class=\"d-inline-block\">No.{$no}　</span>";
              ?>
              <hr style="margin: 2px 0 2px 0;border:none;border-top:dashed 1px #c0c0c0;">
              <?php echo"{$arr["blogSentence"]}"; ?>
            </div>
          </div>

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
    <?php include($_SERVER['DOCUMENT_ROOT']."/parts/foot_script.php"); ?>
    <script src="/js/summernote.js"></script>
    <script src="/js/lang/summernote-ja-JP.js"></script>
  </div>
</body>

</html>
