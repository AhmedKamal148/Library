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




Route::resource("/library", "SectionController");

Route::resource("books" , "booksController");





Route::post('library/restore/{id}', 'SectionController@restore');

Route::post('library/delete-forever/{id}', 'SectionController@deleteForever');