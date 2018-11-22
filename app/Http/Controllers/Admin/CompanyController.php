<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Genaral;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{

    public function index()
    {
        $all = Genaral::index('companies');
        $table='Compañias';
        $route='companies';
        return view('admin.layouts.generalViewIndex', ['route'=>$route,'items' => $all['items'],'camps' => $all['camps'], 'table'=>$table]);
    }

    public function change($id)
    {
        dd($id);
    }

    public function delete($id)
    {
        $item = Company::find($id);
        $item->delete();
        return redirect(route('admin.companies.show'));
    }
}
