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
      $what = [];
      $correct = $test->questions()->select('correct')->get();
      $types = $test->questions()->select('type')->get();
      for($i=0;$i<count($correct);$i++){
        array_push($what,1);
      }
      $answers1 = $result->answers;
      $answers2 = $result->answers;
      //$answers2 = $test->questions()->select('answers')->get();
      return $answers1;
      //return view('employer.resultsingle',compact('answers1','answers2'));
    }
}
