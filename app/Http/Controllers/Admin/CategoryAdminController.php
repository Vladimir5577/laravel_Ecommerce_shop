<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;
use App\Services\CategoryAdminService;

class CategoryAdminController extends Controller
{
    private $service;

    /*
    * construct our controller
    */
    public function __construct (CategoryAdminService $service) {
        $this->service = $service;
    }

	/*
	* show categories
	*/
    public function categories () {
        $categories = $this->service->get_categories();
    	return view('admin.categories', ['categories' => $categories]);
    }

    /*
    * category form
    */
    public function add_category () {
    	return view('admin.category_form');
    }

    /*
    * save category to the database
    */
    public function save_category (CategoryRequest $request) {
    	$this->service->save_category($request);
        return redirect()
                    ->route('categories')
                    ->with('success', 'Category added successfully');
    }

    /*
    * edit category
    */
    public function edit_category ($id) {
        $category = $this->service->edit_category($id);
        return view('admin.category_edit', ['category' => $category]);
    }

    /*
    * update category
    */
    public function update_category (CategoryRequest $request) {
        $this->service->update_category($request);

        return redirect()
                    ->route('categories')
                    ->with('success', 'Record updated successfully');
    }

    /*
    * delete category by id
    */
    public function delete_category ($id) {
        $this->service->delete_category($id);

        return redirect()
                    ->route('categories')
                    ->with('success', 'Category was deleted successfully');
    }


}
