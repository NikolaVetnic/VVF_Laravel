<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::get('/test/greeting', function () {
    return 'Hello World';
})->name('Simple GET method');

Route::get('/test/greeting/{num}', function ($num) {
    return 'You sent ' . $num . '!';
})->name('Send path variable');

Route::get('/test/age', function () {
    return 'Age present and greater than 18.';
})->name('Age check route')->middleware(['age']);

Route::get('/test/age/failed', function () {
    return 'Age not present or less than 18.';
})->name('Age check FAILED');

Route::match(['get', 'post'], '/test/send', function (Request $request) {
    return "Sent value is : " . $request->value;
})->name('Send data');

Route::post('/test/register', function (Request $request) {
    return $request->user;
})->name('Register new User');

Route::put('/test/changeUser/{id}', function (Request $request, $id) {
    return $request;
})->name('Change existing User with ID');

Route::patch('/test/patchUser/{id}', function (Request $request, $id) {
    return $request;
})->name('Patch existing User with ID');

Route::delete('/test/deleteUser/{id}', function ($id) {
    return 'User ID ' . $id . ' deleted!';
})->name('Delete User');

// =-=-=-= TEST/USER

Route::get('/test/users', function () {
    $users = App\Models\User::all();
    return $users;
});

Route::get('/test/user/{id}', function ($id) {
    $retrievedUser0 = App\Models\User::all()->where('id', $id); // probably wrong because fetches all
    $retrievedUser1 = User::where('id', $id)->get(); // no intellisense when writing it this way
    $retrievedUser2 = DB::table('users')->where('id', $id)->get(); // this method retrieves $hidden fields as well
    return $retrievedUser2;
});

Route::get('/test/users/desc/{num}', function ($num) {
    $retrievedUsers0 = App\Models\User::all()->take($num)->sortByDesc('first_name');
    $retrievedUsers1 = User::take($num)->get()->sortByDesc('first_name');
    $retrievedUsers2 = DB::table('users')->take($num)->get()->sortByDesc('first_name');

    return $retrievedUsers2;
});

// =-=-=-= USER

Route::get('/user/all', [UserController::class, 'getAll']);
Route::get('/user/{id}', [UserController::class, 'get', 'id']);
Route::get('/user/take/{num}/desc', [UserController::class, 'getCountDescByLastName', 'num']);

Route::post('/user', [UserController::class, 'create']);

Route::put('/user/{id}', [UserController::class, 'update', 'id']);

Route::delete('/user/{id}', [UserController::class, 'delete', 'id']);

// =-=-=-= POST

Route::get('/post/all', [PostController::class, 'getAll']);
Route::get('/post/{id}', [PostController::class, 'get', 'id']);

Route::post('/post', [PostController::class, 'create']);

Route::put('/post/{id}', [PostController::class, 'update', 'id']);

Route::delete('/post/{id}', [PostController::class, 'delete', 'id']);
