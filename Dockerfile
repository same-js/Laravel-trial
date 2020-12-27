# 下記に従って構築
# https://www.hypertextcandy.com/vue-laravel-tutorial-setting-up-spa-project/
# 公式ドキュメント
# http://docs.docker.jp/engine/reference/builder.html


# ベース・イメージの指定
# Dockerfileは、必ず FROMから始らなければいけない（ARGは例外）
FROM php:7.4.1-fpm
# COPY A B　つまり、 B="/" ということ
COPY install-composer.sh /

# apt-get update パッケージリストの更新
# apt-get install -y [packages] # パッケージのインストール
# curl -s 進捗を表示しない L リダイレクトさせる | それをbash（ - 標準入出力）として実行
# : '' おそらくコメントだろうか・・・
# j$(nproc) nproc CPUコア数が返す -j 指定したCPUコア数で並列ビルドを行う
RUN apt-get update \
  && apt-get install -y wget git unzip libpq-dev \
  && : 'Install Node.js' \
  &&  curl -sL https://deb.nodesource.com/setup_12.x | bash - \
  && apt-get install -y nodejs \
  && : 'Install PHP Extentions' \
  && docker-php-ext-install -j$(nproc) pdo_pgsql \
  && : 'Install Composer' \
  && chmod 755 /install-composer.sh \
  && /install-composer.sh \
  && mv composer.phar /usr/local/bin/composer

# ワークディレクトリを設定する
# Dockerfile 内にてその後に続く RUN、CMD、ENTRYPOINT、COPY、ADD の各命令において利用する
# 指定したディレクトリが存在しない場合には、生成される
WORKDIR /var/www/html/vuesplash
