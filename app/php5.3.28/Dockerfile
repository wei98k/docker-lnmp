FROM hellomjw/php:5.3.28

#RUN apk add -U --no-cache autoconf gettext-dev && docker-php-ext-install gettext
#RUN apk add -U --no-cache autoconf openssl-dev && docker-php-ext-install ftp
#RUN apk add -U --no-cache autoconf libmcrypt-dev && docker-php-ext-install mcrypt
#RUN apk add -U --no-cache autoconf libmcrypt-dev && docker-php-ext-install 
#RUN apk add -U --no-cache autoconf libxml2-dev && docker-php-ext-install soap
#RUN apk add -U --no-cache autoconf libxml2-dev && docker-php-ext-install xmlrpc
#RUN apk add -U --no-cache autoconf zlib-dev  && docker-php-ext-install zip

RUN apk add -U --no-cache autoconf freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev gettext-dev libmcrypt-dev libxml2-dev zlib-dev mariadb-dev  && \
    docker-php-ext-configure gd \
      --with-gd \
      --with-freetype-dir=/usr/include/ \
      --with-png-dir=/usr/include/ \
      --with-jpeg-dir=/usr/include/ \
      --with-zlib-dir=/usr && \
        NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
        docker-php-ext-install -j${NPROC} gd zip bcmath gettext mbstring mcrypt mysql mysqli pcntl pdo_mysql shmop soap sockets sysvsem sysvsem xmlrpc && \
        apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

WORKDIR /home/www-data

