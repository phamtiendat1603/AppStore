<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $table = 'category';

    protected $fillable = [
    	'name', 'slug', 'status',
    ];

    public function productType(){
    	return $this->hasMany('App\Models\ProductTypes','idCategory','id');
    }
}
