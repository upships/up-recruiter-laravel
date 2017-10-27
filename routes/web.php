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

	// Returns all the data needed by a Job in JSON (ship types, stcw regulations, book categories, etc), formatted for Select2
	Route::get('job_data', 'Job\JobDataController');

	Route::post('job_property/{job}/ship_type', 'Job\JobShipTypeController@store');
	Route::patch('job_property/ship_type/{ship_type}', 'Job\JobShipTypeController@update');
	Route::delete('job_property/ship_type/{ship_type}', 'Job\JobShipTypeController@destroy');

	Route::post('job_property/{job}/requirement', 'Job\JobRequirementController@store');
	Route::patch('job_property/requirement/{requirement}', 'Job\JobRequirementController@update');
	Route::delete('job_property/requirement/{requirement}', 'Job\JobRequirementController@destroy');

	Route::post('job_property/{job}/experience', 'Job\JobExperienceController@store');
	Route::patch('job_property/experience/{experience}', 'Job\JobExperienceController@update');
	Route::delete('job_property/experience/{experience}', 'Job\JobExperienceController@destroy');

	Route::post('job_property/{job}/certificate_type', 'Job\JobCertificateTypeController@store');
	Route::patch('job_property/language/{language}', 'Job\JobLanguageController@update');
	Route::delete('job_property/language/{language}', 'Job\JobLanguageController@destroy');

	Route::post('job_property/{job}/language', 'Job\JobLanguageController@store');
	Route::patch('job_property/seaman_book_type/{seaman_book_type}', 'Job\JobSeamanBookTypeController@update');
	Route::delete('job_property/seaman_book_type/{seaman_book_type}', 'Job\JobSeamanBookTypeController@destroy');

	Route::post('job_property/{job}/seaman_book_type', 'Job\JobSeamanBookTypeController@store');
	Route::patch('job_property/stcw_regulation/{stcw_regulation}', 'Job\JobStcwRegulationController@update');
	Route::delete('job_property/stcw_regulation/{stcw_regulation}', 'Job\JobStcwRegulationController@destroy');

	Route::post('job_property/{job}/stcw_regulation', 'Job\JobStcwRegulationController@store');
	Route::patch('job_property/benefit/{benefit}', 'Job\JobBenefitController@update');
	Route::delete('job_property/benefit/{benefit}', 'Job\JobBenefitController@destroy');

	Route::post('job_property/{job}/benefit', 'Job\JobBenefitController@store');
	Route::patch('job_property/certificate_type/{certificate_type}', 'Job\JobCertificateTypeController@update');
	Route::delete('job_property/certificate_type/{certificate_type}', 'Job\JobCertificateTypeController@destroy');

	Route::get('job/{job}', 'Job\JobController@show');
	Route::patch('job/{job}', 'Job\JobController@update');	// Returns the Request fields
	
	/**
	 *	Selections (API)
	 *
	 */

	Route::get('selection', 'Recruiting\SelectionController@index');
	Route::get('selection/{selection}', 'Recruiting\SelectionController@show');
	Route::patch('selection/{selection}', 'Recruiting\SelectionController@update');	// Returns the Request fields

	Route::post('selection/{selection}/feature', 'Recruiting\SelectionFeatureController@store');
	Route::patch('selection/{selection}/feature', 'Recruiting\SelectionFeatureController@update');
	Route::delete('selection/{selection}/feature', 'Recruiting\SelectionFeatureController@destroy');

	/**
	 *	Job Applications (API)
	 *
	 */

	Route::get('selection/{selection}/applications', 'Recruiting\ApplicationController@index');
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

	Route::get('/', function()	{

		return redirect()->route('home');
	});

	Route::get('/home', function()	{

		return redirect()->route('home');
	});

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
	Route::post('job', 'Job\JobController@store');
	Route::get('job/add', 'Job\JobController@create');
	
	Route::get('job/{job}', 'Job\JobController@show');
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
	Route::get('selection/{selection}/documents', 'Recruiting\SelectionDocumentController@index');	// View documents

	// Send messages to applicants
	Route::get('selection/{selection}/send_message', 'Recruiting\SelectionMessageController@create');
	Route::post('selection/send_message', 'Conversation\ConversationController@store');


	Route::get('selection/{selection}/find_candidates', 'Recruiting\ApplicationController@find_candidates');	// Find candidates
	Route::get('selection/{selection}/insert_candidates', 'Recruiting\ApplicationController@insert_candidates');	// Insert candidates
	Route::post('selection/{selection}/application', 'Recruiting\ApplicationController@store');

	Route::get('selection/{selection}/close', 'Recruiting\SelectionController@close');
	Route::post('selection/{selection}/close', 'Recruiting\SelectionController@close_action');

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

	/**
	 *	Messaging
	 *
	 */

	Route::get('conversation', 'Conversation\ConversationController@index');
	Route::get('conversation/add', 'Conversation\ConversationController@create');
	Route::post('conversation', 'Conversation\ConversationController@store');

	Route::get('conversation/{conversation}', 'Conversation\ConversationController@show');

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

	Route::get('/', 'Data\DataController');

	Route::get('position', 'Data\PositionController@index');
	Route::get('position/{position}', 'Data\PositionController@edit');
	Route::get('position/{position}/edit', 'Data\PositionController@edit');
	Route::patch('position/{position}', 'Data\PositionController@update');
	Route::post('position', 'Data\PositionController@store');
	Route::delete('position/{position}', 'Data\PositionController@destroy');

	/**
	 *	Languages
	 *
	 */

	Route::get('language', 'Data\LanguageController@index');
	Route::get('language/{language}', 'Data\LanguageController@edit');
	Route::get('language/{language}/edit', 'Data\LanguageController@edit');
	Route::patch('language/{language}', 'Data\LanguageController@update');
	Route::post('language', 'Data\LanguageController@store');
	Route::delete('language/{language}', 'Data\LanguageController@destroy');

	/**
	 *	Trainings
	 *
	 */

	Route::get('training', 'Data\TrainingController@index');
	Route::get('training/{training}', 'Data\TrainingController@edit');
	Route::get('training/{training}/edit', 'Data\TrainingController@edit');
	Route::patch('training/{training}', 'Data\TrainingController@update');
	Route::post('training', 'Data\TrainingController@store');
	Route::delete('training/{training}', 'Data\TrainingController@destroy');

	/**
	 *	Document Types
	 *
	 */

	Route::get('document_type', 'Data\DocumentTypeController@index');
	Route::get('document_type/{documentType}', 'Data\DocumentTypeController@edit');
	Route::get('document_type/{documentType}/edit', 'Data\DocumentTypeController@edit');
	Route::patch('document_type/{documentType}', 'Data\DocumentTypeController@update');
	Route::post('document_type', 'Data\DocumentTypeController@store');
	Route::delete('document_type/{documentType}', 'Data\DocumentTypeController@destroy');

	/**
	 *	Ship Types
	 *
	 */

	Route::get('ship_type', 'Data\ShipTypeController@index');
	Route::get('ship_type/{shipType}', 'Data\ShipTypeController@edit');
	Route::get('ship_type/{shipType}/edit', 'Data\ShipTypeController@edit');
	Route::patch('ship_type/{shipType}', 'Data\ShipTypeController@update');
	Route::post('ship_type', 'Data\ShipTypeController@store');
	Route::delete('ship_type/{shipType}', 'Data\ShipTypeController@destroy');

	/**
	 *	DP Types
	 *
	 */

	Route::get('dp_type', 'Data\DpTypeController@index');
	Route::get('dp_type/{dpType}', 'Data\DpTypeController@edit');
	Route::get('dp_type/{dpType}/edit', 'Data\DpTypeController@edit');
	Route::patch('dp_type/{dpType}', 'Data\DpTypeController@update');
	Route::post('dp_type', 'Data\DpTypeController@store');
	Route::delete('dp_type/{dpType}', 'Data\DpTypeController@destroy');

	/**
	 *	Seaman Book Categories
	 *
	 */

	Route::get('seaman_book_type', 'Data\SeamanBookTypeController@index');
	Route::get('seaman_book_type/{bookCategory}', 'Data\SeamanBookTypeController@edit');
	Route::get('seaman_book_type/{bookCategory}/edit', 'Data\SeamanBookTypeController@edit');
	Route::patch('seaman_book_type/{bookCategory}', 'Data\SeamanBookTypeController@update');
	Route::post('seaman_book_type', 'Data\SeamanBookTypeController@store');
	Route::delete('seaman_book_type/{bookCategory}', 'Data\SeamanBookTypeController@destroy');
		
	/**
	 *	STCW Regulations
	 *
	 */

	Route::get('stcw_regulation', 'Data\StcwRegulationController@index');
	Route::get('stcw_regulation/{stcwRegulation}', 'Data\StcwRegulationController@edit');
	Route::get('stcw_regulation/{stcwRegulation}/edit', 'Data\StcwRegulationController@edit');
	Route::patch('stcw_regulation/{stcwRegulation}', 'Data\StcwRegulationController@update');
	Route::post('stcw_regulation', 'Data\StcwRegulationController@store');
	Route::delete('stcw_regulation/{stcwRegulation}', 'Data\StcwRegulationController@destroy');

	/**
	 *	Countries
	 *
	 */
	
	Route::get('country', 'Data\CountryController@index');
	Route::get('country/{country}', 'Data\CountryController@edit');
	Route::get('country/{country}/edit', 'Data\CountryController@edit');
	Route::patch('country/{country}', 'Data\CountryController@update');
	Route::post('country', 'Data\CountryController@store');
	Route::delete('country/{country}', 'Data\CountryController@destroy');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()	{

	Route::get('/', 'Admin\AdminController');

	Route::get('user', 'Admin\UserController@index');
	Route::get('user/{user}', 'Admin\UserController@show');
	Route::post('user', 'Admin\UserController@store');
	Route::patch('user/{user}', 'Admin\UserController@update');

	Route::get('company', 'Admin\CompanyController@index');
	Route::get('company/{company}', 'Admin\CompanyController@show');
	Route::post('company', 'Admin\CompanyController@store');
	Route::patch('company/{company}', 'Admin\CompanyController@update');

	Route::delete('recruiter/{recruiter}', 'Admin\RecruiterController@destroy');
});
