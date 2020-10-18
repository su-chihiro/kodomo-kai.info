$('#recCommentAddBtn').on('click', function() {
  var url = location.href;
  url = url.replace(location.protocol + "//" + location.host + "/recreation/rec-viwer.php?", "");
  var p = url.charAt(2);
  var f = url.replace("p="+p+"&f=", "");
  var sentence = document.getElementById('Sentence');
  var user = userInfo();
  var uid  = user["uid"];
  var dt = date();
  var msg = "";

  // msgが空じゃないとき（エラーが発生しているとき）
  if(msg !== "") {
    // メッセージがある場合ユーザーに通知する
    $.notify(msg, "warn");
  } else {
    var xhr = new XMLHttpRequest;
    xhr.open('GET', Filepath.USERS, true);
    xhr.onload = function() {
      var users = JSON.parse(this.responseText);
      var users_id = users[0][uid]['id'];
      var nickname = users[0][uid]['nickName'];
      console.log(users);
      console.log(users_id);
      console.log(nickname);

      $.ajax({
        type: 'POST',
        url:  '/recreation/recAddComment.php',
        async: false,
        dataType: 'json',
        cache : false,
        processData: false,
        data: {
          "sentence": sentence,
          "foldernum": p,
          "filename": f,
          "date": dt,
          "nickName": nickname,
          "id": users_id,
        }
      })
      // Ajaxリクエストが成功した時発動
      .done( (data) => {
        // 作成しトピックにリダイレクトする
        console.log("data", data);
        console.log("2.成功しました");
        // console.log("data",data);
        window.location.reload();
      })
      // Ajaxリクエストが失敗した時発動
      .fail( (data) => {
        // $.ajax(this);
        console.log("data", data);
        console.log("2.失敗しました");
      })
      // Ajaxリクエストが成功・失敗どちらでも発動
      .always( (data) => {
        console.log("2.どちらでも実行されます");
      });
    }
    xhr.send(null);
  }

});
