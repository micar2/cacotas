<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    static function paginate($table,$camp,$data,$howMany=10,$page=1)
    {

        $skip = $howMany*$page- $howMany;
        $items = DB::table($table)->where($camp, 'LIKE', '%'.$data.'%')->take($howMany)->skip($skip)->get();
        $count= DB::table($table)->where($camp, 'LIKE', '%'.$data.'%')->count();
        if ($count+$howMany-1 < $howMany*$page){
            return 
        }

        return ['count'=>$count,'items'=>$items];
    }
}
