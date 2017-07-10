FROM php:7-fpm-alpine
RUN apk add --no-cache \
        freetype-dev \
        libjpeg-turbo-dev \
        libpng-dev
RUN docker-php-ext-install -j4 mysqli gd mbstring iconv opcache
COPY php/php.ini /usr/local/etc/php/
COPY php/docker-wiki-php-entrypoint /usr/local/bin/
ENTRYPOINT ["docker-wiki-php-entrypoint"]
CMD ["php-fpm"]
COPY root/ /wiki/
COPY wiki/ /wiki/w
