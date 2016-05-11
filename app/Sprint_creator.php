<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprint_creator extends Model
{

    protected $fillable =[
        'user_id'
    ];
    
    public function user()
    {

        return $this->belongsTo(User::class);
    }


    public function sprint()
    {

       return $this->belongsTo(Sprint::class);
    }

}