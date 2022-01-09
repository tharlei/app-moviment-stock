<?php

namespace App\Repositories;

use App\Models\Product as ProductModel;
use App\Modules\Product\Domain\Product;
use App\Modules\Product\Domain\ProductFactory;
use App\Modules\Product\ProductRepository;

class EloquentProductRepository implements ProductRepository
{
    private ProductModel $productModel;
    private ProductFactory $productFactory;

    public function __construct(
        ProductModel $productModel,
        ProductFactory $productFactory
    ) {
        $this->productModel = $productModel;
        $this->productFactory = $productFactory;
    }

    public function persist(Product $product): void
    {
        if ($this->find($product->getId())) {
            $this->update($product);
            return;
        }

        $this->create($product);
    }

    public function find(string $id): ?Product
    {
        $product = $this->productModel->find($id);

        if (empty($product)) {
            return null;
        }

        return $this->mapToDomain($product);
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
    private function mapToDomain(ProductModel $product): Product
    {
        return $this->productFactory->restore(
            $product->id,
            $product->name,
            $product->sku,
            $product->amount,
        );
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
