<?php

namespace Forum;

use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'thread_id', 'answer_id', 'is_read'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden =[];

    public function threads(){

        return $this->belongsTo('Forum\thread');
    }

    public function answer(){

        return $this->belongsTo('Forum\answer');
    }
}
