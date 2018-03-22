<?php

namespace WorkIT;
use WorkIT\applications;
use WorkIT\workAd;
use WorkIT\User;



use Illuminate\Database\Eloquent\Model;

class applications extends Model
{
    public function workAd()
    {
        return $this->belongsTo('WorkIT\workAd', 'ad_id');
    }
    public function user()
    {
        return $this->belongsTo('WorkIT\User', 'worker_id');
    }
}
