<?php

namespace WorkIT\Http\Controllers;

use Illuminate\Http\Request;
use WorkIT\workAd;
use Auth;
use WorkIT\User;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index()
    {        
      if(Auth::user()->role == "worker"){

          return view('worker.searchAds');        
      }
      else
      {
         return back();
      }
    }
    public function search(Request $request)
    {;
        $results = "";
        $keyword = $request->search;
        $results = workAd::where(function ($query) use($keyword) {
        $query->where('name', 'like', '%' . $keyword . '%')
           ->orWhere('about', 'like', '%' . $keyword . '%');
      })->get()->paginate(1);
            return $results;    
    }
     
}
