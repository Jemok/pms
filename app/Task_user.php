<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Task_user extends Model
{
    /**
     * Fields that might be mass assigned
     * @var array
     */
    protected $fillable = [

        ''

    ];

    /**
     * A Task_user belongs to a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo(User::class);
    }

    /**
     * A Task_user belongs to a task
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task(){

        return $this->belongsTo(Task::class);
    }
}
