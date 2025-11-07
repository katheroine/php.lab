FROM php:8.4-apache

RUN a2enmod rewrite

COPY src/ /var/www/html/

COPY start-services.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/start-services.sh

CMD ["/usr/local/bin/start-services.sh"]
