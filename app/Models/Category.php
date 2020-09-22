<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /*
    * category belongs to product
    */
    public function products () {
    	return $this->hasMany('App\Models\Product');
    }
}
