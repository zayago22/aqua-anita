#!/bin/bash
set -e

echo "🏊 Aqua-Anita — Iniciando deploy..."

cd /var/www/html

# ── Crear .env desde variables de entorno (Coolify las inyecta como env vars) ──
if [ ! -f .env ]; then
    echo "📄 Creando .env desde variables de entorno..."
    # Escribir cada variable con valor entrecomillado (soporta espacios)
    env | grep -E '^(APP_|DB_|MAIL_|CACHE_|SESSION_|QUEUE_|LOG_|ADMIN_|BROADCAST_)' | sort | \
        sed 's/=\(.*\)/="\1"/' > .env
    # Asegurarse de que DB_DATABASE apunte al SQLite
    if ! grep -q '^DB_DATABASE=' .env; then
        echo 'DB_DATABASE="/var/www/html/database/database.sqlite"' >> .env
    fi
    # Asegurarse de que APP_KEY exista (key:generate lo necesita)
    if ! grep -q '^APP_KEY=' .env; then
        echo 'APP_KEY=' >> .env
    fi
fi

# Crear base de datos SQLite si no existe
if [ ! -f database/database.sqlite ]; then
    echo "📦 Creando base de datos SQLite..."
    touch database/database.sqlite
    chown www-data:www-data database/database.sqlite
    chmod 664 database/database.sqlite
    FRESH_DB=true
else
    FRESH_DB=false
fi

# Generar APP_KEY si no existe o está vacío en .env
if ! grep -qE '^APP_KEY=.+' .env 2>/dev/null; then
    # Asegurar que la línea APP_KEY= exista
    grep -q '^APP_KEY=' .env 2>/dev/null || echo 'APP_KEY=' >> .env
    echo "🔑 Generando APP_KEY..."
    php artisan key:generate --force
fi

# Ejecutar migraciones
echo "🗄️ Ejecutando migraciones..."
php artisan migrate --force

# Si es base de datos nueva O no hay usuarios, ejecutar seeder y crear admin
USER_COUNT=$(php artisan tinker --execute="echo \App\Models\User::count();" 2>/dev/null || echo "0")
if [ "$FRESH_DB" = true ] || [ "$USER_COUNT" = "0" ]; then
    echo "🌱 Sembrando datos iniciales..."
    php artisan db:seed --class=ContentSeeder --force 2>/dev/null || true

    echo "👤 Creando usuario admin..."
    if [ -z "$ADMIN_PASSWORD" ]; then
        echo "⚠️  ADMIN_PASSWORD no está configurado — se omite creación de admin"
    else
        php artisan tinker --execute="
            \App\Models\User::firstOrCreate(
                ['email' => env('ADMIN_EMAIL', 'hola@rekobit.com')],
                [
                    'name' => 'Admin',
                    'password' => bcrypt(env('ADMIN_PASSWORD')),
                    'email_verified_at' => now(),
                ]
            );
        "
    fi
fi

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
