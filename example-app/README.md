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
