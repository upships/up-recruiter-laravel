<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Data\Position;
use App\Models\Data\ShipType;
use App\Models\Data\StcwRegulation;
use App\Models\Data\SeamanBookType;
use App\Models\Data\Training;

use App\Models\Job\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        return redirect('/job/' . $job->id)->with('message','Vaga adicionada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
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
        $trainings = Training::all();

        return view('app.jobs.edit', compact('job', 'positions', 'ship_types', 'stcw_regulations', 'seaman_book_types', 'trainings'));
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

        return redirect('/job/' . $job->id);
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
