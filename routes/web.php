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
Route::post('/contact', 'AppController@contact')->name('contact');

Route::get('login', 'AuthController@login')->name('login')->middleware('guest');
Route::post('login', 'AuthController@postLogin')->name('login.post');
Route::get('admin', 'AuthController@admin')->name('admin');
Route::post('logout', 'AuthController@logout')->name('logout');
Route::post('upload', 'ImageController@save')->name('image.save');

Route::resource('projects', 'ProjectController');
Route::resource('skills', 'SkillController');
Route::resource('tags', 'TagController');
Route::resource('experiences', 'ExperienceController');
