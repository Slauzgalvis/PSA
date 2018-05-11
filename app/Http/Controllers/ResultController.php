<?php 

namespace WorkIT\Http\Controllers;

use Illuminate\Http\Request;
use WorkIT\workAd;
use Auth;
use WorkIT\applications;
use WorkIT\User;
use WorkIT\Message;
use WorkIT\Result;


class ResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $tests = Auth::user()->tests()->select('id')->get();
      $results = Result::where('is_done','=',1)->whereIn('test_id',$tests)->orderBy('updated_at','desc')->get();
      return view('employer.tcompleted',compact('results'));
    }
    public function single(Result $result)
    {
      $test = $result->test;
      $questions = $test->questions;
      $array = [
      "foo" => "bar",
      "bar" => "foo",
      ];
      $array['9'] = [1,2,3];

      foreach($questions as $question){
        if($question->type == 0){
          $array[$question->id] = $result->answers[$question->id];
        }
        else{
          $array[$question->id] = [0,0,0,0,0];
          if(isset($result->answers[$question->id])){
            foreach($result->answers[$question->id] as $opt){
              if($question->correct[$opt-1] == $opt){
                $array[$question->id][$opt-1] = 1;
              }
              else{
                $array[$question->id][$opt-1] = -1;
              }
            }
          }
        }
      }

       return view('employer.resultsingle',compact('questions','result','array'));
      //return view('employer.resultsingle',compact('answers1','answers2'));
    }
}
