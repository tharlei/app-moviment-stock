<?php

namespace App\Modules\Product\Actions\Update;

class UpdateProductInput
{
    public string $id;
    public string $name;
    public string $sku;
    public int $amount;

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
        $this->amount = $amount;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data["id"],
            $data["name"],
            $data["sku"],
            $data["amount"]
        );
    }
}
