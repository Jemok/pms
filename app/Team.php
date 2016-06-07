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

    public static  function scopeSearch($query, $search){
        return $query->where(function($query) use ($search) {

            $query->where('team_name', 'LIKE', "%$search%")
                ->orWhere('short_description', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%");
        });
    }


    public function projects()
    {
        return $this->hasMany(ProjectTeam::class);
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