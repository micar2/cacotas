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
        'name', 'email', 'address', 'telephone', 'debt','schedule', 'userId'
    ];

    public function Orders()
    {
        return $this->hasMany(Orders::class,'companyId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    static function calcDebt ($id)
    {
        $companyDebt = Company::where('companies.id','=',$id)->join('orders', 'companies.id','=','orders.companyId')
            ->where('orders.charged','=',false)
            ->where('orders.open','=',false)
            ->select(DB::raw('SUM(orders.total) as debt'))->first();
        $debt = $companyDebt->debt;

        $company = Company::find($id);
        $company->debt = $debt;
        $company->save();

        return true;
    }

    static function getCompanyWithOrder($orderId)
    {
        $company = Company::join('orders','companies.id','=','orders.companyId')->where('orders.id','=',$orderId)
            ->select('*','companies.id as id',
                'companies.deleted_at as deleted_at',
                'companies.updated_at as updated_at',
                'companies.created_at as created_at')->first();

        return $company;
    }

}
