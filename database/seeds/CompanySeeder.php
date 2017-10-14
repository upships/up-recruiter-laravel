<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Company\Company::class, 2)->create()->each( function($company)	{

        	// Office
    		factory(App\Models\Company\CompanyOffice::class, 2)->create(['company_id' => $company->id]);

    		// Email
    		factory(App\Models\Company\CompanyEmail::class, 2)->create(['company_id' => $company->id]);
    		
    		// Phone
    		factory(App\Models\Company\CompanyPhone::class, 2)->create(['company_id' => $company->id]);

    		// Crew
        	factory(App\Models\Company\Crew::class, 1)->create(['company_id' => $company->id]);

        	// Create recruiters
        	factory(App\Models\Company\Recruiter::class, 2)->create(['company_id' => $company->id])->each( function($recruiter) use ($company) {

        		// Profile folders
        		factory(App\Models\Company\ProfileFolder::class, 1)->create(['company_id' => $company->id, 'recruiter_id' => $recruiter->id]);

        		// Create jobs
        		factory(App\Models\Job\Job::class, 2)->create(['company_id' => $recruiter->company_id, 'recruiter_id' => $recruiter->id])->each( function($job) {

        			// Job-related data

        				// Benefit
        				factory(App\Models\Job\JobBenefit::class, 3)->create(['job_id' => $job->id]);

        				// Requirement
        				factory(App\Models\Job\JobRequirement::class, 3)->create(['job_id' => $job->id]);

        				// Certificate Type
        				factory(App\Models\Job\JobCertificateType::class, 3)->create(['job_id' => $job->id]);

        				// Experience
        				factory(App\Models\Job\JobExperience::class, 3)->create(['job_id' => $job->id]);

        				// Seaman Book Type
        				factory(App\Models\Job\JobSeamanBookType::class, 3)->create(['job_id' => $job->id]);

        				// Ship Type
        				factory(App\Models\Job\JobShipType::class, 3)->create(['job_id' => $job->id]);

        				// STCW Regulation
        				factory(App\Models\Job\JobStcwRegulation::class, 3)->create(['job_id' => $job->id]);

        				// Training
        				factory(App\Models\Job\JobTraining::class, 3)->create(['job_id' => $job->id]);


        			// Create profiles
        			factory(App\Models\Profile\Profile::class, 10)->create()->each( function($profile) use ($job)	{

        				// Create application
        				factory(App\Models\Recruiting\Application::class)->create(['job_id' => $job->id, 'company_id' => $job->company_id, 'profile_id' => $profile->id]);

        				// Create profile-related data

        					// Certificate
        					factory(App\Models\Profile\ProfileCertificate::class, 3)->create(['profile_id' => $profile->id]);

        					// Document
        					factory(App\Models\Profile\ProfileDocument::class, 3)->create(['profile_id' => $profile->id]);

        					// Education
        					factory(App\Models\Profile\ProfileEducation::class, 3)->create(['profile_id' => $profile->id]);

        					// Extra
        					factory(App\Models\Profile\ProfileExtra::class, 3)->create(['profile_id' => $profile->id]);

        					// Language
        					factory(App\Models\Profile\ProfileLanguage::class, 3)->create(['profile_id' => $profile->id]);

        					// Training
        					factory(App\Models\Profile\ProfileTraining::class, 3)->create(['profile_id' => $profile->id]);

        					// Work
        					factory(App\Models\Profile\ProfileWork::class, 3)->create(['profile_id' => $profile->id])->each( function($work) use ($profile) {

        						// Ship
        						factory(App\Models\Profile\ProfileTraining::class, 2)->create(['profile_id' => $profile->id]);
        					});

        					// Seaman Book
        					factory(App\Models\Profile\SeamanBook::class)->create(['profile_id' => $profile->id]);

        					// CoC
        					$coc = factory(App\Models\Profile\Coc::class)->create(['profile_id' => $profile->id]);

        						// Regulations
        						factory(App\Models\Profile\CocStcwRegulation::class, 5)->create(['profile_id' => $profile->id, 'coc_id' => $coc->id]);

        					// DP
        					factory(App\Models\Profile\Dp::class)->create(['profile_id' => $profile->id]);
        			});

        		});
        	});
        		



        });
    }
}
