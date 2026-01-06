#!/bin/sh
set -e

cd /var/www/html

# Bersihkan cache Laravel agar provider lama tidak nyangkut
php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Permission (aman walau gagal)
chown -R www-data:www-data storage bootstrap/cache || true
chmod -R 775 storage bootstrap/cache || true

exec apache2-foreground
