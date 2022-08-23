ARG PHP_VERSION
ARG XDEBUG_PORT 

FROM php:${PHP_VERSION}-fpm-alpine

RUN apk --update --no-cache add git postgresql-dev
RUN apk add --no-cache $PHPIZE_DEPS
RUN pecl install xdebug 
RUN docker-php-ext-install pdo pdo_pgsql 
RUN docker-php-ext-enable xdebug

WORKDIR /var/www
EXPOSE ${XDEBUG_PORT}