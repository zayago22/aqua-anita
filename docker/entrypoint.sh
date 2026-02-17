#!/bin/bash
set -e

echo "🏊 Aqua-Anita — Iniciando deploy..."

cd /var/www/html

# Crear base de datos SQLite si no existe
if [ ! -f database/database.sqlite ]; then
    echo "📦 Creando base de datos SQLite..."
    touch database/database.sqlite
    chown www-data:www-data database/database.sqlite
    chmod 664 database/database.sqlite
fi

# Generar APP_KEY si no existe
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "" ]; then
    echo "🔑 Generando APP_KEY..."
    php artisan key:generate --force
fi

# Ejecutar migraciones
echo "🗄️ Ejecutando migraciones..."
php artisan migrate --force

# Limpiar y cachear para producción
echo "⚡ Optimizando para producción..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Asegurar permisos
chown -R www-data:www-data storage database bootstrap/cache
chmod -R 775 storage database bootstrap/cache

echo "✅ Aqua-Anita lista — Iniciando Apache..."

# Ejecutar el CMD (apache2-foreground)
exec "$@"
