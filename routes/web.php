<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('admin/login','Auth\LoginController@showAdminLoginForm')->name('admin.login');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware(['auth',CheckAdmin::class])->group(function(){
    Route::get('/','HomeController@admin')->name('admin.dashboard');
});


Route::prefix('admin/category')->namespace('Admin')->middleware(['auth',CheckAdmin::class])->group(function(){
    Route::get('/','CategoryController@index')->name('admin.category.index');
    Route::get('/create','CategoryController@create')->name('admin.category.create');
    Route::post('/create','CategoryController@store');
    Route::get('/edit/{category}','CategoryController@edit')->name('admin.category.edit');
    Route::put('/edit/{category}','CategoryController@update');
    Route::delete('/delete/{category}','CategoryController@destroy')->name('admin.category.delete');
});

Route::prefix('admin/course')->namespace('Admin')->middleware(['auth',CheckAdmin::class])->group(function(){
    Route::get('/','CourseController@index')->name('admin.course.index');
    Route::get('/create','CourseController@create')->name('admin.course.create');
    Route::post('/create','CourseController@store');
    Route::get('/edit/{course}','CourseController@edit')->name('admin.course.edit');
    Route::put('/edit/{course}','CourseController@update');
    Route::delete('/delete/{course}','CourseController@destroy')->name('admin.course.delete');
});
Route::prefix('admin/image')->namespace('Admin')->middleware(['auth',CheckAdmin::class])->group(function(){
    Route::post('/delete','ImageController@destroy')->name('admin.image.delete');
});

Route::prefix('admin/video')->namespace('Admin')->middleware(['auth',CheckAdmin::class])->group(function(){
    Route::get('/{course}','VideoController@index')->name('admin.video.index');
    Route::get('/{course}/create','VideoController@create')->name('admin.video.create');
    Route::post('/{course}/create','VideoController@store');
    Route::get('/{course}/edit/{video}','VideoController@edit')->name('admin.video.edit');
    Route::put('/{course}/edit/{video}','VideoController@update');
    Route::delete('/{course}/delete/{video}','VideoController@destroy')->name('admin.video.delete');
});

