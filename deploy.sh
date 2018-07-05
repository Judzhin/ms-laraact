#!/usr/bin/env bash

bash ./vendor/bin/msbios.sh

echo "Install Deps"
composer install

echo "Artisan Migrate"
php artisan migrate

# echo "Make Artisan Seeder"
# php artisan make:seeder ProductsTableSeeder

echo "Generate Seeds"
php artisan db:seed --class=ProductsTableSeeder

echo "Install Mix"
php artisan preset react
npm install && npm run dev