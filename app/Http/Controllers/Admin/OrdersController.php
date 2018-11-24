<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Genaral;
use App\Orders;
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

    public function change($id)
    {

        $orders = Orders::find($id);

        $ordersArticles = Orders::getArticles($id);

        $camps = array_keys(collect($ordersArticles[0])->toArray());

        $ordersArticles = collect($ordersArticles)->toArray();

        return view('admin.order.update',['order' => $orders, 'items'=>$ordersArticles, 'camps'=>$camps]);
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
