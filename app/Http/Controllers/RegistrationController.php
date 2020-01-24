<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function create()
    {
        // display registration page
        if(auth()->check())
        {
            return redirect('/albums');
        }
    	return view('registration.create');
    }

    public function store(RegistrationRequest $request)
    {
        // register user
    	$user = User::create(request()->all());
    	if(!$user){
    		return errors('Oops, something went wrong, Please try again');
    	}

    	auth()->login($user);
        flash('Thank you for joining our awesome community.');
    	return redirect('/albums');
    }
}
