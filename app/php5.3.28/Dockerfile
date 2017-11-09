# https://github.com/Desarrollo-CeSPI/docker-php-5.3-alpine
FROM cespi/php-5.3:cli-latest

RUN apk add -U --no-cache autoconf mariadb-dev && docker-php-ext-install mysql
