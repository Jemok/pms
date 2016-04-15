<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backlog extends Model
{
    /**
     * All the fields that might be mass assigned
     * @var array
     */
    protected $fillable = [

        'description'

    ];

    /**
     * A backlog belongs to a task
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task(){

        return $this->belongsTo(Task::class);
    }
}
