<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamAdmin extends Model
{
    /**
     * Team admin table
     * @var string
     */
    protected $table = 'team_admins';

    protected $fillable = [

        'user_id'
    ];

    /**
     * TeamAdmin User Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo(User::class);
    }
}
