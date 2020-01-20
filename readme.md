## Przychodnia


How to run this app:\
-composer install\
-rename .env.example to .env and set your database name, a username and a password\
-create \cache directory in \przychodnia\bootstrap\
-php artisan key:generate\
-create a database in phpMyAdmin related to your .env file\
-php artisan migrate\
-php artisan db:seed\
-php artisan serve\
-type in your browser: localhost:8000\
