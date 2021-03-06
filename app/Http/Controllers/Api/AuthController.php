<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\Profile;

class AuthController extends Controller
{

    public function register(Request $request)	{

      $this->validate($request, [
                                  'name' => 'required|string|max:255',
                                  'email' => 'required|string|email|max:255|unique:users',
                                  'password' => 'required|string|min:6|confirmed'
                                ]);

      $user = User::create([
                            'name' => $request->input('name'),
                            'email' => $request->input('email'),
                            'password' => bcrypt($request->input('password')),
                          ]);

      $profile = Profile::make();

      $user->profile()->save($profile);

      return response()->json($user);
    }
}
