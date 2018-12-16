<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Genaral;
use App\Article;
use App\Http\Requests\AdminOrderArticleRequest;
use App\Orders;
use App\OrdersArticles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class OrdersArticlesController extends Controller
{
    public function index()
    {
        $all = Genaral::index('orders_articles');
        $table='Detalles de Pedidos';
        $route='ordersArticles';
        return view('admin.layouts.generalViewIndex', ['route'=>$route,'items' => $all['items'],'camps' => $all['camps'], 'table'=>$table]);
    }

    public function create($orderId)
    {
        $articles = Article::orderBy('name','asc')->pluck('name','id');
        return view('admin.ordersArticles.create',['articles'=>$articles,'orderId'=>$orderId]);
    }

    public function store(AdminOrderArticleRequest $request,$orderId)
    {


        if ($ordersArticles = OrdersArticles::where('articleId', $request['articleId'] )->where('orderId', $orderId)->first()){
            OrdersArticles::plus($ordersArticles->id, $request['number'], $orderId, 'plus');
            return redirect()->route('admin.orders.change',['id'=>$orderId]);
        }

        $item = OrdersArticles::create([
            'articleId' => $request['articleId'],
            'orderId' => $orderId,
            'number' => $request['number'],
            'prepare' => $request['prepare'],
        ]);

        Article::stockcalc($item->articleId,$item->number,'less');
        Orders::calcTotal($orderId);
        return redirect()->route('admin.orders.change',$orderId);
    }


    public function change($id)
    {
        $item = OrdersArticles::getArticle($id);

        $articles = Article::orderBy('name','asc')->pluck('name','id');

        return view('admin.ordersArticles.update',['item' => $item, 'articles'=>$articles]);
    }

    public function update(AdminOrderArticleRequest $request,$id)
    {


        $item = OrdersArticles::find($id);
        $articleId = $item->articleId;
        $orderId = $item->orderId;
        $number=$item->number;
        if($item->number!=$request['number']):Orders::calcTotal($orderId);


            if($number<$request['number']) {

                Article::stockcalc($articleId,$request['number']-$number,'less');
            }
            if($number>$request['number']) {

                Article::stockcalc($articleId,$number-$request['number'],'plus');
            }

        endif;
        if ($item) {
            $item->update($request->all());
            return redirect()->route('admin.orders.change',['id'=>$orderId]);
        } else {
            return Utils::reportarError('Error al intentar editas la empresa');
        }

    }

    public function delete($id)
    {
        $item = OrdersArticles::find($id);
        $orderId = $item->orderId;
        Article::stockcalc($item->articleId,$item->number,'plus');
        $item->delete();
        Orders::calcTotal($orderId);

        return redirect()->route('admin.orders.change',['id'=>$orderId]);
    }

    public function restore($id)
    {
        $item = OrdersArticles::withTrashed()->find($id);
        $orderId = $item->orderId;
        OrdersArticles::onlyTrashed()->find($id)->restore();
        Article::stockcalc($item->articleId,$item->number,'less');
        Orders::calcTotal($orderId);

        return redirect()->route('admin.orders.change',['id'=>$orderId]);
    }
}
