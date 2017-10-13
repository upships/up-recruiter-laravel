<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'data', 'middleware' => 'auth'], function()	{



});

Route::group(['prefix' => 'api', 'middleware' => 'auth'], function()	{

	/**
	 *	Company data (API)
	 *
	 */

	Route::get('company/offices', 'Company\CompanyOfficeController@index');
	Route::get('company/phones', 'Company\CompanyPhoneController@index');
	Route::get('company/emails', 'Company\CompanyEmailController@index');

	/**
	 *	Crews (API)
	 *
	 */

	Route::get('crew/{crew}/members', 'Company\CrewMemberController@index');
	Route::post('crew/{crew}/members', 'Company\CrewMemberController@store');

	Route::delete('crew/{crew}/members', 'Company\CrewMemberController@destroy');

	/**
	 *	Jobs (API)
	 *
	 */

	Route::get('job', 'Job\JobController@index');
	Route::get('job/{job}', 'Job\JobController@show');
	Route::patch('job/{job}', 'Job\JobController@update');	// Returns the Request fields

	Route::post('job/{job}/feature', 'Job\JobFeatureController@store');
	Route::patch('job/{job}/feature', 'Job\JobFeatureController@update');
	Route::delete('job/{job}/feature', 'Job\JobFeatureController@destroy');

	/**
	 *	Job Applications (API)
	 *
	 */

	Route::get('job/{job}/applications', 'Job\JobApplicationController@index');
	Route::get('application/{application}', 'Recruiting\ApplicationController@show');
	Route::patch('application/{application}', 'Recruiting\ApplicationController@update');

	/**
	 *	Profiles (API)
	 *
	 */

	Route::get('profile', 'Profile\ProfileController@index');
	Route::get('profile/{profile}', 'Profile\ProfileController@show');

	/**
	 *	Profile Documents (API)
	 *
	 */

	Route::get('profile/{profile}/documents', 'Profile\ProfileDocumentController@index');
	Route::get('document/{document}', 'Profile\ProfileDocumentController@show');
	
	// Include an "action" = refuse and a "message", then triggers an event that sends a notification
	// Return the request fields

	Route::patch('document/{document}', 'Profile\ProfileDocumentController@update');

	/**
	 *	Folders (API)
	 *
	 */

	Route::get('folder', 'Profile\ProfileFolderController@index');
	Route::get('folder/{folder}', 'Profile\ProfileFolderController@show');
	Route::post('folder', 'Profile\ProfileFolderController@store');
	Route::patch('folder/{folder}', 'Profile\ProfileFolderController@update');
	Route::delete('folder/{folder}', 'Profile\ProfileFolderController@destroy');

	Route::get('folder/{folder}/items', 'Profile\ProfileFolderItemController@index');
	Route::post('folder/{folder}/', 'Profile\ProfileFolderItemController@store');
	Route::delete('folder/item/{item}', 'Profile\ProfileFolderItemController@destroy');

	/**
	 *	Applications (API)
	 *
	 */

	// Add applications as POST, returns the Request data if AJAX
	Route::patch('application/refuse', 'Recruiting\ApplicationController@update');

});

Route::group(['middleware' => 'auth'], function()	{

	Route::get('dashboard', 'HomeController@index')->name('home');

	Route::get('company', 'Company\CompanyController@show');
	Route::get('company/edit', 'Company\CompanyController@edit');
	Route::patch('company', 'Company\CompanyController@update');
	
	Route::get('company/recruiter', 'Company\RecruiterController@index');
	Route::get('company/recruiter/add', 'Company\RecruiterController@create');
	Route::post('company/recruiter', 'Company\RecruiterController@store');
	Route::delete('company/recruiter/{recruiter}', 'Company\RecruiterController@destroy');

	Route::get('crew', 'Company\CrewController@index');
	Route::get('crew/add', 'Company\CrewController@create');
	Route::post('crew', 'Company\CrewController@store');

	Route::get('crew/{crew}', 'Company\CrewController@show');
	Route::get('crew/{crew}/edit', 'Company\CrewController@edit');
	Route::patch('crew/{crew}', 'Company\CrewController@update');
	Route::delete('crew/{crew}', 'Company\CrewController@destroy');
	
	/**
	 *	Documents
	 *
	 */

	Route::get('document', 'Recruiting\DocumentController@index');

	Route::get('document/{document}', 'Profile\ProfileDocumentController@show');

	Route::get('document/request', 'Profile\ProfileDocumentRequestController@create');	// Add recipients in GET variable
	Route::post('document/request', 'Profile\ProfileDocumentRequestController@store');

	// Send a POST request when approving a document
	Route::patch('document/{document}', 'Profile\ProfileDocumentController@update');

	// Write message to user if not sending through AJAX
	Route::get('document/{document}/decline', 'Profile\ProfileDocumentController@decline');

	// Include an "action" = refuse and a "message", then triggers an event that sends a notification
	Route::patch('document/{document}', 'Profile\ProfileDocumentController@update');

	/**
	 *	Jobs
	 *
	 */

	Route::get('job', 'Job\JobController@index');
	Route::get('job/{job}', 'Job\JobController@show');
	
	Route::get('job/add', 'Job\JobController@create');
	Route::post('job', 'Job\JobController@store');

	Route::get('job/{job}/edit', 'Job\JobController@edit');
	Route::patch('job/{job}', 'Job\JobController@update');

	Route::delete('job/{job}', 'Job\JobController@destroy');
	
	Route::get('job/{job}/close', 'Job\JobClosingController@show');
	Route::patch('job/{job}/close', 'Job\JobClosingController@update');

	Route::get('job/{job}/share', 'Job\JobShareController@create');
	Route::post('job/{job}/share', 'Job\JobShareController@store');

	/**
	 *	Profiles
	 *
	 */

	Route::get('profile', 'Profile\ProfileController@index');
	Route::get('profile/{profile}', 'Profile\ProfileController@show');
	Route::get('profile/{profile}/export', 'Profile\ProfileExportController');	// Add "mode" as GET variable to select if full profile or only professional data

	/**
	 *	Folders
	 *
	 */

	Route::get('folder', 'Profile\ProfileFolderController@index');
	Route::get('folder/{folder}', 'Profile\ProfileFolderController@show');
	Route::patch('folder/{folder}', 'Profile\ProfileFolderController@update');
	Route::delete('folder', 'Profile\ProfileFolderController@destroy');

	/**
	 *	Selection Process
	 *
	 */

	Route::get('selection', 'Recruiting\SelectionController@index');
	Route::get('selection/{selection}', 'Recruiting\SelectionController@show');
	Route::get('selection/{selection}/documents', 'Recruiting\SelectionDocumentController@index');
	Route::get('selection/{selection}/application/find', 'Recruiting\ApplicationController@findCandidates');
	Route::get('selection/{selection}/application/insert', 'Recruiting\ApplicationController@insertCandidates');
	Route::post('selection/{selection}/application', 'Recruiting\ApplicationController@store');

	Route::get('selection/{selection}/close', 'Recruiting\SelectionController@close');
	Route::post('selection/{selection}/close', 'Recruiting\SelectionController@closeAction');

	/**
	 *	Applications
	 *
	 */

	// Add applications as GET
	Route::get('application/refuse', 'Recruiting\ApplicationController@refuse');
	Route::patch('application/refuse', 'Recruiting\ApplicationController@update');

	/**
	 *	Account
	 *
	 */

	Route::get('account', 'AccountController@index');
	Route::get('account/edit', 'AccountController@edit');
	Route::patch('account', 'AccountController@update');
});


Route::group(['prefix' => 'recruiting', 'middleware' => 'auth'], function()	{

	/**
	 *	Messages
	 *
	 */

	Route::get('message', 'Recruiting\MessageController@create');
	Route::post('message', 'Recruiting\MessageController@store');
	
});

Route::group(['prefix' => 'data', 'middleware' => 'auth'], function()	{

	/**
	 *	Positions
	 *
	 */

	Route::get('position', 'Data\PositionController@index');
	Route::get('position/{position}/edit', 'Data\PositionController@edit');
	Route::patch('position/{position}', 'Data\PositionController@update');
	Route::post('position', 'Data\PositionController@store');

	/**
	 *	Positions
	 *
	 */

	Route::get('language', 'Data\LanguageController@index');
	Route::get('language/{language}/edit', 'Data\LanguageController@edit');
	Route::patch('language/{language}', 'Data\LanguageController@update');
	Route::post('language', 'Data\LanguageController@store');

	/**
	 *	Positions
	 *
	 */

	Route::get('training', 'Data\TrainingController@index');
	Route::get('training/{training}/edit', 'Data\TrainingController@edit');
	Route::patch('training/{training}', 'Data\TrainingController@update');
	Route::post('training', 'Data\TrainingController@store');

	/**
	 *	Positions
	 *
	 */

	Route::get('documentType', 'Data\DocumentTypeController@index');
	Route::get('documentType/{documentType}/edit', 'Data\DocumentTypeController@edit');
	Route::patch('documentType/{documentType}', 'Data\DocumentTypeController@update');
	Route::post('documentType', 'Data\DocumentTypeController@store');

	/**
	 *	Positions
	 *
	 */

	Route::get('shipType', 'Data\ShipTypeController@index');
	Route::get('shipType/{shipType}/edit', 'Data\ShipTypeController@edit');
	Route::patch('shipType/{shipType}', 'Data\ShipTypeController@update');
	Route::post('shipType', 'Data\ShipTypeController@store');

	/**
	 *	Positions
	 *
	 */

	Route::get('seamanBookCategory', 'Data\SeamanBookCategoryController@index');
	Route::get('seamanBookCategory/{bookCategory}/edit', 'Data\SeamanBookCategoryController@edit');
	Route::patch('seamanBookCategory/{bookCategory}', 'Data\SeamanBookCategoryController@update');
	Route::post('seamanBookCategory', 'Data\SeamanBookCategoryController@store');
		
	/**
	 *	Positions
	 *
	 */

	Route::get('stcwRegulation', 'Data\StcwRegulationController@index');
	Route::get('stcwRegulation/{stcwRegulation}/edit', 'Data\StcwRegulationController@edit');
	Route::patch('stcwRegulation/{stcwRegulation}', 'Data\StcwRegulationController@update');
	Route::post('stcwRegulation', 'Data\StcwRegulationController@store');

	/**
	 *	Positions
	 *
	 */
	
	Route::get('country', 'Data\CountryController@index');
	Route::get('country/{country}/edit', 'Data\CountryController@edit');
	Route::patch('country/{country}', 'Data\CountryController@update');
	Route::post('country', 'Data\CountryController@store');
});