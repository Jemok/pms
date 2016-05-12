<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprint_task extends Model
{
    /**
     * All the fields the fields that might be mass assigned
     * @var array
     */
    protected $fillable = [

        'task_id'
    ];

    /**
     * A Sprint_task belongs to a sprint
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sprint(){

        return $this->belongsTo(Sprint::class);
    }

    /**
     * A Sprint_task belongs to a task
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task(){

        return $this->belongsTo(Task::class);
    }
}
