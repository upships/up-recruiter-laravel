<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Job\Job;

class JobApplicationController extends Controller
{
    public function index(Job $job)  {

        $applications = $job->applications()->with(['profile','profile.coc', 'profile.seaman_book_types', 'profile.languages', 'profile.dp', 'profile.ships'])->get();

        return response()->json($applications);
    }
}
