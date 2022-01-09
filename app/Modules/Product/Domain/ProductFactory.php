<?php

namespace App\Modules\Product\Domain;

use Illuminate\Support\Str;

class ProductFactory
{
    public function new(
        string $name,
        string $sku,
        int $amount
    ) {
        return new Product(
            Str::uuid(),
            $name,
            $sku,
            $amount,
        );
    }

    public function restore(
        string $id,
        string $name,
        string $sku,
        int $amount
    ) {
        return new Product(
            $id,
            $name,
            $sku,
            $amount,
        );
    }
}
