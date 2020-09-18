<?php

namespace App\Services;

use App\Models\Product;

use Yajra\Datatables\Datatables;


class ProductAdminService {

	/*
	* get categories for form
	*/
	public function get_categories () {
		return \App\Models\Category::all();
	}

	/*
	* save product
	*/
	public function save_product ($data) {
		// $slug = \Illuminate\Support\Str::slug($data->category, '-');
		$product = new Product();
		$product->category_id = $data->category;
		// $product->slug = $data->category;
		$product->name = $data->name;
		$product->price = $data->price;
		$product->description = $data->description;
		$product->is_active = $data->is_active;

		if ($file = $data->file('photo')) {
            $name = $file->getClientOriginalName();
            if ($file->move('images', $name)) {
                $product->photo = $name;
            }
        }

        $product->save();
        
        return true;
	}

	/*
	* get products with ajax
	*/
	public function product_ajax () {
		$model = Product::query();
        return Datatables::of($model)    

        	->addColumn('action', function ($model) {
                    $button = '<a href="/product_edit/'. $model->id .'" type="button" name="edit" class="edit btn btn-primary btn-sm">Edit</a> ';
                    $button .= ' <a href="/product_delete/' . $model->id . '" onclick="sweetalert(event)" type="button" name="edit" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $button;
                })

            ->make(true);
	}

	/*
	* edit product find by id
	*/
	public function product_edit ($id) {
		return Product::find($id);
	}

	/*
	* update product by id
	*/
	public function product_update ($data) {
		$id = $data->product_id;
		$product = Product::find($id);
		$product->category_id = $data->category;
		$product->name = $data->name;
		$product->price = $data->price;
		$product->description = $data->description;
		$product->is_active = $data->is_active;

		if ($file = $data->file('photo')) {
            $name = $file->getClientOriginalName();
            if ($file->move('images', $name)) {
                $product->photo = $name;
            }
        }

        $product->save();
        
        return true;
	}

	/*
	* delete product by id
	*/
	public function product_delete ($id) {
		$product = Product::find($id);
		$product->delete();
		return true;
	}  

}


