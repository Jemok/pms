<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function creator()
    {
        return $this->hasMany(ProjectCreator::class);
    }
        

    /**
     * A user has many sprints
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sprints(){

        return $this->hasMany(Sprint::class);
    }

    /**
     * A user has many sprint_users
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sprint_user(){

        return $this->hasMany(Sprint_user::class);
    }

    /**
     * A user has many tasks
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks(){

        return $this->hasMany(Task::class);
    }

    /**
     * A user has many task_users
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks_user(){

        return $this->hasMany(Task_user::class);
    }

    /**
     * A user has many team users
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teams(){

        return $this->hasMany(Team_user::class);
    }

    /**
     * User TeamAdmin Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function admins(){

        return $this->hasMany(TeamAdmin::class);
    }
}
