<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $products;
    function __construct()
    {
        $this->products = Product::with('category')->get();
    }

    function getProducts()
    {
        return response()->json($this->products);
    }

    function insertProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price1' => 'required|numeric'
        ]);

        $product = new Product();

        $product->name = $request->name;
        $product->image = $request->image ?? null;
        $product->description = $request->description ?? null;
        $product->price1 = $request->price1;
        $product->price2 = $request->price2 ?? null;
        $product->price3 = $request->price3 ?? null;
        $product->l1 = $request->l1 ?? null;
        $product->l2 = $request->l2 ?? null;
        $product->l3 = $request->l3 ?? null;
        $product->stock = $request->stock ?? null;
        $product->category_id = $request->category_id;
        if ($product->save()) {
            return response()->json([
                $product
            ], 201);
        } else {
            return response()->json([
                'message' => 'An Error Occured!'
            ], 400);
        }
    }
}
