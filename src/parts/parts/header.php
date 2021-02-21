<?php
$webSiteTitle = "ジュニアのたまりば";
?>
<!-- ナビ始まり スマホサイズ時に出現-->
<nav class="navbar navbar-expand-lg text-left navbar-dark bg-secondary d-lg-none">
  <a class="navbar-brand" href="/"><?php echo "{$webSiteTitle}" ?></a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
    <ul class="navbar-nav text-left" style="opacity: 0.5;">
      <li class="nav-item">
        <span class="nav-link" style="color:rgb(255,255,255);"><s>・みんなのブログ</s><sup style="color:red;">*非公開</sup></a>
      </li>
      <li class="nav-item">
        <span class="nav-link" style="color:rgb(255,255,255);"><s>・子ども会の紹介</s><sup style="color:red;">*非公開</sup></a>
      </li>
      <li class="nav-item">
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
          <i class="fas fa-user-circle mr-1 d-inline d-lg-none" style=""></i>
          <sapn class="">ログイン</sapn>
        </button>
      </li>
      <li class="col-xs-6 logout-view">
        <button type="button" id="" class="nav-item btn btn-outline-light text-light Logout">
          <i class="fas fa-user-circle mr-1 d-inline d-lg-none" style=""></i>
          <sapn class="">ログアウト</sapn>
        </button>
      </li>
    </ul>
  </div>
  <!-- </div> -->
</nav>
<!-- ナビおわり -->

<?php
$webTitle = "";
$padding = "pr-1";
for ($i = 0; $i < mb_strlen($webSiteTitle, "utf-8"); $i++) {
  $char = mb_substr($webSiteTitle, $i, 1, "utf-8");
  $webTitle .= "<span class=\"{$padding}\">{$char}</span>";
}
$webSiteTitle = $webTitle;
?>
<!-- ヘッダー部分コード -->
<div class="container">
  <!-- PCサイズ時に出現 -->
  <div class="d-none d-lg-block">
    <header class="blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="text-center col-md-2"></div>
        <div class="text-center col-md-8">
          <a class="blog-header-logo text-dark" href="/"><?php echo "{$webSiteTitle}" ?></a>
        </div>
        <div class="text-right col-md-2">
          <div class="login-view">
            <button type="button" class="border-1 btn page-link text-dark d-inline-block" data-toggle="modal" data-target="#myModalLogin">
              <i class="fas fa-user-circle mr-1 d-none d-lg-inline" style="color:#6c757d;width:13%;height:13%;"></i>
              <i class="fas fa-user-circle mr-1 d-inline d-lg-none" style="color:#6c757d;width:25%;height:25%;"></i>
              <sapn class="d-none d-lg-inline">ログイン</sapn>
            </button></div>
          <div class="logout-view">
            <button type="button" id="" class="border-1 btn page-link text-dark d-inline-block Logout">
              <i class="fas fa-user-circle mr-1 d-none d-lg-inline" style="color:#6c757d;width:13%;height:13%;"></i>
              <i class="fas fa-user-circle mr-1 d-inline d-lg-none" style="color:#6c757d;width:25%;height:25%;"></i>
              <sapn class="d-none d-lg-inline">ログアウト</sapn>
            </button></div>
        </div>
      </div>
    </header>
    <div class="nav-scroller pt-1">
      <nav class="nav d-flex justify-content-between px-5">
        <span class="p-2 text-muted" href=""><i class="far fa-clipboard mr-2"></i><s>みんなのブログ</s><sup style="color:red;">*非公開</sup></span>
        <span class="p-2 text-muted" href=""><i class="fas fa-map-marker-alt mr-2"></i><s>子ども会の紹介</s><sup style="color:red;">*非公開</sup></span>
        <a class="p-2 text-muted" href="/bulletin-board/bulletin-board-top.php">
          <i class="fas fa-user mr-2"></i>掲示板</a>
        <a class="p-2 text-muted" href="/recreation/recreation-top.php">
          <i class="fas fa-praying-hands mr-2"></i>レクリエーション</a>
        <a class="p-2 text-muted" href="/contact/contact-top.php">
          <i class="fas fa-info-circle mr-2"></i>お問合せ</a>
      </nav>
    </div>
  </div>
</div>