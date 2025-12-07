web: php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
release: chmod -R 777 storage bootstrap/cache && php artisan migrate --force && php artisan config:cache && php artisan route:cache || true
