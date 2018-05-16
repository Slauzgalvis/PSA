<?php

namespace WorkIT\Http\Controllers;

use Illuminate\Http\Request;
use WorkIT\workAd;
use Auth;
use WorkIT\User;
use WorkIT\applications;
use WorkIT\Test;
use WorkIT\Question;
use WorkIT\Result;
use WorkIT\Message;
use WorkIT\Task;
use WorkIT\task_files;
use Image;

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
            $question->answers = (request('answer'));
            $correct = [0,0,0,0,0];
            for($i = 0; $i< count(request('iscorrect'));$i++){
              $correct[request('iscorrect')[$i]-1] = request('iscorrect')[$i]; 
            }
            $question->correct = $correct;

            $question->save();
            $test = Test::where('id', '=', request('testid'))->first();
            return view('employer.createq',compact('test'));
        }
        else{
         if(request('type')==0){
          $test = new Test;
          $test->owner = Auth::user()->id;
          $test->test_name = request('testname');
          $test->type = request('type');
          $test->save();
          return view('employer.createq',compact('test')); 
         }
         else
         {
           $task = new Task;
           $task->owner = Auth::user()->id;
           $task->test_name = request('testname');
           $task->save();
           return redirect('home/tasks');
         }
       
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
  public function tasks()
  {  
    if(Auth::user()->role == "employer"){
       $tasks = Auth::user()->tasks()->get();
       return view('employer.tasks',compact('tasks')); 
      
             
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
        return view('employer.testdetails',compact('test'));
                   
    }
    else
    {
      return back();
    }
  }
  public function editSaveTask()
  {  
    $task = Task::where('id','=',request('id'))->first();
    if(Auth::user()->role == "employer" && $task->owner ==  Auth::user()->id){
        $task->test_name = request('taskname');
        $task->save();
        return view('employer.taskdetails',compact('task'));
                   
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
 public function deleteTask(Task $task)
  {      
    if(Auth::user()->role == "employer" && $task->owner == Auth::user()->id || Auth::user()->role == "admin"){
     Task::where('id',$task->id)->delete();          
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
    public function testDetails(Test $test)
  {  
      
    if(Auth::user()->role == "employer" && $test->owner == Auth::user()->id || Auth::user()->role == "admin"){
    // $questions = $test->questions()->get();
     return view('employer.testdetails',compact('test'));            
   }
   return back();
 }
  public function taskDetails(Task $task)
  {  
      
    if(Auth::user()->role == "employer" && $task->owner == Auth::user()->id || Auth::user()->role == "admin"){
    // $questions = $test->questions()->get();
     return view('employer.taskdetails',compact('task'));            
   }
   return back();
 }
 public function editQuestion(Question $question)
  {  
      
    if(Auth::user()->role == "employer" && $question->test->owner == Auth::user()->id || Auth::user()->role == "admin"){
  
      return view('employer.editq',compact('question')); 
    
                
   }
   return back();
 }
 public function saveEditQuestion(Question $question)
  {  
      
    if(Auth::user()->role == "employer" && $question->test->owner == Auth::user()->id || Auth::user()->role == "admin"){
       $question->type = request('qtype');
            $question->question = request('question');
            $question->answers = (request('answer'));
            $correct = [0,0,0,0,0];
            for($i = 0; $i< count(request('iscorrect'));$i++){
              $correct[request('iscorrect')[$i]-1] = request('iscorrect')[$i]; 
            }
            $question->correct = $correct;

            $question->save();
            $test = $question->test;
      return view('employer.testdetails',compact('test')); 
    
                
   }
   return back();
 }
    public function addQuestionToTest(Test $test)
  {  
    if(Auth::user()->role == "employer"){
        return view('employer.createq',compact('test')); 
      }
    else
    {
      return back();
    }
  }
  public function addQuestionToTestSave(Test $test)
  {  
    if(Auth::user()->role == "employer"){
            $question = new Question;
            $question->test_id = request('testid');
            $question->type = request('qtype');
            $question->question = request('question');
            $question->answers = (request('answer'));
            $correct = [0,0,0,0,0];
            for($i = 0; $i< count(request('iscorrect'));$i++){
              $correct[request('iscorrect')[$i]-1] = request('iscorrect')[$i]; 
            }
            $question->correct = $correct;

            $question->save();
            return view('employer.createq',compact('test'));
      }
    else
    {
      return back();
    }
  }
  public function workerTests(){
     $tests = Auth::user()->testsToDo()->where('is_done','!=',1)->orderby('created_at','desc')->get();
     $tasks = Auth::user()->tasksToDo()->where('is_done','!=',1)->orderby('created_at','desc')->get();
     return view('worker.tests',compact('tests','tasks'));
  }
  public function workerTestsDo(Result $result){
     
    $questions = $result->test->questions;

    return view('worker.dotest',compact('questions','result'));
  }
  public function workerTasksDo(task_files $task_files){

    return view('worker.dotask',compact('task_files'));
  }
  public function workerTestSave(Result $result){
      $result->answers = request('answers');
      $result->is_done = 1;
      
      $test = $result->test;
      $count = 0;
      for($i=0;$i<count($test->questions);$i++)
      {
        if($test->questions[$i]->type != 0 && isset($result->answers[$test->questions[$i]->id])){
            foreach($result->answers[$test->questions[$i]->id] as $id){
              if($test->questions[$i]->correct[$id-1] != 0){
                $count++;
              }
              else
              {
                $count--;
              }
            }           
        }
          
      }
      $max = 0;
      foreach($test->questions as $question){
        if($question->type != 0){
          foreach($question->correct as $correct){
            if($correct != 0){
              $max++;
            }
        }
        }
        
      }
      $result->result = $count;
      $result->max = $max;
      $result->save();

      $msg = new Message;
      $msg->from = Auth::user()->id;
      $msg->to = $result->test->owner;
      $msg->message = "Test completed";
      $msg->save();
     return redirect()->route('home');
  }
   public function workerTaskUpload(task_files $task_files){
      $file = request('file');
      $filename = time() . '.' . $file->getClientOriginalExtension();
      $path = request('file')->storeAs('files', $filename );
      $task_files->avatar = $path;
      $task_files->is_done = 1;
      $task_files->save();

      $msg = new Message;
      $msg->from = Auth::user()->id;
      $msg->to = $task_files->task->owner;
      $msg->message = "Test completed";
      $msg->save();
     return redirect()->route('home');
  }
}


//TODO -> My Tests -> all tests
// On click test -> all questions for that test
// On click all answers for that question + edit