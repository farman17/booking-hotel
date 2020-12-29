FROM php:5.6.32-apache-jessie

RUN apt-get update \
  && docker-php-ext-install pdo pdo_mysql mysql mysqli

RUN a2enmod rewrite
COPY . /var/www/html/
