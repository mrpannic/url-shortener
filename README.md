# Installation
To install you will need nodejs v21 and php v8.1

After that you could use ```laravel/valet``` package if you are on MacOS for easy system setup. If not you could use just <br>
```php artisan serve```
Please bear in mind that you will need to create .env file and run <br>
``` php artisan key:generate ``` <br>
And set up database
<br>
Afterwards run <br>
``` php artisan migrate ```
<br>
Set GOOGLE_SAFE_BROWSING_API_KEY for Google's safe browsing api.
```
npm run dev
composer install
```
<br>
Then you can run:
```
npm run dev
or
npm run build
```
<br>
And then start your app in the browser either by entering the folder_name.test (if using valet) or by using 
http://localhost:{port}, and also it is important to set APP_URL either valet (default url-shortener.test) or (http://localhost:${port})

