<?php

namespace App\Http\Controllers\Api\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class PhoneController extends Controller
{
    public function update(Request $request)  {

      $this->validate($request, ['phone' => 'required', 'country_id' => 'required|integer']);

      $user = $request->user();

      $code = mt_rand(100000,999999);
      $user->phone = $request->input('phone');
      $user->phone_country = $request->input('country_id');
      $user->phone_code = $code;
      $user->save();

      $responseData = ['code' => $code];

      return response()->json($responseData);
    }

    public function verify(Request $request)  {

      $this->validate($request, ['code' => 'required']);

      $user = $request->user();

      if($request->input('code') === $user->phone_code)  {

        $user->phone_code = null;
        $user->phone_verified = true;
        $user->save();

        return response()->json(['success' => true]);
      }

      abort(422, 'Verification code does not match!');
    }
}
