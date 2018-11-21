<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Genaral;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagementController extends Controller
{
    public function index()
    {
        $all = Genaral::index('managements');
        $table='Gestión';
        $route='managements';
        return view('admin.layouts.generalViewIndex', ['route'=>$route,'items' => $all['items'],'camps' => $all['camps'], 'table'=>$table]);
    }
}
