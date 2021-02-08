//LINE Developersで取得したアクセストークンを入れる
var CHANNEL_ACCESS_TOKEN = 'FZrXJMq1SVT+POSZpxOeA7nNcakE1U5IkD2qUYFDu8FeqqgVynspE2wpzAwACH51l1Uh2ADlm6qXp20vYc4oxhdwyBOt1HlJJcpQ8HfCUMNjwarVTDeBYEUEVa0T1gXDcZxybLRAMSAcea5nUKZzJQdB04t89/1O/w1cDnyilFU=';
var line_endpoint = 'https://api.line.me/v2/bot/message/reply';

//ポストで送られてくるので、送られてきたJSONをパース
function doPost(e) {
  var json = JSON.parse(e.postData.contents);

  //返信するためのトークン取得
  var reply_token= json.events[0].replyToken;
  if (typeof reply_token === 'undefined') {
    return;
  }

  //送られたメッセージ内容を取得
  var message = json.events[0].message.text;

  // メッセージを返信
  UrlFetchApp.fetch(line_endpoint, {
    'headers': {
      'Content-Type': 'application/json; charset=UTF-8',
      'Authorization': 'Bearer ' + CHANNEL_ACCESS_TOKEN,
    },
    'method': 'post',
    'payload': JSON.stringify({
      'replyToken': reply_token,
      'messages': [{
        'type': 'text',
        'text': message,
      }],
    }),
  });
  return ContentService.createTextOutput(JSON.stringify({'content': 'post ok'})).setMimeType(ContentService.MimeType.JSON);
}
