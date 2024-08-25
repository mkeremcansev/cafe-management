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

![Screenshot 2024-08-25 at 23-46-27 Coffee-Managing - Home](https://github.com/user-attachments/assets/4f80959e-f872-4f4a-ba69-0112fba6da3d)

![Screenshot 2024-08-25 at 23-47-30 Coffee-Managing - Reports](https://github.com/user-attachments/assets/aa0800a9-0d1b-4c6d-aa11-37e4b0909af0)

![Screenshot 2024-08-25 at 23-48-43 Coffee-Managing - Table Show](https://github.com/user-attachments/assets/e0078e17-8a34-49bd-b165-4e44614e6cbf)

![Screenshot 2024-08-25 at 23-49-05 Coffee-Managing - Table Show](https://github.com/user-attachments/assets/ab984788-942c-495a-8df6-ce42e4c54b36)
