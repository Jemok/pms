<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    /**
     * Fields that can be mass assigned
     * @var array
     */
    protected $fillable = [

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

        return $this->belongsTo(Project::class);
    }

    /**
     * A user owns a project
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo(User::class);
    }
}
