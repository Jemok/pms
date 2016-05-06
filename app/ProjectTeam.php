<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTeam extends Model
{
    //
    protected $table ="project_teams";

    protected $fillable =[
        'team_id'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
