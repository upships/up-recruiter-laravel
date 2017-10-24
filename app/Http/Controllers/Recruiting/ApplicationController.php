<?php

namespace App\Http\Controllers\Recruiting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Recruiting\Application;
use App\Models\Recruiting\Selection;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Selection $selection)
    {
        $applications = $selection->applications()->with(['profile.position','profile.coc', 'profile.seaman_book_types.seaman_book_type', 'profile.languages.language', 'profile.dp.dp_type', 'profile.ships.ship_type', 'profile.stcw_regulations.stcw_regulation', 'profile.certificates.certificate_type'])->get();

        return response()->json($applications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        if(request()->ajax())   {

            return response()->json($application->load(['profile.position','profile.coc', 'profile.seaman_book_types.seaman_book_type', 'profile.languages.language', 'profile.dp.dp_type', 'profile.ships.ship_type', 'profile.stcw_regulations.stcw_regulation', 'profile.certificates.certificate_type']));

        }

        return view('app.applications.view', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        $application->update($request->all());

        return response()->json($application);
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
