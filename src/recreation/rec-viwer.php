<?php
  include($_SERVER['DOCUMENT_ROOT'].'/class/char2UnicodeClass.php');
  $charH = new CharChicanClass();
  $folder = $_GET['p'];
  $projectTitlte = ["起承転結", "アイスブレイク", "手遊び レク", "少人数 レク", "グループ レク", "静かにする レク", "レクダン", "その他のレク"];
  $recType = $charH->char_replacement($projectTitlte[$folder]);
  $filename = $_GET['f'];

  $filepath = "./file/{$folder}/{$filename}.json";
  $json = file_get_contents($filepath);
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
  $arr = json_decode($json, true);

  $targetNum = ["1～5人", "5～10人", "10～20人", "20～40人", "人数に関係なし"];
  $targetAge = ["幼児（1～6才）", "児童（7～12才）", "児童（7～9才）", "児童（10～12才）", "生徒（13～18歳）", "年齢に関係なし"];
  $timeRequired = ["5分未満", "5～10分", "10～20分", "20～40分", "40分以上"];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <?php
    echo "<meta name=\"description\" content=\"子ども会, kodomo, ジュニアリーダー, jl, ".strip_tags($arr["Sentence"], '').">";
  ?>
  <link rel="icon" href="/img/favicon/favicon.ico">
  <title class="topicTitle"><?php echo $arr["recTitle"] ?> - ジュニアのたまりば</title>
  <link href="/css/youtube_frame.css" rel="stylesheet">
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/css.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/head_script.php"); ?>
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

          <a href="/recreation/recreation-top.php" class="text-dark">レクリエーション</a>
          <i class="fas fa-angle-right mx-2"></i>

          <a href="/recreation/soleRecList.php?p=<?php echo $folder; ?>" class="text-dark"><?php echo $recType; ?></a>
          <i class="fas fa-angle-right mx-2"></i>


          <a href="/recreation/rec-viwer.php?p=<?php echo $folder; ?>&f=<?php echo $filename; ?>" class="text-dark"><?php echo $arr['recTitle']; ?></a>
        </div>
        <!-- ./パンくずリスト -->

        <div class="col-md-12 col-sm-12 order-md-1 mx-auto">
          <div class="mb-3 topictitle border-left-4 pl-2 h3"><?php echo $arr["recTitle"] ?></div><hr>
        <div class="container">
        <div class="row">
          <div class="col-md-12 mb-3 pl-2">投稿者：<?php echo $arr['nickName']; ?></div>

          <?php $str = $targetNum[$arr["targetNum"]-1]; ?>
          <div class="col-md-4 border-left-4 border-bottom-2 mb-3 pl-2">
            <i class="fas fa-users"></i>対象人数：<?php echo "$str"; ?></div>

          <?php $str = $targetAge[$arr["targetAge"]-1];?>
          <div class="col-md-4 border-left-4 border-bottom-2 mb-3 pl-2">
            <i class="fas fa-child"></i>対象年齢：<?php echo "$str"; ?></div>

          <?php $str = $timeRequired[$arr["timeRequired"]-1]; ?>
          <div class="col-md-4 border-left-4 border-bottom-2 mb-3 pl-2">
            <i class="far fa-clock"></i>所要時間：<?php echo "{$str}"; ?></div>
        </div>

      </div>

        <!-- YouTube ID が登録されている時の処理 -->
        <?php if (!empty($arr["youtubeID"])) { ?>
          <div class="col-md-12 text-center mb-3">
            <iframe src="https://www.youtube.com/embed/<?php echo "{$arr["youtubeID"]}" ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          </div>
        <?php } ?>

          <div class="col-md-12 text-left pl-2 mb-3 border-left-5 border-bottom-2 h3">レクのルール説明</div>
          <div class="col-md-12 border-left-2 pl-3 mb-3 border-bottom-2"><?php echo $arr["Sentence"]; ?></div>
          <hr>

          <div class="col-md-12 border-left-4 mb-3 pl-2 h4">コメント</div>

          <?php
            $json_count = count($arr["comment"]);
            for($i=0; $i<$json_count; $i++){
          ?>
          <div class="border-1 border-color-secondary my-2 px-2 bg-light rounded">
            <div class="row">
              <div class="col d-inline ">
          <?php
              $no = $i + 1;
              $date = $arr["comment"][$i]["date"];
              $name = $arr["comment"][$i]["name"];
              if($name == "") $name .= "名無しのジュニアリーダー";

              echo "<span class=\"d-inline-block\">No.{$no}　</span>";
              echo "<span class=\"d-inline-block\">{$date}　</span>";
              echo "<span class=\"d-inline-block\">{$name}</a></span>";
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
            echo "<div class=\"col text-right res\" data-res=\"{$i}\"><button value\"res-{$i}\" class=\"btn border-1 badge-pill button\" id=\"\">返信</button></div>";
          ?>

            </div>
          </div>

        </div>
        <?php
      }
        ?>
        <button type="button" class="btn btn-secondary btn-lg btn-block col-md-4 col-sm-12 my-4 mr-auto" id="newTopicButton">コメントを書く</button>
        <!-- <form class="needs-validation new-topic-form px-3 pt-2 border-1 border-secondary rounded" novalidate id="newTopicForm" name="newtopicform" action="./recAddComment.php" method="POST" onSubmit="return check()"> -->
        <div class="needs-validation new-topic-form px-3 pt-2 border-1 border-secondary mb-3 rounded" id="">
          <div class="row">
            <div class="col-md-12 border-bottom mb-3"><h3>コメントを書く</h3></div>

            <div class="mb-3 col-md-12">
              <label for="address2">本文<sup style="color:red;">*必須</sup></label>
              <textarea id="Sentence" name="sentence" class="form-control" rows="5" placeholder="ここに文章を書きます" value=""></textarea>
            </div>
            <button class="btn btn-primary btn-lg btn-block col-4 mx-auto my-4" type="button" id="recCommentAddBtn">完了</button>
          </div>
        <!-- </form> -->
        </div>
        <div id="insert"></div>
      </div>
    </main>
    <!-- /.container -->
    <!-- フッター部分 -->
    <?php include($_SERVER['DOCUMENT_ROOT']."/parts/footer.php"); ?>
    <?php include($_SERVER['DOCUMENT_ROOT']."/parts/foot_script.php"); ?>

  </div>
</body>

</html>
