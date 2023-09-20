FROM php:8.1-apache

COPY ./php.ini /usr/local/etc/php/conf.d/.
COPY ./sites-available/000-default.conf /etc/apache2/sites-available/.

RUN apt-get update \
    && apt-get install -y git vim libpq-dev zip unzip libzip-dev libonig-dev curl nodejs npm \
    && docker-php-ext-install pdo pdo_mysql mysqli mbstring

RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN a2enmod rewrite

ENV COMPOSER_ALLOW_SUPERUSER 1

RUN curl -sS https://getcomposer.org/installer | php -- \
--install-dir=/usr/bin --filename=composer

WORKDIR /var/www/html

EXPOSE 8080
EXPOSE 5173