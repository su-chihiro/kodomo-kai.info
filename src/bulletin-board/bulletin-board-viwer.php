<?php
  include($_SERVER['DOCUMENT_ROOT'].'/class/char2UnicodeClass.php');
  $charH = new CharChicanClass();
  $filename = $_GET['p'];
  $filepath = $_SERVER['DOCUMENT_ROOT'].'/bulletin-board/file/topics-data/'.$filename.'.json';
  if( ($fp = fopen($filepath,"r"))=== false ){
    die("jsonファイル読み込みエラー");
  }
  $json = file_get_contents($filepath);

  // 文字化けを防ぐコード
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
  $arr = json_decode($json, true);
  $json_count = count($arr['comment']);
  $title = $charH->char_replacement($arr['title']);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php
    $str = "";
    for($i=0; $i<$json_count; $i++){
      $sentence = $arr["comment"][$i]["sentence"];
      $sentence = $sentence === "" ?  "&nbsp;" : $sentence;
      $str .= $sentence.',';
    }
    // $content = "ジュニアリーダー向けのポータルサイトです．子ども会で使えるレクリエーションの共有や活動の報告ができます．ジュニアリーダー同士の交流にどうぞ使ってください！！今の子ども会をみんなで変えて行きましょう．";
    $content = $str;
    echo "<meta name=\"description\" content=\"子ども会, kodomo, ジュニアリーダー, jl, 掲示板, {$content}\">";
  ?>
  <meta name="author" content="">
  <title class="topicTitle"><?php echo "$title" ?> - ジュニアのたまりば</title>
  <link rel="icon" href="/img/favicon/favicon.ico">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="/css/youtube_frame.css" rel="stylesheet">
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/css.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/head_script.php"); ?>
</head>

<body>
  <!-- ヘッダー部分コード -->
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/header.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/login.php"); ?>

    <main role="main" class="container pt-4">
      <div class="row">
        <!-- パンくずリスト -->
        <div class="col-md-12 text-left mb-4">
          <i class="fas fa-home"></i>
          <a href="/" class="ml-2 text-dark">ホーム</a>
          <i class="fas fa-angle-right mx-2"></i>
          <a href="/bulletin-board/bulletin-board-top.php" class="text-dark">掲示板</a>
          <i class="fas fa-angle-right mx-2"></i>
          <a href="/bulletin-board/bulletin-board-viwer.php?p=<?php echo $filename; ?>" class="text-dark"><?php echo $title; ?></a>
        </div>
        <!-- ./パンくずリスト -->

        <div class="col-md-12 col-sm-12 order-md-1 mx-auto">
          <div class="mb-3 topictitle border-left-4 pl-2 h3"><?php echo "$title" ?></div>
          <hr>
          <?php
            for($i=0; $i<$json_count; $i++){ ?>
              <div class="border-1 border-color-secondary my-2 px-2 bg-light rounded">
                <div class="row">
                  <div class="col d-inline ">
                    <?php
                      $no = $i + 1;
                      $date = $arr["comment"][$i]["date"];
                      $name = $arr["comment"][$i]["name"];
                      if($name == "") $name .= "名無しのジュニアリーダー";

                      echo "<span class=\"d-inline-block\">No.{$no}　</span>";
                      echo "<span class=\"d-inline-block\"><i class=\"far fa-calendar-alt mr-1\"></i>{$date}　</span>";
                      echo "<span class=\"d-inline-block\"><i class=\"fas fa-user mr-1\"></i>{$name}</a></span>";
                    ?>

                    <hr style="margin: 2px 0 2px 0;border:none;border-top:dashed 1px #c0c0c0;">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <?php
                      $sentence = $arr["comment"][$i]["sentence"];
                      $sentence = $sentence === "" ?  "&nbsp;" : $sentence;
                      echo "<sapn>{$sentence}</sapn>";
                      echo "<div class=\"col text-right res\" data-res=\"{$i}\"><button value\"res-{$i}\" class=\"btn border-1 badge-pill\">返信</button></div>";
                    ?>
                  </div>
                  <div id="success"></div>
                </div>
              </div>
      <?php } ?>
          <!-- <form class="needs-validation px-3 border-1 mt-4 border-secondary rounded" novalidate id="newTopicForm" name="newtopicform" action="./writing.php" method="POST" onSubmit="return check()"> -->
          <div class="needs-validation px-3 border-1 mt-4 mb-3 border-secondary rounded" id="newTopicForm">
            <div class="row">
              <div class="col-md-12 border-bottom mb-3 h3">書き込む</div>
              <div class="col-md-12 mb-3">
                <label id="tx" for="Sentence">本文<sup style="color:red;">*必須</sup></label>
                <textarea id="Sentence" name="sentence" class="form-control" rows="5" placeholder="ここに文章を書きます" value=""></textarea>
                <input type="hidden" name="filename" id="fileName" value="<?php echo "$filename"; ?>">
              </div>
              <button class="btn btn-primary btn-lg btn-block col-4 mx-auto my-4" type="button" id="newCommentAdd">完了</button>
            </div>
          <!-- </form> -->
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
