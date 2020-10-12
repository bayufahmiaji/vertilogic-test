<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
	protected $guarded = [];

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function dishes(){
    	return $this->hasMany('App\Dishes');
    }

    public function order(){
    	return $this->hasMany('App\Order');
    }
}
