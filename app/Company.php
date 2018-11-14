<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'email', 'address', 'telephone', 'debt','schedule', 'userId', 'open'
    ];

    public function Orders()
    {
        return $this->hasMany(Orders::class,'companyId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    static function calcDebt ($orderId)
    {
        $company = Orders::find($orderId)->company;
        $orders = $company->orders;
        $orders2 = Orders::where('companyId',$company->id)->get();
        $total = Orders::where('orders.id', $orderId)
            ->join('orders_articles','orders.id','=','orders_articles.orderId')
            ->join('articles','orders_articles.articleId','=','articles.id')
            ->select(DB::raw('SUM(orders_articles.number*articles.price)'))->get();
        dd($total,$company,$orders,$orders2);
        $orders = Orders::where('charged', false)->where('companyId', $company->id)->get();



    }

}
