<?php

namespace App\Http\Controllers;

use App\Article;
use App\Company;
use App\Orders;
use App\OrdersArticles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index($id)
    {   $company = Company::find($id);
        $orderss = Orders::where('userId','=', Auth::id())->get();
        return view('clients.orders.index', ['orderss' => $orderss, 'company' => $company]);
    }

    public function create($id)
    {
        return view('clients.orders.create',['companyId' => $id]);
    }

    public function store(Request $request, $companyId)
    {
        $order = Orders::create([
            'userId' => Auth::id(),
            'companyId' => $companyId,
            'deliverDate' => $request['deliverDate'],
            'open' => true,
        ]);

        return redirect()->route('orders.show', $order->id );
    }

    public function show($id)
    {
        $articles = [];
        $order = Orders::find($id);
        //para algunos pedidos detalles no funciona el $company, da null//
        $company = Company::find($order->companyId);
        $ordersArticles = OrdersArticles::where('orderId', $id)->get();
        foreach ($ordersArticles as $ordersArticle){
            $article =Article::find($ordersArticle->articleId);
            $camps = array_keys($article->toArray());
            foreach ($camps as $camp){
                if ($camp != 'id' || $camp != 'deleted_at'|| $camp != 'created_at'|| $camp != 'updated_at'){
                    $ordersArticle = array_add($ordersArticle, $camp, $article->$camp);
                }
            }
        }
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
        $orders->open = false;
        $orders->save();

        return redirect()->route('orders.show', $id );
    }

    public function delete($id, $companyId)
    {
        $orders = Orders::where('id','=', $id)->first();
        $orders->delete();
        return redirect()->route('orders', $companyId);
    }
}
