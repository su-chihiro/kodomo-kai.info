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

  require $_SERVER['DOCUMENT_ROOT']."/userFunction.php";
  
  // レクリエーションが保存されているフォルダ
  // 現在のフォルダ何にあるファイルを検索する

  // var_dump($file);
  $path = $_SERVER['DOCUMENT_ROOT']."/recreation/file/{$file}/";
  $dir = scandir($path);
  // var_dump($dir);
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
  <title class="topicTitle"><?php echo "$title" ?> - 子ども会を変えたい</title>
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
          <a href="/index.php" class="ml-2 text-dark">ホーム</a>
          <i class="fas fa-angle-right mx-2"></i>
          <a href="/recreation/recreation-top.php" class="text-dark">レクリエーション</a>
          <i class="fas fa-angle-right mx-2"></i>
          <a href="/recreation/soleRecList.php?p=<?php echo $file; ?>" class="text-dark"><?php echo $title; ?></a>
        </div>
        <!-- ./パンくずリスト -->

        <div class="col-md-12 order-md-1">
          <div class="mb-3 topictitle h3"><?php echo "$title" ?></div>
            <!-- <hr> -->
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col" class="">レク名</th>
                  <th scope="col" class="">対象人数</th>
                  <th scope="col" class="d-none d-sm-table-cell">対象年齢</th>
                  <th scope="col" class="d-none d-sm-table-cell">所要時間</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $files = glob($path.'{*.json}', GLOB_BRACE);
                foreach ($files as $filepath) {

                  if (is_file($filepath)) {
                    if (file_exists($filepath)) {
                      [$arr, $cnt] = json_read($filepath);
                      // $arr_cnt = count($arr[0]);
                      if ($arr === NULL) {
                          // データがない時の処理
                          return;
                      } else {
                          // 存在しているときの処理
                          // $json_count = count($arr);
                          
                          $targetNum = ["1～5人", "5～10人", "10～20人", "20～40人", "人数に関係なし"];
                          $targetAge = ["幼児（1～6才）", "児童（7～12才）", "児童（7～9才）", "児童（10～12才）", "生徒（13～18歳）", "年齢に関係なし"];
                          $timeRequired = ["5分未満", "5～10分", "10～20分", "20～40分", "40分以上"];
                          echo "<tr data-href=\"./rec-viwer.php?p={$file}&f=".basename($filepath, ".json")."\">\n";
                          echo "\t<td>".$arr["recTitle"]."</td>\n";

                          $str = $targetNum[$arr["targetNum"]-1];
                          echo "\t<td class=\"\">{$str}</td>\n";

                          $str = $targetAge[$arr["targetAge"]-1];
                          echo "\t<td class=\"d-none d-sm-table-cell\">{$str}</td>\n";

                          $str = $timeRequired[$arr["timeRequired"]-1];
                          echo "\t<td scope=\"row\" class=\"d-none d-sm-table-cell\">{$str}</td>\n";
                          echo "</tr>\n";
                      }
                      fclose($fp);
                    }
                  }
                }
              ?>
              </tbody>
            </table>

            <button type="button" class="btn btn-secondary btn-lg btn-lock col-md-4 col-sm-12 my-4 mr-auto" value="" name="submit" id="newTopicButton">レクを追加する</button>

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
