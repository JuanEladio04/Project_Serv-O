# Use the official PHP 8.1 CLI image
FROM php:8.2-cli

# Install npm if needed
RUN apt-get update && apt-get install -y \
    npm \
    zip \
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install required PHP extensions
RUN docker-php-ext-install pdo_mysql

# Set the working directory
WORKDIR /app

