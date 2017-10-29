<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        if(request()->ajax())   {

            $relationships = [
                                'position',
                                'coc.regulations.stcw_regulation', 'coc.country',
                                'coes.country',
                                'passports.country','visas.country',
                                'seaman_books.seaman_book_type', 'seaman_books.country',
                                'languages.language',
                                'dp.dp_type',
                                'ships.ship_type',
                                'stcw_regulations.stcw_regulation',
                                'certificates.certificate_type',
                                'native_language',
                                'nationality',
                                'works.position', 'works.ships.ship_type',
                             ];

            return response()->json($profile->load($relationships));
        }

        return view('app.profiles.view', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
