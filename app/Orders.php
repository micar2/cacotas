<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;

class Orders extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
         'companyId', 'deliverDate'
    ];

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
}
