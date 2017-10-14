<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = \App\Models\Data\Position::all();
        $ship_types = \App\Models\Data\ShipType::all();

        return view('app.index', compact('positions', 'ship_types') );
    }
}
