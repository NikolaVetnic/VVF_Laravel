<?php

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
