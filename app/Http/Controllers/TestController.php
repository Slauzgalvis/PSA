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
  public function tests()
  {  
    if(Auth::user()->role == "employer"){
       $tests = Auth::user()->tests()->get();
       return view('employer.tests',compact('tests')); 
      
             
    }
    else
    {
      return back();
    }
  }
    public function edit($id)
  {  
    if(Auth::user()->role == "employer"){

        $test = Test::where('id', '=', $id)->first();
        $questions = $test->questions()->get();
        return view('employer.editquests',compact('test','questions'));
                   
    }
    else
    {
      return back();
    }
  }
    public function editSave()
  {  
    $test = Test::where('id','=',request('id'))->first();
    if(Auth::user()->role == "employer" && $test->owner ==  Auth::user()->id){
        $test->test_name = request('name');
        $test->save();
        $questions = $test->questions()->get();
        return view('employer.editquests',compact('test','questions'));
                   
    }
    else
    {
      return back();
    }
  }
   public function deleteTest(Test $test)
  {      
    if(Auth::user()->role == "employer" && $test->owner == Auth::user()->id || Auth::user()->role == "admin"){
     Test::where('id',$test->id)->delete();             
   }
   return back();
 }
   public function deleteQuestion(Question $question)
  {  
      
    if(Auth::user()->role == "employer" && $question->test->owner == Auth::user()->id || Auth::user()->role == "admin"){
     Question::where('id',$question->id)->delete();             
   }
   return back();
 }
}

//TODO -> My Tests -> all tests
// On click test -> all questions for that test
// On click all answers for that question + edit