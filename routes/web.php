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


/*============================================================================
                            FRONT-END ROUTES
============================================================================*/

Route::get('/', 'IndexController@index');

Route::get('/portfolio/{id}', 'IndexController@portfolio')->name('portfolio.single');

Route::post('/subscriber/store', 'IndexController@subscriberstore')->name('subscriber.store');

Route::post('/message/store', 'IndexController@messagestore')->name('message.store');

/*============================================================================
                            BACK-END ROUTES
============================================================================*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// PORTFOLIO Routes
Route::get('/admin/portfolio', 'PortfolioController@index')->name('portfolio.index');

Route::post('/admin/portfolio/store', 'PortfolioController@store')->name('portfolio.store');

Route::post('/admin/portfolio/edit', 'PortfolioController@edit')->name('portfolio.edit');

Route::get('/admin/portfolio/destroy/{id}', 'PortfolioController@destroy')->name('portfolio.destroy');

// FAQs Routes
Route::get('/admin/faq', 'HomeController@faqindex')->name('faq.index');

Route::post('/admin/faq/store', 'HomeController@faqstore')->name('faq.store');

Route::post('/admin/faq/edit', 'HomeController@faqedit')->name('faq.edit');

Route::get('/admin/faq/destroy/{id}', 'HomeController@faqdestroy')->name('faq.destroy');

// SUBSCRIBERS Routes
Route::get('/admin/subscriber', 'HomeController@subscriber')->name('subscriber.index');

// MESSAGE Routes
Route::get('/admin/message', 'HomeController@messageindex')->name('message.index');



