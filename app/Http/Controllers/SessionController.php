<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\SessionRequest;
use App\Http\Requests\UserResetRequest;
use App\Http\Requests\UserUpdateRequest;

class SessionController extends Controller
{

	public function __contruct()
	{
		$this->middleware('guest')->except(['update', 'reset']);
	}

    public function create()
    {
        // display login page
        if(auth()->check())
        {
            return redirect('/albums');
        }
    	return view('sessions.create');
    }

    public function store(SessionRequest $request)
    {
        // login user
    	if(!auth()->attempt(request()->except('_token'))){
    		return errors('Please check your credentials and try again.');
    	}

        flash('Welcome back '. auth()->user()->name);
    	return redirect('/albums');
    }

    public function show()
    {
        if(!auth()->check())
        {
            return errors('You have to be logged in first.');
        }
        // display profile page
        $comments = Comment::where('user_id', auth()->id())->latest()->get();
        return view('sessions.show', compact('comments'));
    }

    public function update(UserUpdateRequest $request)
    {
        // update user's information
        $user = auth()->user()->update(request(['name', 'email', 'contact']));
        
        if(!$user){        
            return errors('Oops, something went wrong, try again.');
        }

        flash('You have updated your information successfully.');
        return back();
    }

    public function reset(UserResetRequest $request)
    {
        // update user's passwords       
        if(!auth()->attempt(['email' => request('email'), 'password' => request('current_password')])){
            return errors('Wrong password was provided');
        }

        auth()->user()->update(request(['password']));
        flash('You have reset your password successfully.');
        return back();
    }

    public function destroy()
    {
        // logout user
    	auth()->logout();
    	return redirect('/albums');
    }
}
