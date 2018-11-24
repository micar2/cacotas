<?php

namespace App\Http\Controllers;

use App\Article;
use App\Company;
use App\Orders;
use App\OrdersArticles;
use Illuminate\Http\Request;

class OrdersArticlesController extends Controller
{
    public function create($id)
    {
        $articles = Article::orderBy('name', 'asc')->paginate(12);
        $count = Article::all()->count();

        return view('clients.article.index',['ordersId' => $id, 'count' => $count, 'articles' =>$articles]);
    }
//    public function create($id)
//    {
//        $articles = Article::orderBy('name', 'asc')->paginate(12);
//        $count = Article::all()->count();
//
//        return view('clients.article.index',['ordersId' => $id, 'count' => $count, 'articles' =>$articles]);
//    }

    public function store(Request $request, $articleId, $ordersId)
    {
        //si ya existe un orderarticle se lo suma
        if ($ordersArticles = OrdersArticles::where('articleId', $articleId )->where('orderId', $ordersId)->first()){

            return redirect()->route('ordersArticles.plusLess', [$ordersArticles->id, $request['number'], $ordersId, 'plus']);
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


        Orders::calcTotal($ordersId);

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
            if ($orderArticle->number<=0){
                return redirect()->route('ordersArticles.delete',[$id, $ordersId]);
            }
            $orderArticle->save();
        }

        Orders::calcTotal($ordersId);
        return redirect()->route('orders.show', $ordersId);

    }
    public function delete($id, $ordersId)
    {
        $ordersArticles = OrdersArticles::find($id);
        $ordersArticles->delete();
        Orders::calcTotal($ordersId);
        return redirect()->route('orders.show', $ordersId);
    }


}
