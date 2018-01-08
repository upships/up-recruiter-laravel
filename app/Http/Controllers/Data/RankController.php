<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Data\Rank;

class RankController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $ranks = Rank::all();

      if(request()->ajax())    {

          return response()->json($ranks);
      }

      return view('app.data.ranks', compact('ranks'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $item = Rank::create($request->all());

      if($request->ajax())    {

          return response()->json($item);
      }

      return back()->with('message', 'Success');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Rank $rank)
  {
      return view('app.data.ranks.view', compact('rank'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Rank $rank)
  {
      return view('app.data.ranks.edit', compact('rank'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Rank $rank)
  {
      $rank->delete();

      if(request()->ajax())    {

          return response()->json(['success' => true]);
      }

      return redirect('/data/rank')->with('message', 'Rank deleted');
  }
}
