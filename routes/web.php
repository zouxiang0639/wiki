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

Route::get('/', ['uses' => "Books\\BooksController@search", 'as' => 'index']);
//笔记本
Route::group(['prefix' => 'books'], function(){
    Route::get('/', ['uses' => "Books\\BooksController@index", 'as' => 'books']);
    Route::get('/search', ['uses' => "Books\\BooksController@search", 'as' => 'books.search']);
    Route::get('/map', ['uses' => "Books\\BooksController@map", 'as' => 'books.map']);
});

//账本
Route::group(['prefix' => '/accounting'], function(){
    Route::get('/', ['uses' => "Accounting\\AccountingController@index", 'as' => 'accounting']);
});
