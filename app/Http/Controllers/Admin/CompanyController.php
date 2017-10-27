<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Company;
use App\Models\Company\Recruiter;

class CompanyController extends Controller
{
    public function index()	{

    	$companies = Company::all();

    	return view('admin.companies.index', compact('companies'));
    }

    public function show(Company $company)	{

    	return view('admin.companies.view', compact('company'));
    }

    public function store(Request $request)	{

    	$company = Company::create([
    					'name' => $request->name,
    				]);

    	return back()->with('message', $company->name . ' created.');
    }

    public function update(Request $request, Company $company)	{

    	$company->update($request->all());

    	return back()->with('message', $company->name . ' updated.');
    }
}