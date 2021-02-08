// Initialize Firebase
// Firebase Project kodomo-kai
// var config = {
//   apiKey: "AIzaSyACrEUjxV5NVM9hzTvYaT_aPxJ0NSpAm8k",
//   authDomain: "kodomo-kai.firebaseapp.com",
//   databaseURL: "https://kodomo-kai.firebaseio.com",
//   projectId: "kodomo-kai",
//   storageBucket: "kodomo-kai.appspot.com",
//   messagingSenderId: "533345737538"
// };
// firebase.initializeApp(config);

// Firebase Project sample
// Initialize Firebase
  var config = {
    apiKey: "AIzaSyC3baEIaKTilZea0Og8W9O1DJM8l10fyt8",
    authDomain: "sample-8a460.firebaseapp.com",
    databaseURL: "https://sample-8a460.firebaseio.com",
    projectId: "sample-8a460",
    storageBucket: "sample-8a460.appspot.com",
    messagingSenderId: "23145969282"
  };
  firebase.initializeApp(config);

var Messages = {
  "INVALID_EMAIL": "・メールアドレスが正しく入力されていません\n",
  "INVALID_PASSWORD": "・パスワードが正しく入力されていません\n",
  "INVALID_PASSWORD_MACTH": "・パスワードが一致しません\n",
  "INVALID_NICKNAME": "・ニックネームが正しく入力されていません\n",
  "INVALID_TITLE": "・タイトルが入力されていません\n",
  "INVALID_SENTENCE": "・本文が入力されていません\n",
  "INVALID_PREF": "・県が選択されていません\n",
  "INVALID_CITY": "・市区が選択されていません\n",
  "SIGNUO_SUCCESS": "登録が完了しました\n",
  "LOGIN_NOTIDICATION": "ログイン済みです\n",
  "NOT_LOGGED_IN": "ログインしてください\n",
  "LOG_OUT": "ログアウトしました\n",
};

// Firebase認証時エラーコード
var ErrorCodes = {
  "INVALID_EMAIL": "auth/invalid-email",
  "INVALID_PASSWORD": "auth/weak-password"
};

var Filepath = {
  "USERS":"/users/users.json",
  "PREF_CITY":"/lib/pref_city.json",
};

// オブジェクトを凍結する（定数）
Object.freeze(Messages);
Object.freeze(ErrorCodes);
Object.freeze(Filepath);

$('.logout-view').hide();
$('.login-view').hide();
// $('.topic-form').hide();
// $('#newLoginView').show();

function txt2hash(hashType, text){
  var shaObj  = new jsSHA(hashType, 'TEXT');
  shaObj.update(text);
  return shaObj.getHash("HEX");;
}

function sleep(waitMsec) {
  var startMsec = new Date();

  // 指定ミリ秒間だけループさせる（CPUは常にビジー状態）
  while (new Date() - startMsec < waitMsec);
}

// Firebaseのユーザ情報をjsonで返す
function userInfo() {
  var user = firebase.auth().currentUser;
  return user;
}

function date(){
  var date = new Date();
  var year = date.getFullYear();
  var month = date.getMonth()+1;
  var day = date.getDate();
  var hour = date.getHours();
  var minute = date.getMinutes();
  var second = date.getSeconds();
  return year+"/"+month+"/"+day+" "+hour+":"+minute+":"+second;
}

function getUniqueStr(myStrong) {
  var strong = 1000;
  if (myStrong) strong = myStrong;
  return new Date().getTime().toString(16)  + Math.floor(strong*Math.random()).toString(16)
}


// // ドキュメント読み込み完了時
$(document).ready(function() {
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
      xhr.onload = function(){

        var users = JSON.parse(this.responseText);
        var users_id = users[0][uid]['id'];
        var nickname = users[0][uid]['nickName'];
      $.ajax({
        type: 'POST',
        url:  '/recreation/recAddComment.php',
        async: false,
        dataType: 'json',
        data: {
          "sentence": sentence,
          // "foldernum": p,
          // "filename": f,
          // "date": dt,
          // "nickName": nickname,
          // "id": users_id,
        }
      })
      // Ajaxリクエストが成功した時発動
      .done( (data) => {
        // 作成しトピックにリダイレクトする
        location.href='/junior-leader/jl-topics-viwer.php?p='+filename;
      })
      // Ajaxリクエストが失敗した時発動
      .fail( (data) => {
        // $.ajax(this);
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
});
