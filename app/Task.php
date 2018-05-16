<?php

namespace WorkIT;

use Illuminate\Database\Eloquent\Model;
use WorkIT\Question;

class Task extends Model
{
    public function user()
    {
        return $this->belongsTo('WorkIT\User', 'owner');
    }
    public function results()
    {
        return $this->hasMany('WorkIT\Result', 'test_id');
    }
}
