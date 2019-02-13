FROM php:7.2.10-cli-alpine3.8

RUN docker-php-ext-install ctype

ENV PATH /var/app/bin:$PATH
RUN mkdir /var/app
WORKDIR /var/app

RUN mkdir /.composer \
    && chmod 777 /.composer