<?php

namespace App;

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

        return $this->belongsTo(User::class);
    }

    /**
     * A team owns a project
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team(){

        return $this->belongsTo(Team::class);
    }
}
