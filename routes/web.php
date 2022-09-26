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

Auth::routes();

Route::prefix('admin')->middleware('auth')->name('admin.')->namespace('Admin')->group(function () {

    // Rotta pagina admin
    Route::get('/', 'HomeController@index')->name('home');

    // Rotte posts
    Route::resource('posts', 'PostController');

    // Route::get('/posts', 'PostController@index')->name('posts.index');
    // Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
    // Route::get('/posts/create', 'PostController@create')->name('posts.create');
    // Route::post('/posts', 'PostController@store')->name('posts.store');
    // Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
    // Route::put('/posts/{post}', 'PostController@update')->name('posts.update');
    // Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');

    // Tutte le rotte di admin non registrate vanno in 404
    Route::get('/{any}', function () {
        abort('404');
    })->where('any', '.*');
});

Route::get('/{any?}', function () {
    return view('guest.home');
})->where('any', '.*');
