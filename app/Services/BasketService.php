<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Product;

class BasketService
{
    public function getTotalPrice(): int {
        $basket = request()->session()->get('basket');

        if (!is_array($basket)) {
            return 0;
        }

        $indexedProducts = [];
        $productIds = [];

        foreach ($basket as $basketItem) {
            $indexedProducts[$basketItem["product-id"]] = $basketItem;
            $productIds[] = $basketItem["product-id"];
        }

        if (!$productIds) {
            return 0;
        }

        $products = Product::whereIn('id', $productIds)->get();

        $price = 0;

        foreach ($products as $product) {
            $amount = $indexedProducts[$product->id]["amount"];
            $price += (float) $product->price * $amount;
        }

        return $price;
    }
}
