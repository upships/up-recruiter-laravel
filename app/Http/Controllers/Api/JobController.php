<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Job;
use App\Models\Company;

class JobController extends Controller
{

    public function index(Company $company)	{

      return response()->json($company->jobs->load(['position']));
    }

    public function show(Job $job)	{

    	return response()->json($job);
    }
}
