<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Company;

class CompanyController extends Controller
{
    
    public function index()	{

    }

    public function show(Company $company)	{

    	return response()->json($company->load(['careers_page']));
    }
}
