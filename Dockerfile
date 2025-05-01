FROM php:8.1-apache

# Install mysqli, pdo_mysql extensions, and enable mod_rewrite
RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && a2enmod rewrite

# Copy the application code into the container
COPY . /var/www/html/

# Set the correct working directory
WORKDIR /var/www/html

# Change ownership of the files to www-data (Apache user)
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 for Apache to serve the app
EXPOSE 80

# Command to run Apache in the foreground
CMD ["apache2-foreground"]
