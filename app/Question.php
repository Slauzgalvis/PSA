<?php

namespace WorkIT;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	 protected $casts = [
        'answers' => 'array',
        'correct' => 'array'
    ];
    public function test()
    {
        return $this->belongsTo('WorkIT\Test','test_id');
    }
}