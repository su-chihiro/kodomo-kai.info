<?php
$webSiteTitle = "ジュニアのたまりば";
?>
<!-- ナビ始まり スマホサイズ時に出現-->
<nav class="navbar navbar-expand-lg text-left navbar-dark bg-secondary d-lg-none">
  <a class="navbar-brand" href="/index.php"><?php echo "{$webSiteTitle}" ?></a>
  <!-- <i class="fas fa-user-circle btn btn-outline-secondary p-0 m-0" style="color:#bfbfbf;width:8%;height:8%;" data-toggle="modal" data-target="#myModalLogin"></i> -->
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
    <ul class="navbar-nav text-left" style="opacity: 0.5;">
      <!-- <li class="nav-item">
        <a class="nav-link" style="color:rgb(255,255,255);" href="/about/about-top.php">・このサイトの使い方</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" style="color:rgb(255,255,255);" href="/blog/blog-top.php">・みんなのブログ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color:rgb(255,255,255);" href="/kodomo-kai/kodomo-kai-top.php">・子ども会</a>
      </li>
      <li class="nav-item">
        <!-- <a class="nav-link" style="color:rgb(255,255,255);" href="/bulletin-board/bulletin-board-top.php">・シニア・ジュニアリーダー</a> -->
        <a class="nav-link" style="color:rgb(255,255,255);" href="/bulletin-board/bulletin-board-top.php">・掲示板</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color:rgb(255,255,255);" href="/recreation/recreation-top.php">・レクリエーション</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color:rgb(255,255,255);" href="/contact/contact-top.php">・お問合せ</a>
      </li>

      <li class="col-xs-6 login-view">
        <button type="button" class="nav-item btn btn-outline-light text-light" data-toggle="modal" data-target="#myModalLogin">
          <i class="fas fa-user-circle mr-1 d-inline d-lg-none"style=""></i>
          <sapn class="">ログイン</sapn>
        </button>
      </li>
      <li class="col-xs-6 logout-view">
        <button type="button" id="" class="nav-item btn btn-outline-light text-light Logout">
          <i class="fas fa-user-circle mr-1 d-inline d-lg-none"style=""></i>
          <sapn class="">ログアウト</sapn>
        </button>
      </li>
    </ul>
  </div>
  <!-- </div> -->
</nav>
<!-- ナビおわり -->

<!-- ヘッダー部分コード -->
<div class="container">
  <!-- PCサイズ時に出現 -->
  <div class="d-none d-lg-block">
    <header class="blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="text-center col-md-2"></div>
        <div class="text-center col-md-8">
          <a class="blog-header-logo text-dark" href="/index.php"><?php echo "{$webSiteTitle}" ?></a>
        </div>
        <div class="text-right col-md-2">
          <div class="login-view">
          <button type="button" class="border-1 btn page-link text-dark d-inline-block" data-toggle="modal" data-target="#myModalLogin">
            <i class="fas fa-user-circle mr-1 d-none d-lg-inline"style="color:#6c757d;width:13%;height:13%;"></i>
            <i class="fas fa-user-circle mr-1 d-inline d-lg-none"style="color:#6c757d;width:25%;height:25%;"></i>
            <sapn class="d-none d-lg-inline">ログイン</sapn>
          </button></div>
          <div class="logout-view">
          <button type="button" id="" class="border-1 btn page-link text-dark d-inline-block Logout">
            <i class="fas fa-user-circle mr-1 d-none d-lg-inline"style="color:#6c757d;width:13%;height:13%;"></i>
            <i class="fas fa-user-circle mr-1 d-inline d-lg-none"style="color:#6c757d;width:25%;height:25%;"></i>
            <sapn class="d-none d-lg-inline">ログアウト</sapn>
          </button></div>
        </div>
      </div>
    </header>
    <div class="nav-scroller pt-1">
      <nav class="nav d-flex justify-content-between px-5">
        <!-- <a class="p-2 text-muted" href="/about/about-top.php"><i class="fas fa-list-ul mr-2"></i>このサイトの使い方</a> -->
        <a class="p-2 text-muted" href="/blog/blog-top.php"><i class="far fa-clipboard mr-2"></i>みんなのブログ</a>
        <a class="p-2 text-muted" href="/kodomo-kai/kodomo-kai-top.php"><i class="fas fa-map-marker-alt mr-2"></i>子ども会</a>
        <a class="p-2 text-muted" href="/bulletin-board/bulletin-board-top.php">
          <!-- <i class="fas fa-user mr-2"></i>シニア・ジュニアリーダー</a> -->
          <i class="fas fa-user mr-2"></i>掲示板</a>
        <a class="p-2 text-muted" href="/recreation/recreation-top.php">
          <i class="fas fa-praying-hands mr-2"></i>レクリエーション</a>
        <a class="p-2 text-muted" href="/contact/contact-top.php">
          <i class="fas fa-info-circle mr-2"></i>お問合せ</a>
      </nav>
    </div>
  </div>
</div>
