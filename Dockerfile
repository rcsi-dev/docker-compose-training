FROM php:7.4-apache

# lib for postgres
RUN apt-get update && apt-get install -y libpq-dev

RUN docker-php-ext-install mysqli pgsql
