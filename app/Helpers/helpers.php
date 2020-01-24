<?php

	function flash($message)
	{
		// this function flashes messages
		return session()->flash('message', $message);
	}

	function errors($error) 
	{
		// this function returns errors
		return back()->withErrors(['messages' => $error]);
	}
