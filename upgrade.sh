rm -rf bootstrap/cache/*
rm -rf vendor/
composer install --no-scripts --no-dev
composer install --no-dev
php artisan migrate --seed
php artisan firefly-iii:decrypt-all
php artisan cache:clear
php artisan firefly-iii:upgrade-database
php artisan passport:install
php artisan cache:clear
