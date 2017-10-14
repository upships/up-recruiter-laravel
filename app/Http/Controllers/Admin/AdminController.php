<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __invoke()	{

    	$admin_items = 	(object)[
									(object) ['name' => 'user', 'label' => 'Users'],
									(object) ['name' => 'company', 'label' => 'Companies'],
								];

    	return view('admin.index', compact('admin_items'));
    }
}
