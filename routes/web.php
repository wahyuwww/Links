<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;
use App\About;
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
    return view('auth.login');
})->name('home');
Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::resource('/linksAdmin', 'LinkAdminController');
    Route::get('/view', 'ViewAboutController@index');
    Route::get('/links', 'LinkController@index');
    Route::get('/links/new', 'LinkController@create');
    Route::post('/links/new', 'LinkController@store');
    Route::get('/links/{link}', 'LinkController@edit');
    Route::post('/links/{link}', 'LinkController@update');
    Route::delete('/links/{link}', 'LinkController@destroy');
    // ---------------------------------------------//
    Route::get('/user', 'UsersController@index');
    Route::get('/user/tambah', 'UsersController@create');
    Route::post('/user/tambah', 'UsersController@store');
    Route::get('/user/{user}', 'UsersController@edit');
    Route::post('/user/{user}', 'UsersController@update');
    Route::resource('/users', 'UsersController');
    Route::resource('/kompres', 'ShortUserController');
    // Route::delete('/user/{data_user}', 'UsersController@destroy');
    // Route::post('/sortLink/short', [ShortUrlController::class, 'short'])->name('short.url');
    // Route::get('/sortLink/{code}', [ShortUrlController::class, 'show'])->name('short.show');
    Route::get('/kompres', 'ShortUserController@index');
    //Route::get('frontend', [App\Http\Controllers\FrontendController::class, 'index'])->name('frontend');
    Route::get('/settings', 'UserController@edit');
    Route::get('/sort', [ShortUrlController::class, 'index'])->name('sort');
    Route::post('/settings', 'UserController@update');
    //Route::post('/update-profil/{id}', 'UserController@update')->name('update.profil');
    //Route::get('/users/{user}', 'UserController@show');
    Route::resource('/about', 'AboutController');
    Route::get('/about/{abouts}', 'AboutController@edit');
    Route::post('/about/{abouts}', 'AboutController@update');

    //Route::match(['get', 'post'], '/about/{id}', 'AboutController@edit');
});

Route::post('/visit/{link}', 'VisitController@store');
Route::get('/user/{user}', 'UserController@show');
Route::post('/short', [ShortUrlController::class, 'short'])->name('short.url');
Route::get('{code}', [ShortUrlController::class, 'show'])->name('short.show');
//Route::get('/{code}', 'ShortUrlController@show');
//Route::resource('short','ShortController');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/visit/{link}', 'VisitController@store');

Route::get('/user/{user}', 'UserController@show');
