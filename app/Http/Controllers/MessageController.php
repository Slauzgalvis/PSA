<?php

namespace WorkIT\Http\Controllers;

use Illuminate\Http\Request;
use WorkIT\workAd;
use Auth;
use WorkIT\User;
use WorkIT\Message;
use WorkIT\applications;
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

  public function comfirmed()
  {   

    $confirm = applications::where('id',request('application'))->first();
    $confirm->is_new = 1;
    $confirm->confirmed = true;
    $confirm->save();

    $msg = new Message;
    $msg->from = Auth::user()->id;
    $msg->to = request('to');
    $msg->message = request('msg');
    $msg->save();
    return redirect('/sendMessage');
  }
  public function declined()
  {   

    $confirm = applications::where('id',request('application'))->first();
    $confirm->is_new = 1;
    $confirm->confirmed = false;
    $confirm->save();

    return back();
  }

  public function chats()
  {

    $unique = [Auth::user()->id];

    $chats = Message::where('to',Auth::user()->id)->where('is_red',0)->update(['is_red' => 1]);

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
    $chats = Message::whereIn('to',$unique)->orWhereIn('from', $unique)->where('to', Auth::user()->id)->orWhere('from','=', Auth::user()->id)->get();
    
    $user1 = $users[0];
    return view('message',compact('users', 'chats','user1'));

  }
   public function chat1o1(User $user){
  $user1 = $user;
  $unique = [Auth::user()->id];

    $chats = Message::where('to',Auth::user()->id)->where('is_red',0)->update(['is_red' => 1]);

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
    $chats = Message::whereIn('to',$unique)->orWhereIn('from', $unique)->where('to', Auth::user()->id)->orWhere('from','=', Auth::user()->id)->get();
    
    return view('message',compact('users', 'chats','user1'));
   }

}
// $query->where(['from', '=', Auth::user()->id,'to','=',kitasid])->orWhere('to', '=', Auth::user()->id);