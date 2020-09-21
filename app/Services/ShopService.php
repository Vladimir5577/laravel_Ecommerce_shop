<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Category;

class ShopService {

	public function index () {
		
	}

	public function get_product_by_category ($category_id) {
		$category = Category::find($category_id);
		$products = $category->product;
		return $products;
	}

}
