<?php

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

Route::get('/', function(){
    return view('welcome');
})->name('welcome');

Route::get('home', ['middleware' => 'rol:admin', function(){
    return view('admin.welcome');
}] )->name('home');

//register

Route::get('register', 'Auth\RegisterController@create' )->name('register.create');
Route::post('register.create', 'Auth\RegisterController@store')->name('register.store');

//login

Route::get('form.login', 'Auth\LoginController@index')->name('form.login');
Route::post('login', 'Auth\LoginController@getin')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//---------client-----------//

Route::group([
    'middleware' => ['auth','rol:client']
], function () {

    //crud company

    Route::get('company', 'CompanyController@index')->name('company');
    Route::get('company/create', 'CompanyController@create')->name('company.create');
    Route::post('company/store', 'CompanyController@store')->name('company.store');
    Route::get('company/change/{id}', 'CompanyController@change')->name('company.change');
    Route::patch('company/update/{id}', 'CompanyController@update')->name('company.update');
    Route::delete('company/delete/{id}', 'CompanyController@delete')->name('company.delete');
    Route::get('company/debt/{id}', 'CompanyController@debt')->name('company.debt');

    //crud orders

    Route::get('orders/{companyId}', 'OrdersController@index')->name('orders');
    Route::get('orders/show/{id}', 'OrdersController@show')->name('orders.show');
    Route::get('orders/create/{companyId}', 'OrdersController@create')->name('orders.create');
    Route::post('orders/store/{companyId}', 'OrdersController@store')->name('orders.store');
    Route::get('orders/change/{id}', 'OrdersController@change')->name('orders.change');
    Route::patch('orders/update/{id}', 'OrdersController@update')->name('orders.update');
    Route::delete('orders/delete/{id}/{companyId}', 'OrdersController@delete')->name('orders.delete');

    // ordersArticle

    Route::delete('ordersArticles/delete/{id}/{ordersId}', 'OrdersArticlesController@delete')->name('ordersArticles.delete');
    Route::patch('ordersArticles/plusLess/{id}/{number}/{ordersId}/{operation}', 'OrdersArticlesController@plusLess')->name('ordersArticles.plusLess');
    Route::get('ordersArticles/create/{ordersId}', 'OrdersArticlesController@create')->name('ordersArticles.create');
    Route::post('ordersArticles/store/{articleId}/{ordersId}', 'OrdersArticlesController@store')->name('ordersArticles.store');


    //PDF

    Route::get('pdf','PdfController@getIndex');
    Route::get('pdf/generar/{orderId}','PdfController@getGenerar');

    //Route::get('pagination/{articles}/{ordersId}','ArticleController@pagination')->name('article.pagination');

    Route::post('search/{ordersId}/{page}', 'ArticleController@search')->name('search');

});

//---------admin-----------//

Route::group([
    'middleware' => ['auth','rol:admin'],
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {

    Route::get('admin', function(){
        return view('admin.welcome');
    })->name('admin.welcome');

    //crud companies
    Route::post('companies/store', 'CompanyController@store')->name('admin.companies.store');
    Route::get('companies/create','CompanyController@create')->name('admin.companies.create');
    Route::get('companies', 'CompanyController@index')->name('admin.companies.show');
    Route::get('companies/change/{id}', 'CompanyController@change')->name('admin.companies.change');
    Route::patch('companies/update/{id}', 'CompanyController@update')->name('admin.companies.update');
    Route::delete('companies/delete/{id}', 'CompanyController@delete')->name('admin.companies.delete');
    Route::post('companies/restore/{id}', 'CompanyController@restore')->name('admin.companies.restore');

    //crud articles

    Route::get('articles', 'ArticleController@index')->name('admin.articles.show');
    Route::get('articles/change/{id}', 'ArticleController@change')->name('admin.articles.change');
    Route::patch('articles/update/{id}', 'ArticleController@update')->name('admin.articles.update');
    Route::delete('articles/delete/{id}', 'ArticleController@delete')->name('admin.articles.delete');
    Route::post('articles/restore/{id}', 'ArticleController@restore')->name('admin.articles.restore');

    //crud orders

    Route::get('orders', 'OrdersController@index')->name('admin.orders.show');
    Route::get('orders/change/{id}', 'OrdersController@change')->name('admin.orders.change');
    Route::post('orders/update/{id}', 'OrdersController@update')->name('admin.orders.update');
    Route::delete('orders/delete/{id}', 'OrdersController@delete')->name('admin.orders.delete');
    Route::post('orders/restore/{id}', 'OrdersController@restore')->name('admin.orders.restore');

    //crud ordersArticles

    Route::post('ordersArticles/create/{orderId}', 'OrdersArticlesController@create')->name('admin.ordersArticles.create');
    Route::post('ordersArticles/store/{orderId}', 'OrdersArticlesController@store')->name('admin.ordersArticles.store');
    Route::post('ordersArticles/change/{id}', 'OrdersArticlesController@change')->name('admin.ordersArticles.change');
    Route::patch('ordersArticles/update/{id}', 'OrdersArticlesController@update')->name('admin.ordersArticles.update');
    Route::delete('ordersArticles/delete/{id}', 'OrdersArticlesController@delete')->name('admin.ordersArticles.delete');
    Route::post('ordersArticles/restore/{id}', 'OrdersArticlesController@restore')->name('admin.ordersArticles.restore');

    //crud users

    Route::get('users', 'UsersController@index')->name('admin.users.show');
    Route::get('users/change/{id}', 'UsersController@change')->name('admin.users.change');
    Route::patch('users/update/{id}', 'UsersController@update')->name('admin.users.update');
    Route::delete('users/delete/{id}', 'UsersController@delete')->name('admin.users.delete');
    Route::post('users/restore/{id}', 'UsersController@restore')->name('admin.users.restore');

});

