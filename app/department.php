<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
	protected $fillable = [
        'name','type'
    ];

    public function theProduct()
    {
    	return $this->hasMany('App\product','dep_id');
    }
}
