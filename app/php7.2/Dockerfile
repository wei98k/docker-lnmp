FROM php:7.2-rc-fpm-alpine
MAINTAINER HelloMJW majinawei168@outlook.com

#替换国内镜像
COPY ./source.list /etc/apk/repositories

#RUN apk update && apk upgrade
RUN apk update

#时区配置
ENV TIMEZONE Asia/Shanghai
RUN apk add tzdata
RUN ln -snf /usr/share/zoneinfo/$TIMEZONE /etc/localtime
RUN echo $TIMEZONE > /etc/timezone

RUN docker-php-ext-install mbstring opcache pdo pdo_mysql mysqli
RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev gmp-dev && \
    docker-php-ext-configure gd \
      --with-gd \
      --with-freetype-dir=/usr/include/ \
      --with-png-dir=/usr/include/ \
      --with-jpeg-dir=/usr/include/ \
      --with-zlib-dir=/usr && \
        NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
        docker-php-ext-install -j${NPROC} gd zip gmp && \
        apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

#安装php composer 如果无法安装可以下面的hash无法对应 到网站获取最新的hash值 https://getcomposer.org/download/
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php --install-dir=/bin --filename=composer

#安装Laravel管理器
RUN composer global require "laravel/installer" \
	&& ln -s /root/.composer/vendor/laravel/installer/laravel /usr/local/bin/laravel


#USER www-data
WORKDIR /home/www-data
