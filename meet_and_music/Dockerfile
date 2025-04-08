FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql pdo_sqlite sqlite3 mbstring exif pcntl bcmath gd


# Set working directory
WORKDIR /var/www/html

# Copy existing application directory
COPY . .

# Install dependencies (only if vendor directory does not exist)
RUN if [ ! -d "vendor" ]; then curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer; fi

# Generate key
RUN php artisan key:generate

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 775 /var/www/html/storage

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
