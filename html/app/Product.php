<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];

    protected $casts = [
    	'properties' => 'array'
    ];

    public function images() {

    	return $this->hasMany('App\Image');
    }
}
