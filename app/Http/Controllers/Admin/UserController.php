<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\Company\Company;
use App\Models\Company\Recruiter;

class UserController extends Controller
{
    public function index()	{

    	$companies = Company::all();
    	$users = User::all();

    	return view('admin.users.index', compact('users', 'companies'));
    }

    public function show(User $user)	{

    	$companies = Company::all();

    	return view('admin.users.view', compact('user', 'companies'));
    }

    public function store(Request $request)	{

    	$password = bcrypt('secret');

    	$user = new User;

    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = $password;

    	$user->save();

    	if($request->is_recruiter && $request->company_id)	{
            
            event(new \App\Events\UserAddedToCompany($user, Company::find($request->company_id) ));
    	}

    	return back()->with('message', $user->email . ' created.');
    }

    public function update(Request $request, User $user)	{

        if($user->company_id != $request->company_id) {

            if($request->company_id)    {
                
                event(new \App\Events\UserAddedToCompany($user, Company::find($request->company_id) ));
            }

        }

        $user->update($request->all());
    	
    	return back()->with('message', $user->name . ' updated.');
    }
}
