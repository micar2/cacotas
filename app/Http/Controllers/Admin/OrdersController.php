<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Genaral;
use App\Orders;
use App\User;
use Illuminate\Http\Request;
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
        $users=User::pluck('id', 'name');
        return view('admin.order.create',['users'=>$users]);
    }

    public function store(AdminOrderCreateRequest $request)
    {

        $request->validated();

        Article::create([
            'userId' => $request['userId'],
            'companyId' => $request['companyId'],
            'deliverDate' => $request['deliverDate'],
            'open' => $request['open'],
        ]);
        return redirect()->route('admin.orders.show');
    }

    public function change($id)
    {
        $route='ordersArticles';
        $orders = Orders::find($id);
        $ordersArticles = Orders::getArticles($id, true);
        if ($ordersArticles->isEmpty()){
            return view('admin.order.update',['order' => $orders, 'items'=>$ordersArticles, 'route' => $route]);
        }
        $camps = array_keys(collect($ordersArticles[0])->toArray());

        $ordersArticles = collect($ordersArticles)->toArray();

        return view('admin.order.update',['order' => $orders, 'items'=>$ordersArticles, 'camps'=>$camps, 'route' => $route]);
    }

    public function update(Request $request,$id)
    {
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
