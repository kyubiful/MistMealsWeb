<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth'], 'as' => 'admin.', 'prefix' => 'admin'], function () {

  Route::get('dashboard', 'Admin\HomeController@index')->name('home');

  Route::group(['prefix' => 'config'], function () {
    Route::get('', 'Admin\ConfiguracionController@index')->name('config');
    Route::put('update', 'Admin\ConfiguracionController@update')->name('config.update');
  });

  Route::group(['prefix' => 'plato'], function () {
    Route::get('', 'Admin\PlatoController@index')->name('plato');
    Route::get('data', 'Admin\PlatoController@data')->name('plato.data');
    Route::get('create', 'Admin\PlatoController@create')->name('plato.create');
    Route::post('create', 'Admin\PlatoController@store')->name('plato.store');
    Route::get('edit/{id}', 'Admin\PlatoController@edit')->name('plato.edit');
    Route::put('update/{id}', 'Admin\PlatoController@update')->name('plato.update');
    Route::delete('destroy/{id}', 'Admin\PlatoController@destroy')->name('plato.destroy');
  });

  Route::group(['prefix' => 'menu'], function () {
    Route::get('', 'Admin\MenuController@index')->name('menu');
    Route::get('data', 'Admin\MenuController@data')->name('menu.data');
    Route::get('create', 'Admin\MenuController@create')->name('menu.create');
    Route::post('create', 'Admin\MenuController@store')->name('menu.store');
    Route::get('edit/{id}', 'Admin\MenuController@edit')->name('menu.edit');
    Route::put('update/{id}', 'Admin\MenuController@update')->name('menu.update');
    Route::delete('destroy/{id}', 'Admin\MenuController@destroy')->name('menu.destroy');
    Route::get('template/plato', 'Admin\MenuController@htmlPlato')->name('menu.template.plato');
  });

  Route::group(['prefix' => 'user'], function () {
    Route::get('', 'Admin\UserController@index')->name('user');
    Route::get('data', 'Admin\UserController@data')->name('user.data');
    Route::get('create', 'Admin\UserController@create')->name('user.create');
    Route::post('create', 'Admin\UserController@store')->name('user.store');
    Route::get('edit/{id}', 'Admin\UserController@edit')->name('user.edit');
    Route::put('update/{id}', 'Admin\UserController@update')->name('user.update');
    Route::delete('destroy/{id}', 'Admin\UserController@destroy')->name('user.destroy');
  });

  Route::group(['prefix' => 'sugerencia'], function () {
    Route::get('', 'Admin\SugerenciaController@index')->name('sugerencia');
    Route::get('data', 'Admin\SugerenciaController@data')->name('sugerencia.data');
    Route::get('edit/{id}', 'Admin\SugerenciaController@edit')->name('sugerencia.edit');
    Route::put('update/{id}', 'Admin\SugerenciaController@update')->name('sugerencia.update');
    Route::delete('destroy/{id}', 'Admin\SugerenciaController@destroy')->name('sugerencia.destroy');
  });




  // -------------------------


  Route::get('template/plato', function () {
    return view('template.plato');
  })->name('template.plato');


  // -------------------------

  Route::group(['prefix' => 'email'], function () {
    Route::get('inbox', function () {
      return view('admin.pages.email.inbox');
    });
    Route::get('read', function () {
      return view('admin.pages.email.read');
    });
    Route::get('compose', function () {
      return view('admin.pages.email.compose');
    });
  });

  Route::group(['prefix' => 'apps'], function () {
    Route::get('chat', function () {
      return view('admin.pages.apps.chat');
    });
    Route::get('calendar', function () {
      return view('admin.pages.apps.calendar');
    });
  });

  Route::group(['prefix' => 'ui-components'], function () {
    Route::get('alerts', function () {
      return view('admin.pages.ui-components.alerts');
    });
    Route::get('badges', function () {
      return view('admin.pages.ui-components.badges');
    });
    Route::get('breadcrumbs', function () {
      return view('admin.pages.ui-components.breadcrumbs');
    });
    Route::get('buttons', function () {
      return view('admin.pages.ui-components.buttons');
    });
    Route::get('button-group', function () {
      return view('admin.pages.ui-components.button-group');
    });
    Route::get('cards', function () {
      return view('admin.pages.ui-components.cards');
    });
    Route::get('carousel', function () {
      return view('admin.pages.ui-components.carousel');
    });
    Route::get('collapse', function () {
      return view('admin.pages.ui-components.collapse');
    });
    Route::get('dropdowns', function () {
      return view('admin.pages.ui-components.dropdowns');
    });
    Route::get('list-group', function () {
      return view('admin.pages.ui-components.list-group');
    });
    Route::get('media-object', function () {
      return view('admin.pages.ui-components.media-object');
    });
    Route::get('modal', function () {
      return view('admin.pages.ui-components.modal');
    });
    Route::get('navs', function () {
      return view('admin.pages.ui-components.navs');
    });
    Route::get('navbar', function () {
      return view('admin.pages.ui-components.navbar');
    });
    Route::get('pagination', function () {
      return view('admin.pages.ui-components.pagination');
    });
    Route::get('popovers', function () {
      return view('admin.pages.ui-components.popovers');
    });
    Route::get('progress', function () {
      return view('admin.pages.ui-components.progress');
    });
    Route::get('scrollbar', function () {
      return view('admin.pages.ui-components.scrollbar');
    });
    Route::get('scrollspy', function () {
      return view('admin.pages.ui-components.scrollspy');
    });
    Route::get('spinners', function () {
      return view('admin.pages.ui-components.spinners');
    });
    Route::get('tabs', function () {
      return view('admin.pages.ui-components.tabs');
    });
    Route::get('tooltips', function () {
      return view('admin.pages.ui-components.tooltips');
    });
  });

  Route::group(['prefix' => 'advanced-ui'], function () {
    Route::get('cropper', function () {
      return view('admin.pages.advanced-ui.cropper');
    });
    Route::get('owl-carousel', function () {
      return view('admin.pages.advanced-ui.owl-carousel');
    });
    Route::get('sweet-alert', function () {
      return view('admin.pages.advanced-ui.sweet-alert');
    });
  });

  Route::group(['prefix' => 'forms'], function () {
    Route::get('basic-elements', function () {
      return view('admin.pages.forms.basic-elements');
    });
    Route::get('advanced-elements', function () {
      return view('admin.pages.forms.advanced-elements');
    });
    Route::get('editors', function () {
      return view('admin.pages.forms.editors');
    });
    Route::get('wizard', function () {
      return view('admin.pages.forms.wizard');
    });
  });

  Route::group(['prefix' => 'charts'], function () {
    Route::get('apex', function () {
      return view('admin.pages.charts.apex');
    });
    Route::get('chartjs', function () {
      return view('admin.pages.charts.chartjs');
    });
    Route::get('flot', function () {
      return view('admin.pages.charts.flot');
    });
    Route::get('morrisjs', function () {
      return view('admin.pages.charts.morrisjs');
    });
    Route::get('peity', function () {
      return view('admin.pages.charts.peity');
    });
    Route::get('sparkline', function () {
      return view('admin.pages.charts.sparkline');
    });
  });

  Route::group(['prefix' => 'tables'], function () {
    Route::get('basic-tables', function () {
      return view('admin.pages.tables.basic-tables');
    });
    Route::get('data-table', function () {
      return view('admin.pages.tables.data-table');
    });
  });

  Route::group(['prefix' => 'icons'], function () {
    Route::get('feather-icons', function () {
      return view('admin.pages.icons.feather-icons');
    });
    Route::get('flag-icons', function () {
      return view('admin.pages.icons.flag-icons');
    });
    Route::get('mdi-icons', function () {
      return view('admin.pages.icons.mdi-icons');
    });
  });

  Route::group(['prefix' => 'general'], function () {
    Route::get('blank-page', function () {
      return view('admin.pages.general.blank-page');
    });
    Route::get('faq', function () {
      return view('admin.pages.general.faq');
    });
    Route::get('invoice', function () {
      return view('admin.pages.general.invoice');
    });
    Route::get('profile', function () {
      return view('admin.pages.general.profile');
    });
    Route::get('pricing', function () {
      return view('admin.pages.general.pricing');
    });
    Route::get('timeline', function () {
      return view('admin.pages.general.timeline');
    });
  });

  Route::group(['prefix' => 'auth'], function () {
    Route::get('login', function () {
      return view('admin.pages.auth.login');
    });
    Route::get('register', function () {
      return view('admin.pages.auth.register');
    });
  });

  Route::group(['prefix' => 'error'], function () {
    Route::get('404', function () {
      return view('admin.admin.pages.error.404');
    });
    Route::get('500', function () {
      return view('admin.admin.pages.error.500');
    });
  });
});

Auth::routes(['verify' => true]);
