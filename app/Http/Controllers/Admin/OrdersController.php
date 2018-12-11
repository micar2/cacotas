<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Genaral;
use App\Company;
use App\Http\Requests\AdminOrderCreateRequest;
use App\Orders;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index()
    {
        $all = Genaral::index('orders');
        $table='Pedidos';
        $route='orders';
        return view('admin.layouts.generalViewIndex', ['route'=>$route,'items' => $all['items'],'camps' => $all['camps'], 'table'=>$table]);
    }

    public function create()
    {
        $companies=Company::pluck('name', 'id');
        return view('admin.order.create',['companies'=>$companies]);
    }

    public function store(AdminOrderCreateRequest $request)
    {

        $request->validated();

        Orders::create([
            'total' => $request['total'],
            'companyId' => $request['companyId'],
            'deliverDate' => $request['deliverDate'],
            'open' => $request['open'],
            'charged' => $request['charged'],
        ]);
        return redirect()->route('admin.orders.show');
    }

    public function change($id)
    {
        $route='ordersArticles';
        $orders = Orders::find($id);
        $companies = Company::pluck('name','id');
        $ordersArticles = Orders::getArticles($id, true);
        if ($ordersArticles->isEmpty()){
            return view('admin.order.update',['order' => $orders, 'items'=>$ordersArticles, 'route' => $route,'companies'=>$companies]);
        }
        $camps = array_keys(collect($ordersArticles[0])->toArray());

        $ordersArticles = collect($ordersArticles)->toArray();

        return view('admin.order.update',['order' => $orders, 'items'=>$ordersArticles, 'camps'=>$camps, 'route' => $route,'companies'=>$companies]);
    }

    public function update(AdminOrderCreateRequest $request,$id)
    {
        $request->validated();

        $item = Orders::find($id);
        if ($item) {
            $item->update($request->all());
            return redirect()->route('admin.orders.show');
        } else {
            return Utils::reportarError('Error al intentar editas la empresa');
        }
    }

    public function delete($id)
    {
        Orders::find($id)->delete();

        return redirect(route('admin.orders.show'));
    }

    public function restore($id)
    {
        Orders::onlyTrashed()->find($id)->restore();

        return redirect(route('admin.orders.show'));
    }
}
