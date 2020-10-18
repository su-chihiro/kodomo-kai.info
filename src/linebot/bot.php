<?php
// HTTPヘッダを設定
$channelToken = 'I8stOS34J6IXjGT6ucyi5n5tYBkax5IX2FZeQpjy7NpBEiUXdaByeQuwTDx2PMN4l1Uh2ADlm6qXp20vYc4oxhdwyBOt1HlJJcpQ8HfCUMN1HJdql+Z73kEFzPZaW9Zk1P3IiPGlS9XgVQw7SFAeqgdB04t89/1O/w1cDnyilFU=';
$headers = [
	'Authorization: Bearer ' . $channelToken,
	'Content-Type: application/json; charset=utf-8',
];

// POSTデータを設定してJSONにエンコード
$post = [
	'to' => 'メモした Your userId の文字列',
	'messages' => [
		[
			'type' => 'text',
			'text' => 'hello world',
		],
	],
];
$post = json_encode($post);

// HTTPリクエストを設定
$ch = curl_init('https://api.line.me/v2/bot/message/push');
// $options = [
// 	CURLOPT_CUSTOMREQUEST => 'POST',
// 	CURLOPT_HTTPHEADER => $headers,
// 	CURLOPT_RETURNTRANSFER => true,
// 	CURLOPT_BINARYTRANSFER => true,
// 	CURLOPT_HEADER => true,
// 	CURLOPT_POSTFIELDS => $post,
// ];
// curl_setopt_array($ch, $options);
//
// // 実行
// $result = curl_exec($ch);
//
// // エラーチェック
// $errno = curl_errno($ch);
// if ($errno) {
// 	return;
// }
//
// // HTTPステータスを取得
// $info = curl_getinfo($ch);
// $httpStatus = $info['http_code'];
//
// $responseHeaderSize = $info['header_size'];
// $body = substr($result, $responseHeaderSize);
//
// // 200 だったら OK
// echo $httpStatus . ' ' . $body;
?>
