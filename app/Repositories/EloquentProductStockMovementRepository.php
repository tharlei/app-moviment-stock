<?php

namespace App\Repositories;

use App\Models\ProductStockMovement as ProductStockMovementModel;
use App\Modules\ProductStockMovement\Domain\ProductStockMovement;
use App\Modules\ProductStockMovement\ProductStockMovementRepository;
use RuntimeException;

class EloquentProductStockMovementRepository implements ProductStockMovementRepository
{
    private ProductStockMovementModel $productStockMovementModel;

    public function __construct(
        ProductStockMovementModel $productStockMovementModel
    ) {
        $this->productStockMovementModel = $productStockMovementModel;
    }

    public function persist(ProductStockMovement $product): void
    {
        if ($this->exists($product->getId())) {
            throw new RuntimeException('Não é permitido atualizar movimento do produto');
        }

        $this->create($product);
    }

    private function exists(string $id): bool
    {
        return !empty($this->productStockMovementModel->find($id));
    }

    private function mapToModelData(ProductStockMovement $product): array
    {
        return [
            "id" => $product->getId(),
            "sku" => $product->getSku(),
            "amount" => $product->getAmount(),
            "is_add" => $product->isAdd(),
            "created_at" => $product->getCreatedAt(),
        ];
    }

    private function create(ProductStockMovement $product): void
    {
        $this->productStockMovementModel->create(
            $this->mapToModelData($product)
        );
    }
}
