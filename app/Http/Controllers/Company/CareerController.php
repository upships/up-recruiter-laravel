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

	    	$careers_page = $company->careers_page()->first();

            $page = ['settings' => $careers_page->settings, 'content' => $careers_page->content, 'menu' => $careers_page->menu];

 			return response()->json($page);
    	}

        return view('app.company.careers.view');

    }

    public function edit()	{


    }

    public function update(Request $request)	{

        $company = auth()->user()->company()->first();

        if($request->input('type')) {

            $data = [$request->input('type') => $request->input('data')];
        }
        else {

            $data = [
                    'menu' => $request->input('menu'),
                    'settings' => $request->input('settings'),
                    'content' => $request->input('content'),
                ];
        }

        $company->careers_page->update($data);

        return response()->json($company->careers_page);
    }
}
