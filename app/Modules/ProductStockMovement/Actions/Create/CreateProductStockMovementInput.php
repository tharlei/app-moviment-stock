<?php

namespace App\Modules\ProductStockMovement\Actions\Create;

class CreateProductStockMovementInput
{
    public string $sku;
    public int $amount;
    public bool $isAdd;

    public function __construct(
        string $sku,
        int $amount,
        bool $isAdd
    )
    {
        $this->sku = $sku;
        $this->amount = $amount;
        $this->isAdd = $isAdd;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data["sku"],
            $data["amount"],
            !!$data["is_add"],
        );
    }
}
