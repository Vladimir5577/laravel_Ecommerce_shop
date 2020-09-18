<?php

namespace App\Facades;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class Shop {

	/*
	* categories
	*/
	public function get_categories () {
		return Category::all();
	}

	/*
	* cart count product 
	* return amount of products
	*/
	public function cart_count () {
		$user_id = \Auth::user()->id;
		$products = \DB::table('product_user')
						->where('user_id', $user_id)
						->count();
		return $products;
	}

	/*
	* check if product in the cart or not
	*/
	public function product_in_cart ($product_id) {
		$user_id = \Auth::user()->id;	
			
		$user = User::find($user_id);
		$product = \DB::table('product_user')->where([
				'product_id' => $product_id,
				'user_id' => $user_id,
			])->first();
		
		if ($product) {
			return false;
		}

		return true;
	}

}