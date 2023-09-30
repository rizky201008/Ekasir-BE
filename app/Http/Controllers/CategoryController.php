<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $categories;
    function __construct()
    {
        $this->categories = Category::all();
    }

    function getCategories()
    {
        return response()->json($this->categories);
    }

    function insertCategory(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
            ]
        );

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return response()->json([
            $category
        ], 201);
    }
}
