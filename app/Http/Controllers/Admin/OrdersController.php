<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Genaral;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index()
    {
        $all = Genaral::index('orders');
        $table='Pedidos';
        $route='orders';
        return view('admin.layouts.generalViewIndex', ['route'=>$route,'companies' => $all['items'],'camps' => $all['camps'], 'table'=>$table]);
    }
}
