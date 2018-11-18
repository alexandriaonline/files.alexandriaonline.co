FROM php:7.2-fpm

ARG DEV

RUN docker-php-source extract && \
    apt-get update && \
    apt-get install -y gnupg unzip zlib1g-dev && \
    curl -sL https://deb.nodesource.com/setup_8.x | bash - && \
    curl -sL https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list && \
    apt-get update && apt-get install -y nodejs yarn git && \
    if [ "$DEV" = "true" ] ; then pecl install xdebug && \
    docker-php-ext-enable xdebug ; fi && \
    docker-php-ext-install opcache pdo pdo_mysql zip  && \
    docker-php-source delete && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"

COPY ./ /var/www/html/

VOLUME /var/www/html/