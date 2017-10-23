<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Job\Job;

class JobApplicationController extends Controller
{
    public function index(Job $job)  {

        $applications = $job->applications()->with(['profile','profile.coc', 'profile.books', 'profile.languages', 'profile.dp'])->get();

        return response()->json($applications);
    }
}
