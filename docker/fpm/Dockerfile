FROM php:7.2-fpm

ARG DEV

RUN docker-php-source extract && \
    if [ "$DEV" = "true" ] ; then pecl install xdebug && \
    docker-php-ext-enable xdebug ; fi && \
    docker-php-ext-install opcache pdo pdo_mysql && \
    docker-php-source delete

COPY ./ /var/www/html/

VOLUME /var/www/html/