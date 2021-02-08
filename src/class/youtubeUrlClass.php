<?php
class YoutubeUrlClass {

	public function abstract_youtube_id($url) {
        $youtube_id = '';
        $key_list = array('v', 'video_id');
        // 通常urlまたはパラメータ付きurl
        if (preg_match('/http[s]*:\/\/www.youtube.com\//u', $url)) {
            $parse = parse_url($url);
            parse_str($parse['query'], $query);
            foreach ($key_list as $key) {
                if (!empty($query[$key])) {
                    $youtube_id = $query[$key];
                    break;
                }
            }
            if ($youtube_id === '') {
                $youtube_id = substr($url, -11, 11);
            }
        }
        // nocookie
        if (preg_match('/http[s]*:\/\/www.youtube-nocookie.com\//u', $url)) {
            $parse = parse_url($url);
            $youtube_id = basename($parse['path']);
        }
        // 短縮url
        if (preg_match('/http[s]*:\/\/youtu.be\//u', $url)) {
            $youtube_id = substr($url, -11, 11);
        }
        // iframe
        if (strstr($url, 'iframe')) {
            preg_match('/src=\"(.[^\"]*)\"/', $url, $match);
            // 取り出したsrc属性の内容をスラッシュで切り分けて配列に入れる
            $explode = explode("/", $match[1]);
            // ファイル名は最後のスラッシュ以降
            $file = $explode[count($explode) - 1];
            $youtube_id = $file;
        }
        return $youtube_id;
    }
}
?>
