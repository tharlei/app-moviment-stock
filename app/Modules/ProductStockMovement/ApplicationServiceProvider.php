<?php

declare(strict_types=1);

namespace App\Modules\ProductStockMovement;

use App\Repositories\EloquentProductStockMovementRepository;
use Illuminate\Support\ServiceProvider;

final class ApplicationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ProductStockMovementRepository::class, EloquentProductStockMovementRepository::class);
    }
}
