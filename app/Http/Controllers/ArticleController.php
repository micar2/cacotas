<?php

namespace App\Http\Controllers;

use App\Article;
use App\Rules\NameOrDescription;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function search(Request $request , $ordersId,$page=1)
    {
//        \request()->validate([
//            'text'=>'require',
//            'selection'=>['require', new NameOrDescription()],
//        ]);
        $articles=Article::paginate('articles', $request['selection'],$request['text'],4,$page);

        return view('clients.article.search',['ordersId' => $ordersId, 'count' => $articles['count'], 'articles' =>$articles['items'],'page'=>$page, 'selection'=>$request['selection'], 'text' => $request['text']]);
    }

    public function show()
    {
        return view('clients.article.vue');
    }

    public function all()
    {
        $articles = Article::all()->get();
        return $articles;
    }
}
