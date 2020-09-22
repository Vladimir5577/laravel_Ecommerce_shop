<?php

namespace App\Services;

use App\Models\User;

class CustomerAdminService {

	public function get_customers () {
		return User::paginate(15);
	}

}