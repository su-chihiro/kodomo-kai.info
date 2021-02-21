<div align="center" style="font-family: Playfair Display, Georgia, Times New Roman, serif;
    font-size: 2.25rem;">
<!-- <img src="https://i.imgur.com/ih65qbK.png" width="50%"> -->
<!-- <img src="src/img/favicon/eco-green-leaf-icon-32-170142.png" style="padding-right: 5px;">ジュニアのたまりば -->
<img src="src/img/favicon/512_favicon.png" style="padding-right: 5px;" width="5%">ジュニアのたまりば
</div>



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

