<?php

namespace App\Modules\ProductStockMovement\Domain;

use Carbon\Carbon;
use Illuminate\Support\Str;

class ProductStockMovementFactory
{
    public function new(
        string $sku,
        int $amount,
        bool $isAdd
    ) {
        return new ProductStockMovement(
            Str::uuid(),
            $sku,
            $amount,
            $isAdd,
            Carbon::now()
        );
    }

    public function restore(
        string $id,
        string $sku,
        int $amount,
        bool $isAdd,
        Carbon $createdAt
    ) {
        return new ProductStockMovement(
            $id,
            $sku,
            $amount,
            $isAdd,
            $createdAt
        );
    }
}
