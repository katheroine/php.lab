FROM php:8.4-apache

RUN a2enmod rewrite

ENV APACHE_DIRECTORY_INDEX client.php

RUN sed -ri -e 's!index.php!${APACHE_DIRECTORY_INDEX}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!index.php!${APACHE_DIRECTORY_INDEX}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY src/ /var/www/html/
