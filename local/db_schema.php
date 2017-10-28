<?php 

company

$table->integer('company_type_id')->nullable();
            
$table->string('name');
$table->string('logo')->nullable();
string('url')->nullable();
text('description')->nullable();

applications

integer('job_id');
integer('company_id');
integer('profile_id');
integer('selection_id')->nullable();
integer('recruiter_id')->nullable();
integer('status')->default(0);
integer('type')->default(1);
            
integer('salary')->nullable();

text('remarks')->nullable();
text('response')->nullable();
text('notes')->nullable();


stcw_regulations

string('regulation');
string('chapter');

text('description')->nullable();
	    $table->integer('item')->nullable();


seaman_book_types

integer('company_id')->nullable();
integer('country_id')->nullable();
integer('seafarer_type_id')->nullable();
integer('ship_department_id')->nullable();
string('code')->nullable();
string('label');


seaman_books

integer('profile_id');
integer('seaman_book_type_id');
string('number');

date('issued_at')->nullable();
date('expires_at');

text('remarks')->nullable();


cocs

integer('profile_id');
            
string('number')->nullable();

date('issued_at')->nullable();
date('expires_at')->nullable();

text('remarks')->nullable();

text('file')->nullable();


coc_stcw_regulations

integer('profile_id');
integer('coc_id');
integer('stcw_regulation_id');


company_types

string('label');


crews

integer('company_id');
string('label');
text('remarks')->nullable();


crew_members

integer('company_id');
integer('crew_id');
integer('profile_id');

text('remarks')->nullable();

currencies

string('label');
string('code');


document_types

integer('company_id')->nullable();
integer('country_id')->nullable();
string('label');


dps

integer('profile_id');
integer('dp_type_id');
string('number')->nullable();

date('issued_at')->nullable();
date('expires_at')->nullable();

text('remarks')->nullable();

text('file')->nullable();

boolean('verified')->default(false);


job_benefits

integer('job_id');
string('label');


job_stcw_regulations

integer('job_id');
integer('stcw_regulation_id');


job_seaman_book_types

integer('job_id');
integer('seaman_book_type_id');

jobs

integer('company_id');
integer('country_id')->nullable();
integer('recruiter_id');
integer('position_id');
integer('ship_type_id')->nullable();
string('instructions')->nullable();
integer('status')->default(0);  // 0 - not published, 1 - published, 2 - closed, 66 - archived, 666 - cancelled
integer('step')->default(0);

datetime('expires_at')->nullable();

text('description')->nullable();
            
string('rotation')->nullable();
            
string('slug')->nullable();
string('salary')->nullable();
integer('visibility')->default(1);  // 1 - visible, 2 - private, 3 - confidential company


languages

string('label');
string('code');
string('native_label');


job_trainings

integer('job_id');
integer('training_id');

positions

string('label');
string('code')->nullable();
integer('type');    // 1 - sea, 2 - shore



profiles

integer('user_id');
integer('country_of_nationality');
integer('education_level_id')->nullable();
            
integer('position_id');
integer('profile_type_id');
integer('ship_department_id')->nullable();
integer('gender')->nullable();
date('birthday');
integer('marital_status')->nullable();
string('city');
string('state')->nullable();
integer('country_id');
string('passport')->nullable();
date('passport_expires_at')->nullable();
integer('english_level')->default(0);
integer('native_language')->nullable();
integer('registration_step')->default(0);


profile_certificates

integer('profile_id');
integer('certificate_type_id');
integer('country_id');
boolean('verified')->default(false);

text('file')->nullable();
text('remarks')->nullable();

date('issued_at')->nullable();
date('expires_at')->nullable();


profile_ships


integer('profile_id');
integer('profile_work_id');
integer('ship_type_id');
            
integer('name')->nullable();


profile_works

integer('profile_id');
integer('position_id');
string('company_name');
            
date('start_date');
date('end_date')->nullable();

text('description')->nullable();


profile_documents

integer('profile_id');
integer('document_type_id')->nullable();
boolean('verified')->default(false);
string('label')->nullable();
text('file')->nullable();
string('remarks')->nullable();


profile_educations

integer('profile_id');
string('label');
text('remarks')->nullable();
string('school')->nullable();

date('start_date')->nullable();
date('end_date')->nullable();


profile_document_requests

integer('profile_id');
integer('company_id');
integer('selection_id');
integer('document_type_id')->nullable();
integer('status')->default(0);  // 0 - waiting, 1 - received, 666 - returned, 10 - verified
string('label')->nullable();
text('file')->nullable();
string('remarks')->nullable();
string('access_key')->nullable();



profile_extras

integer('profile_id');
string('label')->nullable();
text('description')->nullable();
date('date')->nullable();


profile_languages

integer('profile_id');
integer('language_id');
integer('level');


profile_folder_items

integer('profile_id');
integer('folder_id');


profile_folders

integer('company_id');
integer('recruiter_id');
string('label');
text('notes')->nullable();


ships

integer('company_id');
integer('ship_type_id');
integer('country_id');    // country_idstring('name');



ship_types

string('label');
string('code')->nullable();



recruiters


integer('company_id');
integer('user_id');

trainings

integer('country_id')->nullable();
integer('stcw_regulation_id')->nullable();
string('label');
string('code')->nullable();
string('description')->nullable();


selections


integer('company_id');
integer('job_id')->nullable();
integer('recruiter_id');
string('label')->nullable();
integer('status')->default(0); // 0 - not active, 1 - active, 10 - closed, 666 - cancelled



countries


string('name');
string('code');
string('icon');



ship_departments


string('label');


seaman_types


string('label');


company_phones


integer('company_id');
string('label');
integer('country_code');
string('number');



company_offices


integer('company_id');
string('label');
string('address');
string('city');
string('state')->nullable();
string('postal_code')->nullable();
integer('country_id');


company_emails


integer('company_id');
string('label');
string('address');


dp_types


string('label');
string('authority')->nullable();


education_levels


string('label');


profile_types


string('label');


certificate_types


integer('company_id')->nullable();
integer('country_id')->nullable();
string('label');


profile_trainings


integer('profile_id');
integer('training_id');
integer('country_id');
boolean('verified')->default(false);

text('file')->nullable();
text('remarks')->nullable();

date('issued_at')->nullable();
date('expires_at')->nullable();


language_levels


string('label');



settings


string('key');
string('value')->nullable();
            



company_settings


integer('company_id');
string('key');
string('value')->nullable();


job_certificate_types


integer('job_id');
integer('certificate_type_id');



job_ship_types


integer('ship_type_id');
integer('job_id');
integer('months')->nullable();


job_experiences


integer('job_id');
string('value');



job_requirements


integer('job_id');
string('label');




?>