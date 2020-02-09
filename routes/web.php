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
    return view('auth/login');
});

Route::get('/index', function () {
    return view('admin/adminlte');
});

Route::get('/user', 'usersController@index')->name('users.index');
Route::get('/user/details/{id}', 'usersController@details')->name('users.details');
Route::get('/user/add', 'usersController@add')->name('users.add');
Route::post('/user/insert', 'usersController@insert')->name('users.insert');
Route::get('/user/edit/{id}', 'usersController@edit')->name('users.edit');
Route::post('/user/update/{id}', 'usersController@update')->name('users.update');
Route::get('/user/delete/{id}', 'usersController@delete')->name('users.delete');

// Route::post('/')

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/addmedia', 'UploadMediaController@add')->name('addmedia');
Route::get('getkategorilist','UploadMediaController@getKategori');
Route::get('getkat','UploadMediaController@getkat');

Route::get('/daftarkategori','KategoriController@index')->name('daftarkategori');
Route::get('/addkategori','KategoriController@add')->name('addkategori');
Route::post('/insertkategori','KategoriController@insert')->name('insertkategori');
Route::get('/editkategori/{id}','KategoriController@edit')->name('editkategori');
Route::post('/updatekategori/{id}','KategoriController@update')->name('updatekategori');
Route::get('/deletekategori/{id}','KategoriController@delete')->name('deletekategori');

Route::get('mediaindex','UploadMediaController@index')->name('mediaindex');
Route::post('mediaindex','UploadMediaController@index')->name('mediaindex');

Route::post('insertmedia','UploadMediaController@store')->name('insertmedia');
Route::get('posts/filedelete/{id}','UploadMediaController@destroy')->name('deletefile');
Route::get('/posts/download/{id}','UploadMediaController@show')->name('downloadfile');