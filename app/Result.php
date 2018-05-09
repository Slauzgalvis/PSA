<?php

namespace WorkIT;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $casts = [
        'answers' => 'array',
    ];
    public function test()
    {
        return $this->belongsTo('WorkIT\Test','test_id');
    }
    public function user()
    {
        return $this->belongsTo('WorkIT\User','user_id');
    }
}
