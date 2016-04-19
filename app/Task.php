<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Fields that can be mass assigned
     * @var array
     */
    protected $fillable = [

        'task_name',
        'task_description',
        'deliverable',
        'task_status',
        'started_at',
        'ended_at'

    ];

    /**
     * A Sprint belongs to a task
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sprint(){

        return $this->belongsTo(Sprint::class);

    }

    /**
     * A task belongs to a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo(User::class);

    }

    /**
     * A task has many backlogs
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function backlog(){

        return $this->hasMany(Backlog::class);
    }
}
