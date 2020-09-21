<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\PersonAdminController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\Shop\UserController;
use App\Http\Controllers\Admin\OrderAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

// main page for login user
Route::middleware(['auth:sanctum', 'verified'])
			->get('/dashboard', [ShopController::class, 'index'])
			->name('dashboard');



// shop main
Route::get('/', [ShopController::class, 'index'])->name('shop');

// 
Route::get('/shop/{category}', [ShopController::class, 'get_product_by_category'])->name('get_product_by_category');

// register admin page
Route::get('/register_admin', [PersonAdminController::class, 'register_admin'])
						->name('register_admin');

// add admin
Route::post('/add_admin', [PersonAdminController::class, 'add_admin'])
						->name('add_admin');

// login page admin 
Route::get('/login_admin_page', [PersonAdminController::class, 'login_admin_page'])->name('login_admin_page');

// log in admin
Route::post('/login_admin_user', [PersonAdminController::class, 'login_admin_user'])->name('login_admin_user');


// admin login route
Route::middleware(['admin_auth'])->group(function () {
	Route::get('/admin', [ProductAdminController::class, 'products']);

	// products show
	Route::get('/products', [ProductAdminController::class, 'products'])
							->name('products');

	// product form
	Route::get('/product_form', [ProductAdminController::class, 'product_form'])
							->name('product_form');
	// product save
	Route::post('/save_product', [ProductAdminController::class, 'save_product'])
							->name('save_product');

	// product edit
	Route::get('/product_edit/{id}', [ProductAdminController::class, 'product_edit'])
							->name('product_edit');

	// product update
	Route::post('/product_update', [ProductAdminController::class, 'product_update'])
							->name('product_update');

	// product delete
	Route::get('/product_delete/{id}', [ProductAdminController::class, 'product_delete'])
							->name('product_delete');
	// product ajax
	Route::get('/product_ajax', [ProductAdminController::class, 'product_ajax'])
							->name('product_ajax');

	// categories show
	Route::get('/categories', [CategoryAdminController::class, 'categories'])
							->name('categories');

	// category add
	Route::get('/add_category', [CategoryAdminController::class, 'add_category'])
							->name('add_category');

	// category save
	Route::post('/save_category', [CategoryAdminController::class, 'save_category'])
							->name('save_category');

	// category edit
	Route::get('/edit_category/{id}', [CategoryAdminController::class, 'edit_category'])->name('edit_category');

	// category update
	Route::post('/update_category', [CategoryAdminController::class, 'update_category'])->name('update_category');

	// category delete by id
	Route::get('/delete_category/{id}', [CategoryAdminController::class, 'delete_category'])->name('delete_category');

	// orders
	Route::get('/orders', [OrderAdminController::class, 'orders'])->name('orders');

	// detail order user
	Route::get('/detail_order_user/{id}', [OrderAdminController::class, 'detail_order_user'])->name('detail_order_user');

	// log out from admin
	Route::get('/admin_logout', [PersonAdminController::class, 'admin_logout'])->name('admin_logout');
			
});

// shop

/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
*/


// group by auth middleware
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

	Route::get('/add_to_user_cart/{id}', [UserController::class, 'add_to_user_cart'])->name('add_to_user_cart');

	Route::get('/cart_show', [UserController::class, 'cart_show'])->name('cart_show');

	Route::get('/cart_delete_product/{id}', [UserController::class, 'cart_delete_product'])->name('cart_delete_product');

	Route::get('/show_item/{id}', [UserController::class, 'show_item'])->name('show_item');

	// submit order
	Route::get('/submit_order_page', [UserController::class, 'submit_order_page'])->name('submit_order_page');

	// submit order
	Route::post('/submit_user_order', [UserController::class, 'submit_user_order'])->name('submit_user_order');


});


