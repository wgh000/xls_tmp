FROM php:7-fpm

RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev

RUN docker-php-ext-install zip
RUN docker-php-ext-enable zip