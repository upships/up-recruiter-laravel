<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Job\Job;

class JobApplicationController extends Controller
{
    public function index(Job $job)  {

        $applications = $job->applications()->with(['profile.position','profile.coc', 'profile.seaman_book_types.seaman_book_type', 'profile.languages.language', 'profile.dp.dp_type', 'profile.ships.ship_type', 'profile.stcw_regulations.stcw_regulation', 'profile.certificates.certificate_type'])->get();

        return response()->json($applications);
    }
}
