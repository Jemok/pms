<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Team_user extends Model
{
    /**
     * The fields that might be mass assigned
     * @var array
     */
    protected $fillable = [

        'team_id',
        'user_id',
    ];

    /**
     * A team Team user belongs to a team
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team(){

        return $this->belongsTo(Team::class);
    }

    /**
     * A team user is a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo(User::class);
    }
}
