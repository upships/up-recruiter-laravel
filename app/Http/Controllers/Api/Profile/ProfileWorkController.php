<?php

namespace App\Http\Controllers\Api\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Profile\ProfileWork;
use App\Models\Profile\ProfileShip;

class ProfileWorkController extends Controller
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
         $profile = $request->user()->profile;
         $basic = $request->input('work.basic');
         $ship = $request->input('work.ship');

         $item = ProfileWork::make($basic);
         $profile->works()->save($item);

         // Add ship
         if($request->input('work.ship')) {

           $workShip = ProfileShip::make($ship);
           $workShip->profile_id = $profile->id;

           $item->ships()->save($workShip);
         }

         $profile = $request->user()->profile;

         return response()->json($profile->load(config('profile.load')));
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
