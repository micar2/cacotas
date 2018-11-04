<?php

namespace App\Http\Controllers;

use App\Company;
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

    public function store(Request $request)
    {
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

    public function update(Request $request,$id)
    {

        $company = Company::where('id','=', $id)->first();

        if ($company) {
            $company->update($request->all());
            return redirect()->route('company');
        } else {
            return Utils::reportarError('Error al intentar editas la empresa');
        }

    }

    public function delete($id)
    {

        $company = Company::where('id','=', $id)->first();
        
        $company->delete();

        return redirect()->route('company');


    }


}
