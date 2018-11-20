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

    Route::post('company/update/{id}', 'CompanyController@update')->name('company.update');

    Route::get('company/delete/{id}', 'CompanyController@delete')->name('company.delete');

    Route::get('company/debt/{id}', 'CompanyController@debt')->name('company.debt');

//crud orders

    Route::get('orders/{companyId}', 'OrdersController@index')->name('orders');

    Route::get('orders/show/{id}', 'OrdersController@show')->name('orders.show');

    Route::get('orders/create/{companyId}', 'OrdersController@create')->name('orders.create');

    Route::post('orders/store/{companyId}', 'OrdersController@store')->name('orders.store');

    Route::get('orders/change/{id}', 'OrdersController@change')->name('orders.change');

    Route::get('orders/update/{id}', 'OrdersController@update')->name('orders.update');

    Route::get('orders/delete/{id}/{companyId}', 'OrdersController@delete')->name('orders.delete');

// ordersArticle

    Route::get('ordersArticles/delete/{id}/{ordersId}', 'OrdersArticlesController@delete')->name('ordersArticles.delete');

    Route::get('ordersArticles/plus/{id}/{number}/{ordersId}/{operation}', 'OrdersArticlesController@plusLess')->name('ordersArticles.plusLess');

    Route::get('ordersArticles/create/{ordersId}', 'OrdersArticlesController@create')->name('ordersArticles.create');

    Route::post('ordersArticles/store/{articleId}/{ordersId}', 'OrdersArticlesController@store')->name('ordersArticles.store');

//Article

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
    })->name('welcome');

    //crud company

    Route::get('companies', 'CompanyController@index')->name('admin.companies.show');

    Route::get('articles', 'ArticleController@index')->name('admin.articles.show');

    Route::get('orders', 'OrdersController@index')->name('admin.orders.show');

    Route::get('ordersArticles', 'OrdersArticlesController@index')->name('admin.ordersArticles.show');

    Route::get('users', 'UsersController@index')->name('admin.users.show');

});



// mail

//Route::get('sendemail',function(){
//    $data = [
//        'name' => 'cacotas',
//        'link' => 'http://jesuschicano.es'
//    ];
//
//    Mail::send('emails.notification', $data, function($msg){
//        $msg->from('c4c0t4s@gmail.com', 'Pato Cuack');
//        $msg->to('munar2@hotmail.com')->subject('Notificación');
//    });
//    return 'el email ha sido enviado';
//}
//);