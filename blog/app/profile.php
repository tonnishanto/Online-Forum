<?php

namespace Forum;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'github', 'is_admin','is_moderator','avatar','nickname'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden =[];

    public function user(){

        return $this->belongsTo('Forum\user');
    }
}
