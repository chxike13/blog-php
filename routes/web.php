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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello',function (){
    return "Hello World!";
});
Route::get('user/{name}', function ($name){
    return "Hello ".$name;
})->where('name', "[A-Za-z]+");
Route::any('background/login', 'BackgroundController@login')->name('page-login');
Route::any('background/register', 'BackgroundController@register');
Route::group(['middleware' => 'checkLogin'],function (){
    Route::any('background/index', 'BackgroundController@index')->name('index');
    Route::any('background/edit', 'BackgroundController@edit');
    Route::any('background/roleList', 'BackgroundController@roleList')->name('roleList');
    Route::any('background/articleList', 'BackgroundController@articleList');
    Route::any('background/updateRole', 'BackgroundController@updateRole');
    Route::any('background/updateArticle', 'BackgroundController@updateArticle');
});
Route::get('info','TestController@info');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
