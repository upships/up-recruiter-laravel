<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Job\Job;

class JobApplicationController extends Controller
{
    public function index(Job $job)  {

        $applications = $job->applications()->get();

        return response()->json($applications);
    }
}
