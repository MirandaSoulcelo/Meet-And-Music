FROM php:8.2-cli

# Atualizar e instalar todas as dependências necessárias de uma vez
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libsqlite3-dev \
    sqlite3 \
    libzip-dev \
    zip \
    unzip \
    nodejs \
    npm \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zlib1g-dev \
    libicu-dev \
    g++ \
    unixodbc-dev \
    libxml2-dev \
    libxslt1-dev

# Limpar cache do apt
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar cada extensão PHP separadamente para identificar qual está causando o erro
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install pdo_sqlite

# Para sqlite3, verifique se ela é uma extensão padrão ou precisa ser compilada
RUN if [ -f "/usr/src/php/ext/sqlite3/config.m4" ]; then \
        docker-php-ext-install sqlite3; \
    else \
        echo "sqlite3 é uma extensão padrão ou não encontrada"; \
    fi

# Instalar mbstring
RUN docker-php-ext-install mbstring

# Instalar exif
RUN docker-php-ext-install exif

# Instalar pcntl
RUN docker-php-ext-install pcntl

# Instalar bcmath
RUN docker-php-ext-install bcmath

# Configurar e instalar GD com todas as opções possíveis
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j$(nproc) gd

# Instalar zip
RUN docker-php-ext-install zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir diretório de trabalho
WORKDIR /var/www/html

# Copiar arquivos do projeto
COPY . .

# Instalar dependências do Composer
RUN composer install --no-interaction --no-scripts --no-progress --prefer-dist

# Instalar dependências do NPM
RUN npm install

# Gerar chave do Laravel
RUN php artisan key:generate

# Configurar permissões
RUN chown -R www-data:www-data /var/www/html/storage \
    && chmod -R 775 /var/www/html/storage

# Criar o banco de dados SQLite se não existir
RUN touch database/database.sqlite

# Rodar migrações
RUN php artisan migrate --force

# Expor porta do artisan serve e do vite
EXPOSE 8000 5173

# Comando para iniciar o servidor e o vite
CMD sh -c "php artisan serve --host=0.0.0.0 & npm run dev"