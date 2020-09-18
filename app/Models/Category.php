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
    public function product () {
    	$this->belongsTo('App\Models\Product');
    }
}
