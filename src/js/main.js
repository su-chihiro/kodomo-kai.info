// Firebase Project sample
// Initialize Firebase
let config = {
  apiKey: "AIzaSyC3baEIaKTilZea0Og8W9O1DJM8l10fyt8",
  authDomain: "sample-8a460.firebaseapp.com",
  databaseURL: "https://sample-8a460.firebaseio.com",
  projectId: "sample-8a460",
  storageBucket: "sample-8a460.appspot.com",
  messagingSenderId: "23145969282"
};
firebase.initializeApp(config);

const Messages = {
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
const ErrorCodes = {
  "INVALID_EMAIL": "auth/invalid-email",
  "INVALID_PASSWORD": "auth/weak-password"
};

const Filepath = {
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

function char2unicode(text) {
  if(typeof text !== 'string') {
    return text;
  }
  return text.replace(/[&'`"<>]/g, function(match) {
    return {
      '&': '&amp;',
      "'": '&#x27;',
      '`': '&#x60;',
      '"': '&quot;',
      '<': '&lt;',
      '>': '&gt;',
    }[match]
  });
}

function txt2hash(hashType, text){
  let shaObj  = new jsSHA(hashType, 'TEXT');
  shaObj.update(text);
  return shaObj.getHash("HEX");;
}

function sleep(waitMsec) {
  let startMsec = new Date();

  // 指定ミリ秒間だけループさせる（CPUは常にビジー状態）
  while (new Date() - startMsec < waitMsec);
}

// Firebaseのユーザ情報をjsonで返す
function userInfo() {
  return firebase.auth().currentUser;
}

function date(){
  let date = new Date();
  let year = date.getFullYear();
  let month = date.getMonth()+1;
  let day = date.getDate();
  let hour = date.getHours();
  let minute = ('0' + date.getMinutes()).slice(-2)
  let second = ('0' + date.getSeconds()).slice(-2);
  return year+"/"+month+"/"+day+" "+hour+":"+minute+":"+second;
}

function getUniqueStr(myStrong) {
  let strong = 1000;
  if (myStrong) strong = myStrong;
  return new Date().getTime().toString(16)  + Math.floor(strong*Math.random()).toString(16)
}

function isEmpty(obj){
  return !Object.keys(obj).length;
}

// ユーグリッドの互除法
function gcm(width, height){
  let big, small, tmp;
  if(width > height){
    big = width;
    small = height;
  } else {
    big = height;
    small =width;
  }

  while(true){
    big -= small;
    if(big == 0){
      break;
    } else if(big < small){
      tmp = big;
      big = small;
      small = tmp;
    }

    // 最大公約数が素数の時
    if (big < 0){
      break;
    }
  }
  // smallが最大公約数になる
  let aspW = width / small;
  let aspH = height / small;
  data = {
    "aspWidth": aspW,
    "aspHeight": aspH,
  };

  return data;
}

/**
 * Get the URL parameter value
 *
 * @param  name {string} パラメータのキー文字列
 * @return  url {url} 対象のURL文字列（任意）
 */

function getParam(name, url) {
    // if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    let regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

// ログインしているかの確認
function userLoginNow() {
  var user = firebase.auth().currentUser;
  if (user) {
    return true;
  } else {
    return false;
  }
}

// // ドキュメント読み込み完了時
$(document).ready(function() {
  $('#newBlogBuildBtn').on('click', function(){
    let blogTitle = char2unicode(document.getElementById('blogTitle').textContent);
    console.log("blogTitle", blogTitle);

    let blogTag = char2unicode(document.getElementById('blogTag').value);
    console.log("blogTag", blogTag);

    let blogSentence = document.getElementsByClassName("ql-editor ql-blank");
    console.log("blogSentence", blogSentence[0]['innerHTML']);
    let user = userInfo();
    let uid  = user["uid"];
    let filename = getUniqueStr();
    console.log(uid);
    let msg = "";

    // msgが空じゃないとき（エラーが発生しているとき）
    if(msg !== "") {
      // メッセージがある場合ユーザーに通知する
      $.notify(msg, "warn");
    } else {
      let xhr = new XMLHttpRequest;
      xhr.open('GET', Filepath.USERS, true);
      xhr.onload = function() {
        let users = JSON.parse(this.responseText);
        let users_id = users[0][uid]['id'];
        let nickname = users[0][uid]['nickName'];
        console.log('nickname',nickname);
        let data = {
          "blogTitle": blogTitle,
          "blogSentence": blogSentence[0]['innerHTML'],
          "filename": filename,
          "nickname": nickname,
          "id": users_id,
          "blogTag": blogTag,
        }

        $.ajax({
          type: 'POST',
          url:  '/blog/blogAddData.php',
          async: false,
          dataType: 'json',
          cache : false,
          data: data
        })
        // Ajaxリクエストが成功した時発動
        .done( (data) => {
          // 作成しトピックにリダイレクトする
          console.log("data", data);
          console.log("2.成功しました");
          window.location.reload();
        })
        // Ajaxリクエストが失敗した時発動
        .fail( (data) => {
          // $.ajax(this);
          // console.log("data", data);
          // console.log("2.失敗しました");
          target.innerHTML = data['responseText'];

        })
        // Ajaxリクエストが成功・失敗どちらでも発動
        .always( (data) => {
          // console.log("2.どちらでも実行されます");
        });
      }
      xhr.send(null);
    }
  });

  let blogTitleFlg = false;
  let blogTitleStr = "";
  $(document).on('click', function(event) {
    let clicked_id = event['target'].id;
    console.log(clicked_id);

    if(clicked_id == 'blogTitle'){
      blogTitleStr = $('#blogTitle').text();
      // console.log("blogTitleStr",blogTitleStr);
      $('#blogTitle').empty();
      let target = document.getElementById('blogTitle');

      target.insertAdjacentHTML('afterbegin','<input type="text" class="form-control" value="" id="blogTitleVal">');

      if(blogTitleStr == '"ここをクリックしてタイトルを変更する"') {
        $('#blogTitleVal').val();
      } else if(blogTitleStr == 'タイトルが空です') {
        $('#blogTitleVal').val();
      } else {
        $('#blogTitleVal').val(blogTitleStr);
      }

      document.getElementById('blogTitleVal').focus();
      blogTitleFlg = true;
    } else if(clicked_id == 'blogTitleVal') {
      // 処理はしない
    } else {
      if (blogTitleFlg){
        let target = document.getElementById('blogTitleVal');
        if (isEmpty(target.value)){
          $('#blogTitle').empty();
          let target = document.getElementById('blogTitle');
          target.insertAdjacentHTML('afterbegin', 'タイトルが空です');
        } else {
          let blogTitleVal = document.getElementById('blogTitleVal');
          let str = char2unicode(blogTitleVal.value);
          // console.log("str",str);
          $('#blogTitle').empty();
          let target = document.getElementById('blogTitle');
          target.insertAdjacentHTML('afterbegin', str);
        }
        blogTitleFlg = false;
      }
    }
  });

  $('#recCommentAddBtn').on('click', function() {
    let url = location.href;
    url = url.replace(location.protocol + "//" + location.host + "/recreation/rec-viwer.php?", "");
    let p = url.charAt(2);
    let f = url.replace("p="+p+"&f=", "");
    let sentence = document.getElementById('Sentence').value;
    let user = userInfo();
    let uid  = user["uid"];
    let dt = date();
    let msg = "";
    let target = document.getElementById('insert');
    target.innerHTML = '';

    // msgが空じゃないとき（エラーが発生しているとき）
    if(msg !== "") {
      // メッセージがある場合ユーザーに通知する
      $.notify(msg, "warn");
    } else {
      let xhr = new XMLHttpRequest;
      xhr.open('GET', Filepath.USERS, true);
      xhr.onload = function() {
        let users = JSON.parse(this.responseText);
        let users_id = users[0][uid]['id'];
        let nickname = users[0][uid]['nickName'];
        let data = {
          "sentence": sentence,
          "foldernum": p,
          "filename": f,
          "date": dt,
          "nickname": nickname,
          "id": users_id,
        }

        $.ajax({
          type: 'POST',
          url:  '/recreation/recAddComment.php',
          async: false,
          dataType: 'json',
          cache : false,
          data: data
        })
        // Ajaxリクエストが成功した時発動
        .done( (data) => {
          // 作成しトピックにリダイレクトする
          // console.log("data", data);
          // console.log("2.成功しました");
          window.location.reload();
        })
        // Ajaxリクエストが失敗した時発動
        .fail( (data) => {
          // $.ajax(this);
          // console.log("data", data);
          // console.log("2.失敗しました");
          target.innerHTML = data['responseText'];

        })
        // Ajaxリクエストが成功・失敗どちらでも発動
        .always( (data) => {
          // console.log("2.どちらでも実行されます");
        });
      }
      xhr.send(null);
    }
  });

  $('#newRecBuildBtn').on('click', function(){
    let recTitle = document.getElementById('recTitle').value;
    let targetNum = document.getElementById('targetPeopleNum').value;
    let targetAge = document.getElementById('targetAge').value;
    let timeRequired = document.getElementById('timeRequired').value;
    let youtubeURL = document.getElementById('youtubeURL').value;
    let sentence = document.getElementById('Sentence').value;
    let filenum = document.getElementById('fileNum').value;
    let filename = getUniqueStr();

    let user = userInfo();
    let uid = user['uid'];
    let dt = date();
    let msg = "";
    let nickname = "";

    if (recTitle == "") {
      msg += "・レク名が入力されていません\n";
    }

    if (targetNum == "" || targetNum == 0) {
      msg += "・対象人数が選択されていません\n";
    }

    if (targetAge == "" || targetAge == 0) {
        msg += "・対象年齢が選択されていません\n";
    }

    if (timeRequired == "" || timeRequired == 0) {
      msg += "・所要時間が選択されていません\n";
    }

    if (sentence == "") {
        msg += "・ルール説明が入力させていません\n";
    }

    // msgが空じゃないとき（エラーが発生しているとき）
    if(msg !== "") {
        // メッセージがある場合ユーザーに通知する
        $.notify(msg, "warn");
    } else {
      let xhr = new XMLHttpRequest;
      xhr.open('GET', Filepath.USERS, true);
      xhr.onload = function(){
        let users = JSON.parse(this.responseText);
        // console.log(users);
        let users_id = users[0][uid]['id'];
        nickname = users[0][uid]['nickName'];
        $.ajax({
          type: 'POST',
          url:  '/recreation/soleRecListAddData.php',
          async: false,
          dataType: 'json',
          cache : false,
          data: {
            "recTitle": recTitle,
            "targetNum": targetNum,
            "targetAge": targetAge,
            "timeRequired": timeRequired,
            "youtubeURL": youtubeURL,
            "sentence": sentence,
            "filenum": filenum,
            "filename": filename,
            "date": dt,
            "nickName": nickname,
            "id": users_id,
          }
        })
        // Ajaxリクエストが成功した時発動
        .done( (data) => {
          // 作成しトピックにリダイレクトする


          $.ajax({
            type: 'POST',
            url:  '/tag/tagAddRecData.php',
            async: false,
            dataType: 'json',
            cache : false,
            data: {
              "ID": users_id,
              "filenum": filenum,
              "filename": filename,
            }
          })
          // Ajaxリクエストが成功した時発動
          .done( (data) => {
            // 作成しトピックにリダイレクトする
            console.log("data", data);
            console.log("2.成功しました");
          })
          // Ajaxリクエストが失敗した時発動
          .fail( (data) => {
            $.ajax(this);
            // console.log("data", data);
            // console.log("2.失敗しました");
          })
          // Ajaxリクエストが成功・失敗どちらでも発動
          .always( (data) => {
            // console.log("2.どちらでも実行されます");
          });

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

  $('#newCommentAdd').on('click', function() {
    if (userLoginNow()) {
      let sentence = document.getElementById('Sentence').value;
      let filename = document.getElementById('fileName').value;
      let user = userInfo();
      let uid = user['uid'];
      let dt = date();
      let msg = "";
      let nickname = "";

      if (sentence == "") {
          msg += Messages.INVALID_SENTENCE;
      }
      // msgが空じゃないとき（エラーが発生しているとき）
      if(msg !== "") {
        // メッセージがある場合ユーザーに通知する
        $.notify(msg, "warn");
      } else {
        let xhr = new XMLHttpRequest;
        xhr.open('GET', Filepath.USERS, true);
        xhr.onload = function(){
          let users = JSON.parse(this.responseText);
          nickname = users[0][uid]['nickName'];
          id = users[0][uid]['id'];
        $.ajax({
          type: 'POST',
          url:  '/bulletin-board/file/commentAddData.php',
          async: false,
          dataType: 'json',
          cache : false,
          data: {
            "nickname": nickname,
            "sentence": sentence,
            "filename": filename,
            "date": dt,
            "id": id,
          }
        })
        // Ajaxリクエストが成功した時発動
        .done( (data) => {
          // 作成しトピックにリダイレクトする
          console.log("2.成功しました");
          // console.log("data",data);
          window.location.reload();
        })
        // Ajaxリクエストが失敗した時発動
        .fail( (data) => {
          // $.ajax(this);
          // console.log("2.失敗しました");
        })
        // Ajaxリクエストが成功・失敗どちらでも発動
        .always( (data) => {
          // console.log("2.どちらでも実行されます");
        });
        }
        xhr.send(null);
      }
    }
    else {
      $('#newCommentAdd').notify("ログインが必要です",
      {
        className:"warn",
        position:"top center"
      });
    }


  });

  $('#Btn').on('click', function() {
      let user = userInfo();
      let uid = user['uid'];
      let nickname = userSearch(uid, 'nickName');
      console.log(nickname);
  });

  // bulletin-board-top.php：
  $('#newTopicBuildBtn').on('click', function(){
    let topicTitle = document.getElementById('topicTitle').value;
    let sentence   = document.getElementById('Sentence').value;
    let filename   = getUniqueStr();
    let user = userInfo();
    let uid = user['uid'];
    let id = "";
    let dt = date();
    let msg = "";
    let nickname = "";

    if (topicTitle == "") {
        msg += Messages.INVALID_TITLE;
    }

    if (sentence == "") {
        msg += Messages.INVALID_SENTENCE;
    }
    // msgが空じゃないとき（エラーが発生しているとき）
    if(msg !== "") {
        // メッセージがある場合ユーザーに通知する
        $.notify(msg, "warn");
    } else {
      let target = document.getElementById('insert');
      target.innerHTML = '';

      let xhr = new XMLHttpRequest;
      xhr.open('GET', Filepath.USERS, true);
      xhr.onload = function(){
        let users = JSON.parse(this.responseText);
        console.log(user);
        id = users[0][uid]['id'];

        console.log("uid",uid);
        console.log("id",id);
        console.log(users[0][uid]);
        nickname = users[0][uid]['nickName'];
        $.ajax({
          type: 'POST',
          url:  '/bulletin-board/file/topicBuild.php',
          async: false,
          dataType: 'json',
          data: {
            "nickname": nickname,
            "sentence": sentence,
            "filename": filename,
            "date": dt,
            "title": topicTitle,
            "id": id,
          }
        })
        // Ajaxリクエストが成功した時発動
        .done( (data) => {
          // 作成しトピックにリダイレクトする
          location.href='/bulletin-board/bulletin-board-viwer.php?p='+filename;
        })
        // Ajaxリクエストが失敗した時発動
        .fail( (data) => {
          // console.log("2.失敗しました");
        });
      }
      xhr.send(null);
    }

  });

  $('#delUserBtn').on('click', function(){
    let user = userInfo();
    let uid = user['uid'];
    let msg  = "";
    let passwd = document.getElementById('passwd').value;
    let hash   = txt2hash('SHA-256', passwd);

    let xhr = new XMLHttpRequest;
    xhr.open('GET', Filepath.USERS, true);
    xhr.onload = function(){
      let users = JSON.parse(this.responseText);
      if(users[0][uid]['hash'] == hash){
        console.log("パスワードが一致しました");
        // モーダルでアカウントを消すかの最終確認Yes/Noボタンを表示する

        user.delete().then(function() {
          // User deleted.
          // users.jsonからユーザ情報を削除するコードを記述する



        }).catch(function(error) {
          // An error happened.
          // msg +=
        });
      } else {
        console.log("パスワードが一致しません");
        // モーダルでパスワードが一致しないと表示する

      }
    }
    xhr.send(null);
  });

  // signuo.php：送信ボタンを押したときの処理
  // ユーザ情報をjsonで保存する
  $('#signupSubmitBtn').on('click' ,function() {
    let nickNameVal = document.getElementById('nickName').value;
    let prefVal     = document.getElementById('Pref').value;
    let cityVal     = document.getElementById('City').value;
    let prefName;
    let cityName;
    let emailVal    = document.getElementById('emailAddress').value;
    let passwdVal   = document.getElementById('passwd').value;
    // let repasswdVal   = document.getElementById('repasswd').value;
    let hash = txt2hash('SHA-256', passwdVal);

    let xhr = new XMLHttpRequest;
    xhr.open('GET', '/lib/pref_city.json', true);
    xhr.onload = function(){
      let myData = JSON.parse(this.responseText);
      let PrefNum = 47;
      prefName = myData[0][prefVal]['name'];
      let i = 0;
      while(myData[0][prefVal]['city'][i]['citycode'] != cityVal){
        i++;
      }
    cityName = myData[0][prefVal]['city'][i]['city'];
    }
    xhr.send(null);

    let msg = "";
    // ニックネームの入力チェック
    if (!(nickNameVal != "" && nickNameVal.length > 0)) {
        msg = Messages.INVALID_NICKNAME;
    }

    // 県の入力チェック
    if (prefVal == "0") {
        msg += Messages.INVALID_PREF;
    }

    // 市区の入力チェック
    if (cityVal == "0") {
        msg += Messages.INVALID_CITY;
    }

    // メールアドレスの入力チェック
    if (!(emailVal != "" && emailVal.length > 0)) {
        msg += Messages.INVALID_EMAIL;
    }

    // パスワードの入力チェック
    if (!(passwdVal != "" && passwdVal.length > 0)) {
        msg += Messages.INVALID_PASSWORD;
    } else {
      // パスワードの一致確認
      // if (passwdVal !== repasswdVal){
      //   msg += Messages.INVALID_PASSWORD_MACTH;
      // }
    }

    // msgが空じゃないとき（エラーが発生しているとき）
    if(msg !== "") {
        // メッセージがある場合ユーザーに通知する
        $.notify(msg, "warn");
    } else {
        firebase.auth().createUserWithEmailAndPassword(emailVal, passwdVal).then(function(user) {
          // 正常に登録できた場合はその旨をユーザーへ通知する
          console.log(user);
          $.notify(Messages.SIGNUO_SUCCESS, "success");
          /*
          * ユーザ情報をjsonに保存する
          * パスワードはsha256でハッシュ化した値を保存する
          */

          let uid = user['user']['uid'];
          let host = location.host;
          let id = txt2hash('SHA-256', getUniqueStr());
          console.log("id",id);
          $.ajax({
            type:'POST',
            url:'/users/usersAddData.php',
            async: false,
            dataType: 'json',
            data: {
                "uid": uid,
                "nickName": nickNameVal,
                "prefCode": prefVal,
                "cityCode": cityVal,
                "prefName": prefName,
                "cityName": cityName,
                "hash": hash,
                "ID": id
            }
          })
          // Ajaxリクエストが成功した時発動
          .done( (data) => {
            $.ajax({
              type: 'POST',
              url:  '/tag/tagAddData.php',
              async: false,
              dataType: 'json',
              cache : false,
              data: {
                "ID":id
              }
            })
            // Ajaxリクエストが成功した時発動
            .done( (data) => {
              // 作成しトピックにリダイレクトする
              // console.log("data", data);
              // console.log("2.成功しました");
            })
            // Ajaxリクエストが失敗した時発動
            .fail( (data) => {
              $.ajax(this);
              // console.log("data", data);
              // console.log("2.失敗しました");
            })
            // Ajaxリクエストが成功・失敗どちらでも発動
            .always( (data) => {
              // console.log("2.どちらでも実行されます");
            });

            $('.result').html(data);
            $('.topic-form').fadeOut(1000, function() {
              let target = document.getElementById('userNickName');
              target.innerHTML = nickNameVal;
              $('#newLoginiew').fadeIn(1000);
            });
          })
          // Ajaxリクエストが失敗した時発動
          .fail( (data) => {
            $.ajax(this);
          })
          // Ajaxリクエストが成功・失敗どちらでも発動
          // .always( (data) => {
          // });

        }).catch(function(error) {
            // Firebaseでエラーが発生した場合
            let errorCode = error.code;
            let errorMessage = error.message;

            let firebaseErrorMsg = "";

            // メールアドレスが不正
            if (errorCode === ErrorCodes.INVALID_EMAIL) {
                firebaseErrorMsg = Messages.INVALID_EMAIL;
            }
            // パスワードが不正
            if (errorCode === ErrorCodes.INVALID_PASSWORD) {
                firebaseErrorMsg = Messages.INVALID_PASSWORD;
            }

            // エラーメッセージが設定されていた場合
            if (firebaseErrorMsg !== ""){
                $.notify(firebaseErrorMsg);
            } else {
                // エラーメッセージが設定されていなかった場合はサーバーのメッセージを表示
                firebaseErrorMsg = error.message;
                $.notify(firebaseErrorMsg);
            }
        });
    }
  });

  // signup.php：都道府県を変えたときに表示する市区を変える
  $('#Pref').change((function(){
    $('select#City option').remove();
    $('#City').append("<option value=\"0\">--- 市区を選択してください ---</option>");
    let prefNum = document.getElementById('Pref').value;
    if(prefNum == 0){
      $('#City').prop('disabled', true);
    } else {
      $('#City').prop('disabled', false);
    }

    let prefVal = $('#Pref option:selected').val();
    let xhr = new XMLHttpRequest;
    xhr.open('GET', '/lib/pref_city.json', true);
    xhr.onload = function(){
      let myData = JSON.parse(this.responseText);
      let cityNum = myData[0][prefVal]['city'].length;
      // cityNum：選択した都道府県にある市区の数
      // prefVal：選択した都道府県の番号
      for(let j = 0; j < cityNum; j++){
        $('#City').append("<option value=" + myData[0][prefVal]['city'][j]['citycode'] + ">" + myData[0][prefVal]['city'][j]['city'] + "</option>");
      }
    }
    xhr.send(null);
  }));

    // ログインしているかの確認
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
          // ユーザー名未設定のため暫定的にログインしていることを通知する
          $('.login-view').hide();
          $('.logout-view').show();
        } else {
          $('.login-view').show();
          $('.logout-view').hide();
        }
    });

    // 新規トピック作成ボタン押下時処理
    $('.login-check').on('click',function() {
      // ログインしているかの確認
      firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
          $('.login-check').slideToggle(600);
        }
        else {
          $('.login-check').notify("ログインが必要です",
          {
            className:"warn",
            position:"top center"
          });
        }
      });
    });

    // 新規トピック作成ボタン押下時処理
    $('#newTopicButton').on('click',function() {
      // ログインしているかの確認
      firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
          $('.new-topic-form').slideToggle(600);
        }
        else {
          $('#newTopicButton').notify("ログインが必要です",
          {
            className:"warn",
            position:"top center"
          });
        }
      });
    });

    $('#newBlogButton').on('click',function() {

      // ログインしているかの確認
      firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
          // リダイレクトを行うコード
          let redirect_url = '/blog/blog-write-test.php';// + location.search;
          // if (document.referrer) {
          //   let referrer = "referrer=" + encodeURIComponent(document.referrer);
          //   redirect_url = redirect_url + (location.search ? '&' : '?') + referrer;
          // }
          location.href = redirect_url;
          // .リダイレクトを行うコード
        }
        else {
          $('#newBlogButton').notify("ログインが必要です",
          {
            className:"warn",
            position:"top center"
          });
        }
      });
    });

    $('.res').on('click',function(){
      let num = $(this).data('res') + 1;
      $('.new-topic-form').slideToggle(600);
      document.getElementById("Sentence").focus();
      document.getElementById("Sentence").value = ">>"+num+"\n";
    });

    $('.Logout').on('click',function() {
      // Firebaseのサインアウト処理を行う
      firebase.auth().signOut().then(function() {
        $('.logout-view').hide();
        $('.login-view').show();
        $.notify("ログアウトしました","success");
        $('.new-topic-form').slideUp(600);
      }).catch(function(error) {
      });
    });

    // ログインボタン押下時処理
    $('#Login').on('click',function() {
        // emailとpasswordをinputから取得する
        let email = $('#modalEmailAddress').val();
        let password = $('#modalPassword').val();
        firebase.auth().signInWithEmailAndPassword(email, password).then(function(user) {
            // console.log("ログインしました");

            // URLを取得するコード
            let url = location.href;
            // let msg = "ログインしました";
            // $.notify(msg,"success");

            // リダイレクトを行うコード
            // let redirect_url = url + location.search;
            // if (document.referrer) {
            //   let referrer = "referrer=" + encodeURIComponent(document.referrer);
            //   redirect_url = redirect_url + (location.search ? '&' : '?') + referrer;
            // }
            // location.href = redirect_url;
            location.href = url;
            // .リダイレクトを行うコード
        }).catch(function(error) {
            // Handle Errors here.
            let errorCode = error.code;
            let errorMessage = error.message;
            // console.log(error.code);
            // console.log(error.message);
        });
    });

});
