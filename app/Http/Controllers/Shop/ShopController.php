<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ShopService;

use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{	
	private $shopService;

	public function __construct (ShopService $shopService) {
		$this->shopService = $shopService;
	}

	/*
	* main page
	*/
    public function index () {
    	$products = Product::get();
    	return view('shop.shop_main', [
    			'products' => $products,
    		]);
    }
}
