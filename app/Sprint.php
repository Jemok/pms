<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Sprint extends Model
{
    /**
     * Fields that can be mass assigned
     * @var array
     */
    protected $fillable = [
         'user_id',
        'sprint_name',
        'sprint_description',
        'deliverable',
        'milestone',
        'started_at',
        'ended_at'
    ];

    /**
     * A project owns a sprint
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(){

        return $this->hasMany(ProjectSprint::class);
    }
    
    /**
     * A sprint has many tasks
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function task(){

        return $this->hasMany(Sprint_task::class);
    }
    

    /**
     * A Sprint has many users
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(){

        return $this->hasMany(Sprint_user::class);

    }

    public function getStartedAtAttribute($started_at){

        return $this->attributes['started_at'] = Carbon::parse($started_at)->addHours(3);
    }

    public function getEndedAtAttribute($ended_at){

        return $this->attributes['ended_at'] = Carbon::parse($ended_at)->addHour(3);
    }


    public function creator(){

       return $this->hasOne(Sprint_creator::class);
   }

}





