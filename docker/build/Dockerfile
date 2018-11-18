FROM php:7.2-fpm

ARG DEV

RUN docker-php-source extract && \
    docker-php-ext-install opcache pdo pdo_mysql && \
    # install build stuff
    apt-get update && apt-get install -y git zip vim zlib1g-dev && \
    docker-php-ext-install zip && \
    docker-php-source delete && \
    apt-get update && \
    apt-get install -y gnupg && \
    curl -sL https://deb.nodesource.com/setup_8.x | bash - && \
    apt-get update && \
    apt-get install -y nodejs && \
    curl -sL https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list && \
    apt-get update && apt-get install yarn && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/bin && \
    php -r "unlink('composer-setup.php');"

COPY ./ /var/www/html/

VOLUME /var/www/html/