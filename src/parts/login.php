<script type="text/javascript">
  function modalCheck(){
    var flg = 0;

    if(document.login.modal_password.value == ""){ // 「ニックネーム」の入力をチェック
      flg = 1;
      $("#modalPassword").notify(
        "パスワードが入力されていません",
        {className:"warn",
        position:"top center"}
      );
    }
    if(document.login.modal_email.value == ""){ // 「メールアドレス」の入力をチェック
      flg = 1;
      $("#modalEmailAddress").notify(
        "メールアドレスが入力されていません",
        {className:"warn",
        position:"top center"}
        // "warn"
      );
    }
    // 設定終了
    if(flg){
      return false;
    }
    else{
      return true;
    }
  }
</script>

<!-- モーダルの設定 -->
<div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title h4" id="exampleModalLabel"><i class="fas fa-user-circle mr-2"style="color:#6c757d;"></i>ログイン</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" name="login" onSubmit="return modalCheck()">
          <div class="mb-3">
            <label for="modalEmailAddress">メールアドレス<sup style="color:red;">*必須</sup></label>
            <input type="email" class="form-control" id="modalEmailAddress" name="modal_email" placeholder="sample@sample.com">
          </div>

          <div class="mb-3">
            <label for="modalPassword">パスワード<sup style="color:red;">*必須</sup></label>
            <input type="password" name="modal_password" class="form-control" id="modalPassword" placeholder="">
          </div>
          <button type="button" id="Login" class="btn btn-primary btn-lg btn-block col-4 mx-auto my-4">
            ログイン
          </button>
        </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button> -->
        <a href="/signup.php" class="">アカウントをお持ちでない方はこちら</a>
        <!-- <button type="button" class="btn btn-primary">変更を保存</button> -->
      </div><!-- /.modal-footer -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
