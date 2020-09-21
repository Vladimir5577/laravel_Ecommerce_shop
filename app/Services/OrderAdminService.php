<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;

class OrderAdminService {

	public function get_orders () {
		return Order::all();
	}

	public function detail_order_user ($order_id) {
		$order = Order::find($order_id);
		$products = Product::find($order->products); // return array
		
		return ['order' => $order, 'products' => $products];
	}

}