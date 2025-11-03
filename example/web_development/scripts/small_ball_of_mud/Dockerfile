FROM php:8.3-apache

RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite

COPY src/ /var/www/html/

COPY start-services.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/start-services.sh

CMD ["/usr/local/bin/start-services.sh"]
