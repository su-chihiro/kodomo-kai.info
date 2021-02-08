# 実行方法
```
$ docker-compose build
$ docker-compose up
```

# PHPで使われているパッケージのインストール
```sh
# Laravelのコンテナに入る
$ docker exec -it laravel_app bash
$ cd /var/www/html/laravel
# composerを使って依存しているパッケージのインストール
$ composer install

# kodomo-kai.info
- これは私が作っている子ども会に関連するジュニアリーダー向けのポータルサイト「ジュニアのたまりば」のソースコードになります

