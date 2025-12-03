# Use PHP with Apache
FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

# Enable Apache rewrite (needed for Laravel routes)
RUN a2enmod rewrite

# Install Composer (copied from the official composer image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install PHP dependencies (only prod)
RUN composer install --no-dev --optimize-autoloader

# Set Apache document root to Laravel's public folder
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/000-default.conf /etc/apache2/apache2.conf

# Permissions for storage & cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Run migrations and storage link on build
RUN php artisan migrate --force && php artisan storage:link

# Increase PHP upload limits
RUN echo "upload_max_filesize = 100M" > /usr/local/etc/php/conf.d/uploads.ini \
 && echo "post_max_size = 100M" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "memory_limit = 256M" >> /usr/local/etc/php/conf.d/uploads.ini

EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
