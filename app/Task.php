<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

        return $this->hasMany(Task_user::class);

    }

    /**
     * A task has many backlogs
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function backlog(){

        return $this->hasMany(Backlog::class);
    }

    public function creator()
    {
        return $this->hasOne(Task_creator::class);
    }

    public function getStartedAtAttribute($started_at){

        return $this->attributes['started_at'] = Carbon::parse($started_at)->addHours(3);
    }

    public function getEndedAtAttribute($ended_at){

        return $this->attributes['ended_at'] = Carbon::parse($ended_at)->addHour(3);
    }
  

}
