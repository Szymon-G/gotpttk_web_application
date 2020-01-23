# gotpttk_web_application
Web application for tourists, helpful in trekking and going in the mountains

After downloading repo and instalation of Composer etc. run ```composer install``` command to download all necessary libraries
Start Apache on Xampp and go to ```localhost/.../public```

To create database run ```composer require doctrine maker```, 
then check inside .env file and change DATABASE_URL if your phpMyAdmin has non-default username or password. 
If you have done any modifications to entity schemas run ```php bin/console doctrine:migrations:diff```
To migrate your database to the server run this command: 
```php bin/console doctrine:migrations:migrate```

```php bin/console doctrine:database:create```
```php bin/console doctrine:migrations:diff```
```php bin/console doctrine:migrations:migrate```

To load data to database
```php bin/console doctrine:migrations:generate```
Copy content of ```database.text``` to new migration file up method and run
```php bin/console doctrine:migrations:execute --up [number of your file]``` eg.
```php bin/console doctrine:migrations:execute --up 20200103154637```

TESTS

Look here https://symfony.com/doc/current/testing.html

Install dependencies by

```composer require --dev symfony/phpunit-bridge```
and 
```php bin/phpunit```

Your test put in ```tests``` folder

To run test do ```php bin/phpunit```
or ```php bin/phpunit/[path to the file you want to test]```

eg. ```php bin/phpunit tests/Controller/TrailController.php```
