#!/bin/bash
set -e

# Gerar chave do Laravel se não existir
if [ ! -f .env ]; then
    cp .env.example .env
    php artisan key:generate
fi

# Rodar migrações apenas se o banco estiver vazio
if [ ! -s database/database.sqlite ]; then
    php artisan migrate --force
fi

# Iniciar o servidor PHP e o Vite em background
php artisan serve --host=0.0.0.0 &
npm run dev &

# Manter o container rodando
tail -f /dev/null
