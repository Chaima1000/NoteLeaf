# Use the official PHP image with Apache
FROM php:8.1-apache

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && a2enmod rewrite  # Enable mod_rewrite for Apache

# Set working directory
WORKDIR /var/www/html

# Copy application files to the container
COPY . /var/www/html/

# Set proper permissions for Apache user
RUN chown -R www-data:www-data /var/www/html

# Install Composer (Optional, if your PHP app needs it)
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configure Apache to serve the app (Optional)
# You can customize the apache2.conf or virtual host settings as needed.

# Expose port 80 to be able to access the app in the container
EXPOSE 80
