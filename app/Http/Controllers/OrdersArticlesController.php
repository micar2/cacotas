<?php

namespace App\Http\Controllers;

use App\Article;
use App\Orders;
use App\OrdersArticles;
use Illuminate\Http\Request;

class OrdersArticlesController extends Controller
{
    public function create($id)
    {
        $articles = Article::orderBy('name', 'asc')->take(20)->get();
        $count = Article::all()->count();
        return view('clients.article.index',['ordersId' => $id, 'count' => $count, 'articles' =>$articles]);
    }

    public function store(Request $request, $articleId, $ordersId)
    {
        OrdersArticles::create([
            'articleId' => $articleId,
            'orderId' => $ordersId,
            'number' => $request['number'],
        ]);

        $company = Orders::find($ordersId);


        return redirect()->route('orders.show', $company->id );
    }

    public function plusLess ($id, $number, $ordersId,$operation)
    {
        $orderArticle = OrdersArticles::find($id);
        if ($operation=='plus'){
            $orderArticle->number += $number;
            $orderArticle->save();
        }
        if ($operation=='less'){
            $orderArticle->number -= $number;
            $orderArticle->save();
        }
        if ($orderArticle->number<=0){
            $orderArticle->delete();
        }
        return redirect()->route('orders.show', $ordersId);

    }
    public function delete($id, $ordersId)
    {
        $ordersArticles = OrdersArticles::find($id);
        $ordersArticles->delete();
        return redirect()->route('orders.show', $ordersId);
    }


}
