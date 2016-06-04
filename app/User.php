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
        'name', 'email', 'password', 'user_name',
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

    public function projects(){

        return $this->hasMany(Project_user::class);
    }
        

    /**
     * A user has many sprints
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sprints(){

        return $this->hasMany(Sprint_user::class);
    }
    
    /**
     * A user has many tasks
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks(){

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

    public static function boot()
    {
        parent::boot();

        static::creating(function($user){

            $user->token = str_random(30);

        });
    }

    public function confirmEmail()
    {
        $this->verified = 1;
        $this->token = null;

        $this->save();
    }
}
