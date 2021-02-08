<?php
include($_SERVER['DOCUMENT_ROOT'].'/class/char2UnicodeClass.php');
$charH = new CharChicanClass();
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
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/css.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/head_script.php"); ?>

</head>

<body>

  <!-- ヘッダー部分コード -->
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/header.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT']."/parts/login.php"); ?>

  <!-- Create the editor container -->
  <div id="editor">
    <p>Hello World!</p>
    <p>Some initial <strong>bold</strong> text</p>
    <p><br></p>
  </div>

  <!-- Include the Quill library -->
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>



  <!-- フッター部分 -->
    <?php include($_SERVER['DOCUMENT_ROOT']."/parts/footer.php"); ?>
    <?php include($_SERVER['DOCUMENT_ROOT']."/parts/foot_script.php"); ?>
    <script src="/js/summernote.js"></script>
    <script src="/js/lang/summernote-ja-JP.js"></script>
    <!-- Initialize Quill editor -->
    <script>
      var quill = new Quill('#editor', {
        theme: 'snow'
      });
    </script>
  </div>
</body>

</html>
