<?php
    function json_read($path, $mode="r"){
        if( ($fp = fopen($path, $mode))=== false ){
            die("jsonファイル読み込みエラー");
        }
        $json = file_get_contents($path);

        // 文字化けを防ぐコード
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $arr = json_decode($json, true);
        $json_count = count($arr);

        return [$arr, $json_count];
    }
?>