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
```
