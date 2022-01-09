<?php

namespace App\Repositories;

use App\Models\Product as ProductModel;
use App\Modules\Product\Domain\Product;
use App\Modules\Product\ProductRepository;

class EloquentProductRepository implements ProductRepository
{
    private ProductModel $productModel;

    public function __construct(
        ProductModel $productModel
    ) {
        $this->productModel = $productModel;
    }

    public function persist(Product $product): void
    {
        if ($this->exists($product->getId())) {
            $this->update($product);
            return;
        }

        $this->create($product);
    }

    private function exists(string $id): bool
    {
        return !empty($this->productModel->find($id));
    }

    private function mapToModelData(Product $product): array
    {
        return [
            "id" => $product->getId(),
            "name" => $product->getName(),
            "sku" => $product->getSku(),
            "amount" => $product->getAmount(),
        ];
    }

    private function create(Product $product): void
    {
        $this->productModel->create(
            $this->mapToModelData($product)
        );
    }

    private function update(Product $product): void
    {
        $this->productModel->find($product->getId())
            ->update(
                $this->mapToModelData($product)
            );
    }
}
