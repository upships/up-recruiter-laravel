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
        factory(App\Models\Company::class, 2)->create()->each( function($company)	{

        	// Office
            $company->offices()->saveMany(
    		  factory(App\Models\Company\CompanyOffice::class, 2)->make()
            );

    		// Email
            $company->emails()->saveMany(
    		  factory(App\Models\Company\CompanyEmail::class, 2)->make()
            );
    		
    		// Phone
            $company->phones()->saveMany(
    		  factory(App\Models\Company\CompanyPhone::class, 2)->make()
            );

    		// Crew
            $company->crews()->save(
        	   factory(App\Models\Company\Crew::class)->make()
            );

        	// Create recruiters
        	factory(App\Models\Company\Recruiter::class, 2)->create(['company_id' => $company->id])->each( function($recruiter) use ($company) {

                // Add user to company
                $recruiter->user()->update(['company_id' => $company->id]);

        		// Profile folders
                $company->folders()->save(
        		  factory(App\Models\Company\ProfileFolder::class)->make(['recruiter_id' => $recruiter->id])
                );

        		// Create jobs
        		factory(App\Models\Job::class, 2)->create(['company_id' => $company->id, 'recruiter_id' => $recruiter->id])->each( function($job) {

        			// Job-related data

        				// Benefit
                        $job->benefits()->saveMany(
        				    factory(App\Models\Job\JobBenefit::class, 3)->make()
                        );

                        // Benefit
                        $job->languages()->save(
                            factory(App\Models\Job\JobLanguage::class)->make()
                        );

        				// Requirement
                        $job->requirements()->saveMany(
        				    factory(App\Models\Job\JobRequirement::class, 3)->make()
                        );

        				// Certificate Type
                        $job->certificate_types()->saveMany(
        				    factory(App\Models\Job\JobCertificateType::class, 3)->make()
                        );

        				// Experience
                        $job->experiences()->saveMany(
        				    factory(App\Models\Job\JobExperience::class, 3)->make()
                        );

        				// Seaman Book Type
                        $job->seaman_book_types()->saveMany(
        				    factory(App\Models\Job\JobSeamanBookType::class, 3)->make()
                        );

        				// Ship Type
                        $job->ship_types()->saveMany(
        				    factory(App\Models\Job\JobShipType::class, 3)->make()
                        );

        				// STCW Regulation
                        $job->stcw_regulations()->saveMany(
        				    factory(App\Models\Job\JobStcwRegulation::class, 3)->make()
                        );

        			// Create profiles
        			factory(App\Models\Profile::class, 10)->create()->each( function($profile) use ($job)	{

        				// Create application
                        $profile->applications()->save(
        				    factory(App\Models\Recruiting\Application::class)->make(['job_id' => $job->id, 'company_id' => $job->company_id])
                        );

        				// Create profile-related data

        					// Certificate
                            $profile->certificates()->saveMany(
        					   factory(App\Models\Profile\ProfileCertificate::class, 3)->make()
                            );

        					// Document
        					$profile->documents()->saveMany(
                                factory(App\Models\Profile\ProfileDocument::class, 3)->make()
                            );

        					// Education
                            $profile->education()->saveMany(
        					   factory(App\Models\Profile\ProfileEducation::class, 3)->make()
                            );

        					// Extra
                            $profile->extras()->saveMany(
        					   factory(App\Models\Profile\ProfileExtra::class, 3)->make()
                            );

        					// Language
                            $profile->languages()->saveMany(
        					   factory(App\Models\Profile\ProfileLanguage::class, 3)->make()
                            );

        					// Work
                            factory(App\Models\Profile\ProfileWork::class, 3)->create(['profile_id' => $profile->id])->each( function($work) use ($profile) {

        						// Ship
                                $profile->ships()->saveMany(
        						    factory(App\Models\Profile\ProfileShip::class, 2)->make(['profile_id' => $profile->id, 'profile_work_id' => $work->id])
                                );
        					});

        					// Seaman Book
                            $profile->seaman_books()->saveMany(
        					   factory(App\Models\Profile\SeamanBook::class, 3)->make()
                            );

                            $profile->passports()->saveMany(
                               factory(App\Models\Profile\Passport::class, 3)->make()
                            );

                            $profile->visas()->saveMany(
                               factory(App\Models\Profile\Visa::class, 3)->make()
                            );

                            $profile->coes()->saveMany(
                               factory(App\Models\Profile\Coe::class, 3)->make()
                            );

        					// CoC
                            $coc = factory(App\Models\Profile\Coc::class)->create(['profile_id' => $profile->id]);

                            // STCW Regulations
                            $coc->regulations()->saveMany(
                                factory(App\Models\Profile\CocStcwRegulation::class, 4)->make(['profile_id' => $profile->id])
                            );

        					// DP
                            $profile->dp()->save(

        					   factory(App\Models\Profile\Dp::class)->make()
                            );
        			});

        		});
        	});
        		



        });
    }
}
