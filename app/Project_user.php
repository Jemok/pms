<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_user extends Model
{
    protected $fillable = [
        'user_id'
    ];

    public function project(){

        return $this->belongsTo(Project::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
}




