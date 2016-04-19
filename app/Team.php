<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * Mass assignable fields
     * @var array
     */
    protected $fillable = [

        'team_name',
        'description'

    ];

    /**
     * A user owns a team
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo(User::class);
    }

    /**
     * A Team has many projects
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function project(){

        return $this->hasMany(Project::class);
    }

    /**
     * A team has many team users
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function team_user(){

        return $this->hasMany(Team_user::class);
    }
}