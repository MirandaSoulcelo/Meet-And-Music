# Stage 1: Dependências do sistema
FROM php:8.2-fpm as system-deps

# Argumentos de build
ARG COMPOSER_AUTH
ARG NODE_ENV=development

# Dependências essenciais
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Dependências de desenvolvimento PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libsqlite3-dev \
    libzip-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zlib1g-dev \
    libicu-dev \
    g++ \
    unixodbc-dev \
    libxslt1-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Stage 2: Extensões PHP
FROM system-deps as php-extensions

# Instalar extensões PHP em uma única camada
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    pdo \
    pdo_mysql \
    pdo_sqlite \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Stage 3: Node.js e NPM
FROM php-extensions as node-setup

# Instalar Node.js e NPM
RUN apt-get update && apt-get install -y \
    nodejs \
    npm \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Stage 4: Composer e dependências
FROM node-setup as composer-setup

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir diretório de trabalho
WORKDIR /var/www/html

# Copiar arquivos de dependências
COPY composer.json composer.lock ./
COPY package.json package-lock.json ./

# Instalar dependências
RUN composer install --no-scripts --no-autoloader --prefer-dist \
    && npm ci

# Stage 5: Aplicação final
FROM composer-setup as app

# Copiar o resto dos arquivos do projeto
COPY . .

# Gerar autoload otimizado
RUN composer dump-autoload --optimize

# Configurar permissões
RUN chown -R www-data:www-data /var/www/html/storage \
    && chmod -R 775 /var/www/html/storage

# Criar o banco de dados SQLite se não existir
RUN touch database/database.sqlite

# Expor portas
EXPOSE 8000 5173

# Script de inicialização
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["docker-entrypoint.sh"]
