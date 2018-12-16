<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class OrdersArticles extends Model
{
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'number', 'orderId', 'articleId','prepare'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'articleId');
    }

    public function order()
    {
        return $this->belongsTo(Orders::class, 'orderId');
    }

    static function getArticle($id)
    {
        $item = DB::table('orders_articles')->where('orders_articles.id','=',$id)
            ->join('articles', 'orders_articles.articleId','=','articles.id')
            ->select( '*','orders_articles.id as id',
                'orders_articles.deleted_at as deleted_at',
                'orders_articles.updated_at as updated_at',
                'orders_articles.created_at as created_at' )->first();

        return $item;
    }

    static function plus ($id, $number, $orderId)
    {
        $orderArticle = OrdersArticles::find($id);
            $orderArticle->number += $number;
            $orderArticle->save();
        Orders::calcTotal($orderId);
    }

    static function plussOrLess($id, $number, $ordersId,$operation)
    {
        $orderArticle = OrdersArticles::find($id);
        if ($operation=='plus'){
            Article::stockcalc($orderArticle->articleId,$number,'less');
            $orderArticle->number += $number;
            $orderArticle->save();

        }
        if ($operation=='less'){
            Article::stockcalc($orderArticle->articleId,$number,'plus');
            $orderArticle->number -= $number;
            if ($orderArticle->number<=0){
                return redirect()->route('ordersArticles.delete',[$id, $ordersId]);
            }
            $orderArticle->save();
        }

        Orders::calcTotal($ordersId);
    }



}
