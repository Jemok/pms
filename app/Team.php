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
}