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
  <link href="/css/youtube_frame.css" rel="stylesheet">
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
    function date(){
      var date = new Date();
      var year = date.getFullYear();
      var month = date.getMonth()+1;
      var day = date.getDate();
      var hour = date.getHours();
      var minute = ('0' + date.getMinutes()).slice(-2);
      var second = ('0' + date.getSeconds()).slice(-2);
      return year+"/"+month+"/"+day+" "+hour+":"+minute+":"+second;
    }
    // window.onbeforeunload = function(e) {
    //   e.returnValue = "ページを離れようとしています。よろしいですか？";
    // }
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
          <div class="mb-3 topictitle border-left-4 pl-2 h3"><span id="blogTitle" name="">"ここをクリックしてタイトルを変更する"</span></div>
          <i class="far fa-calendar-alt mr-2"></i><span class="d-inline-block" id="blogDate"></span>
          <!-- <span class="d-inline-block">This blog is written by <a href="#">Teru</a></span> -->
          <script>
            var target = document.getElementById('blogDate');
            target.insertAdjacentHTML('afterbegin', date());
          </script>

          <hr style="margin: 2px 0 2px 0;border:none;border-top:dashed 1px #c0c0c0;" class="mb-3">




          <div class="row">
            <!-- <div class="col-md-12 mb-3">
              <label for="blogBody">本文<sup style="color:red;">*必須</sup></label>
              <textarea class="form-control summernote" id="blogBody" name="blog_body" placeholder="" row="10" value=""></textarea>
            </div> -->

            <input type="hidden" name="filename" id="fileName" value="">
            <script>
              var elm = document.getElementById("fileName");
              elm.value = getUniqueStr();
            </script>

            <span class="col-md-12">
              <label for="blogBody">本文<sup style="color:red;">*必須</sup></label>
              <div id="toolbar-container">
                <span class="ql-formats">
                  <select class="ql-font"></select>
                  <select class="ql-size"></select>
                </span>
                <span class="ql-formats">
                  <button class="ql-bold"></button>
                  <button class="ql-italic"></button>
                  <button class="ql-underline"></button>
                  <button class="ql-strike"></button>
                </span>
                <span class="ql-formats">
                  <select class="ql-color"></select>
                  <select class="ql-background"></select>
                </span>
                <!-- <span class="ql-formats">
                  <button class="ql-script" value="sub"></button>
                  <button class="ql-script" value="super"></button>
                </span> -->
                <span class="ql-formats">
                  <button class="ql-header" value="1"></button>
                  <button class="ql-header" value="2"></button>
                  <button class="ql-blockquote"></button>
                  <!-- <button class="ql-code-block"></button> -->
                </span>
                <span class="ql-formats">
                  <select class="ql-align"></select>
                  <button class="ql-list" value="ordered"></button>
                  <button class="ql-list" value="bullet"></button>
                  <button class="ql-indent" value="-1"></button>
                  <button class="ql-indent" value="+1"></button>
                </span>
                <!-- <span class="ql-formats">
                  <button class="ql-direction" value="rtl"></button>
                  <select class="ql-align"></select>
                </span> -->
                <span class="ql-formats">
                  <button class="ql-link"></button>
                  <button class="ql-image"></button>
                  <button class="ql-video"></button>
                  <!-- <button class="ql-formula"></button> -->
                </span>
                <span class="ql-formats">
                  <button class="ql-clean"></button>
                </span>
              </div>
            </span>
            <span class="col-md-12 mb-3" style="height:950px;">
              <div id="editor-container" ></div>
            </span>
          </div>

          <!-- タグは投降後にモーダルを表示して入力させる -->
          <div class="col-md-12 mb-2">
            <label for="blofTag">タグ<sup style="color:red;"></sup><span class="text-muted small"> (タグを複数つける場合は半角カンマでタグを区切ってください)</span></label>
            <div class="form-inline">
              <input type="text" class="form-control col-md-12" id="blogTag" name="blog_tag" placeholder="" value="">
            </div>
          </div>

          <input type="file" name="file" accept="image/*,.png,.jpg,.jpeg,.gif">
          <button type="submit" class="btn btn-primary btn-lg btn-block col-4 mx-auto my-4" id="newBlogBuildBtn" onSubmit="return check()">
            <!-- プレビュー -->投稿
          </button>
        </div>


      </div>
    </main>
    <!-- /.container -->
    <!-- フッター部分 -->
    <?php include($_SERVER['DOCUMENT_ROOT']."/parts/footer.php"); ?>
    <?php include($_SERVER['DOCUMENT_ROOT']."/parts/foot_script.php"); ?>

    <script>
      var quill = new Quill('#editor-container', {
        modules: {
          syntax: true,
          toolbar: {
            container: '#toolbar-container',
          }
        },
        placeholder: 'Compose an epic...',
        theme: 'snow'
      });
    </script>

</body>

</html>
