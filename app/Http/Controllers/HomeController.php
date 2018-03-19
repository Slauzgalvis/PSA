<?php

namespace WorkIT\Http\Controllers;

use Illuminate\Http\Request;
use WorkIT\workAd;
use Auth;
use WorkIT\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {        
       $route = Auth::user()->role . '\home';
       $data = [];
       if(Auth::user()->role == "worker"){

            if($request->search == ""){
              $ads = workAd::paginate(1);      
            }
            else{
              $keyword = $request->search;
              $ads = workAd::where(function ($query) use($keyword) {
              $query->where('name', 'like', '%' . $keyword . '%')
              ->orWhere('about', 'like', '%' . $keyword . '%')
              ->orWhere('city', 'like', '%' . $keyword . '%')
              ;})->paginate(1);
            }
             $data = compact('ads');
            
          
       }
        else if(Auth::user()->role == "employer"){
            $ads = workAd::where('user_id',  Auth::user()->id)->get();
            $data = compact('ads');
       }
        
       return view($route, $data);
    }
     public function workAd(workAd $workAd, User $company){
        if(Auth::user()->role == "worker" || $workAd->user_id == Auth::user()->id){
          $user = User::where('id', $workAd->user_id)->first();
           return view('worker.workad',compact('workAd','user'));        
       }
       else
       {
        return back();
       }
        
    }
     public function company(User $company){
        if(Auth::user()->role == "worker" || Auth::user()->id == $company->id){
          
            $ads = workAd::where('user_id',  $company->id)->get();
           return view('worker.company',compact('company','ads'));        
       }
       else
       {
        return back();
       }
        
    }
     
}
