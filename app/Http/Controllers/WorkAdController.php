<?php

namespace WorkIT\Http\Controllers;

use Illuminate\Http\Request;
use WorkIT\workAd;
use Auth;
use WorkIT\User;
use WorkIT\applications;
use WorkIT\Test;
use WorkIT\Result;
use WorkIT\Message;
use WorkIT\task_files;
class WorkAdController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {        
     $cities = ['Vilnius','Kaunas','Klaipėda','Šiauliai','Panevėžys','Kita'];
     $technologies = ['Javascript','PHP','Laravel','Django','Java','Other'];
    if(Auth::user()->role == "employer"){
      return view('employer.createworkad',compact('workAd','cities','technologies'));        
    }
    else
    {
      return back();
    }
    
  }

  public function create(Request $request)
  {        

    if(Auth::user()->role == "employer")
      {
        $request->validate([
    'about' => 'required|max:600',
    'name' => 'required|max:225|min:4',
    'city' => 'required|max:225|min:4|alpha',
    'technologies' => 'required|max:225',
]);

        $newAd = new workAd;
        $newAd->user_id = Auth::user()->id;
        $newAd->name = request('name');
        $newAd->about = request('about');
        $newAd->city = request('city');
        $techStr = implode(",", request('technologies'));
        $newAd->technologies = $techStr;
        $newAd->type = 1;
        $newAd->duration = 1;
        $newAd->status = 1;
        $newAd->save();
        return redirect()->route('home');
      }   
      else{
        return back();
      }
    }
    public function edit()
    {       

      if(Auth::user()->role == "employer" && request('user_id') == Auth::user()->id){
         $request->validate([
    'about' => 'required|max:600',
    'name' => 'required|max:225|min:4',
    'city' => 'required|max:225|min:4|alpha',
    'technologies' => 'required|max:225',
]);
        $newAd =  WorkAd::where('id',request('id'))->first();
        $newAd->user_id = Auth::user()->id;
        $newAd->name = request('name');
        $newAd->about = request('about');
        $newAd->city = request('city');
         $techStr = implode(",", request('technologies'));
        $newAd->technologies = $techStr;

        //
        $newAd->type = 1;
        $newAd->duration = 1;
        $newAd->status = 1;

        //


        $newAd->save();
        return redirect()->route('home');
      }
      else{
        return back();
      }

    }
    public function editindex(Request $request, workAd $workAd)
    {
        $cities = ['Vilnius','Kaunas','Klaipėda','Šiauliai','Panevėžys','Kita'];
        $technologies = ['Javascript','PHP','Laravel','Django','Java','Other'];
        $selectedTechnologies = explode(",",$workAd->technologies);

        if($request->method() == 'POST')
        {
             if(Auth::user()->role == "employer" && $workAd->user_id == Auth::user()->id || Auth::user()->role == "admin"){
        
        $workAd->user_id = Auth::user()->id;
        $workAd->name = request('name');
        $workAd->about = request('about');
        $workAd->city = request('city');

        $techStr = implode(",", request('technologies'));
        $workAd->technologies = $techStr;
        //
         $workAd->type = 1;
         $workAd->duration = 1;
          $workAd->status = 1;
        //
        $workAd->save();
        return redirect()->route('home');
       }
       else{
        return back();
       }
        }
        else{
     
        if(Auth::user()->role == "employer" && $workAd->user_id == Auth::user()->id || Auth::user()->role == "admin"){
            return view('employer.edit',compact('workAd','technologies','selectedTechnologies','cities'));        
        }
       else
       {
        return back();
       }
     }
   }

  
  public function delete(workAd $workAd)
  {      
    if(Auth::user()->role == "employer" && $workAd->user_id == Auth::user()->id || Auth::user()->role == "admin"){
     WorkAd::where('id',$workAd->id)->delete();             
   }
   return back();
 }

 public function apply(workAd $workAd, User $user)
  {      
    if(Auth::user()->role == "worker"){
      $newApplication = new applications;
      $newApplication->worker_id = Auth::user()->id;
      $newApplication->ad_id = $workAd->id;
      $newApplication->confirmed = false;
    
        $newApplication->save();
        $user = User::where('id', $workAd->user_id)->first();
        $applications = applications::where('worker_id', Auth::user()->id);
        redirect()->back();
   }
   return back();
 }
 public function cancel(workAd $workAd){
  applications::where('worker_id',Auth::user()->id)->where('ad_id', $workAd->id)->delete();
        $user = User::where('id', $workAd->user_id)->first();
        $applications = applications::where('worker_id', Auth::user()->id);
  return redirect()->back();
 }
 public function applicants(){
    $workads = Auth::user()->workAds()->select('id')->get();
    $applications = applications::whereIn('ad_id',$workads)->where('confirmed','!=',0)->get();
   return view('employer.assign',compact('tests','applications'));
 }
 public function assign(User $user){
    $results = $user->testsToDo()->select('test_id')->distinct()->get();
    $tests = Auth::user()->tests()->whereNotIn('id',$results)->get();
   return view('employer.testsforuser',compact('tests','user'));
 }
 public function assignTask(User $user){
    $results = $user->tasksToDo()->select('task_id')->distinct()->get();
    $tests = Auth::user()->tasks()->whereNotIn('id',$results)->get();
   return view('employer.testsforuser',compact('tests','user'));
 }
public function assignCreate(User $user){
   foreach (request('tests') as $test)
   {
    $result = new Result;
    $result->user_id = request('uid');
    $result->test_id = $test;
    $result->save();
    $msg = new Message;
    $msg->from = Auth::user()->id;
    $msg->to = request('uid');
    $msg->message = "New test assigned";
    $msg->save();
   }
   return redirect()->back();
 }
 public function assignCreateTask(User $user){
   foreach (request('tests') as $task)
   {
    $result = new task_files;
    $result->user_id = request('uid');
    $result->task_id = $task;
    $result->save();
    $msg = new Message;
    $msg->from = Auth::user()->id;
    $msg->to = request('uid');
    $msg->message = "New task assigned";
    $msg->save();
   }
   return redirect()->back();
 }

}
