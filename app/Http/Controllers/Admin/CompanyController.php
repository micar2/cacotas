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
        $item = Company::find($id);

        return view('admin.company.update',['item' => $item]);
    }

    public function update(Request $request,$id)
    {
        $item = Company::find($id);

        if ($item) {

            $item->update($request->all());

            return redirect()->route('admin.companies.show');
        } else {
            return Utils::reportarError('Error al intentar editas la empresa');
        }

    }

    public function delete($id)
    {
        $item = Company::find($id);
        $item->delete();
        return redirect(route('admin.companies.show'));
    }

    public function restore($id)
    {
        $company = Company::onlyTrashed()->find($id)->restore();

        return redirect(route('admin.companies.show'));
    }
}
