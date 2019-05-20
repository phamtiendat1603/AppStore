<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTypes extends Model
{
    protected $table = 'producttype';

    protected $fillable = [
    	'idCategory', 'name', 'slug', 'status',
    ];

    public function Category(){
    	return $this->belongsTo('App\Models\Categories','idCategory','id');
    }
}

