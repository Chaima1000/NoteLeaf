FROM php:8.1-apache

# Install mysqli and pdo_mysql extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql \
 && a2enmod rewrite

COPY . /var/www/html/
EXPOSE 80

CMD ["apache2-foreground"]
