<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Data\Position;
use App\Models\Data\ShipType;
use App\Models\Data\StcwRegulation;
use App\Models\Data\SeamanBookType;
use App\Models\Data\CertificateType;
use App\Models\Data\Language;

use App\Models\Job;
use App\Models\Company;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = auth()->user()->company()->first()->jobs()->withCount('applications')->get();

        if(request()->ajax())   {

            return response()->json($jobs->load('position'));
        }

        return view('app.jobs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $positions = Position::all();
        $ship_types = ShipType::all();

        return view('app.jobs.add', compact('positions', 'ship_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['position_id' => 'required']);

        $job = new Job;
        
        $job->position_id = $request->input('position_id');
        $job->company_id = auth()->user()->company_id;
        $job->recruiter_id = auth()->user()->recruiter->id;
        $job->ship_type_id = $request->input('ship_type_id');
        
        $job->save();

        event(new \App\Events\JobCreated($job));

        return redirect('/job/' . $job->id . '/edit')->with('message','Vaga adicionada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        if(request()->ajax())   {

            $job->load(['ship_types.ship_type', 'languages.language', 'experiences', 'requirements', 'seaman_book_types.seaman_book_type', 'stcw_regulations.stcw_regulation', 'certificate_types.certificate_type', 'benefits', 'ship_type', 'position']);

            return response()->json($job);
        }

        return view('app.jobs.view', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        
        $positions = Position::all();
        $ship_types = ShipType::all();

        $stcw_regulations = StcwRegulation::all();
        $seaman_book_types = SeamanBookType::all();
        $certificates = CertificateType::all();

        return view('app.jobs.edit', compact('job', 'positions', 'ship_types', 'stcw_regulations', 'seaman_book_types', 'certificates'));
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
        $job->update($request->all());

        return redirect('/job/' . $job->id)->with('message', 'Job updated');
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
