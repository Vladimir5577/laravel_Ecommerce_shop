<?php

namespace App\Services;

use App\Models\Admin;

class PersonAdminService {

	/*
	* add admin
	*/
	public function add_admin ($data) {
		$admin = new Admin();
		$admin->name = $data->name;
    	$admin->email = $data->email;
    	$admin->password = $data->password;

    	$admin->save();

        session()->put([
            'name' => $data->name,
            'password' => $data->password,
        ]);

        return true;
	}

	/*
	* login existing admin
	*/
	public function login_admin_user ($data) {
		$name = $data->name;
		$password = $data->password;

		$admin = Admin::where([
				['name', $name], 
				['password', $password],
			])->first();

		if ($admin) {
			session()->put([
                'name' => $admin->name,
                'password' => $admin->password,
            ]);

            return true;
		}

		return false;
	}

	/*
	* admin logout
	*/
	public function admin_logout () {
		session()->flush();
		return true;
	}
}