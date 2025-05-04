#!/bin/bash
cd /var/www/whistlerskysports
git pull origin main
composer install --optimize-autoloader --no-dev
npm install
npm run build
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
sudo supervisorctl restart all