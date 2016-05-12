<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task_creator extends Model
{   
    
    protected  $table = "task_creators";
    
    protected $fillable =[
        'user_id'
    ];

    public function user()
    {

        return $this->belongsTo(User::class);
    }


    public function task()
    {

        return $this->belongsTo(Task::class);
    }
     
   
}
