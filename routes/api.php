<?php

use Illuminate\Http\Request;

/**
*
* Basic Authenticated API routes
*
*/

Route::group(['middleware' => 'auth:api'], function() {

  Route::get('user', 'Api\UserController@show');
});

/**
*
* Profile API routes
*
*/

Route::group(['middleware' => 'auth:api', 'prefix' => 'profile'], function() {

  Route::get('/', 'Api\ProfileController@show');
  Route::patch('/', 'Api\ProfileController@update');

  Route::patch('phone', 'Api\Profile\PhoneController@update');
  Route::patch('validate_phone', 'Api\Profile\PhoneController@verify');

  Route::get('education', 'Api\Profile\ProfileEducationController@index');

  Route::patch('coc', 'Api\Profile\CocController@update');

  /* Items */

  Route::post('coe', 'Api\Profile\CoeController@store');
  Route::post('seaman_book', 'Api\Profile\SeamanBookController@store');
  Route::post('dp', 'Api\Profile\DpController@store');
  Route::post('work', 'Api\Profile\ProfileWorkController@store');
  Route::post('certificate', 'Api\Profile\ProfileCertificateController@store');
  Route::post('education', 'Api\Profile\ProfileEducationController@store');
  Route::post('language', 'Api\Profile\ProfileLanguageController@store');
  Route::post('passport', 'Api\Profile\PassportController@store');
  Route::post('visa', 'Api\Profile\VisaController@store');
  Route::post('document', 'Api\Profile\ProfileDocumentController@store');
  Route::post('coc/stcw_regulation', 'Api\Profile\CocStcwRegulationController@store');

});

Route::post('/auth/register', 'Api\AuthController@register');

/**
*
* Misc API routes
*
*/

Route::get('/company/{company}', 'Api\CompanyController@show');
Route::get('/company/{company}/jobs', 'Api\JobController@index');
Route::get('/job/{job}', 'Api\JobController@show');

Route::group(['prefix' => 'data'], function() {

  Route::get('ranks', 'Api\DataController@ranks');
});
