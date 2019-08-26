<?php

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

Route::get('/', 'AppController@home')->name('home');

Route::get('login', 'AuthController@login')->middleware('guest');
Route::post('login', 'AuthController@postLogin')->name('login.post');
Route::get('admin', 'AuthController@admin')->name('admin');
Route::post('logout', 'AuthController@logout')->name('logout');

Route::resource('projects', 'ProjectController');
Route::resource('skills', 'SkillController');
Route::resource('tags', 'TagController');
