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
  return firebase.auth().currentUser;
}

function date(){
  var date = new Date();
  var year = date.getFullYear();
  var month = date.getMonth()+1;
  var day = date.getDate();
  var hour = date.getHours();
  var minute = ('0' + date.getMinutes()).slice(-2)
  var second = ('0' + date.getSeconds()).slice(-2);
  return year+"/"+month+"/"+day+" "+hour+":"+minute+":"+second;
}

function getUniqueStr(myStrong) {
  var strong = 1000;
  if (myStrong) strong = myStrong;
  return new Date().getTime().toString(16)  + Math.floor(strong*Math.random()).toString(16)
}

function isEmpty(obj){
  return !Object.keys(obj).length;
}

// ユーグリッドの互除法
function gcm(width, height){
  var big, small, tmp;
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
  var aspW = width / small;
  var aspH = height / small;
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
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

// ログインしているかの確認
function userLoginNew() {
  status = true;
  firebase.auth().onAuthStateChanged(function(user) {
    // console.log(user);
    if (user !== null) {
      // console.log('not NULL');

    } else {
      // console.log('yes NULL');
      status = false;
    }
  })
  // console.log(status);
  return status;
}

/*
if (userLoginNew()) {
  // ログインしているときの処理
}
else {
  // ログインしていないときの処理
  $('// classかidを指定する').notify("ログインが必要です",
  {
    className:"warn",
    position:"top center"
  });
}
*/

// // ドキュメント読み込み完了時
$(document).ready(function() {
  $('input[id=profileIcon]').on('change', function(e) {
      var user = userInfo();
      var uid  = user["uid"];
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
          // フォームデータを取得
          var formdata = new FormData($('#profileIconUpload').get(0));
          // POSTでアップロード
          $.ajax({
              url  : "imageSave.php",
              type : "POST",
              data : formdata,
              cache       : false,
              contentType : false,
              processData : false,
              dataType    : "html"
          })
          .done(function(data, textStatus, jqXHR){
            // プロフィールのアイコンにしたい画像がアップできたら
            $.ajax({
              type: 'POST',
              url:  '/imageMove.php',
              async: false,
              dataType: 'json',
              cache : false,
              data: {
                "userID": users_id,
              }
            })
            // Ajaxリクエストが成功した時発動
            .done( (data) => {
              // 作成しトピックにリダイレクトする
              console.log("data", data);
              console.log("2.成功しました");
              var target = document.getElementById('insertCropper');
              $('#insertCropper').empty();
              // var target = document.getElementById('insertCropper');
              target.insertAdjacentHTML(
                'afterbegin',
                '<a id="getData" class="btn btn-primary mb-3">Get Data</a>'
               +'<div class="cropper-example-1">'
               +'<img id="img" class="img-responsive" src="./img/users_img/'+users_id+'/profile_icon.png" alt="">'
               +'</div>'
              );

              // init
              // class='cropper-example-1のimgタグに適用'
              var $image = $('.cropper-example-1 > img').replaced;
              var body_width = document.getElementById('tmp').clientWidth;
              // var h = document.getElementById('tmp').clientheight;
              alert('Hello05');

              var path = "/img/profile_icon.png";
              var element = new Image();
              alert('Hello0');

              element.onload = function (){
                alert('Hello1');

                var width = element.naturalWidth;
                var height = element.naturalHeight;
                var short, long;

                asp = gcm(width, height);
                aspW = asp['aspWidth'];
                aspH = asp['aspHeight'];
                alert('Hello2');

                var par = 0;
                if(aspW > aspH){
                  var tmp = width;
                  while(body_width < width){
                    width -= aspW;
                  }
                  par = width / tmp;
                  height *= par;
                } else {
                  var tmp = height;
                  while(body_width/aspW*aspH < height){
                    height -= aspH;
                  }
                  par = height / tmp;
                  width *= par;
                }

                $('#img').cropper({
                  // ここでアスペクト比の調整 ワイド画面にしたい場合は 16 / 9
                  aspectRatio: 1 / 1,
                  autoCropArea: 1.0,
                  minCropBoxWidth: 50,
                  minCropBoxHeight: 50,
                  // 4:3  450:600
                  minContainerWidth: width-30,
                  minContainerHeight: height,

                  setDragMode: 'crop',
                });


                alert('Hello');
              }

              element.src = path;


            })
            // Ajaxリクエストが失敗した時発動
            .fail( (data) => {
              // $.ajax(this);
              console.log("data", data);
              console.log("2.失敗しました");

            })
            // Ajaxリクエストが成功・失敗どちらでも発動
            .always( (data) => {
              // console.log("2.どちらでも実行されます");
            });
          })
          .fail(function(jqXHR, textStatus, errorThrown){
            console.log(jqXHR);
            console.log("fail");
          });

        }
        xhr.send(null);
      }





  });


  //指定要素が変更された時
  // $('#file-image').change(function(e){
  //     var img = new Image();
  // 	var reader = new FileReader();
  // 	var file = this.files[0];
  //
  // 	if (!file.type.match(/^image\/(bmp|png|jpeg|gif)$/)){
  // 		alert("対応画像ファイル[bmp|png|jpeg|gif]");
  // 		return;
  // 	}
  //
  // 	reader.onload = function(event){
  // 		img.onload = function(){
  // 			var data = {data:img.src.split(',')[1]};
  // 			//ここ({
  // 				type: 'POST',
  // 				url: './add-image.php',
  // 				data: data,
  // 				success: function(data, dataType){
  // 					if(data == 'OK'){
  // 						alert("アップロード出来ました！");
  // 					}
  // 				}
  // 			});
  // 		img.src = event.target.result;
  // 	};
  //
  // 	reader.readAsDataURL(file);
  // });






  // getDataボタンが押された時の処理
  $('#getData').on('click', function(){

     // crop のデータを取得
     var data = $('#img').cropper('getData');

     // 切り抜きした画像のデータ
     // このデータを元にして画像の切り抜きが行われます
     var image = {
       width: Math.round(data.width),
       height: Math.round(data.height),
       x: Math.round(data.x),
       y: Math.round(data.y),
       _token: 'jf89ajtr234534829057835wjLA-SF_d8Z' // csrf用
      };

      // $.ajax({
      //   type: 'POST',
      //   url:  '/blog/blogAddData.php',
      //   async: false,
      //   dataType: 'json',
      //   cache : false,
      //   data: data
      // })
      // // Ajaxリクエストが成功した時発動
      // .done( (data) => {
      //   // 作成しトピックにリダイレクトする
      //   console.log("data", data);
      //   console.log("2.成功しました");
      //   window.location.reload();
      // })
      // // Ajaxリクエストが失敗した時発動
      // .fail( (data) => {
      //   // $.ajax(this);
      //   // console.log("data", data);
      //   // console.log("2.失敗しました");
      //   target.innerHTML = data['responseText'];
      //
      // })
      // // Ajaxリクエストが成功・失敗どちらでも発動
      // .always( (data) => {
      //   // console.log("2.どちらでも実行されます");
      // });

      console.log(image);
     // post 処理
     $.post('/app', image, function(res){
       // 成功すれば trueと表示されます
       console.log(res);
     });

  });

  $('#newBlogBuildBtn').on('click', function(){
    var blogTitle = char2unicode(document.getElementById('blogTitle').textContent);
    console.log("blogTitle", blogTitle);

    var blogTag = char2unicode(document.getElementById('blogTag').value);
    console.log("blogTag", blogTag);

    var blogSentence = document.getElementsByClassName("ql-editor ql-blank");
    console.log("blogSentence", blogSentence[0]['innerHTML']);
    var user = userInfo();
    var uid  = user["uid"];
    var filename = getUniqueStr();
    console.log(uid);
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
        console.log('nickname',nickname);
        var data = {
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

  var blogTitleFlg = false;
  var blogTitleStr = "";
  $(document).on('click', function(event) {
    var clicked_id = event['target'].id;
    console.log(clicked_id);

    if(clicked_id == 'blogTitle'){
      blogTitleStr = $('#blogTitle').text();
      // console.log("blogTitleStr",blogTitleStr);
      $('#blogTitle').empty();
      var target = document.getElementById('blogTitle');

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
        var target = document.getElementById('blogTitleVal');
        if (isEmpty(target.value)){
          $('#blogTitle').empty();
          var target = document.getElementById('blogTitle');
          target.insertAdjacentHTML('afterbegin', 'タイトルが空です');
        } else {
          var blogTitleVal = document.getElementById('blogTitleVal');
          var str = char2unicode(blogTitleVal.value);
          // console.log("str",str);
          $('#blogTitle').empty();
          var target = document.getElementById('blogTitle');
          target.insertAdjacentHTML('afterbegin', str);
        }
        blogTitleFlg = false;
      }
    }

  });

  $('#recCommentAddBtn').on('click', function() {
    var url = location.href;
    url = url.replace(location.protocol + "//" + location.host + "/recreation/rec-viwer.php?", "");
    var p = url.charAt(2);
    var f = url.replace("p="+p+"&f=", "");
    var sentence = document.getElementById('Sentence').value;
    var user = userInfo();
    var uid  = user["uid"];
    var dt = date();
    var msg = "";
    var target = document.getElementById('insert');
    target.innerHTML = '';

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
        var data = {
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

  $('#delButton').on('click', function(){
    var checkedList = [];
    var data = [];
    var cnt = 0;
    var formLen = document.form1.length;
    console.log("formLen",formLen);
    if(formLen > 1){
      for (var i=0; i<formLen; i++) {
        console.log('AAAAA');
        if (document.form1[i].checkbox.checked) {
          checkedList.push(i);
          var obj = document.getElementById("recLink"+i);
          var linkParamFileID = getParam("f", obj.href);
          var linkParamPageID = getParam("p", obj.href);
          data.push({linkParamFileID, linkParamPageID});
        }
      }
    } else {
      if (document.form1.checkbox.checked) {
        console.log('BBBBB');
        checkedList.push(0);
        var obj = document.getElementById("recLink"+0);
        var linkParamFileID = getParam("f", obj.href);
        var linkParamPageID = getParam("p", obj.href);
        data.push({linkParamFileID, linkParamPageID});
      }
    }

    console.log(checkedList);
    console.log(data);
    var aryJson = JSON.stringify(data);

    var target = document.getElementById('insert');
    target.innerHTML = '';

    $.ajax({
      type: 'POST',
      url:  '/auth/auth-rec-del.php',
      async: false,
      dataType: 'json',
      cache : false,
      data: { Ary : aryJson }
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
      console.log("data", data);
      console.log("2.失敗しました");
      target.innerHTML = data['responseText'];

    })
    // Ajaxリクエストが成功・失敗どちらでも発動
    .always( (data) => {
      // console.log("2.どちらでも実行されます");
    });

    // window.location.reload();

  });

  $('#newRecBuildBtn').on('click', function(){
    var recTitle = document.getElementById('recTitle').value;
    var targetNum = document.getElementById('targetPeopleNum').value;
    var targetAge = document.getElementById('targetAge').value;
    var timeRequired = document.getElementById('timeRequired').value;
    var youtubeURL = document.getElementById('youtubeURL').value;
    var sentence = document.getElementById('Sentence').value;
    var filenum = document.getElementById('fileNum').value;
    var filename = getUniqueStr();

    var user = userInfo();
    var uid = user['uid'];
    var dt = date();
    var msg = "";
    var nickname = "";

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
      var xhr = new XMLHttpRequest;
      xhr.open('GET', Filepath.USERS, true);
      xhr.onload = function(){
        var users = JSON.parse(this.responseText);
        // console.log(users);
        var users_id = users[0][uid]['id'];
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

  $('#info').on('click', function(){
    var user = userInfo();
    console.log(user['uid']);
  });

  $('#newCommentAdd').on('click', function() {
    // ログインしているかの確認
    // console.log('736:'+userLoginNew());
    if (userLoginNew()) {
      var sentence   = document.getElementById('Sentence').value;
      var filename   = document.getElementById('fileName').value;
      var user = userInfo();
      var uid = user['uid'];
      var dt = date();
      var msg = "";
      var nickname = "";

      if (sentence == "") {
          msg += Messages.INVALID_SENTENCE;
      }
      // msgが空じゃないとき（エラーが発生しているとき）
      if(msg !== "") {
        // メッセージがある場合ユーザーに通知する
        $.notify(msg, "warn");
      } else {
        var xhr = new XMLHttpRequest;
        xhr.open('GET', Filepath.USERS, true);
        xhr.onload = function(){
          var users = JSON.parse(this.responseText);
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
      var user = userInfo();
      var uid = user['uid'];
      // console.log(user);
      // $('#addTopic').append('<td scope=\"row\" class=\"d-none d-sm-table-cell\">2018/10/15 11:41:51</td><td class=\"text-dark\">福岡工業大学のトピックス</td><td class=\"text-center\">20</td><td class=\"d-none d-sm-table-cell\">0.005</td>');

      // console.log("uid",uid);
      var nickname = userSearch(uid, 'nickName');
      console.log(nickname);
  });

  // bulletin-board-top.php：
  $('#newTopicBuildBtn').on('click', function(){
    var topicTitle = document.getElementById('topicTitle').value;
    var sentence   = document.getElementById('Sentence').value;
    var filename   = getUniqueStr();
    var user = userInfo();
    var uid = user['uid'];
    var id = "";
    var dt = date();
    var msg = "";
    var nickname = "";

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
      var target = document.getElementById('insert');
      target.innerHTML = '';

      var xhr = new XMLHttpRequest;
      xhr.open('GET', Filepath.USERS, true);
      xhr.onload = function(){
        var users = JSON.parse(this.responseText);
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
    var user = userInfo();
    var uid = user['uid'];
    var msg  = "";
    var passwd = document.getElementById('passwd').value;
    var hash   = txt2hash('SHA-256', passwd);

    var xhr = new XMLHttpRequest;
    xhr.open('GET', Filepath.USERS, true);
    xhr.onload = function(){
      var users = JSON.parse(this.responseText);
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
    var nickNameVal = document.getElementById('nickName').value;
    var prefVal     = document.getElementById('Pref').value;
    var cityVal     = document.getElementById('City').value;
    var prefName;
    var cityName;
    var emailVal    = document.getElementById('emailAddress').value;
    var passwdVal   = document.getElementById('passwd').value;
    // var repasswdVal   = document.getElementById('repasswd').value;
    var hash = txt2hash('SHA-256', passwdVal);

    var xhr = new XMLHttpRequest;
    xhr.open('GET', '/lib/pref_city.json', true);
    xhr.onload = function(){
      var myData = JSON.parse(this.responseText);
      var PrefNum = 47;
      prefName = myData[0][prefVal]['name'];
      var i = 0;
      while(myData[0][prefVal]['city'][i]['citycode'] != cityVal){
        i++;
      }
    cityName = myData[0][prefVal]['city'][i]['city'];
    }
    xhr.send(null);

    var msg = "";
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

          var uid = user['user']['uid'];
          var host = location.host;
          var id = txt2hash('SHA-256', getUniqueStr());
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
              var target = document.getElementById('userNickName');
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
            var errorCode = error.code;
            var errorMessage = error.message;

            var firebaseErrorMsg = "";

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

  // // signup.php：都道府県のselectを変えたときにする処理
  // var xhr = new XMLHttpRequest;
  // xhr.open('GET', '/lib/pref_city.json', true);
  // xhr.onload = function(){
  //   var myData = JSON.parse(this.responseText);
  //   var PrefNum = 47;
  //   for(var i = 1; i <= PrefNum; i++){
  //     var prefNum = ('00' + i).slice(-2);
  //     $('#Pref').append("<option value=" + myData[0][prefNum]['id'] + ">" + myData[0][prefNum]['name'] + "</option>");
  //   }
  // }
  // xhr.send(null);

  // signup.php：都道府県を変えたときに表示する市区を変える
  $('#Pref').change((function(){
    $('select#City option').remove();
    $('#City').append("<option value=\"0\">--- 市区を選択してください ---</option>");
    var prefNum = document.getElementById('Pref').value;
    if(prefNum == 0){
      $('#City').prop('disabled', true);
    } else {
      $('#City').prop('disabled', false);
    }

    var prefVal = $('#Pref option:selected').val();
    var xhr = new XMLHttpRequest;
    xhr.open('GET', '/lib/pref_city.json', true);
    xhr.onload = function(){
      var myData = JSON.parse(this.responseText);
      var cityNum = myData[0][prefVal]['city'].length;
      // cityNum：選択した都道府県にある市区の数
      // prefVal：選択した都道府県の番号
      for(var j = 0; j < cityNum; j++){
        $('#City').append("<option value=" + myData[0][prefVal]['city'][j]['citycode'] + ">" + myData[0][prefVal]['city'][j]['city'] + "</option>");
      }
    }
    xhr.send(null);
  }));

  // $(function() {
  //     var $slider = $("#bxslider0");
  //         $slider.bxSlider({
  //             auto: true,
  //             infiniteLoop: true,
  //             pause: 8000,
  //             speed: 700,
  //             slideWidth: 500,
  //             minSlides: 3,
  //             maxSlides: 3,
  //             moveSlides: 1,
  //             slideMargin: 20
  //         });
  // });
    // $('.slider').bxSlider();

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
          var redirect_url = '/blog/blog-write-test.php';// + location.search;
          // if (document.referrer) {
          //   var referrer = "referrer=" + encodeURIComponent(document.referrer);
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
      var num = $(this).data('res') + 1;
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

    $('.tw_login').on('click', function() {
      var provider = new firebase.auth.TwitterAuthProvider();
      console.log(provider);
      firebase.auth().signInWithPopup(provider).then(function(result) {
        // This gives you a the Twitter OAuth 1.0 Access Token and Secret.
        // You can use these server side with your app's credentials to access the Twitter API.
        var token = result.credential.accessToken;
        var secret = result.credential.secret;
        // The signed-in user info.
        var user = result.user;
        // ...
        alert('asdfghjkl');
      }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // The email of the user's account used.
        var email = error.email;
        // The firebase.auth.AuthCredential type that was used.
        var credential = error.credential;
        // ...
        console.log(error);
        alert('zxcvbnm,.');
      });


    });

    // ログインボタン押下時処理
    $('#Login').on('click',function() {
        // emailとpasswordをinputから取得する
        var email = $('#modalEmailAddress').val();
        var password = $('#modalPassword').val();
        firebase.auth().signInWithEmailAndPassword(email, password).then(function(user) {
            // console.log("ログインしました");

            // URLを取得するコード
            var url = location.href;
            // var msg = "ログインしました";
            // $.notify(msg,"success");

            // リダイレクトを行うコード
            // var redirect_url = url + location.search;
            // if (document.referrer) {
            //   var referrer = "referrer=" + encodeURIComponent(document.referrer);
            //   redirect_url = redirect_url + (location.search ? '&' : '?') + referrer;
            // }
            // location.href = redirect_url;
            location.href = url;
            // .リダイレクトを行うコード
        }).catch(function(error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            // console.log(error.code);
            // console.log(error.message);
        });
    });

});
