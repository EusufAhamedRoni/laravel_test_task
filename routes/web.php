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


/**
* Admin & Admin Pages Routes
**/
Route::group(['prefix' => 'admin', 'middleware'=>['auth','admin']], function(){
  // Admin View with Authenticatin
  Route::get('/', 'Admin\PagesController@adminView')->name('adminView');
  Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('adminLogout');
  // Route::get('/login', 'Admin\Auth\AuthController@showLoginForm')->name('loginView');
  // Route::post('/login', 'Admin\Auth\AuthController@processLogin')->name('processLogin');
  // Route::post('/logout', function(){
  //   Auth::logout();
  //   return redirect()->back();
  // })->name('customLogoutPath');

  // Categories route
  Route::group(['prefix' => 'user'], function(){
    Route::get('/lists', 'Admin\UserController@userView')->name('userView');
    Route::get('/add-user', 'Admin\UserController@addUser')->name('addUser');
    Route::post('/add-user', 'Admin\UserController@storeUser')->name('storeUser');
    Route::get('/user-details/{id}', 'Admin\UserController@userDetails')->name('userDetails');
    Route::get('/edit-user/{id}', 'Admin\UserController@editUseer')->name('editUseer');
    Route::post('/edit-user/{id}', 'Admin\UserController@updatedUser')->name('updatedUser');
    Route::get('/delete-user/{id}', 'Admin\UserController@deleteUser')->name('deleteUser');
  });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['as'=>'admin.','prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth','admin']],      function () {
//   Route::get('/', 'Admin\PagesController@adminView')->name('adminView');
// });
