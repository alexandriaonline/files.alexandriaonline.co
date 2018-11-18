FROM php:7.2-fpm

ARG DEV

RUN docker-php-source extract && \
    docker-php-ext-install opcache pdo pdo_mysql && \
    # install build stuff
    apt-get update && apt-get install -y git zip zlib1g-dev && \
    docker-php-ext-install zip && \
    docker-php-source delete

COPY ./ /var/www/html/

VOLUME /var/www/html/