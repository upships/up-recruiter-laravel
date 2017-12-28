<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function() {

  Route::get('/user', function (Request $request) {
      return $request->user();
  });

});

Route::post('/auth/register', 'Api\AuthController@register');

Route::get('/company/{company}', 'Api\CompanyController@show');
Route::get('/company/{company}/jobs', 'Api\JobController@index');
Route::get('/job/{job}', 'Api\JobController@show');
