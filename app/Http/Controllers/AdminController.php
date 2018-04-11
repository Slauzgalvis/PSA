<?php

namespace WorkIT\Http\Controllers;

use Illuminate\Http\Request;
use WorkIT\workAd;
use Auth;
use WorkIT\User;

class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  private function getAccounts($keyword="",$type)
  {
    if($keyword == ""){
      $accounts = User::where('role', '=', $type)->paginate(25);      
    }
    else
    {
      $accounts = User::where(function ($query) use($keyword) {
      $query->where('name', 'like', '%' . $keyword . '%')
      ->orWhere('about', 'like', '%' . $keyword . '%')
      ->orWhere('email', 'like', '%' . $keyword . '%')
      ;})->where('role', '=', 'employer')->paginate(25)->appends(request()->query());
    }
    return $accounts;
  }

  public function companies(Request $request)
  { 
    if(Auth::user()->role == "admin")
    {
      $keyword = $request->search;
      $accounts = $this->getAccounts($keyword,'employer');
      return view('admin.accounts',compact('accounts','keyword'));
    }
    else
    {
      return back();
    }
  }

  public function workers(Request $request)
  {    
    if(Auth::user()->role == "admin")
    {
      $keyword = $request->search;
      $accounts = $this->getAccounts($keyword,'worker');
      return view('admin.accounts',compact('accounts','keyword'));
    }
    else
    {
      return back();
    }
  }

  public function workads(Request $request)
  {
    $keyword = "";
    if(Auth::user()->role == "admin")
    {
      if($request->search == "")
      {
      $ads = workAd::paginate(25);      
      }
      else
      {
        $keyword = $request->search;
        $ads = workAd::where(function ($query) use($keyword) {
        $query->where('name', 'like', '%' . $keyword . '%')
        ->orWhere('about', 'like', '%' . $keyword . '%')
        ->orWhere('city', 'like', '%' . $keyword . '%')
        ;})->paginate(25)->appends(request()->query());
      }
      return view('admin.ads',compact('ads','keyword'));
    }
    else
    {
    return back();
    }
  }
   
  public function viewWorker(User $user)
  {
    if(Auth::user()->role == "admin")
      {
      $company = $user;
      return view('worker.profile',compact('company'));                    
      }
    else
    {
      return back();
    }
  }
}