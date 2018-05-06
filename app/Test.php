<?php

namespace WorkIT;

use Illuminate\Database\Eloquent\Model;
use WorkIT\Question;

class Test extends Model
{
    public function questions()
    {
        return $this->hasMany('WorkIT\Question','test_id');
    }
    public function user()
    {
        return $this->belongsTo('WorkIT\User', 'owner');
    }
}
