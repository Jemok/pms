<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Sprint_user extends Model
{
    /**
     * The fields that might be mass assigned
     * @var array
     */
    protected $fillable = [

    ];

    /**
     * A Sprint user belongs to a sprint
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sprint(){

        return $this->belongsTo(Sprint::class);
    }

    /**
     * A Sprint user is a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo(User::class);
    }


}
