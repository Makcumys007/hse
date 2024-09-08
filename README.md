HSE BOARD KBL

composer require laravel/breeze --dev

php artisan migrate:fresh


php artisan make:migration create_gateboard_table --create=gateboard

--== For use simple_html_dom ==--

composer require drnxloc/laravel-simple-html-dom

use Drnxloc\LaravelHtmlDom\HtmlDomParser;

php artisan storage:link

chmod -R 755 storage
chmod -R 755 public/storage

------------------------------
Log of visiters of pages
php artisan make:migration create_visits_table --create=visits
php artisan make:model Visit
php artisan make:middleware LogVisit

