<?php

namespace Forum;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Illuminate\Database\Eloquent\Model;

class thread extends Model
{




    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'user_id', 'question','explanation'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden =[];

    public function category(){

        return $this->belongsTo('Forum\category');
    }

    public function user(){

        return $this->belongsTo('Forum\user');
    }

    public function answer(){

        return $this->hasMany('Forum\answer');
    }

    public function notification(){

        return $this->hasOne('Forum\notification');
    }
}
