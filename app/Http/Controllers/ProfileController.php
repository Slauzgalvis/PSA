<?php

namespace WorkIT\Http\Controllers;

use Illuminate\Http\Request;
use WorkIT\workAd;
use Auth;
use WorkIT\User;
use WorkIT\applications;
use Image;

class ProfileController extends Controller
{
	public function index()
	{

	}
	public function employer(Request $request, User $user)
	{
		if(Auth::user()->id == $user->id || Auth::user()->role == "admin"){	
			return view('employer.editprofile',compact('user'));                    
		}
	else
	{
	return back();
	}

	}
	public function storeEditProfileEmployer(Request $request, User $user){
{
	if(Auth::user()->id == $user->id || Auth::user()->role == "admin"){	
						$request->validate([
			    'about' => 'max:600',
			    'name' => 'required|max:225|min:4',
			    'webpage' => 'nullable|max:100|active_url|max:225',
			    'phone' => 'nullable|numeric|digits_between:9,11',
			    'avatar' => 'image|max:4000',
						]);

				//$user = User::where('id', Auth::user()->id)->first();
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
				if(Auth::user()->role == "admin"){
				return redirect()->route('adminCompanies');
			}
			else return redirect('/home/profile/employer/' . Auth::user()->id);
		}
		else
	{
	return back();
	}
}


	}
	public function viewEmployer()
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
	public function EmployerViewWorker(workAd $workAd, applications $application)
	{
		if(Auth::user()->role == "employer"){
				$company = User::where('id', $application->user->id)->first();
            return view('worker.profile',compact('company'));                    
			}
			else
			{
				return back();
			}
	}


public function editProfileWorker(Request $request, User $user)
	{
		if(Auth::user()->id == $user->id || Auth::user()->role == "admin"){	
			return view('worker.editprofile',compact('user'));                    
		}
	else
	{
	return back();
	}
}

public function storeEditProfileWorker(Request $request, User $user)
{
	if(Auth::user()->id == $user->id || Auth::user()->role == "admin"){	
$request->validate([
				'about' => 'max:600',
				'phone' => 'nullable|numeric|digits_between:9,11',
				'avatar' => 'image|max:4000',
				'expierience' => 'max:225',
				'GitHub' => 'max:225',
				'qualification' => 'max:225',
				'firstname' => 'max:225',
				'lastname' => 'max:225',
			]);

			$user->webpage = request('webpage');
			$user->phone = request('phone');
			$user->about = request('about');
			$user->expierience = request('expierience');
			$user->qualification = request('qualification');
			$user->GitHub = request('github');
			$user->firstname = request('firstname');
			$user->lastname = request('lastname');

			if($request->hasFile('avatar')){
			$avatar = $request->file('avatar');
			$filename = time() . '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
			$user->avatar = $filename;
			}

			$user->save();
			if(Auth::user()->role == "admin"){
				return redirect()->route('adminWorkers');
			}
			else return redirect('/home/profile/' . Auth::user()->id);
		}
		else
	{
	return back();
	}
}




public function delete(User $user)
  {      
    if($user->id == Auth::user()->id || Auth::user()->role =="admin"){
     User::where('id',$user->id)->delete();             
   }
   return redirect('/home');
 }
}