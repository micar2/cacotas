<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Genaral;
use App\Article;
use App\Http\Requests\AdminArticleCreateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Monolog\Utils;

class ArticleController extends Controller
{
    public function index()
    {
        $all = Genaral::index('articles');
        $table='Articulos';
        $route='articles';
        return view('admin.layouts.generalViewIndex', ['route'=>$route,'items' => $all['items'],'camps' => $all['camps'], 'table'=>$table]);
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(AdminArticleCreateRequest $request)
    {

        $request->validated();

        Article::create([
            'name' => $request['name'],
            'reference' => $request['reference'],
            'price' => $request['price'],
            'stock' => $request['stock'],
            'description' => $request['description'],
        ]);
        return redirect()->route('admin.articles.show');
    }

    public function change($id)
    {
        $item = Article::find($id);

        return view('admin.article.update',['item' => $item]);
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
