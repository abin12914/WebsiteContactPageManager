<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;

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

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::get('/tags', [TagController::class, 'index']);
Route::get('/tags/{id}', [TagController::class, 'show']);
Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function(){
    Route::group(['prefix' => 'categories'], function(){
        Route::get('/', 'CategoryController@index');
        Route::post('/', 'CategoryController@store');
        Route::get('/{category}', 'CategoryController@show');   
        Route::put('/{category}', 'CategoryController@update');
        Route::delete('/{id}', 'CategoryController@destroy');
    });
    Route::group(['prefix' => 'posts'], function(){
        Route::get('/', 'PostController@index');
        Route::post('/', 'PostController@store');
        Route::get('/{post}', 'PostController@show');
        Route::put('/{post}', 'PostController@update');
        Route::delete('/{id}', 'PostController@destroy');
    });
    Route::group(['prefix' => 'tags'], function(){
        Route::get('/', 'TagController@index');
        Route::post('/', 'TagController@store');
        Route::get('/{tag}', 'TagController@show');
        Route::put('/{tag}', 'TagController@update');
        Route::delete('/{id}', 'TagController@destroy');
    });
    Route::group(['prefix' => 'users'], function(){
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{id}', [UserController::class, 'show']);
    });
    Route::group(['prefix' => 'comments'], function(){
        Route::get('/', 'CommentController@index');
        Route::post('/', 'CommentController@store');
        Route::get('/{comment}', 'CommentController@show');
        Route::put('/{comment}', 'CommentController@update');
        Route::delete('/{id}', 'CommentController@destroy');
    });
});
Route::group(['prefix' => 'user', 'namespace' => 'App\Http\Controllers\User'], function(){
    Route::group(['prefix' => 'posts'], function(){
        Route::get('/', 'PostController@index');
        Route::post('/', 'PostController@store');
        Route::get('/{post}', 'PostController@show');
        Route::put('/{post}', 'PostController@update');
        Route::delete('/{id}', 'PostController@destroy');
        Route::group(['prefix' => '/{id}/comments'], function(){
            Route::get('/', 'CommentController@index');
            Route::post('/', 'CommentController@store');
            Route::get('/{comment}', 'CommentController@show');
            Route::put('/{comment}', 'CommentController@update');
            Route::delete('/{id}', 'CommentController@destroy');
        });
    });
});

