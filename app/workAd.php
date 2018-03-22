<?php

namespace WorkIT;

use Illuminate\Database\Eloquent\Model;
use WorkIT\workAd;
use WorkIT\User;
use WorkIT\applications;

class workAd extends Model
{
	 public function user()
    {
        return $this->belongsTo('WorkIT\User');
    }
    public function applications()
    {
        return $this->hasMany('App\applications');
    }
}
