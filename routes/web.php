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

Route::group(['prefix' => 'admin'], function () {
  Auth::routes(['login' => false]);
  Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
  Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
  Route::get('logout1', 'Auth\LoginController@logout')->name('logout');
});

Route::group(['as' => 'web.', 'namespace' => 'Web'], function () {
  Route::get('/', 'HomeController@index')->name('home');

  Route::get('/usuario/signup', 'UserController@signup')->name('user.signup');
  Route::post('/usuario/signup/store', 'UserController@signupStore')->name('user.signup.store');
  Route::get('/usuario/login', 'UserController@loginForm')->name('user.login.form');
  Route::post('/usuario/login', 'UserController@login')->name('user.login');
  Route::get('/usuario/logout', 'UserController@logout')->name('user.logout');
  Route::get('/usuario/profile', 'UserController@profile')->name('user.profile');
  Route::post('/usuario/profile/edit', 'UserController@profileEdit')->name('user.profile.edit');

  Route::get('/menu', 'MenuController@index')->name('menu');
  Route::get('/menu/config/{id}', 'MenuController@step1')->name('menu.step1');
  Route::post('/menu/config/{id}', 'MenuController@step1Store')->name('menu.step1.store');
  Route::get('/menu/dishes', 'MenuController@step2')->name('menu.step2');
  Route::post('/menu/mail', 'MenuController@sendMailMenu')->name('menu.mail');
  Route::get('/menu/pdf', 'MenuController@pdfMenu')->name('menu.pdf');

  Route::get('/contacto', 'ContactoController@index')->name('contacto');
  Route::post('/contacto', 'ContactoController@store')->name('contacto.store');

  Route::get('/aviso-legal', 'CondicionesController@avisolegal')->name('avisolegal');
  Route::get('/politica-cookies', 'CondicionesController@cookies')->name('politicacookies');
  Route::get('/politica-privacidad', 'CondicionesController@privacidad')->name('politicaprivacidad');

  Route::get('/platos', 'PlatosController@index')->name('platos');
  Route::resource('/platos.carts', 'PlatosCartController')->only(['store','destroy']);
  Route::resource('/carts', 'CartController')->only(['index']);
  Route::resource('/orders', 'OrderController')->only(['create', 'store']);
  Route::resource('/orders.payments', 'OrderPaymentController')->only(['create', 'store']);

  Route::get('/revolucion', function () {
    return view('web.revolucion.index');
  })->name('revolucion');
});

Auth::routes();
