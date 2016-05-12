<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectSprint extends Model
{
    /**
     * The table used by this model
     * @var string
     */
    protected $table = 'project_sprints';

    /**
     * All the fields that may be mass assigned
     * @var array
     */
    protected $fillable = [

        'sprint_id'

    ];

    /**
     * ProjectSprint Project Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(){

        return $this->belongsTo(Project::class);
    }

    /**
     * ProjectSprint Sprint Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sprint(){

        return $this->belongsTo(Sprint::class);
    }


}
