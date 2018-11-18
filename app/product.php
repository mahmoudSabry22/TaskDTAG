<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
	use SoftDeletes;

    protected $fillable = [
        'name','type','price','dep_id'
    ];

    protected $data = ['delete_at'];
    
    public function theDepartment()
    {
    	return $this->belongsTo('App\department','dep_id');
    }
}
