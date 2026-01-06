#!/bin/sh
set -e

cd /var/www/html

echo "=== ENTRYPOINT: clearing laravel caches (no artisan) ==="

# HAPUS cache config/provider yang bisa bikin Collision 'nyangkut'
rm -f bootstrap/cache/*.php || true

# Hapus cache view & cache aplikasi (aman)
rm -rf storage/framework/views/* || true
rm -rf storage/framework/cache/* || true

# Permission (aman walau gagal)
chown -R www-data:www-data storage bootstrap/cache || true
chmod -R 775 storage bootstrap/cache || true

echo "=== ENTRYPOINT: starting apache ==="
exec apache2-foreground
