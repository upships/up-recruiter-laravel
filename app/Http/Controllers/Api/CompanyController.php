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

      // Load jobs
      $company->load(['careers_page']);
      $company->newest_jobs = \App\Models\Job::where([['company_id', '=', $company->id], ['status', '=', 1]])->orderBy('created_at', 'desc')->take(5)->with('position')->get();

    	return response()->json($company);
    }
}
