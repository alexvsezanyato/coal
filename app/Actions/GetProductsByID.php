<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Product;

class GetProductsByID
{
    use AsAction;

    public function handle(array $ids)
    {
        $products = [];

        foreach ($ids as $id) {
            $product = Product::where(["id" => $id])
                ->first()
                ->toArray();

            $products[$product["id"]] = $product;
        }

        return $products;
    }
}
