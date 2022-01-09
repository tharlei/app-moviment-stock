<?php

namespace App\Modules\Product\Domain;

use RuntimeException;

final class Product
{
    private string $id;
    private string $name;
    private string $sku;
    private int $amount;

    public function __construct(
        string $id,
        string $name,
        string $sku,
        int $amount
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->sku = $sku;
        $this->setAmount($amount);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        if ($amount < 0) {
            throw new RuntimeException('Estoque mínimo para produto é 0');
        }

        $this->amount = $amount;
    }
}
