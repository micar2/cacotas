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

    public function change($id)
    {
        $item = OrdersArticles::getArticle($id);
        $articles = Article::pluck('name','id');

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
        $item->delete();
        return redirect(route('admin.ordersArticles.show'));
    }

    public function restore($id)
    {
        $company = OrdersArticles::onlyTrashed()->find($id)->restore();

        return redirect(route('admin.ordersArticles.show'));
    }
}
