<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index(Request $request) {
        $products = Product::all();

        return view("pages.catalog.catalog", [
            "products" => $products,
        ]);
    }

    public function category(string $category) {
        return view("pages.catalog.product", [
            //
        ]);
    }

    public function product(Category $category, Product $product) {
        return view("pages.catalog.product", [
            //
        ]);
    }
}
