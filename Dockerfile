FROM php:5-fpm-alpine
RUN apk add --no-cache \
        freetype-dev \
        libjpeg-turbo-dev \
        libpng-dev
#        bind-tools \
#        ca-certificates \ 
#        wget \
#        icu-dev	\
#        curl-dev \
#        gettext-dev \
#        libxml2-dev \
#        c-client \
#        openldap-dev \
#        libmcrypt-dev \
#        krb5-dev \
#        imap-dev \
#    && update-ca-certificates
RUN docker-php-ext-install -j4 mysql gd mbstring iconv
COPY php/docker-wiki-php-entrypoint /usr/local/bin/
ENTRYPOINT ["docker-wiki-php-entrypoint"]
CMD ["php-fpm"]
COPY root/ /wiki/
COPY wiki/ /wiki/w
