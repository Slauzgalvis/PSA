<?php 

namespace WorkIT\Http\Controllers;

use Illuminate\Http\Request;
use WorkIT\workAd;
use Auth;
use WorkIT\applications;
use WorkIT\User;
use WorkIT\Message;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
       $keyword = "";
       $route = Auth::user()->role . '\home';
       $data = [];
       if(Auth::user()->role == "worker"){

            if($request->search == ""){
              $ads = workAd::paginate(5);      
            }
            else{
              $keyword = $request->search;
              $ads = workAd::where(function ($query) use($keyword) {
              $query->where('name', 'like', '%' . $keyword . '%')
              ->orWhere('about', 'like', '%' . $keyword . '%')
              ->orWhere('city', 'like', '%' . $keyword . '%')
              ;})->paginate(1)->appends(request()->query());
            }
            $applications = applications::with('workAd')->where('worker_id', Auth::user()->id)->get();
             $data = compact('ads','keyword','applications');
            
          
       }
        else if(Auth::user()->role == "employer"){
            $ads = workAd::where('user_id',  Auth::user()->id)->get();
            $data = compact('ads');
       }
        else if(Auth::user()->role == "admin"){
            $ads = workAd::all();
            $users = User::whereIn('role', ['worker', 'employer'])->paginate(10);
            $data = compact('users','ads');
       }

        
       return view($route, $data);
    }
     public function workAd(workAd $workAd, User $company){
        if(Auth::user()->role == "worker" || $workAd->user_id == Auth::user()->id ||Auth::user()->role == "admin"){
          $user = User::where('id', $workAd->user_id)->first();
          $applications = applications::all();
           return view('worker.workad',compact('workAd','user','applications'));        
       }
       else
       {
        return back();
       }
        
    }
     public function company(User $company){
        if(Auth::user()->role == "worker" || Auth::user()->id == $company->id || Auth::user()->role == "admin"){
          
            $ads = workAd::where('user_id',  $company->id)->get();
           return view('worker.company',compact('company','ads'));        
       }
       else
       {
        return back();
       }
        
    }
    public function notifications(){
       if(Auth::user()->role == "employer"){
        $test = workAd::where('user_id',  Auth::user()->id)->select('id')->get();
        $updates = applications::whereIn('ad_id',$test)->where('is_new',0)->get();
        return view('employer.notifications',compact('updates'));
       }




    }
    public function update(){
      $newApps = 0;
      if(Auth::user()->role == "employer"){
        $test = workAd::where('user_id',  Auth::user()->id)->select('id')->get();
        $newApps = applications::whereIn('ad_id',$test)->where('is_new',0)->count();
       
      }
     $newMsg = Message::where('to',Auth::user()->id)->where('is_red',0)->count();
      return [$newMsg,$newApps];
    }
}
