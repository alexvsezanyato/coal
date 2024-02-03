<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\OrderCreated;
use App\Actions\GetProductsByID;

class OrderController extends Controller
{
    public function index(Request $request) {
        $basket = $request->session()->get("basket");
        $formData = $request->all();

        if ($basket) $productIDs = $basket ? array_map(
            fn($product) => $product["product-id"],
            $basket,
        ) : [];

        $products = GetProductsByID::run($productIDs);

        foreach ($basket as $id => $product) {
            $amount = $product["amount"];
            $cost = (int) $amount * (int) $products[$id]["price"];

            $products[$id]["amount"] = $amount;
            $products[$id]["cost"] = $cost;
        }

        OrderCreated::dispatch(["products" => $products] + $formData);

        return json_encode([
            "status" => "success",
        ]);
    }
}
