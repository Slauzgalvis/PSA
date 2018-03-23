<?php

namespace WorkIT\Http\Controllers;

use Illuminate\Http\Request;
use WorkIT\workAd;
use Auth;
use WorkIT\User;
use WorkIT\Message;
use DB;

class MessageController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  
  public function send()
  {   
    $msg = new Message;
    $msg->from = Auth::user()->id;
    $msg->to = request('to');
    $msg->message = request('msg');
    $msg->save();
    return back();
  }
  public function chats()
  {

    $unique = [Auth::user()->id];
    $chats = Message::where(function ($query) {
      $query->where('from', '=', Auth::user()->id)->orWhere('to', '=', Auth::user()->id);
    })->select('to','from')->distinct('to','from')->get();
    foreach($chats as $chat)
    {
      if (!in_array($chat->from, $unique))
      {
        $unique[] += $chat->from; 
      }
      if(!in_array($chat->to, $unique))
      {
        $unique[] += $chat->to; 
      }
    }
    $unique = array_slice($unique, 1);

    $users = User::WhereIn('id',$unique)->get();

    return compact('users');

  }

}
// $query->where(['from', '=', Auth::user()->id,'to','=',kitasid])->orWhere('to', '=', Auth::user()->id);