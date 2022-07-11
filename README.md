# Notes

## Starting the dev server & Logging

Command:

```
    php -S localhost:80
```

Log to `storage/logs/laravel.log`:

```
    Log::debug('Some message.');
```

## Middleware Logging

Middleware, log after request:

```
    class LogAfterRequest {
        public function handle($request, \Closure  $next) {
            return $next($request);
        }
        public function terminate($request, $response) {
            Log::info('app.requests', ['request' => $request->all(), 'response' => $response]);
        }
    }
```

When naming table by creating models, by convention, the "snake case", plural name of the class will be used as the table name unless another name is explicitly specified. Alternatively, custom name can be set:

```
	protected $table = 'my_flights';
```

## Database Stuff

In a new project, be sure to setup `/config/database.php` (`database`, `username` and `password` fields) and `.env` files ([read more](https://stackoverflow.com/questions/61594990/sqlstatehy000-1045-access-denied-for-user-rootlocalhost-using-password)):

```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=myapp
    DB_USERNAME=root
    DB_PASSWORD='root'
```

Generate a model and a migration, factory, seeder, and controller:

```
    php artisan make:model Flight -mfsc
```

Checklist:

1. create migration, factory and seeder `php artisan make:model NAME -mfsc`
2. run migration with `php artisan migrate --path=/database/migrations/file_name.php`
3. setup factory
4. setup seeder
5. create resource controller `php artisan make:controller NAME --resource`

Adding columns via migrations - [read here](https://stackoverflow.com/questions/16791613/laravel-add-a-new-column-to-existing-table-in-a-migration).

## Study app `user-auth`

Files changed in order to add the countries list to the register form:

```
    resources/views/auth/register.blade.php
    app/Http/Controllers/Auth/RegisterController.php
    vendor/laravel/ui/auth-backend/RegistersUsers.php
    app/Models/User.php

    database/seeders/DatabaseSeeder.php
    database/seeders/CountriesSeeder.php

    storage/logs/laravel.log
```

## Study app `user-auth`

Files changed:

```
    user-auth-jwt/app/Models/User.php
    user-auth-jwt/config/auth.php
    user-auth-jwt/routes/api.php
    user-auth-jwt/app/Http/Controllers/DataController.php
    user-auth-jwt/app/Http/Controllers/AuthController.php
    user-auth-jwt/app/Http/Middleware/EnsureTokenIsValid.php
```

Message `Controller doesn't exist.` is solved [thusly](https://stackoverflow.com/questions/63807930/target-class-controller-does-not-exist-laravel-8).

## Traits

Traits HAVE TO BE in `/app/http/traits`.
