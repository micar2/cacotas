<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Genaral;
use App\Article;
use App\OrdersArticles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

    public function store(Request $request,$orderId)
    {

        $request['orderId']=$orderId;
        if ($request['prepare']==1){
            $request['prepare']=true;
        }else{
            $request['prepare']=false;
        }
        $orderArticle = new OrdersArticles($request->all());
        $orderArticle->save();

//        OrdersArticles::create([
//            'articleId' => $request['articleId'],
//            'orderId' => $orderId,
//            'number' => $request['number'],
//            'prepare' => $request['prepare'],
//        ]);
        return redirect()->route('admin.orders.change',$orderId);
    }


    public function change($id)
    {
        $item = OrdersArticles::getArticle($id);

        $articles = Article::orderBy('name','asc')->pluck('name','id');

        return view('admin.ordersArticles.update',['item' => $item, 'articles'=>$articles]);
    }

    public function update(Request $request,$id)
    {
        $item = OrdersArticles::find($id);

        if ($item) {

            $item->update($request->all());

            return redirect()->route('admin.ordersArticles.show');
        } else {
            return Utils::reportarError('Error al intentar editas la empresa');
        }

    }

    public function delete($id)
    {
        $item = OrdersArticles::find($id);
        $orderId = $item->orderId;
        $item->delete();

        return redirect(route('admin.orders.change',['orderId'=>$orderId]));
    }

    public function restore($id)
    {
        $company = OrdersArticles::onlyTrashed()->find($id)->restore();

        return redirect(route('admin.ordersArticles.show'));
    }
}
