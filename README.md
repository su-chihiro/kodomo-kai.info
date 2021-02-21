<div align="center" style="font-family: Playfair Display, Georgia, Times New Roman, serif;
    font-size: 2.25rem;">
<img src="https://i.imgur.com/ih65qbK.png" width="50%">
</div>

# ジュニアのたまりば: JLのためにポータルサイトです
<img src="https://shields.io/badge/Docker-white?style=flat&logo=docker">
<img src="https://shields.io/badge/Ubuntu-v20.04.1LTS-white?style=flat&logo=ubuntu">
<img src="https://shields.io/badge/php-v7.3.26-blue?style=flat&logo=php">
<img src="https://shields.io/badge/apache-v2.4.41-red?style=flat&logo=apache">



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

