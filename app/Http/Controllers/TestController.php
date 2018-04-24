<?php

namespace WorkIT\Http\Controllers;

use Illuminate\Http\Request;
use WorkIT\workAd;
use Auth;
use WorkIT\User;
use WorkIT\applications;
use WorkIT\Test;
use WorkIT\Question;

class TestController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {  
    if(Auth::user()->role == "employer"){
      $options = ['Test','Task'];
      return view('employer.createtest',compact('options'));        
    }
    else
    {
      return back();
    }
  }
   public function addQ()
  {  
    if(Auth::user()->role == "employer"){
      return view('employer.createq');        
    }
    else
    {
      return back();
    }
  }
  public function addQtotest()
  {  
    if(Auth::user()->role == "employer"){
      return view('employer.createq');        
    }
    else
    {
      return back();
    }
  }
  public function createTest()
  {  
    if(Auth::user()->role == "employer"){
        if(request('q')!=null){
            $question = new Question;
            $question->test_id = request('testid');
            $question->type = request('qtype');
            $question->question = request('question');
            $question->answers = serialize(request('answer'));
            $question->correct = serialize(request('iscorrect'));
            $question->save();
            $test = Test::where('id', '=', request('testid'))->first();
            return view('employer.createq',compact('test'));
        }
        else{
        $test = new Test;
        $test->owner = Auth::user()->id;
        $test->test_name = request('testname');
        $test->type = request('type');
        $test->save();
        }
      if(request('type')==0){
        return view('employer.createq',compact('test')); 
      }
             
    }
    else
    {
      return back();
    }
  } 
 public function addQuestion()
  {  
    if(Auth::user()->role == "employer"){
        $test = Test::where('id', '=', request('testid'));
        return $test;
      if(request('type')==0){
        return view('employer.createq',compact('test')); 
      }
             
    }
    else
    {
      return back();
    }
  }
}
