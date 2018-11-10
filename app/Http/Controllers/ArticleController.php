<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function search(Request $request , $ordersId,$page=1)
    {
        $articles=Article::paginate('articles', $request['selection'],$request['text'],4,$page);
           // $articles=Article::where($request['selection'],'LIKE','%'.$request['text'].'%')->orderBy('name', 'asc')->take(5)->get();

//        if ($request['description']=='select' && $request['name']=='select'){
//            $articles=Article::where('name','LIKE','%'.$request['text'].'%')->where('description','LIKE','%'.$request['text'].'%')->orderBy('name', 'asc')->paginate(12);
//        }
//        $count = $articles->count();


        return view('clients.article.search',['ordersId' => $ordersId, 'count' => $articles['count'], 'articles' =>$articles['items'],'page'=>$page, 'selection'=>$request['selection'], 'text' => $request['text']]);
    }
//    public function pagination($camp,$data,$howMany,$page,$ordersId)
//    {
//        $articles=Article::paginate('articles',$camp,$data,$howMany,$page);
//        return view('clients.article.search',['ordersId' => $ordersId, 'count' => $articles['count'], 'articles' =>$articles['items'], 'page'=>$page]);
//    }
}
