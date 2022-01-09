<?php

namespace App\Modules\Product\Actions\Create;

use App\Modules\Product\Domain\ProductFactory;
use App\Modules\Product\ProductRepository;
use App\Modules\Product\Queries\FindProductWithSku\FindProductWithSkuQuery;
use RuntimeException;
use SebastianBergmann\Environment\Runtime;

class CreateProductAction
{
    private ProductFactory $productFactory;
    private ProductRepository $productRepository;
    private FindProductWithSkuQuery $findProductWithSkuQuery;

    public function __construct(
        ProductFactory $productFactory,
        ProductRepository $productRepository,
        FindProductWithSkuQuery $findProductWithSkuQuery
    ) {
        $this->productFactory = $productFactory;
        $this->productRepository = $productRepository;
        $this->findProductWithSkuQuery = $findProductWithSkuQuery;
    }

    public function execute(CreateProductInput $data): void
    {
        $product = $this->productFactory->new(
            $data->name,
            $data->sku,
            $data->amount,
        );

        $this->willOverlapSkuProduct($product->getSku());

        $this->productRepository->persist($product);
    }

    private function willOverlapSkuProduct(string $sku): void
    {
        $product = $this->findProductWithSkuQuery->execute($sku);

        if (!empty($product)) {
            throw new RuntimeException('SKU já cadastrado');
        }
    }
}
