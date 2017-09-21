FROM php:5-fpm-alpine
MAINTAINER HelloMJW majinawei168@outlook.com

#替换国内镜像
COPY ./source.list /etc/apk/repositories

RUN apk update && apk upgrade

#时区配置
ENV TIMEZONE Asia/Shanghai
RUN apk add tzdata
RUN ln -snf /usr/share/zoneinfo/$TIMEZONE /etc/localtime 
RUN echo $TIMEZONE > /etc/timezone

RUN docker-php-ext-install mbstring opcache pdo pdo_mysql mysql mysqli
#添加扩展 gd zip
RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
    docker-php-ext-configure gd \
      --with-gd \
      --with-freetype-dir=/usr/include/ \
      --with-png-dir=/usr/include/ \
      --with-jpeg-dir=/usr/include/ \
      --with-zlib-dir=/usr && \
        NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
        docker-php-ext-install -j${NPROC} gd zip && \

        apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev
#添加redis
#ENV PHPREDIS_VERSION 3.1.3
#RUN curl -L -o /tmp/redis.tar.gz https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz \
#    && tar xfz /tmp/redis.tar.gz \
#    && rm -r /tmp/redis.tar.gz \
#    && mkdir -p /usr/src/php/ext \
#    && mv phpredis-$PHPREDIS_VERSION /usr/src/php/ext/redis \
#    && docker-php-ext-install redis \
#    && rm -rf /usr/src/php
#添加memcached
ENV PHPMEMCACHED_VERSION 1.5.1 
RUN apk add --no-cache --virtual .build-deps \
        && $PHPIZE_DEPS \
        && pecl install memcached-3.0.3\ 
        && apk del .build-deps \
        && pecl update-channels \
        && rm -rf /tmp/pear ~/.pearrc

#安装php composer
#RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"  
#RUN php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
#RUN php composer-setup.php --install-dir=/bin --filename=composer
