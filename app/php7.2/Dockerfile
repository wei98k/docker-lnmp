FROM php:7.2-rc-fpm-alpine
MAINTAINER HelloMJW majinawei168@outlook.com

#替换国内镜像
COPY ./source.list /etc/apk/repositories

RUN apk update && apk upgrade

#时区配置
ENV TIMEZONE Asia/Shanghai
RUN apk add tzdata
RUN ln -snf /usr/share/zoneinfo/$TIMEZONE /etc/localtime
RUN echo $TIMEZONE > /etc/timezone

RUN docker-php-ext-install mbstring opcache pdo pdo_mysql mysqli
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

#安装php composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php --install-dir=/bin --filename=composer
#USER www-data
WORKDIR /home/www-data
