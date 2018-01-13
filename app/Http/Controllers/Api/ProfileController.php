<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class ProfileController extends Controller
{
    public function show(Request $request)	{

      return response()->json($request->user()->profile->load(config('profile.load')));
    }

    public function update(Request $request)  {

      $inputs = $request->all();

      // Checks if birthday is an array, and if it is, extracts the first value
      if(is_array($request->input('birthday'))) {
        $inputs['birthday'] = $inputs['birthday'][0];
      }

      $profile = $request->user()->profile;

      $profile->update($inputs);

      switch($request->query('mode')) {
        case 'onboarding':
          $profile->registration_step++;
          $profile->save();
        break;

        case 'finishOnboarding':
          $profile->registration_step = 10;
          $profile->save();
        break;
      }

      return response()->json($profile->load(config('profile.load')));
    }
}
