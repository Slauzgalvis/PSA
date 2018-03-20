<?php

namespace WorkIT;

use Illuminate\Database\Eloquent\Model;
use WorkIT\workAd;
use WorkIT\User;

class workAd extends Model
{
	 public function user()
    {
        return $this->belongsTo('WorkIT\User');
    }
}
