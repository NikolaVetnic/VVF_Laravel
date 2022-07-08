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

## Database Seeding

Generate a model and a migration, factory, seeder, and controller:

```
    php artisan make:model Flight -mfsc
```
