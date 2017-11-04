<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Company\Career;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use Validator;
use Image;

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

 			return response()->json($careers_page);
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
                    'menus' => $request->input('menus'),
                    'settings' => $request->input('settings'),
                    'images' => $request->input('images'),
                    'slides' => $request->input('slides'),
                    'content' => $request->input('content'),
                ];
        }

        $company->careers_page->update($data);

        return response()->json($company->careers_page);
    }

    public function upload_image(Request $request) {

        $validator = Validator::make($request->all(),   [
                                                            'file' => 'required|image64:jpeg,jpg,png'
                                                        ]);
        if ($validator->fails()) {

            return response()->json(['errors'=>$validator->errors()]);
        }

        else {

            $imageData = $request->get('file');

            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];

            $fileFullPath = storage_path('app/public/images/') . $fileName;
            
            $filePath = 'images/' . $fileName;

            Image::make($request->get('file'))->save($fileFullPath);
            
            return response()->json(['error'=>false, 'file' => $filePath, 'caption' => $request->input('caption')]);
        }
    }

    public function destroy_image(Request $request) {

        //$this->validate($request, ['file' => 'required']);
        $file = 'app/public/' . urldecode($request->input('file'));

        $exists = Storage::exists($file);
        
        Storage::delete($file);

        return response()->json(['error' => false, 'file' => $file, 'exists' => $exists]);
    }
}
