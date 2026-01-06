#!/bin/sh
set -e

echo "=== ENTRYPOINT VERSION: purge-cache-v1 ==="

cd /var/www/html

# hapus cache config/routes/services/view (ini yang sering bikin collision kebawa)
rm -f bootstrap/cache/*.php || true
rm -f storage/framework/views/*.php || true
rm -f storage/framework/cache/data/* || true

# permission biar laravel bisa nulis
chown -R www-data:www-data storage bootstrap/cache || true
chmod -R 775 storage bootstrap/cache || true

exec "$@"
