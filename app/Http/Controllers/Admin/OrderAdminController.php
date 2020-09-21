<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrderAdminService;

class OrderAdminController extends Controller
{
	public function __construct (OrderAdminService $service) {
		$this->service = $service;
	}

	/*
	* user orders
	*/
    public function orders () {
    	$orders = $this->service->get_orders();
    	return view('admin.orders', ['orders' => $orders]);
    }

    /*
    * detail order user
    */
    public function detail_order_user ($id) {
    	$order_data = $this->service->detail_order_user($id);
    	return view('admin.detail_order', [
    			'order' => $order_data['order'],
    			'products' => $order_data['products'],
    		]);
    }
}
