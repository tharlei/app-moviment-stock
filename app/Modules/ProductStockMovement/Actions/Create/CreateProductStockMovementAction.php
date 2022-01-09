<?php

namespace App\Modules\ProductStockMovement\Actions\Create;

use App\Modules\Product\Actions\Update\UpdateProductAction;
use App\Modules\Product\Actions\Update\UpdateProductInput;
use App\Modules\Product\Queries\FindProductWithSku\FindProductWithSkuQuery;
use App\Modules\ProductStockMovement\Domain\ProductStockMovementFactory;
use App\Modules\ProductStockMovement\ProductStockMovementRepository;
use RuntimeException;

class CreateProductStockMovementAction
{
    private ProductStockMovementFactory $productStockMovementFactory;
    private ProductStockMovementRepository $productStockMovementRepository;
    private FindProductWithSkuQuery $findProductWithSkuQuery;
    private UpdateProductAction $updateProductAction;

    public function __construct(
        ProductStockMovementFactory $productStockMovementFactory,
        ProductStockMovementRepository $productStockMovementRepository,
        FindProductWithSkuQuery $findProductWithSkuQuery,
        UpdateProductAction $updateProductAction
    ) {
        $this->productStockMovementFactory = $productStockMovementFactory;
        $this->productStockMovementRepository = $productStockMovementRepository;
        $this->findProductWithSkuQuery = $findProductWithSkuQuery;
        $this->updateProductAction = $updateProductAction;
    }

    public function execute(CreateProductStockMovementInput $data): void
    {
        $this->productAmountUpdate($data);

        $productStockMovement = $this->productStockMovementFactory->new(
            $data->sku,
            $data->amount,
            $data->isAdd,
        );

        $this->productStockMovementRepository->persist($productStockMovement);
    }

    private function productAmountUpdate(CreateProductStockMovementInput $data) {
        $product = $this->findProductWithSkuQuery->execute($data->sku);

        if (empty($product)) {
            throw new RuntimeException('Sku não cadastrado');
        }

        if ($data->isAdd) {
            $product->amount += $data->amount;
        }

        if (!$data->isAdd) {
            $product->amount -= $data->amount;
        }

        $this->updateProductAction->execute(
            UpdateProductInput::fromArray(
                (array) $product
            )
        );
    }
}
