DEMO: https://coffeemanaging.com

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the UnitTest for the application

    php artisan test

Start the local development server

    php artisan serve

Add premium users to .env with the following format

```
APP_DEFAULT_MAX_COMPANY_USER=2
APP_PREMIUM_USERS=foo@bar.com,bar@foo.com
```
