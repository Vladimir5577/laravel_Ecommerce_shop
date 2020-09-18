<?php

namespace App\Services;
use App\Models\Category;

class CategoryAdminService {

	/*
	* get all categories
	*/
	public function get_categories () {
		return Category::all();
	}

	/*
	* save category to database
	*/
	public function save_category ($data) {
		$slug = \Illuminate\Support\Str::slug($data->category, '-');
		$category = new Category();
		$category->category = $data->category;
		$category->slug = $slug;
		$category->description = $data->description;

		$category->save();
		return true;
	}

	/*
	* get category for editing by id
	*/
	public function edit_category ($id) {
		return Category::find($id);
	}

	/*
	* update category by id
	*/
	public function update_category ($data) {
		$slug = \Illuminate\Support\Str::slug($data->category, '-');
		$category = Category::find($data->category_id);
		$category->category = $data->category;
		$category->slug = $slug;
		$category->description = $data->description;

		$category->save();
		return true;
	}

	/*
	* delete category by id
	*/ 
	public function delete_category ($id) {
		$category = Category::find($id);
		$category->delete();

		return true;
	}

}