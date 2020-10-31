<?php
class Users{
    protected $user = [
        'nickname'       => 'string', // ユーザー名
        'prefcture_code' => 'int',    // 都道府県の番号
        'prefcture_name' => 'string', // 都道府県の名前
        'city_code'      => 'int',    // 市区の番号
        'city_name'      => 'string', // 市区の名前
        'hash'           => 'string', // 確かPasswordのHash
        'id'             => 'string', // 分からん
    ];
}