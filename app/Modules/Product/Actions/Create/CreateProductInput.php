<?php

namespace App\Modules\Product\Actions\Create;

class CreateProductInput
{
    public string $name;
    public string $sku;
    public int $amount;

    public function __construct(
        string $name,
        string $sku,
        int $amount
    )
    {
        $this->name = $name;
        $this->sku = $sku;
        $this->amount = $amount;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data["name"],
            $data["sku"],
            $data["amount"]
        );
    }
}
