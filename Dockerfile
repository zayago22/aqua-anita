# ===================================================
# Dockerfile — Aqua-Anita (Laravel 12 + SQLite)
# Para deploy en Coolify v4
# ===================================================

# ---------- Stage 1: Build ----------
FROM php:8.3-cli AS builder

# Instalar extensiones PHP necesarias
RUN apt-get update && apt-get install -y \
    git curl zip unzip libsqlite3-dev libgd-dev libwebp-dev \
    libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install pdo pdo_sqlite gd bcmath opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copiar composer files primero (cache de Docker)
COPY composer.json composer.lock ./

# Instalar dependencias sin dev
RUN composer install --no-dev --no-scripts --no-interaction --prefer-dist --optimize-autoloader

# Copiar el resto del código
COPY . .

# Ejecutar scripts post-install de composer
RUN composer dump-autoload --optimize --no-dev

# ---------- Stage 2: Production ----------
FROM php:8.3-apache

# Instalar extensiones PHP
RUN apt-get update && apt-get install -y \
    libsqlite3-dev libgd-dev libwebp-dev \
    libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install pdo pdo_sqlite gd bcmath opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Configurar Apache
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
    && a2enmod rewrite headers

# Configurar PHP para producción
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY docker/php.ini /usr/local/etc/php/conf.d/99-aqua-anita.ini

WORKDIR /var/www/html

# Copiar aplicación desde builder
COPY --from=builder /app /var/www/html

# Copiar entrypoint
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Crear directorios necesarios y ajustar permisos
RUN mkdir -p storage/app/public/clases/galeria \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    database \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache database

# Crear symlink de storage
RUN ln -sf /var/www/html/storage/app/public /var/www/html/public/storage

EXPOSE 80

ENTRYPOINT ["entrypoint.sh"]
CMD ["apache2-foreground"]
