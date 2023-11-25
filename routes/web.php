<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MultimediaController;
use App\Models\Multimedia;
use Iman\Streamer\VideoStreamer;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WelcomeController;

use Illuminate\Support\Facades\View;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Auth::routes();



Route::get('/multimedia', 'App\Http\Controllers\MultimediaController@index')->name('multimedia.index');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');
Route::get('/video/{filename}', 'App\Http\Controllers\MultimediaController@stream')->name('multimedia.stream');
Route::get('/multimedia/{id}', [MultimediaController::class, 'show'])->name('multimedia.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/search', 'App\Http\Controllers\MultimediaController@search')->name('search')->middleware('auth');






Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
    Route::resource('multimedia', 'App\Http\Controllers\MultimediaController');

	Route::post('/multimedia', [MultimediaController::class, 'store'])->name('multimedia.store');
  
    Route::get('/multimedia/{id}/edit', [MultimediaController::class, 'edit'])->name('multimedia.edit');
    Route::put('/multimedia/{id}', [MultimediaController::class, 'update'])->name('multimedia.update');
    Route::delete('/multimedia/{id}', [MultimediaController::class, 'destroy'])->name('multimedia.destroy');

    Route::get('/multimedia', function () {
        return view('multimedia.create');
    })->name('multimedias');
	Route::get('/uservideo', 'App\Http\Controllers\MultimediaController@uservideo')->name('multimedia.uservideo');

    Route::get('/search', 'App\Http\Controllers\MultimediaController@search')->name('search')->middleware('auth');



});


Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);


});