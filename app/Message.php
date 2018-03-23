<?php

namespace WorkIT;

use Illuminate\Database\Eloquent\Model;
use WorkIT\workAd;
use WorkIT\User;
use WorkIT\applications;

class Message extends Model
{
	public function user()
{
   return $this->belongsTo('User','from');
}
}
