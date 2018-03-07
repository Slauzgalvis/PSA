<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\workAd;
use Auth;
use App\User;

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
        
       return view($route, $data);
    }
     public function workAd(workAd $workAd){
        if(Auth::user()->role == "worker"){
           return view('worker.workad',compact('workAd'));        
       }
       else
       {
        return back();
       }
        
    }
     public function company(User $company){
        if(Auth::user()->role == "worker"){
            $ads = workAd::find($company->id)::all();
           return view('worker.company',compact('company','ads'));        
       }
       else
       {
        return back();
       }
        
    }
}
