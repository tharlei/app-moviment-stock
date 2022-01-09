<?php

namespace App\Modules\Product\Queries\FindProductWithSku;

interface FindProductWithSkuQuery
{
    public function execute(string $sku, ?string $removeId = null): ?FindProductWithSkuData;
}
