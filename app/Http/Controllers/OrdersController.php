<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\OrderRequest;
use App\Orders;
use Illuminate\Support\Facades\Auth;
use App\Mail\TestMail;
use Illuminate\Http\Request;


class OrdersController extends Controller
{
    public function index($companyId)
    {   $company = Company::find($companyId);
        $orderss = Orders::where('companyId',$companyId)->get() ;
        return view('clients.orders.index', ['orderss' => $orderss, 'company' => $company]);
    }

    public function create($id)
    {
        return view('clients.orders.create',['companyId' => $id]);
    }

    public function store(OrderRequest $request, $companyId)
    {
        $request->validated();

        $order = Orders::create([
            'companyId' => $companyId,
            'deliverDate' => $request['deliverDate'],
            'open' => true,
        ]);

        return redirect()->route('orders.show', $order->id );
    }

    public function show($id)
    {
        $order = Orders::find($id);
        $company = Company::find($order->companyId);
        $ordersArticles = Orders::getArticles($id);

        return view('clients.orders.show',['orders' => $order, 'ordersArticles'=>$ordersArticles, 'company' => $company]);
    }



    public function change($id)
    {
        $orders = Oders::where('id','=', $id)->first();

        return view('clients.orders.update',['orders' => $orders, 'id'=> $id]);
    }

    public function update($id)
    {

        $orders = Orders::find($id);
        Orders::calcTotal($id);
        $orders->open = false;

        $orders->save();
        Company::calcDebt($orders->companyId);
        Orders::orderSave($orders);

        return redirect()->route('orders.show', $id );
    }

    public function delete($id, $companyId)
    {
        $orders = Orders::where('id','=', $id)->first();
        $orders->delete();
        return redirect()->route('orders', $companyId);
    }
}
