<?php

namespace App\Queries\Product;

use App\Models\Product as ProductModel;
use App\Modules\Product\Queries\FindProductWithSku\FindProductWithSkuData;
use App\Modules\Product\Queries\FindProductWithSku\FindProductWithSkuQuery;

class FindProductWithSku implements FindProductWithSkuQuery
{
    private ProductModel $productModel;

    public function __construct(
        ProductModel $productModel
    ) {
        $this->productModel = $productModel;
    }

    public function execute(string $sku, ?string $removeId = null): ?FindProductWithSkuData
    {
        $product = $this->productModel->where('sku', $sku);

        if (!empty($removeId)) {
            $product->where('id', '<>', $removeId);
        }

        $product = $product->first();

        if (empty($product)) {
            return null;
        }

        return new FindProductWithSkuData(
            $product->id,
            $product->name,
            $product->sku,
            $product->amount,
        );
    }
}
