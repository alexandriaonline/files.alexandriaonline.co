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

VOLUME /var/www/html/

RUN touch /usr/local/etc/php/conf.d/uploads.ini \
    && echo "file_uploads = On;" >> /usr/local/etc/php/conf.d/uploads.ini
    && echo "upload_max_filesize = 64M;" >> /usr/local/etc/php/conf.d/uploads.ini
    && echo "post_max_size = 64M;" >> /usr/local/etc/php/conf.d/uploads.ini
    && echo "max_execution_time = 600;" >> /usr/local/etc/php/conf.d/uploads.ini
    && echo "memory_limit = 256M;" >> /usr/local/etc/php/conf.d/uploads.ini