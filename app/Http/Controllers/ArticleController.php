<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function search(Request $request , $ordersId)
    {

        $articles=Article::paginate('articles', $request['selection'],$request['text']);
//        if ($request['selection']=='name'){
//            $articles=Article::where('name','LIKE','%'.$request['text'].'%')->orderBy('name', 'asc')->paginate(12);
//        }
//        if ($request['selection']=='description'){
//            $articles=Article::where('description','LIKE','%'.$request['text'].'%')->orderBy('name', 'asc')->paginate(12);
//        }
////        if ($request['description']=='select' && $request['name']=='select'){
////            $articles=Article::where('name','LIKE','%'.$request['text'].'%')->where('description','LIKE','%'.$request['text'].'%')->orderBy('name', 'asc')->paginate(12);
////        }
//        $count = $articles->count();

        return view('clients.article.index',['ordersId' => $ordersId, 'count' => $articles['count'], 'articles' =>$articles['items']]);
    }
}
