<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product';
    protected $fillable = [
    	'name', 'slug', 'description', 'quantity', 'price', 'promotional', 'idCategory', 'idProductType', 'image', 'status',
    ]; 

    public function productTypes(){
    	return $this->belongsTo('App\Models\ProductTypes','idProductType','id');
    }

    public function categories(){
    	return $this->belongsTo('App\Models\Categories','idCategory','id');
    }
}
