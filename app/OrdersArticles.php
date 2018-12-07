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
        'number', 'orderId', 'articleId'
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
            ->select( '*','orders_articles.id as id' )->first();

        return $item;
    }

    static function plus ($id, $number, $orderId)
    {
        $orderArticle = OrdersArticles::find($id);
            $orderArticle->number += $number;
            $orderArticle->save();
        Orders::calcTotal($orderId);
    }



}
