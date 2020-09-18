<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;


class ShopFacade extends Facade {

	protected static function getFacadeAccessor () {
		return 'shop';
	}

}

