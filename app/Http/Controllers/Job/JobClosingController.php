<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Job\Job;

class JobClosingController extends Controller
{
     
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Job $job)
    {

        $applications = ['qualified' => [], 'eliminated' => []];

        $job->applications()->get()->each( function($application) use ($applications) {

            if($application->status == 666)   {

                $applications['eliminated'][] = $application;
            }
            else {

                $applications['qualified'][] = $application;
            }
        });

        $applications = (object) $applications;

        return view('app.jobs.close.index', compact('job', 'applications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        // Dispatches the events
        
            // Job closed
            event(new \App\Events\JobClosed($job));

            // Candidates qualified
            if(count($request->input('qualified.applications')) > 0)   {

                event(new \App\Events\ApplicantsQualified($request->input('qualified.applications'), 1, $request->input('qualified.message')));
            }

            // Candidates eliminated
            if(count($request->input('eliminated.applications')) > 0)   {

                event(new \App\Events\ApplicantsEliminated($request->input('eliminated.applications'), $request->input('eliminated.message')));    
            }
            

            if(request()->ajax())   {

                return response()->json($job);
            }

            return redirect('/selection/' . $job->selection->id)->with('message', 'Job closed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
