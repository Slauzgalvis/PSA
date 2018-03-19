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
			$request->validate([
    'about' => 'max:600',
    'name' => 'required|max:50|min:4',
    'webpage' => 'max:100|active_url',
    'phone' => 'numeric',
    'avatar' => 'image|size:4000',
]);

				$user = User::where('id', Auth::user()->id)->first();
				$user->name = request('name');
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
				return redirect()->route('profile');
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
	public function viewWorker()
	{
			if(Auth::user()->role == "worker"){
				$company = User::where('id', Auth::user()->id)->first();
            return view('worker.profile',compact('company'));                    
			}
			else
			{
				return back();
			}
		

	}

	public function editProfileWorker(Request $request, User $user)
	{
		if($request->method() == 'POST')
		{
			$request->validate([
    'about' => 'max:600',
    'name' => 'max:50|min:4',
    'phone' => 'nullable|numeric',
    'avatar' => 'image|max:4000',
]);

				$user = User::where('id', Auth::user()->id)->first();
				$user->webpage = request('webpage');
				$user->phone = request('phone');
				$user->about = request('about');
				$user->expierience = request('expierience');
				$user->github = request('github');
				$user->firstname = request('firstname');
				$user->lastname = request('lastname');

			if($request->hasFile('avatar')){
				$avatar = $request->file('avatar');
				$filename = time() . '.' . $avatar->getClientOriginalExtension();
					Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
					$user->avatar = $filename;
				}



				


				$user->save();
				return redirect()->route('Wprofile');
			}
		else{

			if(Auth::user()->role == "worker"){
				$user = User::where('id', Auth::user()->id)->first();
            return view('worker.editprofile',compact('user'));                    
			}
			else
			{
				return back();
			}
		}
}
}