<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Products;

class GetProductNamesByID
{
    use AsAction;

    public function handle(array $ids)
    {
        $productNames = [];

        foreach ($ids as $id) {
            $product = Products::select("id", "name")
                ->where(["id" => $id])
                ->first();

            $productNames[$product->id] = $product->name;
        }

        return $productNames;
    }
}
