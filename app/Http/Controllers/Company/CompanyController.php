<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $company = auth()->user()->company;

        return view('app.company.view', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $company = auth()->user()->company;

        return view('app.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'url' => 'required']);

        // Company
        $company = auth()->user()->company()->first();

        if(request('logo_file')) {

            // Upload file
            $path = $request->file('logo_file')->store('public/images');

            if($path) {

                // Dispatch an event with the old file name to delete it if it exists
                //event(new CertificateFileModified($certificate->file));

                $company->logo = $path;

                $company->save();
            }
        }

        if(request('favicon_file')) {

            // Upload file
            $path = $request->file('favicon_file')->store('public/images');

            if($path) {

                // Dispatch an event with the old file name to delete it if it exists
                //event(new CertificateFileModified($certificate->file));

                $company->favicon = $path;

                $company->save();
            }
        }

        if(request('logo_white_file')) {

            // Upload file
            $path = $request->file('logo_white_file')->store('public/images');

            if($path) {

                // Dispatch an event with the old file name to delete it if it exists
                //event(new CertificateFileModified($certificate->file));

                $company->logo_white = $path;

                $company->save();
            }
        }

        $company->update($request->all());

        return redirect()->route('company')->with('message', 'Company updated');
    }
}
