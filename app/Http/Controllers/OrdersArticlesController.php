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

    public function store(Request $request, $articleId, $ordersId)
    {
        \request()->validate([
            'number'=> 'numeric|required',
        ]);
        //si ya existe un orderarticle se lo suma
        if ($ordersArticles = OrdersArticles::where('articleId', $articleId )->where('orderId', $ordersId)->first()){

            return redirect()->route('ordersArticles.plusLess', [$ordersArticles->id, $request['number'], $ordersId, 'plus']);
        }

        OrdersArticles::create([
            'articleId' => $articleId,
            'orderId' => $ordersId,
            'number' => $request['number'],
        ]);

        Article::stockcalc($articleId,$request['number'],'less');

        $company = Orders::find($ordersId);

        Orders::calcTotal($ordersId);

        return redirect()->route('orders.show', $company->id );
    }

    public function plusLess ($id, $number, $ordersId,$operation)
    {

        OrdersArticles::plussOrLess($id, $number, $ordersId,$operation);

        return redirect()->route('orders.show', $ordersId);

    }
    public function delete($id, $ordersId)
    {

        $ordersArticles = OrdersArticles::find($id);
        Article::stockcalc($ordersArticles->articleId,$ordersArticles->number,'plus');
        $ordersArticles->delete();

        Orders::calcTotal($ordersId);
        return redirect()->route('orders.show', $ordersId);
    }


}
