<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Genaral;
use App\Company;
use App\Http\Requests\CompanyRequest;
use App\User;
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

    public function create()
    {
        $users = User::pluck('name','id');

        return view('admin.company.create',['users'=>$users]);
    }

    public function store(CompanyRequest $request)
    {
        $request->validated();

        Company::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'telephone' => $request['telephone'],
            'schedule' => $request['schedule'],
            'address' => $request['address'],
            'userId' => $request['userId'],
        ]);
        return redirect()->route('admin.companies.show');
    }

    public function change($id)
    {
        $item = Company::find($id);

        return view('admin.company.update',['item' => $item]);
    }

    public function update(CompanyUpdateRequest $request,$id)
    {
        $request->validated();
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
