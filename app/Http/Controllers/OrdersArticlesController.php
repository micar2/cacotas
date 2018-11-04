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
        if ($ordersArticles = OrdersArticles::where('articleId', $articleId )->where('orderId', $ordersId)->first()){
            return redirect()->route('ordersArticles.plusLess', [$ordersArticles->id, $ordersArticles->number, $ordersId, 'plus']);
        }
        OrdersArticles::create([
            'articleId' => $articleId,
            'orderId' => $ordersId,
            'number' => $request['number'],
        ]);

        $article = Article::find($articleId);
        $article->stock -= $request['number'];
        $article->save();

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
            return redirect()->route('ordersArticles.delete',[$id, $ordersId]);
        }
        return redirect()->route('orders.show', $ordersId);

    }
    public function delete($id, $ordersId)
    {
        $ordersArticles = OrdersArticles::find($id);

        $article = Article::find($ordersArticles->articleId);
        $article->stock += $ordersArticles->number;
        $article->save();

        $ordersArticles->delete();

        return redirect()->route('orders.show', $ordersId);
    }


}
