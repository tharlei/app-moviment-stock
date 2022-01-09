<?php

namespace App\Modules\Product\Queries\FindProductWithSku;

interface FindProductWithSkuQuery
{
    public function execute(string $sku): ?FindProductWithSkuData;
}
