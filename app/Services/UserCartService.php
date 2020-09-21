<?php

namespace App\Services;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class UserCartService {

	/*
	* add product to user cart
	*/
	public function add_to_user_cart ($product_id) {
		$user_id = \Auth::user()->id;
		$user = User::find($user_id);

		$user->products()->attach($product_id);

		return true;
	}

	/*
	* cart show
	*/
	public function cart_show () {
		$user_id = \Auth::user()->id;
		$user = User::find($user_id);
		return $user->products;
	}

	/*
	* cart delete
	*/
	public function cart_delete_product ($product_id) {
		$user_id = \Auth::user()->id;
		$user = User::find($user_id);
		$user->products()->detach($product_id);
		return true;
	}

	/*
	* show item
	*/
	public function show_item ($product_id) {
		return Product::find($product_id);
	} 

	/*
	* submit order
	*/
	public function submit_order_page ($data) {

	}

	/*
	* submit order
 	*/
 	public function submit_user_order ($data) {
 		$user_id = \Auth::user()->id;

 		$order = new Order();
 		$order->user_id = $user_id;
 		$order->products = $data->user_products;
 		$order->total_sum = $data->total_sum;
 		$order->payment = $data->payment;
 		$order->delivery = $data->delivery;

 		$order->save();

 		// to delete from user cart after submitting order
 		$user = User::find($user_id);
		$user->products()->detach(unserialize($data->user_products));

 		return true;
 	}	
}



