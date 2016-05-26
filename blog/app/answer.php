<?php

namespace Forum;

use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'thread_id', 'user_id', 'content'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden =[];

    public function threads(){

        return $this->belongsTo('Forum\thread');
    }

    public function user(){

        return $this->belongsTo('Forum\user');
    }

    public function notification(){

        return $this->hasOne('Forum\notification');
    }
}
