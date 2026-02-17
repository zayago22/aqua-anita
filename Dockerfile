# ===================================================
# Dockerfile — Aqua-Anita (Laravel 12 + SQLite)
# Para deploy en Coolify v4  (single-stage = build rápido)
# ===================================================

FROM php:8.3-apache

# ── 1. Extensiones PHP + dependencias del SO (una sola vez) ──
RUN apt-get update && apt-get install -y --no-install-recommends \
    libsqlite3-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    libwebp-dev unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install pdo pdo_sqlite gd bcmath opcache \
    && apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# ── 2. Composer ──
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ── 3. Apache ──
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
    && a2enmod rewrite headers

# ── 4. PHP producción ──
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY docker/php.ini /usr/local/etc/php/conf.d/99-aqua-anita.ini

WORKDIR /var/www/html

# ── 5. Dependencias Composer (capa cacheada) ──
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-interaction --prefer-dist --optimize-autoloader \
    && rm -f /usr/bin/composer

# ── 6. Código fuente ──
COPY . .
RUN php artisan package:discover --ansi 2>/dev/null || true

# ── 7. Entrypoint ──
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# ── 8. Directorios + permisos ──
RUN mkdir -p storage/app/public/clases/galeria \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    database \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache database

# ── 9. Symlink storage ──
RUN ln -sf /var/www/html/storage/app/public /var/www/html/public/storage

EXPOSE 80

ENTRYPOINT ["entrypoint.sh"]
CMD ["apache2-foreground"]
