<?php

namespace WorkIT;



use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function questions()
    {
        return $this->hasMany('WorkIT\Question');
    }
    public function user()
    {
        return $this->belongsTo('WorkIT\User', 'owner');
    }
}
