<?php

namespace WorkIT\Http\Controllers;

use Illuminate\Http\Request;
use WorkIT\workAd;
use Auth;
use WorkIT\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
       $route = Auth::user()->role . '\home';
       $data = [];
       if(Auth::user()->role == "worker"){
            $ads = workAd::all();
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
        if(Auth::user()->role == "worker"){
          
            $ads = workAd::where('user_id',  $company->id)->get();
           return view('worker.company',compact('company','ads'));        
       }
       else
       {
        return back();
       }
        
    }
     
}
