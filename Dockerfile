# syntax=docker/dockerfile:1.4
########################################
# Builder stage (composer + vendor)
########################################
FROM composer:2 AS builder

WORKDIR /app

# copy composer files only for better cache
COPY composer.json composer.lock ./

# install php packages in composer (no ext needed here)
RUN composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction --no-progress

# copy app source
COPY . .

# make sure vendor from builder is available later
RUN composer dump-autoload --optimize

########################################
# Final stage
########################################
FROM php:8.2-apache

ARG APACHE_DOCUMENT_ROOT=/var/www/html/public
ENV APACHE_DOCUMENT_ROOT=${APACHE_DOCUMENT_ROOT}

# system deps
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    zip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install -j$(nproc) pdo pdo_mysql pdo_pgsql zip gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# enable apache rewrite
RUN a2enmod rewrite

# copy composer from builder
COPY --from=builder /app /var/www/html

# set working dir
WORKDIR /var/www/html

# set apache docroot to public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf /etc/apache2/apache2.conf

# set permissions for storage & cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# php ini overrides (upload limits)
RUN { \
    echo "upload_max_filesize = 100M"; \
    echo "post_max_size = 100M"; \
    echo "memory_limit = 512M"; \
    } > /usr/local/etc/php/conf.d/uploads.ini

# copy entrypoint
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 80

# use entrypoint so we can run migrations, storage:link etc at startup
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["apache2-foreground"]
