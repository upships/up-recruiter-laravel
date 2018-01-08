<?php

namespace App\Http\Controllers\Api\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Profile\Coe;

class CoeController extends Controller
{
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $profile = $request->user()->profile;
      $coe = Coe::make($request->all());
      $profile->coes()->save($coe);

      $profile = $request->user()->profile;

      return response()->json($profile->load(config('profile.load')));
  }

}
