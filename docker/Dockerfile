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
    zip

# Composer
ENV COMPOSER_HOME /tmp
COPY --from=composer:1.9.2 /usr/bin/composer /usr/bin/composer

# composer files
RUN composer require --dev "phpunit/phpunit:^7.2"
