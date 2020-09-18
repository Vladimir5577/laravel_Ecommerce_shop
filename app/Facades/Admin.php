<?php

namespace App\Facades;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class Admin {
	public function count_records () {
		$count_products = Product::count();
		$count_categories = Category::count();
		// $count_customers = User::count();
		// $count_orders = UserOrder::count();
		return [
			'count_products' => $count_products,
			'count_categories' => $count_categories,
			// 'count_customers' => $count_customers,
			// 'count_orders' => $count_orders,
		];
	}
}