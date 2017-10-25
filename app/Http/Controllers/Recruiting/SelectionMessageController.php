<?php

namespace App\Http\Controllers\Recruiting;

use App\Models\Recruiting\Selection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class SelectionMessageController extends Controller
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
    public function create(Selection $selection)
    {
        // Get users
        if(request('recipients'))   {

            $users = User::whereIn('id', explode(',', request('recipients')))->get();

            if(request()->ajax())   {

                return response()->json(['users' => $users, 'selection' => $selection]);
            }

            return view('app.selections.messages.send', compact('selection', 'users'));
            
        }
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
     * @param  \App\Models\Recruiting\Selection  $selection
     * @return \Illuminate\Http\Response
     */
    public function show(Selection $selection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recruiting\Selection  $selection
     * @return \Illuminate\Http\Response
     */
    public function edit(Selection $selection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recruiting\Selection  $selection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Selection $selection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recruiting\Selection  $selection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Selection $selection)
    {
        //
    }
}
