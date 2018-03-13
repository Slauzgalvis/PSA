<?php

namespace WorkIT\Http\Controllers;

use Illuminate\Http\Request;
use WorkIT\workAd;
use Auth;
use WorkIT\User;

class ProfileController extends Controller
{
	public function index()
	{

	}

	public function employer(Request $request, User $user)
	{
		if($request->method() == 'POST')
		{
				$user = User::where('id', Auth::user()->id)->first();
				$user->name = request('name');
				$user->email = request('email');
				$user->save();
				return redirect()->route('home');
			}
		else{

			if(Auth::user()->role == "employer"){
				$user = User::where('id', Auth::user()->id)->first();
            return view('employer.editprofile',compact('user'));                    
			}
			else
			{
				return back();
			}
		}

	}
}