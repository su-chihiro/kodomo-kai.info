<?php
include($_SERVER['DOCUMENT_ROOT'].'/class/char2UnicodeClass.php');
require $_SERVER['DOCUMENT_ROOT']."/userFunction.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <meta name="description" content=""> -->
  <?php
    $content = "ジュニアリーダー向けのポータルサイトです．子ども会で使えるレクリエーションの共有や活動の報告ができます．ジュニアリーダー同士の交流にどうぞ使ってください！！今の子ども会をみんなで変えて行きましょう．";
    echo "<meta name=\"description\" content=\"子ども会, kodomo, ジュニアリーダー, jl, 掲示板, {$content}\">";
  ?>
  <meta name="author" content="">
  <link rel="icon" href="/img/favicon/favicon.ico">
  <title>掲示板 - 子ども会を変えたい</title>
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
          <!-- <a href="/bulletin-board-top.php" class="text-dark">シニア・ジュニアリーダー</a> -->
          <a href="/bulletin-board/bulletin-board-top.php" class="text-dark">掲示板</a>
        </div>
        <!-- ./パンくずリスト -->

        <div class="col-md-12 order-md-1">
          <!-- <h3 class="mb-3"><i class="fas fa-user mr-2"></i>シニア・<span class="d-inline-block">ジュニアリーダー</span></h3> -->
          <h3 class="mb-3"><i class="fas fa-user mr-2"></i>掲示板</h3>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col" class="d-none d-sm-table-cell"><i class="far fa-calendar-alt mr-2"></i>日付</th>
                  <th scope="col" class="">タイトル</th>
                  <th scope="col" class="text-center">レス数</th>
                  <th scope="col" class="d-none d-sm-table-cell">勢い</th>
                </tr>
              </thead>
              <tbody>
              <!-- <tr><td><a href="#">このサイトの使い方</a></td><td></td><td></td><td></td></tr> -->

              <!-- div でjsのコードを追加する -->
              <?php
                $folderpath = $_SERVER['DOCUMENT_ROOT']."/bulletin-board/file/topics-data/";
                $files = glob($folderpath.'{*.json}', GLOB_BRACE);

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
                        // $json_count には 掲示板の数が代入される
                        $json_count = count($arr);
                        $order_arr  = array();
                        // レス数をカウントする
                        // jsonの書式が変わるため書き直す
                        $_json = file_get_contents($filepath);
                        $_json = mb_convert_encoding($_json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                        $_arr = json_decode($_json, true);
                        $res_num = count($_arr['comment']);

                        // 勢い計算する
                        date_default_timezone_set('Asia/Tokyo');
                        $newTime = strtotime(date("Y/m/d H:i:s"));
                        $oldTime = strtotime($arr["date"]);
                        $force = number_format($res_num / ($newTime - $oldTime) * 60 * 24, 4).PHP_EOL;

                        echo "<tr data-href=\"./bulletin-board-viwer.php?p=".basename($filepath, ".json")."\">";

                        // 日付を表示する
                        echo "<td scope=\"row\" class=\"d-none d-sm-table-cell\">".$arr["date"]."</td>";

                        // タイトルを表示する
                        echo "<td>".$arr["title"]."</td>";

                        // レス数をカウントする
                        // jsonの書式が変わるため書き直す
                        $_json = file_get_contents($filepath);
                        $_json = mb_convert_encoding($_json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                        $_arr = json_decode($_json, true);
                        $res_num = count($_arr['comment']);
                        echo "<td class=\"text-center\">{$res_num}</td>";

                        // 勢い計算する
                        date_default_timezone_set('Asia/Tokyo');
                        $newTime = strtotime(date("Y/m/d H:i:s"));
                        $oldTime = strtotime($arr["date"]);
                        $force = number_format($res_num / ($newTime - $oldTime) * 60 * 24, 4).PHP_EOL;
                        echo "<td class=\"d-none d-sm-table-cell\">{$force}</td>";

                        echo "</tr>";
                      }
                      fclose($fp);
                    }
                  }
                }
              ?>

              <!-- <tr id="addTopic"></tr> -->
              </tbody>
            </table>

            <button type="button" class="btn btn-secondary btn-lg btn-block col-md-4 col-sm-12 my-4 mr-auto" value="" name="submit" id="newTopicButton">トピック新規作成</button>
            <!-- <button type="button" class="btn btn-lg btn-block col-md-4 col-sm-12 my-4 mr-auto" value="" name="" id="Btn">練習用</button> -->

            <div class="needs-validation new-topic-form px-3 pt-2 border-1 border-secondary mb-3 rounded" novalidate id="newTopicForm">
            <!-- <form class="needs-validation new-topic-form px-3 pt-2 border-1 border-secondary rounded" novalidate id="newTopicForm" name="newtopicform" action="./jl.php" method="POST" onSubmit="return check()"> -->
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="title">トピック掲示板<sup style="color:red;">*必須</sup></label>
                  <input type="text" class="form-control" id="topicTitle" name="topictitle" placeholder="" required>
                </div>
                <div class="col-12 mb-3">
                  <label for="address2">本文<sup style="color:red;">*必須</sup></label>
                  <textarea id="Sentence" name="sentence" class="form-control" rows="5" placeholder="ここに文章を書きます"></textarea>
                </div>
                <button class="btn btn-primary btn-lg btn-block col-4 mx-auto my-4" type="button" id="newTopicBuildBtn">完了</button>
                <!-- </form> -->
              </div>
             </div>
        <div id="insert"></div>
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
