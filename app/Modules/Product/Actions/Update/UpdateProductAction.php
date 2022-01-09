<?php

namespace App\Modules\Product\Actions\Update;

use App\Modules\Product\Domain\Product;
use App\Modules\Product\ProductRepository;
use App\Modules\Product\Queries\FindProductWithSku\FindProductWithSkuQuery;
use RuntimeException;

class UpdateProductAction
{
    private ProductRepository $productRepository;
    private FindProductWithSkuQuery $findProductWithSkuQuery;

    public function __construct(
        ProductRepository $productRepository,
        FindProductWithSkuQuery $findProductWithSkuQuery
    ) {
        $this->productRepository = $productRepository;
        $this->findProductWithSkuQuery = $findProductWithSkuQuery;
    }

    public function execute(UpdateProductInput $data): void
    {
        $product = $this->productRepository->find($data->id);

        $product->setName($data->name);
        $product->setSku($data->sku);
        $product->setAmount($data->amount);

        $this->willOverlapSkuProduct($product);

        $this->productRepository->persist($product);
    }

    private function willOverlapSkuProduct(Product $product): void
    {
        $product = $this->findProductWithSkuQuery->execute($product->getSku(), $product->getId());

        if (!empty($product)) {
            throw new RuntimeException('SKU já cadastrado');
        }
    }
}
