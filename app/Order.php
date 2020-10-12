<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    
     public function vendor(){
    	return $this->belongsTo('App\Vendor');
    }

     public function dishes(){
    	return $this->belongsTo('App\Dishes');
    }
}
