<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\CompanyUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::where('userId','=', Auth::id())->get();

        return view('clients.company.index', ['companies' => $companies]);
    }

    public function create()
    {
        return view('clients.company.create');
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
            'userId' => Auth::id(),
        ]);
       return redirect()->route('company');
    }

    public function change($id)
    {
        $company = Company::where('id','=', $id)->first();

        return view('clients.company.update',['company' => $company, 'id'=> $id]);
    }

    public function update(CompanyUpdateRequest $request,$id)
    {
        $company = Company::where('id','=', $id)->first();
        $request->validated();
        if ($company) {
            $company->update($request->all());
            return redirect()->route('company');
        } else {
            return Utils::reportarError('Error al intentar editas la empresa');
        }

    }

    public function delete($id)
    {
        $company = Company::find($id);
        $company->delete();

        return redirect()->route('company');

    }


}
