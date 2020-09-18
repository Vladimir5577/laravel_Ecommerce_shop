<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ProductAdminService;
use App\Http\Requests\ProductRequest;

use App\Models\Product;
use Yajra\Datatables\Datatables;

class ProductAdminController extends Controller
{
	private $service;

	/*
	*  construct controller
	*/
	public function __construct (ProductAdminService $product) {
		$this->service = $product;
	}

    /*
    * get product with ajax
    */
    public function product_ajax() {
        return $this->service->product_ajax();
    }

	/*
	*  show products
	*/
    public function products () {
    	return view('admin.products');
    }

    /*
    * form to add product
    */
    public function product_form () {
        $categories = $this->service->get_categories();
    	return view('admin.product_form', ['categories' => $categories]);
    }

    /*
    * save product to database
    */
    public function save_product (ProductRequest $request) {
    	$this->service->save_product($request);

        return redirect()
                    ->route('products')
                    ->with('success', 'Product added successfully');
    }

    /*
    * product edit get by id
    */
    public function product_edit ($id) {
        $categories = $this->service->get_categories();
        $product = $this->service->product_edit($id);
        return view('admin.product_edit', [
                'product' => $product,
                'categories' => $categories,
            ]);
    }

    /*
    * update product by id
    */
    public function product_update (ProductRequest $request) {
        $this->service->product_update($request);
        return redirect()
                    ->route('products')
                    ->with('success', 'Product updated successfully');
    }

    /*
    * delete product by id
    */
    public function product_delete ($id) {
        $this->service->product_delete($id);
        return redirect()
                    ->route('products')
                    ->with('success', 'Product deleted successfully');
    }
}
