<?php

namespace App\Modules\Product\Queries\FindProductWithSku;

class FindProductWithSkuData
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
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->sku = $sku;
        $this->amount = $amount;
    }
}
