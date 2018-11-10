<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdersArticles extends Model
{
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
}
