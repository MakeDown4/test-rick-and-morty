#!/bin/bash

# Defina as variáveis de ambiente necessárias para o build
export APP_NAME="Laravel"
export APP_ENV="production"
export APP_KEY="base64:3XTjv9dOYqvMvbLmJI3nN7LruHFJ6IcqJZtl+MpO+bo="
# Defina outras variáveis de ambiente conforme necessário

# Execute as migrações do Laravel
php artisan migrate --force

# Gere uma nova chave de aplicativo Laravel
php artisan key:generate --force

# Execute o script de construção padrão (por exemplo, npm run build)
npm run build