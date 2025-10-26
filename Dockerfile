# ============================
# Stage 1 — Build Frontend (Vite)
# ============================
FROM node:18 AS frontend
WORKDIR /app

# Install frontend dependencies
COPY package*.json ./
RUN npm install

# Copy source code and build assets
COPY . .
RUN npm run build


# ============================
# Stage 2 — Backend (Laravel + PHP + Composer)
# ============================
FROM php:8.2-fpm AS backend

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl unzip libzip-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy Laravel application files
COPY . .

# Copy built frontend assets from Stage 1
COPY --from=frontend /app/public/dist ./public/dist

# Install PHP dependencies (optimized for production)
RUN composer install --no-dev --optimize-autoloader

# Set proper permissions for Laravel storage and cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port (for PHP-FPM)
EXPOSE 9000

# ============================
# Laravel Runtime Commands
# ============================
# The CMD below will:
# - cache config, routes, and views
# - run database migrations
# - start php-fpm
CMD php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan migrate --force && \
    php-fpm
