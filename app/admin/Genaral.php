<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Genaral extends Model
{
    static function index($table,$num=10)
    {
        $items = DB::table($table)->orderBy('updated_at','desc')->paginate($num);
        $camps = DB::table($table)->first();
        $camps = collect($camps)->toArray();
        return ['items'=>$items,'camps'=>$camps];
    }
}
