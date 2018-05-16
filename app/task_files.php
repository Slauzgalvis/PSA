<?php

namespace WorkIT;

use Illuminate\Database\Eloquent\Model;

class task_files extends Model
{
    public function task()
    {
        return $this->belongsTo('WorkIT\Task','task_id');
    }
    public function user()
    {
        return $this->belongsTo('WorkIT\User','user_id');
    }
}
