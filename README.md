### 環境構築手順
インターンシップ用開発環境をforkする
以下URLへアクセスし、画面右上にある"fork"から、自分のアカウントへリポジトリをforkする。
https://github.com/takahashikazatake/laravel8-vue

ターミナルからインターンシップ用開発環境をcloneする(フォルダは任意の場所で)
```
git clone <forkしたリポジトリのwebURL/SSH>
```

cloneしたリポジトリへ移動後、dockerを立ち上げる
```
cd laravel8-vue
docker-compose build && docker-compose up -d
```

ここでlocalhostへアクセスしてみる
http://localhost/

おそらく以下のエラーになるはず。
```
Warning: require(/var/www/html/public/../vendor/autoload.php): failed to open stream: No such file or directory in /var/www/html/public/index.php on line 34
Fatal error: require(): Failed opening required '/var/www/html/public/../vendor/autoload.php' (include_path='.:/usr/local/lib/php') in /var/www/html/public/index.php on line 34
```

appコンテナ内でcomposerをインストールする。
```
docker-compose exec app composer install
```

keygenのため環境変数のファイルをコピー(laravelフォルダで)
```
cd laravel
cp .env.example .env
```

親ディレクトリへ戻ってlaravel用の鍵を作成する
```
cd ..
docker-compose exec app php artisan key:generate
```

ここでlocalhostへアクセスしてみる(うまく画面が表示されればOK)
http://localhost/

npm周り
```
cd laravel
docker-compose exec app npm install
docker-compose exec app npm run dev            // npm run watch-pollでバックグラウンド実行
```


### わからないことについて調べるときのコツ
Laravelの基本機能に関しては公式ドキュメントがお勧めです。
(最新のv8.xの説明書は現在再翻訳中らしいので、変な箇所がある場合のみ7.xを参考に)

また、エラ〜メッセージが出て原因がわからない場合はとりあえずそのまま一部or全部をコピペして検索してみると誰かが書いてくれているかもしれません。
その他、解説もたくさんありますが、古い場合は現在と仕様が変わっている可能性があるので、気をつけてください。

#### Laravel 公式ドキュメント(翻訳版)
https://readouble.com/laravel/8.x/ja/structure.html

https://readouble.com/laravel/7.x/ja/structure.html

#### Laravel 公式ドキュメント(オリジナル)
https://laravel.com/docs/8.x

https://laravel.com/docs/7.x

#### vue.js公式ドキュメント
https://jp.vuejs.org/v2/guide/index.html

#### php公式ドキュメント
https://www.php.net/manual/ja/index.php
