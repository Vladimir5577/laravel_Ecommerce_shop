<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /*
    * the product has one category
    */
    public function category () {
    	return $this->belongsTo('App\Models\Category');
    }

    public function users () {
    	return $this->belongstoMany('App\Models\User');
    }

    public function order () {
        return $this->belongsTo('App\Models\Order');
    }
}
