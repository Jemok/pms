<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * Mass assignable fields
     * @var array
     */
    protected $fillable = [

        'project_name',
        'project_description',
        'project_status',
        'started_at',
        'ended_at'
        
    ];


    /**
     * A user owns a project
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->hasMany(Project_user::class);
    }
    
    public function sprints(){
        
        return $this->hasMany(Sprint::class);
    }
    
    public function getStartedAtAttribute($started_at){
        
        return $this->attributes['started_at'] = Carbon::parse($started_at)->addHours(3);
    }

    public function getEndedAtAttribute($ended_at){

        return $this->attributes['ended_at'] = Carbon::parse($ended_at)->addHour(3);
    }
    
    public function team()
    {
        return $this->hasOne(ProjectTeam::class);
    }
    public function creator()
    {
        return $this->hasOne(ProjectCreator::class);
    }
}
