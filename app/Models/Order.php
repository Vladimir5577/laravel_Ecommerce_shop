<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /*
    public static function findOrCreate ($id) {
    	$obj = static::where('user_id', $id)->first();
    	return $obj ?? new static;
    }
    */

    /*
    * accessor for product 
    */
    public function getProductsAttribute ($value) {
        return unserialize($value);
    }

    public function user () {
    	return $this->belongsTo('App\Models\User');
    }

    public function productsUser () {
        return $this->hasMany('App\Models\Product');
    }
}
