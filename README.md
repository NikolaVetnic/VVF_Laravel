# Notes

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
