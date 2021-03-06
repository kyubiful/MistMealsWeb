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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
  Auth::routes(['login' => false]);
  Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
  Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
  Route::get('logout1', 'Auth\LoginController@logout')->name('logout');
});

Route::group(['as' => 'web.', 'namespace' => 'Web'], function () {

  // Rutas de la Home
  Route::get('/', 'HomeController@index')->name('home');
  Route::post('/home/cpVerify', 'AvailableCPController@verifyCP')->name('verifyCP');
  Route::get('/home/endPopup', 'HomeController@endHomePopup')->name('endHomePopup');
  Route::post('home/cpTime', 'HomeController@getDeliveryDay')->name('deliveryDayCP');

  // Rutas del Usuario
  Route::get('/usuario/signup', 'UserController@signup')->name('user.signup');
  Route::post('/usuario/signup/store', 'UserController@signupStore')->name('user.signup.store');
  Route::get('/usuario/login', 'UserController@loginForm')->name('user.login.form');
  Route::post('/usuario/login', 'UserController@login')->name('user.login');
  Route::get('/usuario/logout', 'UserController@logout')->name('user.logout');
  Route::get('/usuario/profile', 'UserController@profile')->name('user.profile');
  Route::post('/usuario/profile/edit', 'UserController@profileEdit')->name('user.profile.edit');
  Route::get('/usuario/loginSignup', 'UserController@loginSignup')->name('user.loginSignup');
  Route::post('/usuario/signup/storeCart', 'UserController@signupStoreCart')->name('user.signup.storeCart');
  Route::post('/usuario/loginCart', 'UserController@loginCart')->name('user.loginCart');

  // Rutas del men??
  Route::get('/menu', 'MenuController@index')->name('menu');
  Route::get('/menu/config/{id}', 'MenuController@step1')->name('menu.step1');
  Route::post('/menu/config/{id}', 'MenuController@step1Store')->name('menu.step1.store');
  Route::get('/menu/dishes', 'MenuController@step2')->name('menu.step2');
  Route::post('/menu/platos/carts', 'MenuController@addToCart')->name('menu.addtocart');
  Route::post('/menu/mail', 'MenuController@sendMailMenu')->name('menu.mail');
  Route::get('/menu/pdf', 'MenuController@pdfMenu')->name('menu.pdf');

  // Rutas del Contacto
  Route::get('/contacto', 'ContactoController@index')->name('contacto');
  Route::post('/contacto', 'ContactoController@send')->name('contacto.send');

  // Rutas de politicas
  Route::get('/aviso-legal', 'CondicionesController@avisolegal')->name('avisolegal');
  Route::get('/politica-cookies', 'CondicionesController@cookies')->name('politicacookies');
  Route::get('/politica-privacidad', 'CondicionesController@privacidad')->name('politicaprivacidad');

  // Rutas de Platos
  Route::get('/platos', 'PlatosController@index')->name('platos');
  Route::get('/platos/paginate', 'PlatosController@scroll')->name('platos.scroll');
  Route::resource('/platos.carts', 'PlatosCartController')->only(['store', 'destroy']);
  Route::post('/platos/{plato}/carts/remove', 'PlatosCartController@remove')->name('platos.carts.remove');

  // Rutas de la vista de carrito
  Route::resource('/carts', 'CartController')->only(['index']);
  Route::post('carts/discount', 'CartController@verifyDiscountCode')->name('cart.discount');
  Route::get('carts/discount/remove', 'CartController@removeDiscountCookie')->name('cart.discount.remove');
  Route::get('carts/addOnePlate', 'PlatosCartController@addOnePlate')->name('cart.addOnePlate');
  Route::get('carts/removeOnePlate', 'PlatosCartController@removeOnePlate')->name('cart.removeOnePlate');

  // Rutas de la vista de Order
  Route::resource('/orders', 'OrderController')->only(['create', 'store']);
  Route::resource('/orders.payments', 'OrderPaymentController')->only(['create', 'store']);

  // Route::get('/blackfriday2', 'BlackFridayController@index2')->name('blackfriday2');
  // Route::get('/blackfriday', 'BlackFridayController@index')->name('blackfriday');
  // Route::get('/cybermonday', 'BlackFridayController@cybermonday')->name('cybermonday');

  Route::post('/tpv', 'RedsysController@index')->name('tpv');

  // Rutas de Redsys
  Route::get('/redsys/notification', 'RedsysController@comprobar');
  Route::post('/redsys/notification', 'RedsysController@comprobar');

  // Rutas de Holded
  Route::get('/holded/discount', 'RedsysController@free')->name('holded.free');
  Route::post('/holded/discount', 'RedsysController@free')->name('holded.free');

  // Rutas de Mailchimp
  Route::post('/mailchimp/subscribe', 'MailChimpController@store')->name('mailchimp.store');

  // Rutas de Revoluci??n
  Route::get('/revolucion', function () {
    return view('web.revolucion.index');
  })->name('revolucion');

  //Rutas de retos
  Route::get('/retos/landing','RetosController@landing')->name('retos.landing');

  // Rutas de FAQs
  Route::get('/faqs', 'FaqsController@index')->name('faqs');

  // Ruta de Thanks You Page
  Route::get('/thanks', 'ThanksYouController@index')->name('thanks');

  // Rutas de C??mo Funciona
  Route::get('/como-funciona', 'ComoFuncionaController@index')->name('comofunciona');

  // Rutas de las landings de los distintos men??s
  Route::get('/landing/deportistas', 'MenuLandingController@firstLanding')->name('landing.first');
  Route::get('/landing/conciencia', 'MenuLandingController@secondLanding')->name('landing.second');
  Route::get('/landing/oficina', 'MenuLandingController@thirdLanding')->name('landing.third');
  Route::get('/landing/roomies', 'MenuLandingController@fourthLanding')->name('landing.fourth');
  Route::get('/landing/intercambio', 'MenuLandingController@fifthLanding')->name('landing.fifth');

});

Auth::routes();
