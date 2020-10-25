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

Auth::routes(['register' => false]);

Route::get('/dashboard', 'HomeController@index')->name('home');
// admin 
Route::get('/dashboard/admin','AdminController@index')->name('dashboard.admin');
Route::get('/dashboard/admin/add','AdminController@create')->name('admin.add');
Route::post('/dashboard/admin/store','AdminController@store')->name('admin.store');
Route::get('/dashboard/admin/delete/{id}','AdminController@delete');
Route::get('/dashboard/admin/edit/{id}','AdminController@edit');
Route::post('/dashboard/admin/update/{id}','AdminController@update');