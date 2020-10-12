<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    protected $table = 'dishes';
    protected $guarded = [];

    public function vendor(){
    	return $this->belongsTo('App\Vendor');
    }

    public function order(){
    	return $this->hasMany('App\Order');
    }

}
