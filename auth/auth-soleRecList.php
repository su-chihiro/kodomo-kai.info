<?php
  include($_SERVER['DOCUMENT_ROOT'].'/class/char2UnicodeClass.php');
  $charH = new CharChicanClass();
  $projectTitlte = ["起承転結", "アイスブレイク", "手遊び レク", "少人数 レク", "グループ レク", "静かにする レク", "レクダン", "その他のレク"];
  $file = $filenum = $_GET['p'];
  if (!(0 <= $file && $file <= 7)){
    // リダイレクト先のURLへ転送する
    $url = '/404.php';
    header("Location: {$url}", true, 404);
    // すべての出力を終了
    exit;
  }
  $title = $charH->char_replacement($projectTitlte[$file]);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php
    $content = "ジュニアリーダー向けのポータルサイトです．子ども会で使えるレクリエーションの共有や活動の報告ができます．ジュニアリーダー同士の交流にどうぞ使ってください！！今の子ども会をみんなで変えて行きましょう．";
    echo "<meta name=\"description\" content=\"子ども会, kodomo, ジュニアリーダー, jl, レク, レクリエーション, {$content}\">";
  ?>
  <meta name="author" content="">
  <link rel="icon" href="/img/favicon/favicon.ico">
  <title class="topicTitle">管理者用 <?php echo "$title" ?> - 子ども会を変えたい</title>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/css.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/head_script.php"); ?>

  <script type="text/javascript">
    function getUniqueStr(myStrong){
      var strong = 1000;
      if (myStrong) strong = myStrong;
      return new Date().getTime().toString(16)  + Math.floor(strong*Math.random()).toString(16)
    }

    function check(){
      var flg = 0;
      if(document.newtopicform.Sentence.value == ""){ // 「ルール」の入力をチェック
        flg = 1;
        $.notify("ルールが入力されていません", "warn");
      }
      if(document.newtopicform.timeRequired.value == "0"){ // 「所要時間」の入力をチェック
        flg = 1;
        $.notify("所要時間が入力されていません", "warn");
      }
      if(document.newtopicform.targetAge.value == "0"){ // 「対象年齢」の入力をチェック
        flg = 1;
        $.notify("対象年齢が入力されていません", "warn");
      }
      if(document.newtopicform.targetPeopleNum.value == "0"){ // 「対象人数」の入力をチェック
        flg = 1;
        $.notify("対象人数が入力されていません", "warn");
      }
      if(document.newtopicform.recTitle.value == ""){ // 「レク名」の入力をチェック
        flg = 1;
        $.notify("レク名が入力されていません", "warn");
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
          <a href="/" class="ml-2 text-dark">ホーム</a>
          <i class="fas fa-angle-right mx-2"></i>
          <a href="/auth/auth-rec-top.php" class="text-dark">レクリエーション</a>
          <i class="fas fa-angle-right mx-2"></i>
          <a href="/auth/auth-soleRecList.php?p=<?php echo $file; ?>" class="text-dark"><?php echo $title; ?></a>
        </div>
        <!-- ./パンくずリスト -->

        <div class="col-md-12 order-md-1">
          <div class="mb-3 topictitle h3"><?php echo "$title" ?></div><hr>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col" class="">レク名</th>
                  <th scope="col" class="">対象人数</th>
                  <th scope="col" class="d-none d-sm-table-cell">対象年齢</th>
                  <th scope="col" class="d-none d-sm-table-cell">所要時間</th>
                  <th scope="col" class="">削除</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $filepath = $_SERVER['DOCUMENT_ROOT']."/recreation/file/{$file}/index.json";
                if (file_exists($filepath)) {

                  if( ($fp = fopen($filepath,"r"))=== false ){
                  	die("jsonファイル読み込みエラー");
                  }
                  $json = file_get_contents($filepath);

                  // 文字化けを防ぐコード
                  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                  $arr = json_decode($json, true);
                  if ($arr === NULL) {
                      // データがない時の処理
                      return;
                  } else {
                      // 存在しているときの処理
                      $json_count = count($arr);

                      $targetNum = ["1～5人", "5～10人", "10～20人", "20～40人", "人数に関係なし"];
                      $targetAge = ["幼児（1～6才）", "児童（7～12才）", "児童（7～9才）", "児童（10～12才）", "生徒（13～18歳）", "年齢に関係なし"];
                      $timeRequired = ["5分未満", "5～10分", "10～20分", "20～40分", "40分以上"];
                      for($i=0;$i<$json_count;$i++){
                        echo "<tr id=\"\">\n";
                        echo "<td><a href=\"/auth/auth-rec-viwer.php?p={$file}&f={$arr[$i]["fileName"]}\" class=\"text-dark widelink\" id=\"recLink{$i}\">".$arr[$i]["recTitle"]."</td>\n";
                        // echo "<tr data-href=\"./auth-rec-viwer.php?p={$file}&f={$arr[$i]["fileName"]}\">\n";

                        // echo "<td><a href=\"../rec-parts.php?file={$file}&filename={$arr[$i]["fileName"]}&title={$arr[$i]["recTitle"]}&rec={$title}\" class=\"text-dark\">".$arr[$i]["recTitle"]."</a></td>";
                        // echo "\t<td>".$arr[$i]["recTitle"]."</td>\n";

                        $str = $targetNum[$arr[$i]["targetNum"]-1];
                        echo "\t<td class=\"\">{$str}</td>\n";

                        $str = $targetAge[$arr[$i]["targetAge"]-1];
                        echo "\t<td class=\"d-none d-sm-table-cell\">{$str}</td>\n";

                        $str = $timeRequired[$arr[$i]["timeRequired"]-1];
                        echo "\t<td scope=\"row\" class=\"d-none d-sm-table-cell\">{$str}</td>\n";

                        echo "\t<td class=\"\">\n
                                \t<form name=\"form1\">\n
                                  \t<input type=\"checkbox\" class=\"\" id=\"checkBox{$i}\" name=\"checkbox\">\n
                                \t</form>\n
                              \t</td>\n";

                        echo "\t</tr>\n";
                      }
                  }
                  fclose($fp);
                }
              ?>
              </tbody>
            </table>

            <button type="button" class="btn btn-secondary btn-lg btn-lock col-md-4 col-sm-12 my-4 mr-auto" value="" name="submit" id="newTopicButton">レクを追加する</button>
            <button type="button" class="btn btn-danger btn-lg btn-lock col-md-4 col-sm-12 mr-auto" value="" name="submit" id="delButton">選択したものを削除する</button>
            <!-- <button type="button" class="btn btn-secondary btn-lg col-md-4 col-sm-12 my-4 mr-auto" value="" name="submit" id="info">ユーザー情報</button> -->

            <div id="insert"></div>

            <!-- <form class="needs-validation new-topic-form px-3 pt-2 border-1 border-secondary rounded" novalidate id="newTopicForm" name="newtopicform" action="./rec_preview.php" method="POST" onSubmit="return check()"> -->
            <div class="needs-validation new-topic-form px-3 pt-2 border-1 border-secondary mb-3 rounded" novalidate id="newTopicForm">
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="recTitle">レク名<sup style="color:red;">*必須</sup></label>
                  <input type="text" class="form-control" id="recTitle" name="rec-title" placeholder="" required>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="targetPeopleNum">対象人数<sup style="color:red;">*必須</sup></label>
                  <select class="form-control" id="targetPeopleNum" name="targetnum">
                    <option value="0">選択してください</option>
                    <option value="1">1～5人</option>
                    <option value="2">5～10人</option>
                    <option value="3">10～20人</option>
                    <option value="4">20～40人</option>
                    <option value="5">人数に関係なし</option>
                  </select>
                </div>

                <div class="col-md-4 mb-3">
                  <label for="targetAge">対象年齢<sup style="color:red;">*必須</sup></label>
                  <select class="form-control" id="targetAge" name="target-age">
                    <option value="0">選択してください</option>
                    <option value="1">幼児（1～6才）</option>
                    <option value="2">児童（7～12才）</option>
                    <option value="3">児童（7～9才）</option>
                    <option value="4">児童（10～12才）</option>
                    <option value="5">生徒（13～18歳）</option>
                    <option value="6">年齢に関係なし</option>
                  </select>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="timeRequired">所要時間<sup style="color:red;">*必須</sup></label>
                  <select class="form-control" id="timeRequired" name="time-required">
                    <option value="0">選択してください</option>
                    <option value="1">5分未満</option>
                    <option value="2">5～10分</option>
                    <option value="3">10～20分</option>
                    <option value="4">20～40分</option>
                    <option value="5">40分以上</option>
                  </select>
                </div>

                <div class="col-md-12"><label for="youtubeUrl" id="youtubeText">動画を載せる場合はURLを貼り付けてください<span class="d-inline-block">(YouTubeのみ対応)</span><sup style="color:red;"></sup></label></div>
                <!-- <div class="col-md-1 col-xs-4 mb-3">
                  <input class="form-control" type="checkbox" name="checkbox" value="Checkbox-true" id="youtubeCheck" onclick="connecttext('youtubeUrl',this.checked);">
                </div> -->
                <div class="col-md-12 col-xs-8 mb-3">
                  <input class="form-control" type="text" id="youtubeURL" name="youtube-url" placeholder="動画のURLを貼ってください">
                </div>
              </div>

              <div class="mb-3">
                <label for="Sentence">ルール説明<sup style="color:red;">*必須</sup></label>
                <textarea id="Sentence" name="sentence" class="form-control" rows="5" placeholder="ここに文章を書きます"></textarea>
              </div>
              <input type="hidden" name="filenum" id="fileNum" value="<?php echo "$filenum"; ?>">

              <button class="btn btn-info btn-lg btn-block col-md-4 col-xs-12 mx-auto my-4" type="button" id="newRecBuildBtn">投稿</button>

            </div>
            <!-- </form> -->
          </div>
      </div>
    </main>
    <!-- /.container -->
    <!-- フッター部分 -->
    <?php include($_SERVER['DOCUMENT_ROOT']."/parts/footer.php"); ?>
    <?php include($_SERVER['DOCUMENT_ROOT']."/parts/foot_script.php"); ?>
    <script>
      jQuery( function($) {
          $('tbody tr[data-href]').addClass('clickable').click( function() {
              window.location = $(this).attr('data-href');
          }).find('a').hover( function() {
              $(this).parents('tr').unbind('click');
          }, function() {
              $(this).parents('tr').click( function() {
                  window.location = $(this).attr('data-href');
              });
          });
      });
    </script>

  </div>
</body>

</html>
