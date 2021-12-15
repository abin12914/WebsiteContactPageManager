<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/categories', function () {
    return 'categories';
});
Route::get('/category', function () {
    return 'category';
});
Route::get('/posts', function () {
    return 'posts';
});
Route::get('/post', function () {
    return 'post';
});
Route::get('/postComments', function () {
    return 'postComments';
});
Route::get('/userProfile', function () {
    return 'userProfile';
});
Route::get('/tags', function () {
    return 'tags';
});
Route::get('/tag', function () {
    return 'tag';
});
Route::get('/search', function () {
    return 'search';
});
Route::get('/user', [App\Http\Controllers\UserController::class, "getUserProfile"]);
Route::get('/user/create', function () {
    $employee_object = new stdClass;
    $employee_object->name = "John Doe";
    $employee_object->position = "Software Engineer";
    $employee_object->address = "53, nth street, city";
    $employee_object->status = "Best";
    return $employee_object->name;
});
