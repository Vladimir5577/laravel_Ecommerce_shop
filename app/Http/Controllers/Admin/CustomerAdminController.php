<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\CustomerAdminService;

class CustomerAdminController extends Controller
{
	private $service;

	/*
	* construct controller with service
	*/
	public function __construct (CustomerAdminService $service) {
		$this->service = $service;
	}

    /*
    * get all customers
    */
    public function get_customers () {
    	$customers = $this->service->get_customers();
    	return view('admin.customers', ['customers' => $customers]);
    }
}
