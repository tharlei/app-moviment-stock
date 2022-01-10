<?php

namespace App\Queries\Product;

use App\Models\Product as ProductModel;
use App\Modules\Product\Queries\ListAllSkuQuery;
use Illuminate\Support\Collection;

class ListAllSku implements ListAllSkuQuery
{
    private ProductModel $productModel;

    public function __construct(
        ProductModel $productModel
    ) {
        $this->productModel = $productModel;
    }

    public function execute(): Collection
    {
        return $this->productModel
            ->all('sku')
            ->map(function($product) {
                return $product->sku;
            });
    }
}
