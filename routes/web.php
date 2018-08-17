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
    Route::any('background/articleList', 'BackgroundController@articleList')->name('articleList');
    Route::any('background/updateRole', 'BackgroundController@updateRole');
    Route::any('background/updateArticle', 'BackgroundController@updateArticle');
    Route::any('background/tagList', 'BackgroundController@tagList')->name('tagList');
    Route::any('background/updateTag', 'BackgroundController@updateTag');
    Route::any('background/cateList', 'BackgroundController@cateList')->name('cateList');
    Route::any('background/updateCate', 'BackgroundController@updateCate');
    Route::any('background/modifyPassword', 'BackgroundController@modifyPassword');
    Route::any('background/uploadImg', 'BackgroundController@uploadImg');

});
Route::any('foreground/index','ForegroundController@index');
Route::any('foreground/getContent','ForegroundController@getContent');
Route::any('foreground/getPosition','ForegroundController@getPosition');
Route::get('info','TestController@info');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
