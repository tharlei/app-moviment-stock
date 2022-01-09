<?php

namespace App\Modules\Product;

use App\Modules\Product\Domain\Product;

interface ProductRepository
{
    public function persist(Product $product): void;
}
