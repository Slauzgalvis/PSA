<?php

namespace WorkIT\Http\Controllers;

use Illuminate\Http\Request;
use WorkIT\workAd;
use Auth;
use WorkIT\User;
use Image;

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
				$user->webpage = request('webpage');
				$user->phone = request('phone');
				$user->about = request('about');

			if($request->hasFile('avatar')){
				$avatar = $request->file('avatar');
				$filename = time() . '.' . $avatar->getClientOriginalExtension();
					Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
					$user->avatar = $filename;
				}



				


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
	public function view()
	{
			if(Auth::user()->role == "employer"){
				$company = User::where('id', Auth::user()->id)->first();
            return view('employer.profile',compact('company'));                    
			}
			else
			{
				return back();
			}
		

	}
}