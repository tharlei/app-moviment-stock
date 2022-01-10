<?php

namespace App\Modules\ProductStockMovement\Queries\ListStockMovement;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ListStockMovementData
{
    public Collection $items;
    public ?LengthAwarePaginator $paginator;

    public function __construct(
        Collection $items,
        ?LengthAwarePaginator $paginator = null
    ) {
        $this->items = $items;
        if (!empty($paginator)) {
            $this->paginator = $paginator;
        }
    }
}
