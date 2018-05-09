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
    public function results()
    {
        return $this->hasMany('WorkIT\Result', 'test_id');
    }
}
