<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Genaral;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersArticlesController extends Controller
{
    public function index()
    {
        $all = Genaral::index('orders_articles');
        $table='Detalles de Pedidos';
        $route='ordersArticles';
        return view('admin.layouts.generalViewIndex', ['route'=>$route,'companies' => $all['items'],'camps' => $all['camps'], 'table'=>$table]);
    }
}
