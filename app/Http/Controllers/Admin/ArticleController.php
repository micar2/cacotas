<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Genaral;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $all = Genaral::index('articles');
        $table='Articulos';
        $route='articles';
        return view('admin.layouts.generalViewIndex', ['route'=>$route,'items' => $all['items'],'camps' => $all['camps'], 'table'=>$table]);
    }

    public function change($id)
    {
        $item = Article::find($id);

        return view('admin.articles.update',['article' => $item]);
    }

    public function update(Request $request,$id)
    {
        $item = Article::find($id);

        if ($item) {

            $item->update($request->all());

            return redirect()->route('admin.articles.show');
        } else {
            return Utils::reportarError('Error al intentar editas la empresa');
        }

    }

    public function delete($id)
    {
        Article::find($id)->delete();

        return redirect(route('admin.articles.show'));
    }

    public function restore($id)
    {
        Article::onlyTrashed()->find($id)->restore();

        return redirect(route('admin.articles.show'));
    }
}
