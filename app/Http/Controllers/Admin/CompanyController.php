<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        $camps = Company::find(1);
        $camps= collect($camps)->toArray();


        return view('admin.company.index', ['companies' => $companies,'camps' => $camps]);
    }
}
