FROM php:7.2-fpm

ARG DEV

RUN docker-php-source extract && \
    if [ "$DEV" = "true" ] ; then pecl install xdebug && \
    docker-php-ext-enable xdebug ; fi && \
    docker-php-ext-install opcache pdo pdo_mysql && \
    docker-php-source delete

# Use the default production configuration
RUN mv $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini

COPY ./ /var/www/html/

COPY ./docker/files/php-uploads.ini $PHP_INI_DIR/conf.d/uploads.ini

VOLUME /var/www/html/