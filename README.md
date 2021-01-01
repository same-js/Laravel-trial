## 概要
https://www.hypertextcandy.com/vue-laravel-tutorial-introduction を、実際に作ってみる。

## 開発を進めるために必要な手順
備忘として。

### Databaseディレクトリの作成
```sh
$ cd path/to/
$ mkdir database
```
#### 補足（手動で `database` ディレクトリを作成する必要がある理由）

 `database` ディレクトリの中身は、完全に空でなある必要があるため。  
空出ない場合、初回起動時にエラーが発生する。（ `.gitkeep` だけ置いている状態もNG）

### Dockerイメージ・コンテナの作成と起動
```sh
$ cd path/to/
$ docker-compose up -d
```
`cd path/to/` は、本リポジトリのルートディレクトリ、つまり`Dockerfile` が置いてあるディレクトリへの移動を指す。  
以降に登場する `cd path/to/` も、同じである。

`-d` コマンドを付与することで、バックグラウンド起動となる。  
うまく起動できない場合は、 `-d` コマンドを外し、 `docker-compose up` で実行することで、起動ログを表示することができる。

### 開発サーバ起動

```sh
$ cd path/to/
$ docker-compose exec vuesplash_web bash
$ php artisan serve --host 0.0.0.0 --port 8081 # コンテナ内で実行
```

これを実行すると、ブラウザで http://localhost:8081 にアクセスすることで、ローカル環境にアクセス可能となる。  
ただし開発を進める際は、BrowserSyncが有効となる http://localhost:3000 を利用した方がよい。  
（後者の環境の起動方法については、後述の「フロントエンド開発サーバの起動（アセット監視開始）」の項を参照）

### node_modulesのインストール
```sh
$ cd path/to/
$ docker-compose exec vuesplash_web bash
$ npm install # コンテナ内で実行
```

vueを動かすために必要なモジュールが `web/node_modules` 配下にインストールされる。

### フロントエンド開発サーバの起動（アセット監視開始）
```sh
$ npm run watch # コンテナ内で実行
```

これを実行すると、アセット類（ `web/resources/js/` 配下のjsファイルなど）の変更が監視される。  
それにより、アセット類に変更を加えた場合、直ちに再コンパイルが実行される。

さらに、本環境ではBrowserSyncを使用している。  
そのため、ブラウザで http://localhost:3000 を開いている場合、  
アセット類に変更を加えて保存すると、その瞬間にブラウザで開いているページが自動でリロードされ  
コンパイル後のページが表示される。

## 自動テストについて
phpunitを使用する。

### テスト実行コマンド

```sh
$ cd path/to/
$ docker-compose exec vuesplash_web bash
$ ./vendor/bin/phpunit --testdox # コンテナ内で実行
```

### 補足
テスト関数は、 必ず `test_` で始まるようにすること。
