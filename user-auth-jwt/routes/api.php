<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::get('/data/open', [DataController::class, 'open'])->middleware(['api']);
Route::get('/data/closed', [DataController::class, 'closed'])->middleware(['api', 'closed']);

// Route::resources([
//     'posts' => PostController::class,
// ]);

Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers'
], function ($router) {
    Route::resources([
        'posts' => PostController::class,
    ]);
});
