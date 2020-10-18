$(document).ready(function() {
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
});
