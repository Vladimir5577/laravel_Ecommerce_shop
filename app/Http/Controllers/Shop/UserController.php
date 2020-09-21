<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OrderUserRequest;

use App\Services\UserCartService;

class UserController extends Controller
{
	private $userCart;

	public function __construct (UserCartService $user_cart) {
		$this->user_cart = $user_cart;
	}

    /*
    * add product to the cart
    */
    public function add_to_user_cart ($id) {
    	$this->user_cart->add_to_user_cart($id);
    	return redirect()
    				->route('shop')
    				->with('product_added', 'Product added to your cart');
    }

    /*
    * show cart
    */
    public function cart_show () {
    	$products = $this->user_cart->cart_show();
    	return view('shop.cart', ['products' => $products]);
    }

    /*
    * cart delete
    */
    public function cart_delete_product ($id) {
    	$this->user_cart->cart_delete_product($id);
    	return redirect()
    				->route('cart_show')
    				->with('deleted_cart_item', 'Product has been deleted from your cart');
    }

    /*
    * show item
    */
    public function show_item ($id) {
    	$product = $this->user_cart->show_item($id);
    	return view('shop.item', ['product' => $product]);
    }

    /*
    * submit order page
    */
    public function submit_order_page () {
    	// $this->user_cart->submit_order_page($request);
    	return view('shop.submit_order');
    }

    /*
    * submit user order
    */
    public function submit_user_order (OrderUserRequest $request) {
    	$this->user_cart->submit_user_order($request);
    	return view('shop.confirmed_order');
    }
}
