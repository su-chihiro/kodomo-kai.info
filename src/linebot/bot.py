from flask import Flask, request, abort
#環境変数取得用
import os

from linebot import (
    LineBotApi, WebhookHandler
)
from linebot.exceptions import (
    InvalidSignatureError
)
from linebot.models import (
    MessageEvent, TextMessage, TextSendMessage,
)

app = Flask(__name__)

# オリジナルの処理
# line_bot_api = LineBotApi('YOUR_CHANNEL_ACCESS_TOKEN')
# handler = WebhookHandler('YOUR_CHANNEL_SECRET')

#環境変数取得
YOUR_CHANNEL_ACCESS_TOKEN = os.environ["k/DANHoUBn1nACfvMAq9VVLsM5ZB4RMclsjXNPt5/Uodx0ibq4f8dkse9JI4ndqol1Uh2ADlm6qXp20vYc4oxhdwyBOt1HlJJcpQ8HfCUMO5EL916M6m8RWdr1ldyumpAgvGeIdWJTJB9S3fV/xUaQdB04t89/1O/w1cDnyilFU="]
YOUR_CHANNEL_SECRET = os.environ["0c59b235235e6936f846f476b3a2eb34"]

line_bot_api = LineBotApi(YOUR_CHANNEL_ACCESS_TOKEN)
handler = WebhookHandler(YOUR_CHANNEL_SECRET)

@app.route("/")
def hello_world():
    return "hello world!"

@app.route("/callback", methods=['POST'])
def callback():
    # get X-Line-Signature header value
    signature = request.headers['X-Line-Signature']

    # get request body as text
    body = request.get_data(as_text=True)
    app.logger.info("Request body: " + body)

    # handle webhook body
    try:
        handler.handle(body, signature)
    except InvalidSignatureError:
        abort(400)

    return 'OK'


@handler.add(MessageEvent, message=TextMessage)
def handle_message(event):
    line_bot_api.reply_message(
        event.reply_token,
        TextSendMessage(text=event.message.text))


if __name__ == "__main__":
    app.run()
