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
        'short_description',
        'description'

    ];

    /**
     * A user owns a team
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function  projects()
    {
        return $this->hasMany(ProjectCreator::class);
    }

    /**
     * A team has many team users
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function team_user(){

        return $this->hasMany(Team_user::class);
    }

    /**
     * Team TeamAdmin Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function admin(){

        return $this->hasOne(TeamAdmin::class);

    }
}