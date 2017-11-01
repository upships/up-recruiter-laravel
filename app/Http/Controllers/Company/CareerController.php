<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Company\Career;

class CareerController extends Controller
{
    public function show()	{

    	if(request()->ajax())	{
    	
	    	$company = auth()->user()->company()->first();

	    	// Check if settings exist
	    	if(!$company->careers_page)	{

	    		$company->careers_page()->save(Career::make());
	    	}

	    	$careers_page = $company->careers_page;

	    	// Explode settings, menu and content
	    	$settings = collect(explode('|||', $careers_page->settings))->map(function($item) {

                return explode('||', $item);
            });


            $menu = collect(explode('|||', $careers_page->menu))->map(function($item) {

                return explode('||', $item);
            });

            $content = explode('|||', $careers_page->menu)->map(function($item) {

                return explode('||', $item);
            });

            $page = ['settings' => $settings, 'content' => $content, 'menu' => $menu];

 			return response()->json($page);
    	}

        return view('app.company.careers.view');

    }

    public function edit()	{


    }

    public function update(Request $request)	{


    }
}
