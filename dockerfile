FROM php:apache

COPY index.php /var/www/html
COPY index2.php /var/www/html
COPY trucorp-db.sql /var/www/html
COPY style.css /var/www/html

RUN chown www-data.www-data /var/www/html
RUN chmod -R 774 /var/www/html
RUN docker-php-ext-install mysqli