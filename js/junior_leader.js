// Initialize Firebase
var config = {
  apiKey: "AIzaSyACrEUjxV5NVM9hzTvYaT_aPxJ0NSpAm8k",
  authDomain: "kodomo-kai.firebaseapp.com",
  databaseURL: "https://kodomo-kai.firebaseio.com",
  projectId: "kodomo-kai",
  storageBucket: "kodomo-kai.appspot.com",
  messagingSenderId: "533345737538"
};
firebase.initializeApp(config);

var Messages = {
  "INVALID_EMAIL": "・メールアドレスが正しく入力されていません\n",
  "INVALID_PASSWORD": "・パスワードが正しく入力されていません\n",
  "INVALID_NICKNAME": "・ニックネームが正しく入力されていません\n",
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

// オブジェクトを凍結する（定数）
Object.freeze(Messages);
Object.freeze(ErrorCodes);

$('.logout-view').hide();
$('.login-view').hide();
// $('.topic-form').hide();
// $('#newLoginView').show();



function sleep(waitMsec) {
  var startMsec = new Date();

  // 指定ミリ秒間だけループさせる（CPUは常にビジー状態）
  while (new Date() - startMsec < waitMsec);
}

// // ドキュメント読み込み完了時
$(document).ready(function() {
  $('#btn').on('click', function() {
    var user = userInfo();
    // console.log("user", user);
    alert("user", user);

  });

  // Firebaseのユーザ情報をjsonで返す
  function userInfo() {
    // ログインしているかの確認
    firebase.auth().onAuthStateChanged(function(user) {
      if (user) {
        alert('if');
        return user;
      }
      else {
        alert('else');
        return false;
      }
    });
  }

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
    var shaObj  = new jsSHA('SHA-256', 'TEXT');
    shaObj.update(passwdVal);
    var hash  = shaObj.getHash("HEX");


    var xhr = new XMLHttpRequest;
    xhr.open('GET', '/lib/pref_city.json', true);
    xhr.onload = function(){
      var myData = JSON.parse(this.responseText);
      var PrefNum = 47;
      prefName = myData[0][prefVal]['name'];
      var i = 0;
      console.log(myData[0][prefVal]['city'][0]['citycode']);
      while(myData[0][prefVal]['city'][i]['citycode'] != cityVal){
        i++;
      }
    cityName = myData[0][prefVal]['city'][i]['city'];
    console.log("cityName",cityName);
    }
    xhr.send(null);

    var msg = "";
    // ニックネームの入力チェック
    if (nickNameVal != "" && nickNameVal.length > 0) { }
    else {
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
    if (emailVal != "" && emailVal.length > 0) { }
    else {
        msg += Messages.INVALID_EMAIL;
    }

    // パスワードの入力チェック
    if (passwdVal != "" && passwdVal.length > 0) { }
    else {
        msg += Messages.INVALID_PASSWORD;
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

          $.ajax({
            type: 'POST',
            url:  '/users/usersAddData.php',
            async: false,
            dataType: 'json',
            data: {
                "uid": uid,
                "nickName": nickNameVal,
                "prefCode": prefVal,
                "cityCode": cityVal,
                "prefName": prefName,
                "cityName": cityName,
                "hash": hash
            },
            success:function(data){
              console.log("data:"+data);
              // $('.topic-form').fadeOut(800);
              // document.getElementById('newLoginiew').style.display = ''
              console.log(user);
              $('.topic-form').fadeOut(1000, function() {
                var target = document.getElementById('userNickName');
                target.innerHTML = nickNameVal;
                $('#newLoginiew').fadeIn(1000);
              });
            },
            // error: function(data) {
            //   // 通信がタイムアウト
            //   $.ajax(this);
            // }
          });



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



  // signup.php：都道府県のselectを変えたときにする処理
  var xhr = new XMLHttpRequest;
  xhr.open('GET', '/lib/pref_city.json', true);
  xhr.onload = function(){
    var myData = JSON.parse(this.responseText);
    var PrefNum = 47;
    for(var i = 1; i <= PrefNum; i++){
      var prefNum = ('00' + i).slice(-2);
      $('#Pref').append("<option value=" + myData[0][prefNum]['id'] + ">" + myData[0][prefNum]['name'] + "</option>");
    }
  }
  xhr.send(null);

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
          // console.log(user);
          // ユーザー名未設定のため暫定的にログインしていることを通知する
          $('.login-view').hide();
          $('.logout-view').show();
        } else {
          $('.login-view').show();
          $('.logout-view').hide();
        }
    });

    // 新規トピック作成ボタン押下時処理
    $('#newTopicButton').on('click',function() {
      $('.new-topic-form').slideToggle(600);
    });

    $('#newBlogButton').on('click',function() {
      // リダイレクトを行うコード
      var redirect_url = '/blog/blog-write.php' + location.search;
      if (document.referrer) {
        var referrer = "referrer=" + encodeURIComponent(document.referrer);
        redirect_url = redirect_url + (location.search ? '&' : '?') + referrer;
      }
      location.href = redirect_url;
      // .リダイレクトを行うコード
    });

    $('.res').on('click',function(){
      var num = $(this).data('res') + 1;
      // var target = $("#emailAddress");
      // $(window).scrollTop(target.offset().top);
      $('.new-topic-form').slideToggle(600);
      document.getElementById("Sentence").focus();
      document.getElementById("Sentence").value = ">>"+num+"\n";
    });

    $('.Logout').on('click',function() {
      // alert("aaAAaa!!!!");
      // Firebaseのサインアウト処理を行う
      firebase.auth().signOut().then(function() {
        $('.logout-view').hide();
        $('.login-view').show();
        $.notify("ログアウトしました","warn");
        // console.log('ログアウトしました');
      }).catch(function(error) {

        // console.log(user);
      });

    });
    // ログインボタン押下時処理
    $('#Login').on('click',function() {
        // emailとpasswordをinputから取得する
        var email = $('#modalEmailAddress').val();
        var password = $('#modalPassword').val();
        firebase.auth().signInWithEmailAndPassword(email, password).then(function(user) {
            console.log("ログインしました");
            console.log(user);

            // uidをもとにユーザー名を探すコードをここに書く

            // END

            // URLを取得するコード
            var url = location.href;
            var msg = "ログインしました\n○○さんいらっしゃい";
            $.notify(msg,"success");

            // リダイレクトを行うコード
            var redirect_url = url + location.search;
            if (document.referrer) {
              var referrer = "referrer=" + encodeURIComponent(document.referrer);
              redirect_url = redirect_url + (location.search ? '&' : '?') + referrer;
            }
            location.href = redirect_url;
            // .リダイレクトを行うコード

        }).catch(function(error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            // console.log(error.code);
            // console.log(error.message);

            // alert("Errorだよ");
            // ...
        });
    });

});
