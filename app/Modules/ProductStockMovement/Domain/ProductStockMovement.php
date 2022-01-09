<?php

namespace App\Modules\ProductStockMovement\Domain;

use Carbon\Carbon;
use RuntimeException;

final class ProductStockMovement
{
    private string $id;
    private string $sku;
    private int $amount;
    private bool $isAdd;
    private Carbon $name;

    public function __construct(
        string $id,
        string $sku,
        int $amount,
        bool $isAdd,
        Carbon $createdAt
    )
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->setAmount($amount);
        $this->isAdd = $isAdd;
        $this->createdAt = $createdAt;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function isAdd(): bool
    {
        return $this->isAdd;
    }

    private function setAmount(int $amount): void
    {
        if ($amount < 1) {
            throw new RuntimeException('Movimento mínimo do estoque para produto é 1');
        }

        $this->amount = $amount;
    }
}
