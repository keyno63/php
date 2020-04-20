# Dockerfile
#FROM php:7.4-apache
FROM php:7.4-cli

# Xdebug
RUN pecl install xdebug \
 && docker-php-ext-enable xdebug

# git
RUN apt-get update && apt-get install -y \
    git \
    libicu-dev \
    libzip-dev \
    libpng-dev \
    libmcrypt-dev \
    zlib1g-dev \
    libxml2-dev \
    libonig-dev \
    graphviz \
    zip \
    mariadb-client

RUN  apt-get install -y \
    && docker-php-ext-install zip \
    && docker-php-ext-install intl \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_mysql

# Composer
ENV COMPOSER_HOME /tmp
COPY --from=composer:1.9.2 /usr/bin/composer /usr/bin/composer

# composer files
COPY composer.json /
RUN composer require --dev
