FROM php:7.4-fpm

#Required to install GD module and zip module
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        zlib1g-dev \
        unzip \
        vim  \
        libjpeg-dev \
        libfreetype6-dev
        
#Extension module installation
RUN docker-php-ext-install pdo_mysql mysqli gd exif \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

#composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

#install nodeJS
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash
RUN apt-get install -y nodejs

#install yarn
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add
RUN apt-get install -qq -y build-essential nodejs yarn

#xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

#git
RUN apt-get update
RUN apt-get install -y git

# [If required] Set Github OAuth token as composer config
# RUN composer config --auth github-oauth.github.com 4cc10a6f652ff5fa0a992d23fdeaf9ca586d240b
#devuser
RUN useradd -m dev_user
RUN chown -R dev_user: /usr
RUN chown -R dev_user: /var/www/html
