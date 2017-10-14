<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobApplicationController extends Controller
{
    public function index(Job $job)  {

        $applications = $job->applications();

        return request()->json($applications);
    }
}
