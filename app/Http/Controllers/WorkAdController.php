<?php

namespace WorkIT\Http\Controllers;

use Illuminate\Http\Request;
use WorkIT\workAd;
use Auth;
use WorkIT\User;

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
        $newAd->technologies = request('technologies');
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
        $newAd->technologies = request('technologies');

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
             if(Auth::user()->role == "employer" && $workAd->user_id == Auth::user()->id){
        
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
     
        if(Auth::user()->role == "employer" && $workAd->user_id == Auth::user()->id){
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
    if(Auth::user()->role == "employer" && $workAd->user_id == Auth::user()->id){
     WorkAd::where('id',$workAd->id)->delete();             
   }
   return back();
 }

}
