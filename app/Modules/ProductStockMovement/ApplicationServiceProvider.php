<?php

declare(strict_types=1);

namespace App\Modules\ProductStockMovement;

use App\Modules\ProductStockMovement\Queries\ListStockMovement\ListStockMovementOfSkuQuery;
use App\Modules\ProductStockMovement\Queries\ListStockMovement\ListStockMovementQuery;
use App\Queries\ProductStockMovement\ListStockMovement;
use App\Queries\ProductStockMovement\ListStockMovementOfSku;
use App\Repositories\EloquentProductStockMovementRepository;
use Illuminate\Support\ServiceProvider;

final class ApplicationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ProductStockMovementRepository::class, EloquentProductStockMovementRepository::class);
        $this->app->bind(ListStockMovementOfSkuQuery::class, ListStockMovementOfSku::class);
        $this->app->bind(ListStockMovementQuery::class, ListStockMovement::class);
    }
}
