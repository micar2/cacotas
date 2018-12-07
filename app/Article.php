<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function OrdersArticles()
    {
        return $this->hasMany(OrdersArticles::class,'articleId');
    }

    static function paginate($table,$camp,$data,$howMany=10,$page=1)
    {

        $skip = $howMany*$page- $howMany;
        $items = DB::table($table)->where($camp, 'LIKE', '%'.$data.'%')->take($howMany)->skip($skip)->get();
        $count= DB::table($table)->where($camp, 'LIKE', '%'.$data.'%')->count();
        if ($count+$howMany-1 < $howMany*$page){
            return false;
        }

        return ['count'=>$count,'items'=>$items];
    }
    static function stockcalc($articleId, $number, $operation)
    {
        if($operation=='plus'){
            $article = Article::find($articleId);
            $article->stock += $number;
        }
        if($operation=='less'){
            $article = Article::find($articleId);
            $article->stock -= $number;
        }
        $article->save();
    }
}
