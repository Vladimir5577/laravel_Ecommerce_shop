<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRegisterRequest;
use App\Http\Requests\AdminLoginRequest;

use App\Services\PersonAdminService;

class PersonAdminController extends Controller
{	
	private $service;

	/*
	* construc controller with service
	*/
	public function __construct(PersonAdminService $service) {
		$this->service = $service;
	}

	/*
	* register page
	*/
    public function register_admin () {
    	return view('admin.register_admin');
    }

    /*
    * add admin to database (register)
    */
    public function add_admin (AdminRegisterRequest $request) {
    	$this->service->add_admin($request);
    	return redirect()->route('products');
    }

    /*
    * login page admin
    */
    public function login_admin_page () {
    	return view('admin.login_admin');
    }

    /*
    * login admin user
    */
    public function login_admin_user (AdminLoginRequest $request) {
    	if ($this->service->login_admin_user($request)) {
    		return redirect()->route('products');
    	}

    	return redirect()
    			->route('login_admin_page')
    			->with('failed', 'Invalid credentials');
    }

    /*
    * admin logout
    */
    public function admin_logout () {
    	$this->service->admin_logout();
    	return redirect()->route('register_admin');
    }

}
