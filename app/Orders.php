<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Orders extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
         'companyId', 'deliverDate'
    ];

    public function OrdersArticles()
    {
        return $this->hasMany(OrdersArticles::class,'orderId');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'companyId');
    }

    static function orderSave($orders)
    {
        $company = Company::find($orders->companyId);
        $user = User::find($company->userId);
        $data = [
            'companyName' => $company->name,
            'orders' => $orders->id,
            'email'=> $company->email,
            'userName' => $user->name,
        ];

        Mail::send('emails.notification', $data, function($msg) use ($data) {
            $msg->from('c4c0t4s@gmail.com', 'Pato Cuack');
            $msg->to($data['email'])->subject('Pedido realizado');
        });

    }

    static function calcTotal($id)
    {
        $order = Orders::where('orders.id', $id)
            ->join('orders_articles','orders.id','=','orders_articles.orderId')
            ->join('articles','orders_articles.articleId','=','articles.id')
            ->select(DB::raw('SUM(orders_articles.number*articles.price) as total'))->first();
        $total = $order->total;

        $orders = Orders::find($id);
        $orders->total = $total;
        $orders->save();

        return true;
    }

    static function getArticles($id, $delete=false)
    {
        if($delete){
            $ordersArticles = OrdersArticles::withTrashed()->where('orderId', $id)
                ->join('articles','orders_articles.articleId','=','articles.id')
                ->select('*','orders_articles.id as id',
                    'orders_articles.deleted_at as deleted_at',
                    'orders_articles.updated_at as updated_at',
                    'orders_articles.created_at as created_at')->get();
        }else{
            $ordersArticles = OrdersArticles::where('orderId', $id)
                ->join('articles','orders_articles.articleId','=','articles.id')
                ->select('*','orders_articles.id as id',
                    'orders_articles.deleted_at as deleted_at',
                    'orders_articles.updated_at as updated_at',
                    'orders_articles.created_at as created_at')->get();
        }

        return $ordersArticles;
    }
}
